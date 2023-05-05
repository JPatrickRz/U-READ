@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="row d-flex justify-content-center" style="padding-left: 50px">
            <div class="col-md-6 search-margin">
                <div class="pt-4">
                    <form class="input-group input-group-lg" action="{{ route('publications.search')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input id="search-input" class="form-control form-control-lg me-2" type="search" name="search" placeholder="Search Title" aria-label="Search" autocomplete="off">
                            <div class="input-group-append">
                              <button class="btn btn-primary btn-lg" id="search-btn" type="submit">Search</button>
                            </div>
                          </div>        
                    </form> 
                </div>
            </div>
        </div>

        <!-- Sidebar Menu ICONS -->
        <div class="col-md-1 bg-customs d-flex justify-content-center" style="padding-top: 30px; ">
            <ul class="nav flex-column icon-margin">
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
          
        

          <!-- Filter Menu -->
          <div class="col-md-2 bg-custom pt-2">
                <div class="container">
                    <h3 class="mt-4" style="font-family: 'Outfit', sans-serif; font-weight:800; font-size:22px; color: #014161;
                    ">FILTER</h3>
                </div>
               
                <hr>
                <br>

                {{-- YEAR FILTER--}}
                <div class="container">
                    <h4 style="font-family: 'Outfit', sans-serif; font-weight:500; color:#014161;">YEAR</h4>
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="myCheckbox">
                    <label class="form-check-label" for="myCheckbox">
                    2021
                    </label>
              </div> 
               <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="myCheckbox">
                    <label class="form-check-label" for="myCheckbox">
                    2022
                    </label>
              </div>  
               <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="myCheckbox">
                    <label class="form-check-label" for="myCheckbox">
                    2023
                    </label>
              </div>  
               <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="myCheckbox">
                    <label class="form-check-label" for="myCheckbox">
                    2024
                    </label>
              </div>  
               <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="myCheckbox">
                    <label class="form-check-label" for="myCheckbox">
                    2025
                    </label>
              </div> 
              <div class="form-check mt-4">
                <h3>Custom Range:</h3>
                <input class="yearInput" type="number" min="2021" max="2099" step="1" value="2026" />
                <button type="button" class="btn btn-primary yearBtn">Search</button>
                </div>  
              
                </div>
                
              <hr>    

              {{-- DEPARTMENT FILTER --}}
              
              <div class="container">
                <h4 style="font-family: 'Outfit', sans-serif; font-weight:500; color:#014161;">DEPARTMENT</h4>
                <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="myCheckbox">
                    <label class="form-check-label" for="myCheckbox">
                        Accountancy Program (AP)
                    </label>
              </div> 
               <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="myCheckbox">
                    <label class="form-check-label" for="myCheckbox">
                        Arts and Science Program (ASP)
                    </label>
              </div>  
               <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="myCheckbox">
                    <label class="form-check-label" for="myCheckbox">
                        Business Administrator Program (BAP)
                    </label>
              </div>  
               <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="myCheckbox">
                    <label class="form-check-label" for="myCheckbox">
                        Computer Studies Program(CSP)
                    </label>
              </div>  
               <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" id="myCheckbox">
                    <label class="form-check-label" for="myCheckbox">
                        Criminal Justice Education Program (CJEP)
                    </label>
              </div>     
              <div class="form-check mt-4">
                  <input class="form-check-input" type="checkbox" id="myCheckbox">
                  <label class="form-check-label" for="myCheckbox">
                    Engineering and Technology Program (ETP)
                  </label>
              </div>  
              <div class="form-check mt-4">
                  <input class="form-check-input" type="checkbox" id="myCheckbox">
                  <label class="form-check-label" for="myCheckbox">
                    Teacher Education Program (TEP)
                  </label>
              </div>  
              <div class="form-check mt-4">
                  <input class="form-check-input" type="checkbox" id="myCheckbox">
                  <label class="form-check-label" for="myCheckbox">
                    Nursing Program (NP)
                  </label>
              </div>   
              </div>
             
        </div>

          

        {{-- List of Cards  --}}
     
        <div class="col-md-5 mt-3 card-position" style="margin-left: 20px;">
            @if($search)
                @if(count($publications) > 0)
                    <h2 style="font-style: italic" class="pb-2 pt-2">Search Results for "{{ $search }}"</h2>
                    <!-- Display search results here -->
                @else
                    <h2 style="font-style: italic">No results found for "{{ $search }}"</h2>
                @endif
            @endif

            
            @foreach ($publications as $key => $publication)

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-subtitle mb-2 text-muted">{{ $publication->department }} , {{ $publication->year }} </h3>
                        <h1 class="card-title"><a href="#" class="source-title">{{ $publication->source_title }}</a></h1>


                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                          <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          </div>
                          <div class="offcanvas-body">
                            Offcanvas content goes here.
                          </div>
                        </div>

                        
                        <h3 class="card-subtitle mb-2 text-muted">{{ $publication->publisher }}</h3>
                        <h3 style="color:#004e92">
                            {{ implode(', ', $publication->authors->map(function ($author) {
                              return $author->author_first_name . ' ' . $author->author_mi_middle . ' ' . $author->author_last_name . ' ' . $author->author_suffix;
                            })->toArray()) }}
                        </h3>  
                        <p class="card-text">{{ Str::limit($publication->abstract, 300) }}</p>
                        <h6><a href="{{$publication->pdf_file_name}}" target="_blank">{{$publication->pdf_file_name}}</a></h6>
                    </div>
                    <div class="card-footer">
                        <div class="library">
                                <i class="bi bi-plus"></i>
                                <span>Add to Library</span>
                        </div>
                        <div class="access">
                            <button class="btn btn-outline-secondary" wire:click="$emit('showModal', '{{ $publication->id }}')">
                                <i class="bi bi-lock"></i>
                                <span>Request Access</span>
                            </button>
                        </div>           
                    </div>        
                </div>



                @if ($key != count($publications) - 1)
                    <div style="margin-bottom: 15px;"></div>
                @endif


            @endforeach

            <div class="pt-3">
                {{ $publications->links('pagination::bootstrap-4')}} 
            </div>
           
        </div> 

    </div>
       
    
       
@endsection
