@extends('layouts.app')

@section('title', 'Home')
@section('app')

{{-- content home --}}

{{-- Banner --}}
<section>
  <div class="container">
    <div id="homeCarousel" class="carousel slide shadow-sm rounded-3 mt-3" data-bs-ride="carousel">
      <div class="carousel-inner mt-4 rounded-3 md-4">
        <div class="carousel-item active">
          <img src="{{ asset('assets/img/Banner1.png') }}" class="d-block w-100" alt="Let's GoBid">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/img/Banner2.png') }}" class="d-block w-100" alt="Discover Auctions">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</section>

{{-- Heading --}}
<div class="container p-0">
  <div class="d-flex justify-content-between align-items-center px-3 ">
    <div class="Headline_home d-flex justify-content text-align-left py-3">
      <h2 class="text-start H1_ijo">Hewan yang di lelang</h2>
    </div>
    <div class="browese">
      <a href="auctions" class="btn btn-outline-success btn-block fw-bold">
        Browse More<img src="">
      </a>
    </div>
  </div>
</div>

{{-- Jenis Hewan --}}
<div class="container">
  <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-2 mb-3 justify-items-center">
    <div class="col">
      <div class="card shadow-sm">
        <img src="{{ asset('assets/img/tipe_img_01.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-title text-center">Ikan</p>
      </div>
    </div>
  </div>
    <div class="col">
      <div class="card shadow-sm">
        <img src="{{ asset('assets/img/tipe_img_02.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-title text-center">Burung</p>
      </div>
    </div>
  </div>
    <div class="col">
      <div class="card shadow-sm">
        <img src="{{ asset('assets/img/tipe_img_03.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-title text-center">Mamalia</p>
      </div>
    </div>
  </div>
    <div class="col">
      <div class="card shadow-sm">
        <img src="{{ asset('assets/img/tipe_img_04.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-title text-center">Reptil</p>
      </div>
    </div>
  </div>
    <div class="col">
      <div class="card shadow-sm">
        <img src="{{ asset('assets/img/tipe_img_05.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-title text-center">Ternak</p>
      </div>
    </div>
  </div>
  </div>
</div>
{{-- End Jenis Hewan --}}



{{-- Cards --}}
@if ($auctions->count())
<section>
  <div class="container">
    
    <div class="Headline_home mb-4">
      <h2 class="text-start H1_ijo">Lelang yang berlangsung</h2>
    </div>

    <div class="row row-cols-2 justify-content-start g-3 mb-5">
      @foreach ($auctions as $auction)
      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
        <a class="card shadow-sm w-100 col text-decoration-none text-black" href="/auction/{{ $auction->id }}" title="{{ $auction->item->name }}">
          {{-- Image --}}
          <img src="/assets/item-img/{{ $auction->item->image }}" class="col-md-auto card-img-top" alt="{{ $auction->item->name }}" style="height: 200px; object-fit: cover"/>
          <div class="card-body flex-column pt-1">
             {{-- Status --}}
             @switch($auction->status)
             @case('open')
             <div class="time-auction col-sm badge text-bg-warning text-warning my-2 fw-bold">
               <img src="{{ asset('assets/icons/feather_FFB800/clock.svg') }}">
               <span class="ms-1">Ongoing</span>
             </div>
               @break
             @default
             <div class="time-auction col-sm badge text-bg-danger text-danger my-2 fw-bold">
               <img src="{{ asset('assets/icons/feather_FF1221/mingcute_auction.svg') }}">
               <span class="ms-1">Closed</span>
             </div>
               <div class="badge bg-danger fw-normal">Closed</div>
           @endswitch
            {{-- Name --}}
            <p class="truncate card-title fw-medium mb-1 fs-5">
              {{ $auction->item->name }}
          </p>
          {{-- Current Bid --}}
          <div class="row">
            <div class="col">
              <div class="col-sm fw-bold">
                <img clas="Alert_auction" src="{{ asset('assets/icons/feather_FF1221/tabler_hammer.svg') }}">
                <span class="ms-1 text-danger">Bid saat ini</span>
              </div>
              <span class="card-text truncate fw-bold fs-5">
                @if ($auction->bid->count())
                  @rupiah($auction->bid->max('bid_amount'))
                  @else
                  @rupiah($auction->item->start_price)
                  @endif
                </span>
            </div>
          </div>
        </div>
      </a>  
    </div>
    @endforeach
  </div>
  </div>
</section>
@else
<p class="text-center fs-3 my-5">No auction found.</p>
@endif


</div>
@endsection 