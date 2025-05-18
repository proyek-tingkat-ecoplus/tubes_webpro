import { getTokens, isLogin } from "../../../../Authentication"

import { selectAlat, selectUser } from "../../helper/handleSelectRequest";
import { inventarisValidation } from "../../validation/inventarisValidation";
import { pemetaanValidation } from "../../validation/pemetaanValidation";
import { apiKey } from "..";


function loadGoogleMapsScript() {
    return new Promise((resolve, reject) => {
        const script = document.createElement('script');
<<<<<<< HEAD
        script.src = "https://maps.gomaps.pro/maps/api/js?key=AAlzaSyeCZ-e6TJBYNSSt2-AU_zGWU5Jg3BGT4qF&libraries=places,geometry";
=======
        script.src = `https://maps.gomaps.pro/maps/api/js?key=${apiKey}&libraries=places,geometry`;
>>>>>>> b2c35fc920877cabdd9313d9e189762e61a37eff
        script.async = true;
        script.defer = true;
        script.onload = resolve;
        script.onerror = reject;
        document.head.appendChild(script);
    });
}

loadGoogleMapsScript().then(() => {
    initialize();  // You can call your initialize function here
}).catch(err => console.error("Google Maps script load error:", err));

function initialize() {
    // Search functionality
    const locationInput = document.getElementById('location-address');
    const autocomplete = new google.maps.places.Autocomplete(locationInput);
    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        $("#location-lat").val(place.geometry.location.lat());
        $("#location-lng").val(place.geometry.location.lng());
    });
}

$(document).ready(function () {
    if(isLogin(["Admin", "Petugas", "Kepala Desa"])){
        selectUser();
        selectAlat();
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
            var user_id = $('#locations-user').val();
            var id = $('#id').val();
            var formData = new FormData();

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
            formData.append('user_id', user_id);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
                    'Authorization': 'Bearer ' + getTokens()
                },
                url: "/api/pemetaanalat/add",
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function (data) {
                    console.log(data);
                    localStorage.setItem("alert", JSON.stringify([{
                        "status": "success",
                        "message": "data user berhasil di tambahkan"
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
