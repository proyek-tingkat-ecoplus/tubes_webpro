@extends('admin.layout.master')
@section('title', 'Pemetaan Alat')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="card mt-4">
            <div class="row mt-2 ms-2">
                <div class="col-md-7">
                    heelo
                </div>
                <div class="col-md-3">
                    <input type="text" id="location-input" class="form-control">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary">search</button>
                </div>
            </div>
            <div id="googleMap" class="mt-2" style="width:100%; height:380px;"></div>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="markerModal" tabindex="-1" aria-labelledby="markerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="markerModalLabel">Location Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 id="modal-location-name"></h3>
                <p id="modal-location-description"></p>
                <p><strong>Latitude:</strong> <span id="modal-location-lat"></span></p>
                <p><strong>Longitude:</strong> <span id="modal-location-lng"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">delete</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
{{-- set color paginate --}}
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: #fff !important;
        background: #264417 !important;
        border-color: #264417 !important;
    }

</style>
@endpush
@push('scripts')
<script
    src="https://maps.gomaps.pro/maps/api/js?key=AlzaSyppXnhCOMVxkzPe4k6sJ4rmYn7uApemyJu&libraries=places,geometry&callback=initialize"
    async defer></script>
<script>
    var map;
    var marks = []; // Array to store all the marks apapun yang menting isinya google mark

    // Dummy data for bulk location request (this can be replaced with an actual API call)
    var locations = [{
            lat: -8.5830695,
            lng: 116.3202515,
            name: "Location 1",
            description: "Description for Location 1"
        },
        {
            lat: -8.5831200,
            lng: 116.3220000,
            name: "Location 2",
            description: "Description for Location 2"
        },
        {
            lat: -8.5840000,
            lng: 116.3230000,
            name: "Location 3",
            description: "Description for Location 3"
        },
        {
            lat: -6.917463, // Latitude for Bandung city center
            lng: 107.619123, // Longitude for Bandung city center
            name: "Bandung City Center",
            description: "This is the city center of Bandung."
        }
    ];
    // Initialize the map
    function initialize() {
        var defaultLocation = new google.maps.LatLng(-6.921229357282421, 107.60953903198242); // Default center location
        var mapOptions = {
            center: defaultLocation,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        // Create the map
        map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

        google.maps.event.addListener(map, 'click', function (event) {
            taruhMarker(this, event.latLng);
        });

        // Create marks for each location
        locations.forEach(function (location) {
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(location.lat, location.lng),
                map: map,
                title: location.name
            });

            // Add a click listener to show details in an InfoWindow and save the data
            var infoWindow = new google.maps.InfoWindow({
                content: "<h3>" + location.name + "</h3><p>" + location.description + "</p>"
            });

            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.open(map, marker);
                map.setZoom(14); // Zoom to the marker
                map.setCenter(marker.getPosition()); // Center the map on the marker
            });

            // Store the marker in the marks array for future reference (if needed)
            marks.push(marker);
        });


        // Enable search location
        const locationInput = document.getElementById('location-input');
        const autocomplete = new google.maps.places.Autocomplete(locationInput);
        autocomplete.addListener('place_changed', function () {
            place = autocomplete.getPlace();
            // Ensure that the place contains a geometry (latitude and longitude)
            if (place.geometry) {
                map.setCenter(place.geometry.location);
                map.setZoom(14); // Adjust zoom level as needed
            } else {
                console.log("No geometry data available for this place.");
            }
        });
    }

    // Function to save the marker data (e.g., send to an API)
    function saveMarkerData(location) {
        console.log("Saving marker data...");
        console.log("Marker Name: " + location.name);
        console.log("Latitude: " + location.lat);
        console.log("Longitude: " + location.lng);

        locations.forEach(function (marker) {
            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.open(map, marker);
                map.setZoom(14); // Zoom to the marker
                map.setCenter(marker.getPosition()); // Center the map on the marker

                // Call the function to save the marker data
                saveMarkerData(location);
            });

            // Store the marker in the marks array for future reference (if needed)
            marks.push(marker);
        });

        // You can replace the following code with an actual API call to save the data
        // Example using fetch to send the data to the server (for example purposes):
        /*
        fetch('https://your-api-endpoint.com/save', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                name: location.name,
                lat: location.lat,
                lng: location.lng,
                description: location.description
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log("Marker data saved successfully:", data);
        })
        .catch(error => {
            console.error("Error saving marker data:", error);
        });
        */
    }

    // Function to add a new marker dynamically with Reverse Geocoding
    function taruhMarker(peta, posisiTitik) {
        var geocoder = new google.maps.Geocoder();

        // Reverse geocode to get location name
        geocoder.geocode({
            'location': posisiTitik
        }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var locationName = results[0].formatted_address; // Get the location name/address
                    var marker = new google.maps.Marker({
                        position: posisiTitik,
                        map: peta,
                        title: locationName // Set the title to the location name
                    });

                    // Create an InfoWindow with the location name as content
                    var infoWindow = new google.maps.InfoWindow({
                        content: "<h3>" + locationName + "</h3><p>Latitude: " + posisiTitik.lat() +
                            "<br>Longitude: " + posisiTitik.lng() + "</p>"
                    });

                    google.maps.event.addListener(marker, 'click', function () {
                        // infoWindow.open(peta, marker); // this only for normal marker

                        // Populate modal with marker data
                        // you can adjust anything in click dikarenakan ini trigger model in the top
                        document.getElementById("modal-location-name").innerText = locationName;
                        document.getElementById("modal-location-description").innerText =
                            "Description for " + locationName;
                        document.getElementById("modal-location-lat").innerText = posisiTitik.lat();
                        document.getElementById("modal-location-lng").innerText = posisiTitik.lng();

                        // Show the modal
                        var modal = new bootstrap.Modal(document.getElementById('markerModal'));
                        modal.show();

                        peta.setZoom(14); // Zoom to the marker
                        peta.setCenter(marker.getPosition()); // Center the map on the marker

                        // Save the new marker data
                        saveMarkerData({
                            name: locationName,
                            lat: posisiTitik.lat(),
                            lng: posisiTitik.lng(),
                            description: locationName // Optionally add more description
                        });
                    });

                    // Store the new marker in the marks array for future reference (if needed)
                    marks.push(marker);
                } else {
                    alert("No address found for this location.");
                }
            } else {
                alert("Geocoder failed due to: " + status);
            }
        });
    }

    // Function to delete a marker
    function deleteMarker(marker) {
        // Remove the marker from the map
        marker.setMap(null);

        // Remove the marker from the marks array
        var index = marks.indexOf(marker);
        if (index !== -1) {
            marks.splice(index, 1);
        }

        console.log("Marker deleted");
    }

    // Add a click event listener to the delete button in the modal
// document.getElementById('deleteMarkerBtn').addEventListener('click', function() {
//     if (currentMarker) {
//         // Remove the marker from the map
//         currentMarker.setMap(null);

//         // Optionally, remove it from the marks array if you're tracking markers
//         var index = marks.indexOf(currentMarker);
//         if (index !== -1) {
//             marks.splice(index, 1);
//         }

//         console.log("Marker deleted");

//         // Close the modal after deletion
//         var modal = new bootstrap.Modal(document.getElementById('markerModal'));
//         modal.hide();

//         // Reset the current marker to null
//         currentMarker = null;
//     } else {
//         console.log("No marker selected to delete.");
//     }
// });
    // Trigger map initialization on window load
    google.maps.event.addDomListener(window, 'load', initialize);

</script>

@vite(['resources/js/pages/admin/map/index.js'])
@endpush
