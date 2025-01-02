import {getTokens, isLogin} from "../../../../Authentication";
import {selectAlat, selectUser} from "../../helper/handleSelectRequest";
import { pemetaanValidation } from "../../validation/pemetaanValidation";

$(document).ready(function () {
    if (isLogin(["Admin", "Petugas", "Kepala Desa"])) {
        var idx = $("#idx").val()
        console.log(idx);
        selectUser();
        selectAlat();
        // set data by idx
        $.ajax({
            url: "/api/pemetaanalat/find/" + idx,
            type: 'GET',
            dataType: 'json',
            headers: {
                'Authorization': 'Bearer ' + getTokens()
            },
            success: function (response) {
                if (response.data) {
                    var dataById = response.data;
                    selectUser(dataById.user_id);
                    // $('#id').val(dataById.id);
                    console.log(dataById);
                    $('#judul-report').val(dataById.judul_report);
                    $('#location-description').val(dataById.deskripsi);
                    $('#location-binwas').val(dataById.binwas);
                    $('#location-tahun_operasi').val(dataById.tahun_operasi);
                    $('#location-lat').val(dataById.latitude);
                    $('#location-lng').val(dataById.longitude);
                    $('#location-address').val(dataById.address);
                    $('#location-status').val(dataById.status);
                    selectAlat(dataById.alat_id);
                    var photoPath =`${Laravel.asset_url}image/pemetaan/${response.data.photo}`;
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
