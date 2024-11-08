@extends('admin.layout.master')
@section('title', 'Data Pengguna')
@section('content')
<div class="content-wrapper">
    <div class="container ">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> Data Pengguna</h4>

        <div class="card">
            <div class=" text-nowrap p-3">
                <table class="table" id="table-user">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Peran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><strong>John Doe</strong></td>
                            <td>johndoe@email.com</td>
                            <td>Administrator</td>
                            <td><span class="badge bg-label-primary me-1">Aktif</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><strong>Jane Smith</strong></td>
                            <td>janesmith@email.com</td>
                            <td>User</td>
                            <td><span class="badge bg-label-success me-1">Aktif</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-edit-alt me-2"></i> Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-trash me-2"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><strong>Mike Jones</strong></td>
                            <td>mikejones@email.com</td>
                            <td>Moderator</td>
                            <td><span class="badge bg-label-warning me-1">Pending</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-edit-alt me-2"></i> Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-trash me-2"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><strong>Alice Williams</strong></td>
                            <td>alicewilliams@email.com</td>
                            <td>User</td>
                            <td><span class="badge bg-label-danger me-1">Non-Aktif</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-edit-alt me-2"></i> Edit</a>
                                        <button class="dropdown-item" onclick="${console.log('hello world')}"><i
                                                class="bx bx-trash me-2"></i> Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<input type="text" hidden value="{{asset('asset/admin/json/user.json')}}" id="path">
@endsection

@push('styles')
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
    let table = new DataTable('#table-user', {
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
                data: 'email'
            },
            {
                data: 'role'
            },
            {
                data: 'status',
                render: function (data, type, row) {
                    if (data == 'Active') {
                        return `<span class="badge bg-primary me-1">${data}</span>`;
                    } else if (data === 'Not Active') {
                        return `<span class="badge bg-danger me-1">${data}</span>`;
                    } else {
                        return `<span class="badge bg-warning me-1">${data}</span>`;
                    }
                }
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
                        <a class="dropdown-item" href="{{ url('pages/user/${data.id}/edit') }}"><i
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
            url: "/api/user/" + id+"/delete",
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
    $(".btn-table").append('<a href="/pages/user/add" class="btn btn-primary">Tambah Pengguna</a>');
    $(".pdf-button").append('<button class="btn btn-danger mt-md-0 mt-3 me-2">Export PDF</button>' +
        '<button class="btn btn-primary mt-md-0 mt-3 me-2">Export Excel</button>');

</script>
@endpush
