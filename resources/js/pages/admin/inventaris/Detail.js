import {getTokens, isLogin} from "../../../Authentication";
import {selectUser} from "../helper/handleSelectRequest";
import { inventarisValidation } from "../validation/inventarisValidation";
import { userValidation } from "../validation/userValidation";

$(document).ready(function () {
    if (isLogin(["Admin", "Petugas"])) {
        var idx = $("#idx").val()
        selectUser();
        // set data by idx
        $.ajax({
            url: "/api/inventaris/" + idx,
            type: 'GET',
            dataType: 'json',
            headers: {
                'Authorization': 'Bearer ' + getTokens()
            },
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
                    var photoPath = `${Laravel.asset_url}image/inventaris/${response.data.foto}`;
                    $('div[name="avatar"]').append(`<img src="${photoPath}" width="500" alt="User Avatar">`);
                }
            },
            error: function (jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log("Initial Request Failed: " + err);
            }
        });
    }
})
