import {
    isLogin,
    Logout,
    me
} from "../../Authentication";
$(document).ready(async function  ()  {
    if (await isLogin("Guest") )  {
        console.log("valid role")

        var user = await me();
        if(user){
            $("#btn-area").append(`<a href="/user/dashboard" class="btn btn-primary">${user["username"]}</a>`);
        }else{

        }
    }else{
        $("#btn-area").html(`<a href="/login" class="btn btn-primary navbar-btn">Login</a>`);
        console.log("invalid role")
    }
})
