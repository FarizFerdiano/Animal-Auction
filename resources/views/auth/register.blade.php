@extends('layouts.auth')
@section('judul', 'Register')

@section('app')

<div class="bg w-100">
  {{-- <!-- Headline --> --}}
  <div class="Headline text-light d-flex justify-content-center">
    <h1 class="H1_orange py-3">Buat akun Terlebih dahulu !</h1>
  </div>
    
  {{-- <!-- Register card --> --}}
  <section class="row justify-content-center px-4 py-2">
        <div class="col-md-8 col-lg-5">
          <div class="card shadow-sm mb-5">
            <div class="card-body">
              <form action="{{ route('register') }}" method="POST">
                @csrf
                  {{-- <!-- Name input --> --}}
                  <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="floatingInput" name="name" placeholder="name">
                    <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
                    @error('name')
                  </div>
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                {{-- <!-- Username input --> --}}
                <div class="form-floating mb-2">
                  <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Enter username"/>
                  <label class="form-label" for="username">Username<span class="text-danger">*</span></label>
                  @error('username')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>  
                {{-- <!-- Password input --> --}}
                <div class="form-floating mb-2">
                  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password"/>
                  <label class="form-label" for="password">Password<span class="text-danger">*</span></label>
                  @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>  
                {{-- Phone input --}}
                <div class="form-floating mb-2">
                  <input type="number" name="phone" id="phone" class="form-control  @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="Enter phone number"/>
                  <label class="form-label" for="phone">Phone Number</label>
                  @error('phone')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                {{-- <!-- Buttons --> --}}
                <div class="container p-0">
                  <div class="d-flex w-100 gap-2 flex-column flex-md-row">
                      <button type="submit" class="col-12 col-md-6 btn btn-success btn-block text-light py-3 fw-bold">Sign up <img src="{{ asset('assets/icons/feather_white/log-in.svg') }}"></button>
                      <a href="/login" class="col-12 col-md-6 btn btn-outline-success py-3 fw-bold">Back <img src="{{ asset('assets/icons/feather_328D2A/corner-up-left.svg') }}"></a>
                  </div>
                  <p class="small mt-1 pt-1 fw-semibold">Already have an account?
                    <a href="/login" class="link-success">Login</a>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
  </section>

</div>


@endsection