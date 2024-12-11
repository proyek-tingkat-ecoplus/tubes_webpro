@extends('admin.layout.master')
@section('title', 'Forum')
@section('content')
<div class="content-wrapper">
    <div class="container ">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">FORMULIR /</span> Data Forum</h4>

        <div class="card">
            <div class=" text-nowrap p-3">
                <table class="table" id="table-forum">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>author</th>
                            <th>title</th>
                            <th>Tag</th>
                            <th>Content</th>
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
<input type="text" hidden value="{{asset('asset/admin/json/forum.json')}}" id="path">
@vite(['resources/js/pages/admin/forum/index.js'])
@endsection

@push('styles')
