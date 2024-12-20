import {
    isLogin
} from "../../../Authentication";
import { selectUser } from "../helper/handleSelectRequest"
import { forumValidation } from "../../admin/validation/forumValidation"


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

            if (forumValidation() === false) {
                return;
            }

            var form = new FormData(this);
            //form.append('id', parseInt(lastId) + 1);
            // var name = form.get('name');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
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
                error: function (jqxhr, textStatus, error) {
                    var err = textStatus + ", " + error;
                    console.log("Request Failed: " + err);
                }
            });
        });
    }
})
