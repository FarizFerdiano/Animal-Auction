@extends('layouts.app')
@section('title', $title)
@section('app')

<div class="container p-0">
  <div class="Headline_home text-light d-flex justify-content text-align-left pt-3 px-2">
    <h1 class="H1_ijo">Semua Lelang</h1>
</div>
</div>
{{-- {{ dd($auctions) }} --}}
{{-- Search --}}
<div class="container">
  <div class="card border-success p-1 my-3 mb-4">
  <form action="/auctions/search" method="GET" class="d-flex">
      @csrf
      <input type="search" name="search" class="form-control me-2" type="text" placeholder="Cari Hewan lelang yang anda inginkan" aria-label="Search">
      <button class="btn btn-success d-flex text-white" type="submit">
          <img src="{{ asset('assets/icons/feather_FFFFFF/search.svg') }}">
      <span class="ms-1">Search</span>
      </button>
  </form>
  </div>
</div>

{{-- Cards --}}
@if ($auctions->count())
<section>
  <div class="container">
    <div class="row row-cols-2 justify-content-start g-3 mb-3 mb-5">
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
                <span class="ms-1">Berlangsung</span>
              </div>
                @break
              @default
              <div class="time-auction col-sm badge text-bg-danger text-danger my-2 fw-bold">
                <img src="{{ asset('assets/icons/feather_FF1221/mingcute_auction.svg') }}">
                <span class="ms-1">Berakhir</span>
              </div>
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
                <span class="card-text text-truncate fw-bold fs-5">
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
      @else
      {{-- <p class="text-center fs-4 my-5">Tidak ada lelang yang ditemukan.</p> --}}
      <img class="img-fluid mx-auto d-block" src="{{ asset('assets/img/ups_lelang.png') }}" alt="Tidak ada lelang yang ditemukan"> 
    </div>
    {{ $auctions->links() }}
  </div>
</section>
@endif
@endsection 