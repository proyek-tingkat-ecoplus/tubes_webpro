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
            var path = $("input[name='public_path'").val()

            console.log("awikwok", response.data);
            console.log($("input[name='public_path'").val());
            if (response.data) {
                var dataById = response.data;
                $('input[name="name"]').val(dataById.username)
                $('input[name="first_name"]').val(dataById.user_details.first_name)
                $('input[name="last_name"]').val(dataById.user_details.last_name)
                $('input[name="nik"]').val(dataById.user_details.nik)
                $('input[name="address"]').val(dataById.user_details.address.address)
                $('input[name="phone"]').val(dataById.user_details.phone)
                $('input[name="city"]').val(dataById.user_details.address.city)
                $('input[name="state"]').val(dataById.user_details.address.state)
                $('input[name="country"]').val(dataById.user_details.address.country)
                $('input[name="email"]').val(dataById.email)
                var photoPath = `${Laravel.asset_url}${response.data.photo}`;
                $('div[name="avatar"]').append(`<img src="${photoPath}" width="500" alt="User Avatar">`);
                $('input[name="status"]').val(dataById.status)
                selectRole(dataById.role.id)
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
}
})
