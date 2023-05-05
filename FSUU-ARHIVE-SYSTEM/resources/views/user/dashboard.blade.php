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
                    <a class="btn-active" href="#"><i class="bi bi-person-fill" style="display: flex;justify-content:center"></i><h3>Profile</h3></a>
              </li>
              <li class="nav-item {{'notification' == request()->path() ? 'active' : ''}}" style="display:flex; justify-content:center;">
                    <a class="btn-active" href="#"><i class="bi bi-bell-fill" style="display: flex;justify-content:center"></i><h3>Notification</h3></a>
              </li>
              <li class="nav-item {{'trash' == request()->path() ? 'active' : ''}}" style="display:flex; justify-content:center;">
                  <a class="btn-active" href="#"><i class="bi bi-trash" style="display: flex;justify-content:center"></i><h3>Trash</h3></a>
            </li>
            </ul>
        </div>

        {{-- MY LIBRARY --}}
        <div class="col-md-2 bg-custom d-flex flex-column align-items-center pt-5" >
            <div class="d-flex align-items-center mt-5">
              <i class="bi bi-book-half me-3" style="font-size: 30px; color: #014161;"></i>
              <h3 class="mt-4 mb-0" style="font-family: 'Outfit', sans-serif; font-weight:800; font-size:22px; color: #014161;">LIBRARY</h3>
            </div>
            <div class="mt-4">
                <ul style="list-style-type: none;">
                    <li class="library-link"><a href="" style="text-decoration: none;">All References</a></li>
                    <li class="library-link"><a href="" style="text-decoration: none;">Recently Added</a></li>
                    <li class="library-link"><a href="" style="text-decoration: none;">Research Access</a></li>
                    <li class="library-link"><a href="" style="text-decoration: none;">Favorites</a></li>
                </ul>                  
            </div>
          </div> 
    </div>
</div>


@endsection