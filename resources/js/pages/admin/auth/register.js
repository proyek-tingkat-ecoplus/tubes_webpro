import { isLogin, redirect, me } from "../../../Authentication.js";
import { authValidation } from "../validation/authValidation.js";
import $ from "jquery";


$(document).ready(function () {
    // isLogin()
    $("#registerForm").submit(function (e) {
        console.log("clicked");
        e.preventDefault();
        let isValid = true;

        $(".error").text("");
        $("input").css("border-bottom", "1px solid grey");

        let formData = {};

        if(authValidation() == true){
            $($("input")).each(function () {
                formData[$(this).attr("id")] = $(this).val().trim();
            });
            formData["role"] = "1";
        }
        console.log(formData)
        if (isValid && formData) {
            // Make an API POST request
            $.ajax({
                url: "/api/register",
                method: "POST",
                data: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    // console.log("here")
                    // localStorage.setItem("authenticate", JSON.stringify(response));
                    //console.log(JSON.parse(localStorage.getItem("authenticate"))["access_token"]);
                    // if(me()["role"]["name"] == "Petugas"){
                    redirect("/login");
                    // }else{
                    //     redirect("/");
                    // }
                    console.log(response.data);
                },
                error: function (xhr) {
                    console.log(xhr.responseJSON.errors);
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
