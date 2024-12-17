import {
    isLogin,
    Logout,
    me
} from "./Authentication";
import {
    chart
} from "./lib/apexChart";
import {
    initializeCalendar
} from "./lib/calendarDashboard";
$(document).ready(async function  ()  {
    if (isLogin("Petugas"))  {
        var user = await me();
        console.log(user);
        // set username and desc
        $(`.nav_profile`).html(user["username"]);
        $(`.nav_role`).html(user["role"]["name"]);

        // if dashboard route render char nya
        if (window.location.pathname == "/dashboard") {
            // render chart
            chart.render();

            // rende calendar
            initializeCalendar();
        }



        // when logout submit
        $("#logout").click(function () {


            Logout()
        })
    }
})
