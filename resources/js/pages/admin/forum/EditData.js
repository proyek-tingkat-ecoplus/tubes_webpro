import { isLogin } from "../../../Authentication";
import { selectRole, selectUser } from "../helper/handleSelectRequest";
import { forumValidation } from "../../admin/validation/forumValidation"


$(document).ready(function(){
    if(isLogin("Petugas")){
        var idx = $("#idx").val()

    // set data by idx
    $.ajax({
        url: "/api/forum/"+idx,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.data) {
                var dataById = response.data;
                $('input[name="name"]').val(dataById.name)
                $('textarea[name="description"]').val(dataById.description)
                selectUser(dataById.user.id)
            }
        },
        error: function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Initial Request Failed: " + err);
        }
    });

$('.forms').submit(function (e) {
    e.preventDefault();

    if(forumValidation() === false) {
        return;
    }

    var form = new FormData(this);
    form.append('_method', 'PATCH'); // kalau patch harus make ini
    form.append('_token', $('meta[name="csrf_token"]').attr('content')); // CSRF token
    //form.append('id', parseInt(lastId) + 1);
    // var name = form.get('name');
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
    },
        url: `/api/forum/${idx}/edit`,
        type: 'POST',
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            localStorage.setItem("alert",JSON.stringify([{"status":"success","message":"data user berhasil di update"}]));
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
