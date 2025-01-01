import {
    getTokens,
    isLogin,
    me
} from "../../../Authentication";
import { selectUser } from "../helper/handleSelectRequest"
import { forumValidation } from "../../admin/validation/forumValidation"


$(document).ready(function () {
    if (isLogin(["Petugas", "Admin"])) {
        // ini buat select request
        try {
            selectUser()
        } catch (err) {
            console.log(err);
        }
        console.log("ini user");
        console.log(me().then (user => { return user }));
        $('.form').submit(function (e) {
            e.preventDefault();
            selectUser();
            var form = new FormData(this);
            if (forumValidation() === false) {
                return;
            }
            AddData(form);
        });
    }

    const AddData = async (form) => {
        form.append('_token', $('meta[name="csrf_token"]').attr('content')); // CSRF token
        console.log(getTokens());
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
                'Authorization': 'Bearer ' + getTokens()
            },
            url: "/api/forum/add",
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
                window.location.href = "/pages/forum"
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
    }
})
