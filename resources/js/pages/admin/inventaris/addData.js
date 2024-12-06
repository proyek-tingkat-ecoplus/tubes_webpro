import { isLogin } from "../../../Authentication"

import { userValidation } from "../../validation/inputValidation";
import { selectUser } from "../helper/handleSelectRequest";

$(document).ready(function () {
    if(isLogin('Petugas')){
        selectUser();
        $('.form').submit(function (e) {
            e.preventDefault();

            if (userValidation() === false) {
                return;
            }

            var form = new FormData(this);
            // for (var pair of form.entries()) {
            //     console.log(pair[0]+ ', ' + pair[1]);
            //     }
            //form.append('id', parseInt(lastId) + 1);
            // var name = form.get('name');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
                },
                url: "/api/inventaris/add",
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
                    window.location.href = "/pages/inventaris"
                },
                error: function (jqxhr, textStatus, error) {
                    var err = textStatus + ", " + error;
                    console.log("Request Failed: " + err);
                }
            });
        });
    }

})
