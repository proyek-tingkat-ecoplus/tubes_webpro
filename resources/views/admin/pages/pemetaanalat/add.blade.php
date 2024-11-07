@extends('admin.layout.master')
@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master / Data Alat /</span> Tambah</h4>
<div class="card">
    <div class="container pe-3 ps-3 pb-3">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST" class="form">
                    @csrf
                    <div class="form-group mt-2
                        @if($errors->has('name'))
                            has-error
                        @endif">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <span class="help-block
                                @if($errors->has('name'))
                                    has-error
                                @endif">
                            {{ $errors->first('name') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group mt-2
                        @if($errors->has('location'))
                            has-error
                        @endif">
                        <label for="location">location Alat</label>
                        <input type="location"  id="location-input" name="location" class="form-control" value="{{ old('location') }}">
                        <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                        <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                        @if($errors->has('location'))
                        <span class="help-block
                                @if($errors->has('location'))
                                    has-error
                                @endif">
                            {{ $errors->first('location') }}
                        </span>
                        @endif
                    </div>
                    <div class="form-group mt-2
                    @if($errors->has('status'))
                        has-error
                    @endif">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Non active</option>
                        </select>
                        @if($errors->has('status'))
                        <span class="help-block
                            @if($errors->has('status'))
                                has-error
                            @endif">
                            {{ $errors->first('status') }}
                        </span>
                        @endif
                    </div>
                    <div class="text-start">
                        <a href="/pages/user" class="btn btn-danger mt-3">Kembali</a>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<input type="text" hidden value="{{asset('asset/admin/json/pemetaanalat.json')}}" id="path">
@endsection
@push('scripts')
{{-- https://app.gomaps.pro/apis --}}
{{-- https://www.youtube.com/watch?v=e1efOSDKdFM --}}
<script src="https://maps.gomaps.pro/maps/api/js?key=AlzaSycR7Pvro6YXgTHFblp3vGhRACX8a2PZ8Lz&libraries=places&callback=initialize" async defer></script>
<script>
function initialize() {
    const locationInput = document.getElementById('location-input');
    const autocomplete = new google.maps.places.Autocomplete(locationInput);

    autocomplete.addListener('place_changed', function() {
        const place = autocomplete.getPlace();
        document.getElementById('address-latitude').value = place.geometry.location.lat();
        document.getElementById('address-longitude').value = place.geometry.location.lng();
    });
}
$(document).ready(function(){
    var path = document.getElementById('path').value;
    var lastId = 0;

$.ajax({
    url: path,
    type: 'GET',
    dataType: 'json',
    success: function (data) {
        if (data.data && data.data.length > 0) {
            lastId = data.data[data.data.length - 1].id;
        }
    },
    error: function (jqxhr, textStatus, error) {
        var err = textStatus + ", " + error;
        console.log("Initial Request Failed: " + err);
    }
});

$('.form').submit(function (e) {
    e.preventDefault();
    var form = new FormData(this);
    form.append('id', parseInt(lastId) + 1);
    form.append('location', document.getElementById('location-input').value);
    form.append('address_latitude', $('input[name="address_latitude"]').val());
    form.append('address_longitude', $('input[name="address_longitude"]').val());
    // var name = form.get('name');
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
    },
        url: "/api/pemetaanalat/add",
        type: 'POST',
        processData: false,
        contentType: false,
        data: form,
        success: function (data) {
            console.log(data);
            window.location = "{{ url('pages/pemetaanalat') }}"
        },
        error: function (jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        }
    });
});
})
</script>

@endpush
