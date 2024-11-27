import { redirect } from "../../../resources/js/Authentication";
import { validation_formm } from "./validation";
$(document).ready(function () {
    $("#loginForm").submit(function (e) {
        e.preventDefault();
        let isValid = true;

        $(".error").text("");
        $("input").css("border-bottom", "1px solid grey");

        let formData = {};
        if(!validation_formm($("input", []))){
            isValid = false;
        }



        if (isValid) {
            // Make an API POST request
            $.ajax({
                url: "/api/login", // Replace with your API endpoint
                method: "POST",
                data: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // Add CSRF token if needed
                },
                success: function (response) {
                    if (response.success) {
                        redirect("/dashboard")
                        //window.location.href = "/dashboard";
                    }
                },
                error: function (xhr) {
                    // Handle validation or server errors
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        for(let val in errors){
                            console.log(val)
                            console.log(errors[val][0]);
                        }
                    } else {
                       // $("#generalError").text("An unexpected error occurred. Please try again.");
                    }
                },
            });
        }
    });
});
