import {
    isLogin,
    Logout,
    me
} from "../../Authentication";
$(document).ready(async function  ()  {
    if (isLogin("guest"))  {
        // var user = await me();
        // console.log(user);
        // console.log(user);
        // // set username and desc
        // $(`.nav_profile`).html(user["username"]);
        // $(`.nav_role`).html(user["role"]["name"] ?? null);

        // $('#dash-name').val(user["username"]);
        // $('#dash-email').val(user["email"]);
        // $('#dash-id').val(user["id"]);

        // // if dashboard route render char nya
        // if (window.location.pathname == "/dashboard") {
        //     // render chart
        //     chart.render();

        //     // rende calendar
        //     initializeCalendar();
        // }



        // // when logout submit
        // $("#logout").click(function () {


        //     Logout()
        // })
    }
})
