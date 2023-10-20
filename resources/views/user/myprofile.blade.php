<x-backend.layouts.master>
@if (session('success'))
  <div class="alert alert-success" role="alert">
  {{session('success')}}
  </div>    
@endif
    <section style="background-color: #eee;">
        <div class="container py-5">
          
          <x-slot:title>
            My Profile
        </x-slot>
         
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  
                  <img src="{{asset('storage/users').'/'.auth()->user()->image}}" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;">
                  <h5 class="my-3">{{ auth()->user()->name }}</h5>
                  <p class="text-muted mb-1">{{ auth()->user()->about }}</p>
                  {{-- <p class="text-muted mb-4">{{ auth()->user()->address }}</p> --}}
                  <div class="d-flex justify-content-center mb-2">
                    {{-- <button type="button" class="btn btn-primary">Download CV</button> --}}
                    <a style="text-decoration: none" class="btn btn-primary" href="#" >Download CV</a>
                    <a style="text-decoration: none" class="btn btn-outline-primary ms-1" href="{{ route('user.edit',Auth::user()->id) }}">Update Info</a>
                    {{-- <button type="button" class="btn btn-outline-primary ms-1">Message</button> --}}
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-lg-8 mt-5">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ auth()->user()->name }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">0{{ auth()->user()->phone }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ auth()->user()->address }}</p>
                    </div>
                  </div>
                </div>
              </div>
              
             
            </div>
          </div>
        </div>
      </section>
</x-backend.layouts.master>