import { getTokens, isLogin } from "../../../Authentication";
import { userValidation } from "../validation/userValidation";
import { selectRole } from "../helper/handleSelectRequest";


$(document).ready(function(){
    if(isLogin("Admin")){
        var idx = $("#idx").val()

    // set data by idx
    $.ajax({
        url: "/api/kantor_dinas/"+idx,
        type: 'GET',
        dataType: 'json',
        headers: {
            'Authorization': 'Bearer ' + getTokens()
        },
        success: function (response) {
            console.log("fwefwefwf", response.data);
            if (response.data) {
                var dataById = response.data;
                $('input[name="nama"]').val(dataById.nama)
                $('input[name="bio"]').val(dataById.bio)
                $('input[name="alamat"]').val(dataById.alamat)
                $('input[name="kode_pos"]').val(dataById.kode_pos)
                $('input[name="no_telp"]').val(dataById.no_telp)
                $('input[name="email"]').val(dataById.email)
                $('input[name="website"]').val(dataById.website)
                $('input[name="tanggal_jam_buka"]').val(dataById.tanggal_jam_buka)
                $('input[name="tanggal_jam_tutup"]').val(dataById.tanggal_jam_tutup)
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

$('.forms').submit(function (e) {
    e.preventDefault();

    if(userValidation() === false) {
        return;
    }
    console.log("Input masuk")

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
        url: `/api/kantor_dinas/${idx}/edit`,
        type: 'POST',
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            localStorage.setItem("alert",JSON.stringify([{"status":"success","message":"data user berhasil di update"}]));
            window.location.href = "/pages/kantor_dinas"
        },
        error: function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        }
    });
});
    }
})
