import {
    isLogin
} from "../../../Authentication";
import { selectUser } from "../helper/handleSelectRequest"
import { userValidation } from "../../admin/validation/userValidation"


$(document).ready(function () {
    if (isLogin("Petugas")) {
        // ini buat select request
        try {
            selectUser()
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
                },
                url: "/api/comment/add",
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
                    window.location.href = "/pages/comment"
                },
                error: function (jqxhr, textStatus, error) {
                    var err = textStatus + ", " + error;
                    console.log("Request Failed: " + err);
                }
            });
        });
    }
})
