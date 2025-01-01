import { getTokens, isLogin } from "../../../Authentication";
import { userValidation } from "../validation/userValidation";
import { selectRole } from "../helper/handleSelectRequest";


$(document).ready(function(){
    if(isLogin("Admin")){
        var idx = $("#idx").val()

    // set data by idx
    $.ajax({
        url: "/api/user/"+idx,
        type: 'GET',
        dataType: 'json',
        headers: {
            'Authorization': 'Bearer ' + getTokens()
        },
        success: function (response) {
            console.log("fwefwefwf", response.data);
            if (response.data) {
                var dataById = response.data;
                ('select')
                //$('select[name="status"]').val("admin").change()
            }
        },
        error: function (xhr) {
            if(xhr.status == 422){
                var errors = xhr.responseJSON.errors;
                alert(errors);
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

$('.form').submit(function (e) {
    e.preventDefault();

    if(userValidation() === false) {
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
        'Authorization': 'Bearer ' + getTokens()
    },
        url: `/api/user/${idx}/editpass`,
        type: 'POST',
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            localStorage.setItem("alert",JSON.stringify([{"status":"success","message":"data user berhasil di update"}]));
            window.location.href = "/pages/user"
        },
        error: function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        }
    });
});
    }
})
