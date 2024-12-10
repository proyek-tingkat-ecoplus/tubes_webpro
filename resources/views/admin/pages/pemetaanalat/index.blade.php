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
                    <button class="btn btn-primary" id="searchBtn">Search</button>
                </div>
            </div>
            <div id="googleMap" class="mt-2" style="width:100%; height:380px;"></div>
        </div>
    </div>
</div>

<!-- Modal for adding location -->
<div class="modal fade" id="addLocationModal" tabindex="-1" aria-labelledby="addLocationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLocationModalLabel">Add New Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="id" hidden>
                <form id="addLocationForm">
                    <div class="mb-3">
                        <label for="location-name" class="form-label">Location Name</label>
                        <input type="text" class="form-control" id="location-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="location-description" class="form-label">Description</label>
                        <textarea class="form-control" id="location-description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="location-lat" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="location-lat" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="location-lng" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="location-lng" required readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Location</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for displaying location details -->
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
                <button type="button" class="btn btn-warning" id="editMarkerBtn">Edit</button>
                <button type="button" class="btn btn-danger" id="deleteMarkerBtn">Delete</button>
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
<script src="https://maps.gomaps.pro/maps/api/js?key=AlzaSyppXnhCOMVxkzPe4k6sJ4rmYn7uApemyJu&libraries=places,geometry&callback=initialize"
    async defer></script>
    <script>
        var map;
        var marks = [];
        var locations = [
            { lat: -8.5830695, lng: 116.3202515, name: "Location 1", description: "Description for Location 1" },
            { lat: -8.5831200, lng: 116.3220000, name: "Location 2", description: "Description for Location 2" },
            { lat: -8.5840000, lng: 116.3230000, name: "Location 3", description: "Description for Location 3" },
            { lat: -6.917463, lng: 107.619123, name: "Bandung City Center", description: "This is the city center of Bandung." }
        ];

        function initialize() {
            var defaultLocation = new google.maps.LatLng(-6.921229357282421, 107.60953903198242);
            var mapOptions = {
                center: defaultLocation,
                zoom: 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

            // Add event listener to map click for adding new locations
            google.maps.event.addListener(map, 'click', function(event) {

                openAddLocationModal(event.latLng.lat(), event.latLng.lng());
            });

            locations.forEach(function(location, index) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(location.lat, location.lng),
                    map: map,
                    title: location.name
                });

                var infoWindow = new google.maps.InfoWindow({
                    content: "<h3>" + location.name + "</h3><p>" + location.description + "</p>"
                });

                google.maps.event.addListener(marker, 'click', function() {
                    infoWindow.open(map, marker);
                    map.setZoom(14);
                    map.setCenter(marker.getPosition());
                    showMarkerDetails(location, marker, index);
                    infoWindow.close();
                });

                marks.push(marker);
            });

            const locationInput = document.getElementById('location-input');
            const autocomplete = new google.maps.places.Autocomplete(locationInput);
            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();
                if (place.geometry) {
                    map.setCenter(place.geometry.location);
                    map.setZoom(14);
                }
            });
        }

        // Open modal for adding new location
        function openAddLocationModal(lat, lng) {
            document.getElementById('location-lat').value = lat;
            document.getElementById('location-lng').value = lng;
            var modal = new bootstrap.Modal(document.getElementById('addLocationModal'));
            modal.show();
        }

        // Open modal for editing an existing location
        function openEditLocationModal(location, index) {
            document.getElementById('location-name').value = location.name;
            document.getElementById('location-description').value = location.description;
            document.getElementById('location-lat').value = location.lat;
            document.getElementById('location-lng').value = location.lng;
            document.getElementById('id').value = index; // store the index of the location to edit
            var modal = new bootstrap.Modal(document.getElementById('addLocationModal'));
            modal.show();
        }

        // Show the details of the marker clicked
        function showMarkerDetails(location, marker, index) {
            document.getElementById("modal-location-name").innerText = location.name;
            document.getElementById("modal-location-description").innerText = location.description;
            document.getElementById("modal-location-lat").innerText = location.lat;
            document.getElementById("modal-location-lng").innerText = location.lng;

            currentMarker = marker; // Store the current marker
            var modal = new bootstrap.Modal(document.getElementById('markerModal'));
            modal.show();

            $("#editMarkerBtn").click(function() {
                // Open the modal to edit the marker
                openEditLocationModal(location, index);
                $("#markerModal").modal('hide');
            });
        }

        // Handle form submission to add or update a location
        document.getElementById('addLocationForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var name = document.getElementById('location-name').value;
            var description = document.getElementById('location-description').value;
            var lat = parseFloat(document.getElementById('location-lat').value);
            var lng = parseFloat(document.getElementById('location-lng').value);
            var index = document.getElementById('id').value;

            // If an index is provided, it's an update; otherwise, it's an add
            if (index === "") {
                // Add new location
                var newLocation = { lat: lat, lng: lng, name: name, description: description };
                locations.push(newLocation);

                // Create a new marker for the added location
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat, lng),
                    map: map,
                    title: name
                });

                var infoWindow = new google.maps.InfoWindow({
                    content: "<h3>" + name + "</h3><p>" + description + "</p>"
                });

                google.maps.event.addListener(marker, 'click', function() {
                    infoWindow.open(map, marker);
                    map.setZoom(14);
                    map.setCenter(marker.getPosition());
                    showMarkerDetails(newLocation, marker, locations.length - 1);
                });

                marks.push(marker);
            } else {
                // Edit existing location
                var updatedLocation = { lat: lat, lng: lng, name: name, description: description };
                locations[index] = updatedLocation;

                // Update the marker position and info
                var marker = marks[index];
                marker.setPosition(new google.maps.LatLng(lat, lng));
                marker.setTitle(name);

                // Update the info window content
                var infoWindow = new google.maps.InfoWindow({
                    content: "<h3>" + name + "</h3><p>" + description + "</p>"
                });

                google.maps.event.clearListeners(marker, 'click'); // Remove old listeners
                google.maps.event.addListener(marker, 'click', function() {
                    infoWindow.open(map, marker);
                    map.setZoom(14);
                    map.setCenter(marker.getPosition());
                    showMarkerDetails(updatedLocation, marker, index);
                });
            }

            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Location saved successfully'
            });

             // Close the modal after saving
            $("#addLocationModal").modal('hide');
            $(".modal-backdrop").removeClass("modal-backdrop");
        });

        // Handle deleting the marker
        document.getElementById('deleteMarkerBtn').addEventListener('click', function() {
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
                        currentMarker.setMap(null);
                        var index = marks.indexOf(currentMarker);
                        if (index !== -1) {
                            marks.splice(index, 1);
                            locations.splice(index, 1); // Remove the location from the array
                        }
                        currentMarker = null;
                        Swal.fire('Deleted!', 'Your marker has been deleted.', 'success');
                    }
                    if (result.isDismissed) {
                        Swal.fire('Cancelled', 'Your marker is safe :)', 'error');
                    }
                });
            }
        });
    </script>


@endpush
