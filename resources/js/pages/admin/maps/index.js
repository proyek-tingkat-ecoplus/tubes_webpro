import { selectAlat } from "../helper/handleSelectRequest";
import { pemetaanValidation } from "../validation/pemetaanValidation";

var map;
var marks = [];
var currentMarker = null;

function loadGoogleMapsScript() {
    return new Promise((resolve, reject) => {
        const script = document.createElement('script');
        script.src = "https://maps.gomaps.pro/maps/api/js?key=AlzaSyNmabnuTR_4Obw2W3bQYOogkNhLVF779_C&libraries=places,geometry";
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

// Initialize map
function initialize() {
    var defaultLocation = new google.maps.LatLng(-6.921229357282421, 107.60953903198242);
    var mapOptions = {
        center: defaultLocation,
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

    // Event listener for adding a new location by clicking on the map
    google.maps.event.addListener(map, 'click', function (event) {
        openAddLocationModal(event.latLng.lat(), event.latLng.lng());
    });

    fetchGetData();

    // Search functionality
    const locationInput = document.getElementById('location-input');
    const autocomplete = new google.maps.places.Autocomplete(locationInput);
    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        if (place.geometry) {
            map.setCenter(place.geometry.location);
            map.setZoom(14);
        }
    });
}

function findAdress(lat, lng) {
    var geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(lat, lng); // fing lat ling
    var address = "";
    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                address = results[1].formatted_address; // get adress
            }else{
                address = "Address not found";
            }
        }else{
            address = "Geocoder failed due to: " + status;
        }
        document.getElementById('location-address').value = address;
    });

    return "Loading...";
}

// Add marker to the map
function addMarker(location, index) {
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(location.latitude, location.longitude),
        map: map,
        title: location.judul_report
    });

    var infoWindow = new google.maps.InfoWindow({
        content: "<h3>" + location.judul_report + "</h3><p>" + location.deskripsi + "</p>"
    });

    google.maps.event.addListener(marker, 'click', function () {
        infoWindow.open(map, marker);
        map.setZoom(14);
        map.setCenter(marker.getPosition());
        showMarkerDetails(location, marker, index);
    });

    marks.push(marker);
}

// Fetch data from the API and populate the map with markers
function fetchGetData() {
    $.ajax({
        url: '/api/pemetaanalat',
        type: 'GET',
        success: function (data) {
            data.data.forEach(function (location, index) {
                addMarker(location, index);
            });
        },
        error: function (err) {
            console.log(err);
        }
    });
}

// Open modal for adding a new location
function openAddLocationModal(lat, lng)  {
    document.getElementById('location-lat').value = lat;
    document.getElementById('location-lng').value = lng;
    document.getElementById('location-address').value = findAdress(lat, lng);
    selectAlat();
    var modal = new bootstrap.Modal(document.getElementById('addLocationModal'));
    modal.show();
}

// Show location details in the modal
function showMarkerDetails(location, marker, index) {
    $('#modal-judul-report').text(location.judul_report);
    $('#modal-location-description').text(location.deskripsi);
    $('#modal-location-lat').text(location.latitude);
    $('#modal-location-lng').text(location.longitude);
    $('#modal-location-address').text(location.address);
    $("#image").html(`
        <img src="/api/pemetaanalat/photo/${location.photo}" alt="" id="modal-location-photo" style="width: 150px; height: 250px;object-fit: cover;">
    `);
    currentMarker = marker; // Store the current marker

    var modal = new bootstrap.Modal(document.getElementById('markerModal'));
    modal.show();

    $("#editMarkerBtn").click(function () {
        openEditLocationModal(location, index);
        $("#markerModal").modal('hide');
    });

    $("#deleteMarkerBtn").click(function () {
        funcDelButton(location);
    });
}

// Open modal for editing location
function openEditLocationModal(location, index) {
    $('#id').val(location.id);
    $('#judul-report').val(location.judul_report);
    $('#location-description').val(location.deskripsi);
    $('#location-binwas').val(location.binwas);
    $('#location-tahun_operasi').val(location.tahun_operasi);
    $('#location-lat').val(location.latitude);
    $('#location-lng').val(location.longitude);
    $('#location-address').val(location.address);
    $('#location-status').val(location.status);
    selectAlat(location.alat_id);

    var modal = new bootstrap.Modal(document.getElementById('addLocationModal'));
    modal.show();
}

// Handle form submission for adding/editing location
document.getElementById('addLocationForm').addEventListener('submit', function (event) {
    event.preventDefault();
    console.log(pemetaanValidation());

    if(pemetaanValidation() == false){
        return;
    }else{
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
        formData.append('user_id', JSON.parse(localStorage.getItem("authenticate"))["user"]["id"]);
        if(id) {
            formData.append('_method', 'PATCH');
            formData.append('id', id);
            formData.append('_token', $('meta[name="csrf_token"]').attr('content'));
        }
        var method = 'POST';
        console.log(id);

        var url = id ? '/api/pemetaanalat/' + id +'/edit' : '/api/pemetaanalat/add';

        $.ajax({
            url: url,
            type: method,
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log('Location saved successfully:', data);
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Location saved successfully'
                });
                $("#addLocationModal").modal('hide');
                document.getElementById('location-photo').value = "";
                fetchGetData();
                $("#modal-backdrop").remove();
            },
            error: function (err) {
                console.log('Error saving location:', err);
                if(err.status == 422){
                    var errors = err.responseJSON.errors;
                    Object.keys(errors).forEach((key) => {
                        var input = $(`input[name="${key}"]`);
                        input.addClass("is-invalid");
                        var errorMessage = errors[key].join(', ');
                        input.next().text(`${key.charAt(0).toUpperCase() + key.slice(1)}: ${errorMessage}`);
                    });
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to save location'
                });
            }
        });
    }
});

// Handle location deletion
const funcDelButton = (location) => {
    if (currentMarker) {
        $("#markerModal").modal('hide');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/api/pemetaanalat/' + location.id + '/delete',
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        Swal.fire('Deleted!', 'Your marker has been deleted.', 'success');
                        marks.forEach(function (marker) {
                            marker.setMap(null);
                        });
                        fetchGetData();
                    },
                    error: function (err) {
                        Swal.fire('Error', 'Failed to delete location', 'error');
                    }
                });
            }
        });
    }
};