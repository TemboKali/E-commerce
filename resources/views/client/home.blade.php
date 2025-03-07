@extends('client.client_page_layout.page_layout')
@section('PageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')
    @include('client.sections.header')
    @include('client.sections.banner')
    @include('client.sections.header2')
    @include('client.sections.main');
@endsection()