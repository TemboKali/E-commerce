@extends('client.client_page_layout.page_layout')
@section('PageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')
    @include('client.sections.header3')
    <div class="box"
        style='width:150px; height:350px; box-shadow:0 0 12px grey; border-radius:10px; position:absolute; top:0; right:30px; background-color:white; z-index:999;'>
        <a href="" style="color:black;text-decoration:none">Edit Profile</a>
        <a href="" style="color:black;text-decoration:none">Logout</a>
    </div>
    @include('client.sections.banner')
    @include('client.sections.header2')
    @include('client.sections.main');
@endsection()