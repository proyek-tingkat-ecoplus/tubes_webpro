import {
    getTokens,
    isLogin
} from "../../../Authentication";

import { userValidation } from "../validation/userValidation";
import { selectRole } from "../helper/handleSelectRequest";


$(document).ready(function () {
    if (isLogin("Admin")) {
        try {
            selectRole()
        } catch (err) {
            console.log(err);
        }
        $('.form').submit(function (e) {
            e.preventDefault();

            if (userValidation() === false) {
                return;
            }

            var form = new FormData(this);
            //form.append('id', parseInt(lastId) + 1);
            // var name = form.get('name');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
                    'Authorization': 'Bearer ' + getTokens()
                },
                url: "/api/user/add",
                type: 'POST',
                processData: false,
                contentType: false,
                data: form,
                success: function (data) {
                    console.log(data);
                    localStorage.setItem("alert", JSON.stringify([{
                        "status": "success",
                        "message": "data user berhasil di tambahkan"
                    }]));
                    window.location.href = "/pages/user"
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
