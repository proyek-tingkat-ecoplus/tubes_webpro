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
    try {
        const authData = JSON.parse(localStorage.getItem("authenticate"));
        if (!authData) {
            console.log(window.location.pathname);
            if(window.location.pathname != "/login"){
                redirect('/login')
            }
        } else {
            if (authData) {
                if(window.location.pathname == "/login"){
                    window.history.back();
                }
                if(me()["role"]["name"] == role){
                    return true
                }else{
                    return true
                }
            } else {
                return true;
            }
        }
    } catch (e) {
        console.error('Error parsing authentication data:', e);
        window.location.href = "/login"; // Redirect if JSON parsing fails
    }
};


export const me = () => {
    var user = JSON.parse(localStorage.getItem("authenticate"))["user"];
    if (user) {
        return user
    } else {
        localStorage.removeItem("authenticate")
        window.location.href = "/login"
    }
}

export const Logout = () => {
    localStorage.removeItem("authenticate")
    window.location.href = "/login"
}
