import { isLogin, redirect, me } from "./Authentication";

$(document).ready(function () {
    $("#loginForm").submit(function (e) {
        console.log("clicked");
        e.preventDefault();
        let isValid = true;

        $(".error").text("");
        $("input").css("border-bottom", "1px solid grey");

        let formData = {};
        $($("input")).each(function () {
            if (!$(this).val()) {
                isValid = false;
                $(this).css("border-bottom", "1px solid red");
                $(`#${$(this).attr("id")}Error`).text($(this).attr("id") + " is required.");
            } else {
                $(this).css("border-bottom", "1px solid grey");
                $(`#${$(this).attr("id")}Error`).text("");
                formData[$(this).attr("id")] = $(this).val().trim();
            }
        });

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
                    console.log("here")
                    localStorage.setItem("authenticate", JSON.stringify(response));
                    //console.log(JSON.parse(localStorage.getItem("authenticate"))["access_token"]);
                    // redirect tergantung role nya gimana
                    if(me()["role"]["name"] == "Petugas"){
                        redirect("/dashboard");
                    }else{
                        redirect("/");
                    }

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
