@extends('layouts.auth')
@section('judul', 'Register')

@section('app')

<div class="bg w-100">
  {{-- <!-- Headline --> --}}
  <div class="Headline text-light d-flex justify-content-center">
    <h1 class="H1_orange py-3">Buat akun Terlebih dahulu !</h1>
  </div>
    
  {{-- <!-- Register card --> --}}
  <section class="d-flex justify-content-center">
        <div class="col-lg-6 mb-1">
          <div class="card shadow-sm mb-5">
            <div class="card-body">
              <form action="{{ route('register') }}" method="POST">
                @csrf
                {{-- <!-- Name input --> --}}
                <div class="form-floating mb-2">
                  <input type="text" class="form-control" id="floatingInput" name="name" placeholder="name">
                  <label for="floatingInput">Name</label>
                </div>
                <p class="small mt-1 pt-1 fw-regular text-muted"><img src="{{ asset('assets/icons/feather_BBBBBB/alert-circle.svg') }}"> Masukan nama asli anda </p>
  
                {{-- <!-- Username input --> --}}
                <div class="form-floating mb-2">
                  <input type="text" class="form-control" id="floatingInput" name="username" placeholder="username">
                  <label for="floatingInput">Username</label>
                </div>
                <p class="small mt-1 pt-1 fw-regular text-muted"><img src="{{ asset('assets/icons/feather_BBBBBB/alert-circle.svg') }}"> Masukan username</p>
  
                {{-- <!-- Notlpn input --> --}}
                <div class="form-floating mb-2">
                  <input type="number" class="form-control" id="floatingInput" name="phone" placeholder="nomertlp">
                  <label for="floatingInput">Nomer Telepone</label>
                </div>
                <p class="small mt-1 pt-1 fw-regular text-muted"><img src="{{ asset('assets/icons/feather_BBBBBB/alert-circle.svg') }}"> Masukan no telepone</p>
  
  
                {{-- <!-- Password input --> --}}
                <div class="form-floating mb-2">
                  <input type="password" class="form-control" id="floatingInput" name="password" placeholder="password">
                  <label for="floatingInput">Password</label>
                </div>
                <p class="small mt-1 pt-1 fw-regular text-muted"><img src="{{ asset('assets/icons/feather_BBBBBB/alert-circle.svg') }}"> Masukan password dengan benar </p>
  
                
                {{-- <!-- Submit & back button --> --}}
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