import { getTokens, isLogin } from "../../../Authentication";
import { selectForum, selectRole, selectUser } from "../helper/handleSelectRequest";
import { forumValidation } from "../../admin/validation/forumValidation";


$(document).ready(function(){
    if(isLogin("Petugas")){
        var idx = $("#idx").val()

    // set data by idx
    $.ajax({
        url: "/api/comment/"+idx,
        type: 'GET',
        dataType: 'json',
        headers: {
            "Authorization": "Bearer " + getTokens()
        },
        success: function (response) {
            console.log(response.data);
            console.log("here atas")
            if (response.data) {
                var dataById = response.data;
                selectUser(dataById.user_id);
                selectForum(dataById.forum_id);
                $("textarea[name='comment']").val(dataById.comment)
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
    form.append('user_id', $('select[name="user"]').val());
    //form.append('id', parseInt(lastId) + 1);
    // var name = form.get('name');
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
        "Authorization": "Bearer " + getTokens()
    },
        url: `/api/comment/${idx}/edit`,
        type: 'POST',
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            localStorage.setItem("alert",JSON.stringify([{"status":"success","message":"comment berhasil di update"}]));
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
