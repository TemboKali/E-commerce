@extends('admin-layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Site settings')
@section('content')
    <style type="text/css">
        table {
            position: relative;
            top: 150px;
            left: 20%;
        }

        .table {
            width: 900px;
        }
    </style>
    <div class="bar">
        <div class="text">
            <h3>Settings</h3>
        </div>
    </div>
    <div class="center">
        <div class="buttons">
            <div class="categor">
                <button class="btn btn-primary" id="editLogoBtn">Edit Logo</button>
            </div>
            <div class="categor">
                <button class="btn btn-primary" id="editSocialBtn">Edit Social Media</button>
            </div>
        </div>
    </div>
    <div id="logoTableContainer" style="display: none;">
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>Blog Name</th>
                    <th>Logo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $settings->blog_name }}</td>
                    <td>
                        <img src="{{ asset($settings->logo) }}" alt="Logo"
                            style="width:150px; height:auto; border-radius:8px;">
                    </td>
                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#category">Edit
                            settings</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Social Media Table Container -->
    <div id="socialTableContainer" style="display: none;">
        <button class="btn btn-primary social">Create social media</button>
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Social Media Image</th>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td><!-- Social media image goes here --></td>
                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#category">Edit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection