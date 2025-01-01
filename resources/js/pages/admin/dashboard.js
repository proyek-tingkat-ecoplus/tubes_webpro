import {
    getTokens,
    isLogin,
    Logout,
    me
} from "../../Authentication";
import {
    chart
} from "../../lib/apexChart";
import {
    initializeCalendar
} from "../../lib/calendarDashboard";
$(document).ready(async function  ()  {
    const fetchDashboard = async () => {
        $.ajax({
            url: "/api/dashboard",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + getTokens()
            },
            success: function (data) {
                console.log(data)
                $("#total-user").html(data["total_user"]);
                $("#total-forum").html(data["total_forum"]);
                $("#total-proposal").html(data["total_proposal"]);
                //$("#total-pengembalian").html(data["total_comment"]);
                $("#total-pemetaan").html(data["total_pemetaan"]);
            },
            error: function (err) {
                console.log(err)
            }
        });
    }

    if (isLogin(["Admin", "Petugas", "Kepala Desa"])) {
        var user = await me();
        console.log(user);
        console.log(user);
        // set username and desc
        $(`.nav_profile`).html(user["username"]);
        $(`.nav_role`).html(user["role"]["name"] ?? null);

        $('#dash-name').val(user["username"]);
        $('#dash-email').val(user["email"]);
        $('#dash-id').val(user["id"]);

        await fetchDashboard();

        var photoPath = `${Laravel.asset_url}${user["photo"]}`;
        console.log(photoPath);
        $('.profile-img').append(`<img src="${photoPath}" class="w-px-30 h-auto rounded-pill" alt="User Avatar">`);

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
