import {getTokens, isLogin} from "../../../../Authentication";
import {selectAlat, selectUser} from "../../helper/handleSelectRequest";
import { pemetaanValidation } from "../../validation/pemetaanValidation";

$(document).ready(function () {
    if (isLogin("Petugas")) {
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
                }
            },
            error: function (jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log("Initial Request Failed: " + err);
            }
        });

        $('.form-pemetaan').submit(function (e) {
            e.preventDefault();

            if (pemetaanValidation() === false) {
                return;
            }

            var name = $('#judul-report').val();
            var description = $('#location-description').val();
            var binwas = $('#location-binwas').val();
            var tahun_operasi = $('#location-tahun_operasi').val();
            var lat = parseFloat($('#location-lat').val());
            var lng = parseFloat($('#location-lng').val());
            var address = $('#location-address').val();
            var photo = $('#location-photo')[0].files[0];
            var status = $('#location-status').val();
            var alat_id = $('#location-alat').val();
            var id = $('#id').val();
            var formData = new FormData();

            formData.append('_method', 'PATCH'); // kalau patch harus make ini
            formData.append('_token', $('meta[name="csrf_token"]').attr('content')); // CSRF token
            formData.append('judul_report', name);
            formData.append('deskripsi', description);
            formData.append('binwas', binwas);
            formData.append('tahun_operasi', tahun_operasi);
            formData.append('latitude', lat);
            formData.append('longitude', lng);
            formData.append('address', address);
            formData.append('photo', photo);
            formData.append('status', status);
            formData.append('tanggal', new Date().toISOString());
            formData.append('id_alat', alat_id);
            formData.append('user_id', id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
                    'Authorization': 'Bearer ' + getTokens()
                },
                url: `/api/pemetaanalat/${idx}/edit`,
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function (data) {
                    localStorage.setItem("alert", JSON.stringify([{
                        "status": "success",
                        "message": "data pemetaanalat berhasil di update"
                    }]));
                    window.location.href = "/pages/pemetaanalat/marker"
                },
                error: function (jqxhr, textStatus, error) {
                    var err = textStatus + ", " + error;
                    console.log("Request Failed: " + err);
                }
            });
        });
    }
})
