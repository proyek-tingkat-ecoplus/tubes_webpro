import {isLogin} from "../../../Authentication";
import {selectUser} from "../helper/handleSelectRequest";
import { inventarisValidation } from "../validation/inventarisValidation";
import { userValidation } from "../validation/userValidation";

$(document).ready(function () {
    if (isLogin("Petugas")) {
        var idx = $("#idx").val()
        selectUser();
        // set data by idx
        $.ajax({
            url: "/api/inventaris/" + idx,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.data) {
                    console.log(response.data)
                    var dataById = response.data;
                    selectUser(dataById.user_id);
                    $('input[name="nama_alat"]').val(dataById.nama_alat)
                    $('input[name="jenis"]').val(dataById.jenis)
                    $('select[name="kondisi"]').val(dataById.kondisi).change();
                    $('input[name="jumlah"]').val(dataById.jumlah)
                    $('textarea[name="deskripsi_barang"]').val(dataById.deskripsi_barang)

                }
            },
            error: function (jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log("Initial Request Failed: " + err);
            }
        });

        $('.forms').submit(function (e) {
            e.preventDefault();

            if (inventarisValidation() === false) {
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
                url: `/api/inventaris/${idx}/edit`,
                type: 'POST',
                processData: false,
                contentType: false,
                data: form,
                success: function (data) {
                    localStorage.setItem("alert", JSON.stringify([{
                        "status": "success",
                        "message": "data inventaris berhasil di update"
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
