import {
    getTokens,
    isLogin
} from "../../../Authentication";

import { selectRole } from "../helper/handleSelectRequest";
import { roleValidation } from "../validation/roleValidation";


$(document).ready(function () {
    if (isLogin("Admin")) {
        $('.form').submit(function (e) {
            e.preventDefault();

            if (roleValidation() === false) {
                return;
            }

            var form = new FormData();
            form.append("name", $("input[name='name']").val());
            form.append("detail", $("input[name='detail']").val());
            var url = "https://3e1c-103-194-175-22.ngrok-free.app";
            const urlEncodedData = new URLSearchParams(form).toString();
            $.ajax({
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                    // "Content-Type": "multipart/form-data",
                    // "ngrok-skip-browser-warning": "69420",
                },
                url: url,
                type: 'POST',
                processData: false,
                contentType: false,
                data: urlEncodedData,
                success: function (data) {
                    console.log(data);
                    localStorage.setItem("alert", JSON.stringify([{
                        "status": "success",
                        "message": "data role berhasil di tambahkan"
                    }]));
                    window.location.href = "/pages/helper"
                },
                error: function (xhr) {
                    if(xhr.status == 422){
                        var errors = xhr.responseJSON.errors;
                        console.log(errors);
                        console.log(Object.keys(errors));
                        // dapertin semua keys error lalu tampilkan sesuai dengan name
                        Object.keys(errors).forEach((key) => {
                            var input = $(`input[name="${key}"]`);
                            input.addClass("is-invalid");
                            var errorMessage = errors[key].join(', ');
                            input.next().text(`${key.charAt(0).toUpperCase() + key.slice(1)}: ${errorMessage}`);
                        });
                    }
                }
            });
        });
    }
})
