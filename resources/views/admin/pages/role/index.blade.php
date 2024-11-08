@extends('admin.layout.master')
@section('title', 'Data Peran')
@section('content')
<div class="content-wrapper">
    <div class="container ">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> Data Peran</h4>

        <div class="card">
            <div class=" text-nowrap p-3">
                <table class="table" id="table-role">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama Role</th>
                            <th>Deskrispi Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<input type="text" hidden value="{{asset('asset/admin/json/role.json')}}" id="path">
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
<script>
    let path = document.getElementById('path').value;
    console.log(path);
    let table = new DataTable('#table-role', {
        dom: "<'row'<'col-sm-12 col-md-5 btn-table'><'col-sm-12 col-md-3'<'ms-4'f>><'col-sm-12 col-md-4 pdf-button'>>" +
            "<'row mt-3'<'col-sm-12'tr>>" +
            "<'row mt-2'<'col-md-8 col-12'i><'col-md-4 col-12'p>>",
        ordering: false,
        info: true,
        filtering: false,
        searching: true,
        serverside: true,
        processing: true,
        responsive: true,
        autoWidth: false,
        ajax: {
            url: path,
            method: 'GET',
            dataSrc: 'data'
        },
        columns: [{
                data: 'id'
            },
            {
                data: 'name'
            },
            {
                data: 'description'
            },
            {
                data: null,
                render: function (data, type, row) { // buat render di column aksi
                    console.log(row)
                    return `
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                        data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('pages/role/${data.id}/edit') }}"><i
                                class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" onclick="hapus(${data.id})">
                                <i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                </div>
            `;
                }
            }
        ],
        drawCallback: function () {
            // Add your class to the current page button
            $(".paginate_button.current").addClass("btn-primary text_white"); // cannot add backgrodun color
        }
    });

    hapus = (id) => {
        $.ajax({
            // headers: {
            //     'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content'),
            // },
            type: "delete",
            url: "/api/role/" + id+"/delete",
            success: function (data) {

                table.ajax.reload()
            },
            error: function (jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log("Request Failed: " + err);
            }
        })
    }
    // search engine
    // $("#search").keyup(function () {
    //     table.search(this.value).draw();
    // })
    $(".btn-table").append('<a href="/pages/role/add" class="btn btn-primary">Tambah Pengguna</a>');
    $(".pdf-button").append('<button class="btn btn-danger mt-md-0 mt-3 me-2">Export PDF</button>' +
        '<button class="btn btn-primary mt-md-0 mt-3 me-2">Export Excel</button>');

</script>
@endpush
