export const redirect = (redirect) => {
    try {
        var token = JSON.parse(localStorage.getItem("authenticate"))["access_token"];
        console.log(token);
        if (token) {
            window.location.href = redirect;
        } else {
            if (window.location.pathname == "/") {
                window.location.href = redirect;
            }else{
                window.location.href = "/login";
            }
        }
    } catch (e) {
        console.error('Error parsing authentication data:', e);
        if (window.location.pathname != "/") {
            window.location.href = "/login"; // Redirect if JSON parsing fails
        }
    }
}

export const isLogin = async (role) =>  {
    me()
    try {
        const authData = JSON.parse(localStorage.getItem("authenticate"));
        if (!authData || !authData.access_token) {

            if(window.location.pathname != "/login"){
                if(role == "guest"){
                    redirect('/')
                }else{
                    redirect('/login')
                }
            }
        }
        if (authData) {
            if (window.location.pathname === "/login" || window.location.pathname === "/") {
                window.history.back();  // Navigate back if logged in
            }
            const user = await me();
            if (user && user.role && user.role.name === role) {
                return true;
            } else {
                return false; // User is logged in but does not have the required role
            }
        }
        return true;
    } catch (e) {
        console.error('Error parsing authentication data:', e);
        //window.location.href = "/login";  // Redirect if parsing fails
        return false;
    }
};

export const getTokens = () => {
    const authData = JSON.parse(localStorage.getItem("authenticate"));
    if (!authData) {
        console.error('No authentication data found in localStorage.');
        return null;
    }
    return authData['access_token'];
}


export const me = async () => {
    const authData = localStorage.getItem("authenticate");
    if (!authData) {
        console.error('No authentication data found in localStorage.');
        //redirect('/login')
        return null;
    }

    let data = null;
    let response = null;
    try {
        const parsedData = JSON.parse(authData);
        response = await $.ajax({
            url: "/api/auth/me",
            method: "GET",
            headers: {
                "Authorization": "Bearer " + parsedData.access_token,
                "Accept": "Application/json"
            }
        });
        console.log("here")
        console.log(response)
        if(response.status == 401){
            localStorage.removeItem("authenticate")
            redirect('/login')
        }
        if (!response) {
                console.error('Error fetching user data:');
                return parsedData.user || null;
            }
        data = response || parsedData.user || null;
    } catch (e) {
        console.error('Error parsing authentication data:', e);
        data = null;
    }
    return data;
};


export const Logout = () => {
    Swal.fire({
        title: "Logout?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes"
    }).then((result) => {
        if (result.isConfirmed) {
            const authData = JSON.parse(localStorage.getItem("authenticate"));
            console.log(authData.access_token)
            $.ajax({
                url: '/api/auth/logout',
                type: "POST",
                headers: { 'Authorization': 'Bearer ' + authData.access_token },
                success: function () {
                    Swal.fire({
                        title: "Success",
                        text: "anda bershasil logout.",
                        icon: "success"
                    });
                    localStorage.removeItem("authenticate")
                    window.location.href = "/login"
                },
                error: function(xhr, status, error) { Swal.fire({ title: "Fail", text: "Anda gagal logout. Error: " + xhr.responseText, icon: "error" }); }
            });
        }
    });

}
