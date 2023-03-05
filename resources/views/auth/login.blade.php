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
            <img src="{{ asset('assets/img/ilustrasi_petani.png') }}" class="img-fluid" style="object-fit:cover max-height: 400px" alt="Ilustrasi_petani">
          </div>
    
          {{-- Login Card --}}
          <div class="col-md-8 col-lg-5 offset-xl-1">
            {{-- Headline --}}
            <div class="Headline text-light d-flex justify-content text-align-left py-3">
              <h1 class="H1_orange">Login Terlebih dahulu !</h1>
            </div>
            {{-- Head line --}}
            <div class="card shadow-sm mb-5">
              <div class="card-body">
                  <form action="{{ route('login') }}" method="POST">
                    @csrf
                    {{-- <!-- Username input --> --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Enter username"/>
                        <label class="form-label" for="username">Username<span class="text-danger">*</span></label>
                    @error('username')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                    </div>  
                    {{-- <!-- Password input --> --}}
                    <div class="form-floating mb-3">
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password"/>
                        <label class="form-label" for="password">Password<span class="text-danger">*</span></label>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                    </div>    
  
                      {{-- <!-- Login & Sign button --> --}}
                      <div class="container p-0 mb-2">
                          <div class="d-flex w-100 gap-2 flex-column flex-md-row">
                              <button type="submit"
                                  class="col-12 col-md-6 btn btn-success btn-block text-light py-3 fw-bold">
                                  <span class="ms-2">Login</span> 
                                  <img src="{{ asset('assets/icons/feather_white/log-in.svg') }}">
                              </button>
                              <a href="{{ route('register') }}" class="col-12  col-md-6 btn btn-outline-success py-3 fw-bold">Registrasi</a>
                          </div>
                          <p class="small mt-1 pt-1 fw-regular text-muted"><img
                            src="{{ asset('assets/icons/feather_BBBBBB/alert-circle.svg') }}">
                            untuk mengikutilelang anda diharuskan membuat akun terlebih dahulu !
                          </p>
                          {{-- <p class="small mt-2 pt-1 fw-semibold">kembali ke
                            <a href="auth/home" class="link-success">Home</a>
                          </p> --}}
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