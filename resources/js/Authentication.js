export const redirect = (redirect) => {
    try {
        var token = JSON.parse(localStorage.getItem("authenticate"))["access_token"];
        console.log(token);
        if (token) {
            window.location.href = redirect;
        } else {
            window.location.href = "/login"
        }
    } catch (e) {
        console.error('Error parsing authentication data:', e);
        window.location.href = "/login"; // Redirect if JSON parsing fails
    }
}

export const isLogin = (role) => {
    me()
    try {
        const authData = JSON.parse(localStorage.getItem("authenticate"));
        if (!authData || !authData.access_token) {
            if(window.location.pathname != "/login"){
                //redirect('/login')
            }
        }
        if (authData) {
            if (window.location.pathname === "/login") {
                //window.history.back();  // Navigate back if logged in
            }

            if(me()["role"]["name"] == role){
                return true
            }
        }
        return true;
    } catch (e) {
        console.error('Error parsing authentication data:', e);
        //window.location.href = "/login";  // Redirect if parsing fails
        return false;
    }
};


export const me = () => {
    if (localStorage.getItem("authenticate") === null) {
        return null;
    }

    let user = null;

    $.ajax({
        url: "/api/auth/me",
        method: "GET",
        async: false,
        headers: {
            "Authorization": "Bearer " + JSON.parse(localStorage.getItem("authenticate"))["access_token"],
        },
        success: function (response) {
            try {
                user = JSON.parse(localStorage.getItem("authenticate"))["user"];
            } catch (e) {
                console.error('Error parsing authentication data:', e);
                user = null;
            }
        },
        error: function (xhr) {
            if (xhr.status == 401) {
                localStorage.removeItem("authenticate");
                window.location.href = "/login";
            }
        },
    });

    return user;
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
