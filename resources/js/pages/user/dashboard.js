import {
    isLogin,
    Logout,
    me
} from "../../Authentication";
$(document).ready(async function  ()  {
    if (await isLogin("Guest") )  {
        console.log("valid role")

        var user = await me();
        var photoPath = `${Laravel.asset_url}${user["photo"]}`;
        console.log(photoPath);
        if(user){
            $(".avatars").append(`<div class="dropdown">
                        <a class="btn dropdown-toggle mt-3 ms-2" href="#" role="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="${photoPath}" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                            <li><a class="dropdown-item" id="logout">Log Out</a></li>
                          </ul>

                          <style>
                            .dropdown-toggle::after {
                                display: none;
                            }
                        </style>
                    </div>`);
                    $("#logout").click(function () {
                        Logout()
                    })
        }else{

        }
    }else{
        $(".avatars").html(`<a href="/login" class="btn btn-primary navbar-btn">Login</a>`);
        console.log("invalid role")
    }
})
