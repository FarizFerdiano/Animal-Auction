@extends('layouts.auth')
@section('judul', 'Login')

@section('app')
{{-- Background --}}
<div class="bg w-100">
  {{-- Canvas --}}
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class=" d-flex justify-content-center align-items-center h-100 overflow-y-hidden">
          {{-- Image --}}
          <div class="col-lg-5 d-none d-md-block">
            <img src="{{ asset('img/ilustrasi petani.png') }}" class="img-fluid" style="object-fit:cover max-height: 400px" alt="Ilustrasi Petani">
          </div>
    
          {{-- Login Card --}}
          <div class="col-md-8 col-lg-5 offset-xl-1">
            {{-- Headline --}}
            <div class="Headline text-light d-flex justify-content text-align-left py-3">
              <h1 class="H1_orange">Login Terlebih dahulu !</h1>
            </div>
            {{-- Head line --}}
            <div class="card shadow-sm">
              <div class="card-body">
                  <form>
                      {{-- <!-- Username input --> --}}
                      <div class="form-floating mb-2">
                          <input type="text" class="form-control" id="floatingInput" placeholder="username">
                          <label for="floatingInput">Username</label>
                      </div>
                      <p class="small mt-1 pt-1 fw-regular text-muted"><img
                              src="{{ asset('icons/feather_BBBBBB/alert-circle.svg') }}"> Masukan username</p>
  
                      {{-- <!-- Password input --> --}}
                      <div class="form-floating mb-2">
                          <input type="password" class="form-control" id="floatingInput"
                              placeholder="password">
                          <label for="floatingInput">Password</label>
                      </div>
                      <p class="small mt-1 pt-1 fw-regular text-muted"><img
                              src="{{ asset('icons/feather_BBBBBB/alert-circle.svg') }}"> Password menggunakan huruf kapital </p>
  
                      {{-- <!-- Login & Sign button --> --}}
                      <div class="container p-0">
                          <div class="d-flex w-100 gap-2 flex-column flex-md-row">
                              <a href="/home"
                                  class="col-12 col-md-6 btn btn-success btn-block text-light py-3 fw-bold">
                                  <span class="ms-2">Login</span> 
                                  <img src="{{ asset('icons/feather_white/log-in.svg') }}">
                              </a>
                              
                                <a href="/register" class="col-12  col-md-6 btn btn-outline-success py-3 fw-bold">Registrasi</a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection