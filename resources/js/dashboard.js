import { isLogin, Logout, me } from "./Authentication";
import { chart } from "./lib/apexChart";
import { initializeCalendar } from "./lib/calendarDashboard";
$(document).ready(function () {
    if(isLogin("Petugas")){
        var user = me();
        console.log(user);
        // set username and desc
        $(`.nav_profile`).html(user["username"]);
        $(`.nav_role`).html(user["role"]["description"]);

        // render chart
        chart.render();

        // rende calendar
        initializeCalendar();


        // when logout submit
        $("#logout").click(function () {
            Swal.fire({
                title: "Logout?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Success",
                        text: "anda bershasil logout.",
                        icon: "success"
                    });
                    Logout()
                }
            });
        })
    }
})