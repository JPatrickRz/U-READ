@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1 bg-customs d-flex justify-content-center">
            <ul class="nav flex-column icon-margin admin-menu">
                <li class="nav-item admin-dashboard {{'admin/dashboard' == request()->path() ? 'active' : ''}}" style="display:flex; justify-content:center;">
                    <a class="btn-active" href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-book" style="display: flex;justify-content:center"></i>
                        <h3>Dashboard</h3>
                    </a>
                </li>
                <li class="nav-item {{'admin/upload' == request()->path() ? 'active' : ''}}" style="display:flex; justify-content:center;">
                    <a class="btn-active"  href="{{route('admin.admin-upload')}}">
                        <i class="bi bi-file-arrow-up" style="display: flex;justify-content:center; margin-top:20px"></i>
                        <h3>Upload</h3>
                    </a>
                </li>
                <li class="nav-item" style="display:flex; justify-content:center;">
                    <a class="btn-active"  href="">
                        <i class="bi bi-clipboard-data" style="display: flex;justify-content:center; margin-top:20px"></i>
                        <h3>Analytics</h3>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-11 d-flex justify-content-center" style="margin-top: 50px">
            @livewire('multi-form')
        </div>
        
    </div>
</div>
@endsection
