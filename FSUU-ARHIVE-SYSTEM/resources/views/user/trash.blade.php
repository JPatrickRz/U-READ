@extends('layouts.app')


@section('content')
<div class="container-fluid">
    <div class="row"> 
        <div class="col-md-1 bg-customs d-flex justify-content-center" style="padding-top: 55px;">
            <ul class="nav flex-column icon-margin dashboard-menu">
              <li class="nav-item mt-2 {{'home' == request()->path() ? 'active' : ''}}" style="display:flex; justify-content:center;">
                    <a class="btn-active"  href="{{ route('home') }}"><i class="bi bi-search" style="display: flex;justify-content:center; margin-top:20px"></i><h3>Home</h3></a>
              </li>
              <li class="nav-item {{'dashboard' == request()->path() ? 'active' : ''}}" style="display:flex; justify-content:center;">
                    <a class="btn-active" href="{{ route('user.dashboard') }}"><i class="bi bi-book" style="display: flex;justify-content:center"></i><h3>Dashboard</h3></a>
              </li>
              <li class="nav-item {{'profile' == request()->path() ? 'active' : ''}}" style="display:flex; justify-content:center;">
                    <a class="btn-active" href="{{ route('user.profile') }}"><i class="bi bi-person-fill" style="display: flex;justify-content:center"></i><h3>Profile</h3></a>
              </li>
              <li class="nav-item {{'notification' == request()->path() ? 'active' : ''}}" style="display:flex; justify-content:center;">
                    <a class="btn-active" href="{{ route('user.notification') }}"><i class="bi bi-bell-fill" style="display: flex;justify-content:center"></i><h3>Notification</h3></a>
              </li>
              <li class="nav-item {{'trash' == request()->path() ? 'active' : ''}}" style="display:flex; justify-content:center;">
                  <a class="btn-active" href="{{ route('user.trash') }}"><i class="bi bi-trash" style="display: flex;justify-content:center"></i><h3>Trash</h3></a>
            </li>
            </ul>
        </div>
    </div>
</div>


@endsection