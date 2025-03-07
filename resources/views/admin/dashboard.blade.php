@extends('admin-layout.page-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@section('content')
    <div class="bar">
        <div class="text">
            <h3>Dashboard</h3>
        </div>
        <div class="profile">
            <img src="" alt="" srcset="">
            <h6>{{ $admin->name }}</h6>
        </div>
    </div>
@endsection

</body>

</html>