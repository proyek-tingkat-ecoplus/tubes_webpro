import { isLogin, redirect, me } from "./Authentication";
import { authValidation } from "./pages/admin/validation/authValidation";
import { ClearNotification } from "./pages/notification";


$(document).ready(function () {
    isLogin()
    $("#loginForm").submit(async function (e) {
        e.preventDefault();
        console.log("clicked");
        let isValid = true;

        $(".error").text("");
        $("input").css("border-bottom", "1px solid grey");

        let formData = {};

        if(authValidation() == true){
            $($("input")).each(function () {
                formData[$(this).attr("id")] = $(this).val().trim();
            });
        }


        if (isValid && formData) {
            // Make an API POST request
            $.ajax({
                url: "/api/login",
                method: "POST",
                data: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    localStorage.setItem("authenticate", JSON.stringify(response));

                    me().then(user => {
                        ClearNotification();
                        if (user && user.role.name === "Admin" || user.role.name === "Petugas") {
                            redirect("/dashboard");
                        }

                        if (user && user.role.name === "Guest" || user.role.name === "Kepala Desa") {
                            redirect("/");
                        }
                    });

                },
                error: function (xhr) {
                    // kirim semua pesan dan form
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        for(let val in errors){
                            $(`#${val}`).css("border-bottom", "1px solid red");
                            $(`#${val}Error`).text(errors[val][0]);
                        }
                    } else if(xhr.status == 401){
                        const errors = xhr.responseJSON.error;
                        if(errors){
                            // looop semua input kasih error message
                            $("input").each(function () {
                                $(`#${$(this).attr("id")}`).css("border-bottom", "1px solid red");
                                $(`#${$(this).attr("id")}Error`).text(errors);
                            });
                        }
                    }
                },
            });
        }
    });
});
