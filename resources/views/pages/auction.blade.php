@extends('layouts.app')

@section('title', $title)
@section('app')
<section>
  <div class="container">
    <div class="card my-5 border-0 ">
      <div class="row g-4 p-1">

        {{-- img --}}
        {{-- <div class="col-md-5 pe-4">
          <img src="/assets/item-img/{{ $auction->item->image }}" class=" col-md-auto rounded w-100" alt="{{ $auction->item->image }}" style="height: 516px; object-fit: cover">
        </div> --}}

        <div class="col-md-5 col-md-5 pe-4 mx-auto">
          <div class="w-100 ratio ratio-1x1 overflow-hidden rounded-3">
              <div class="w-100">
                  <img src="/assets/item-img/{{ $auction->item->image }}" alt="{{ $auction->item->image }}" class="h-100">
              </div>
          </div>
        </div>

        {{-- Info --}}
        <div class="col d-flex">
          <div class="card-body p-0">
            <h5 class="card-title fw-bold fs-3 mb-2">{{ $auction->item->name }}</h5>

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

            {{-- Current bid --}}
            <div class="fw-bold"><img clas="waktu_auction mb-2" src="{{ asset('assets/icons/feather_FF1221/tabler_hammer.svg') }}">
              <span class="ms-1 text-danger">
                @if($auction->status == 'open')
                Bid saat ini
                @else
                Bid Terakhir
                @endif
              </span>
            </div>
            <p class="fw-bold fs-4 mb-2">
              @if ($bids->count())
                @rupiah($auction->bid->max('bid_amount'))
              @else
                @rupiah($auction->item->start_price)
              @endif
            </p>
            {{-- <p class="fw-semibold mb-2">ID {{ $auction->id }}</p> --}}
            <p class="fw-semibold mb-1 fs-6">Deskripsi</p>
            <p class="">{{ $auction->item->description }}</p>

            {{-- Submit Bid --}}
            <hr>
            @switch($auction->status)
            @case('open')
              <h5 class="fw-semibold fs-3 mb-3">Tawar sekarang</h5>
              {{-- Alert --}}
              @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              @error('bid_amount')
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @enderror

              <form action="{{ route('auction-store',$auction) }}" method="POST">
                @csrf
                <div class="input-group input-group-lg">
                  <span class="input-group-text">Rp</span>
                @auth
                  @can('Member')
                  <input type="number" name="bid_amount" placeholder="Masukkan jumlah tawaran Anda" class="form-control">
                  <button type="submit" class="btn btn-success text-light fw-semibold" value="{{ old('bid_amount') }}">Submit Bid</button>
                  @else
                  <input type="number" name="bid_amount" placeholder="Anda tidak diizinkan untuk mengikuti lelang ini" class="form-control text-center" disabled><button type="submit" class="btn btn-success text-light fw-semibold" disabled>Submit Bid</button>
                  @endcan
                @else
                <input type="number" name="bid_amount" placeholder="Anda harus login terlebih dahulu" class="form-control text-center" disabled>
                @endauth
                </div>
              </form>
              @break
            @case('failed')
              <h5 class="fw-semibold fs-3 mb-3">Pemenang</h5>
              <p class="fs-5 fst-italic">Tidak ada satu pun yang menang</p>
              @break
            @case('close')
              <h5 class="fw-semibold fs-3 mb-2">Pemenang</h5>
              <div class="card text-bg-warning border-warning mb-3" style="max-width: 60rem;">
                <div class="card-body">
                  <span class="fs-4 fw-medium">
                    <i class="bi bi-trophy"></i>
                    {{ $bids->first()->user->name }}
                  </span>
                  <p class="card-text fw-light mt-2">
                    Lelang dinyatakan selesai dan kepada saudara yang memenangkan lelang diperkenankan langsung menghubungi petugas.
                  </p>
                  <a href="https://wa.me/6288291045794" class="btn btn-outline-dark">Hubungi petugas</a>
                </div>
              </div>
              @break
          @endswitch
          </div>
        </div>
      </div>
    </div>

    {{-- Bid History --}}
    <section>
      <div class="container">
        <div class="row d-flex mb-5">
          <div class="card shadow-sm">
            <div class="table-responsive">
              
              <table class="table caption-top">
                <h5 class="fw-semibold fs-3 ms-2 my-3">Bid History</h5>
                @if ($bids->count())
                <thead>
                  <tr>
                    <th scope="col" style="width: 7.5%">#</th>
                    <th scope="col" style="width: 30%">Bidder</th>
                    <th scope="col" style="width: 30%">Bid Amount</th>
                    <th scope="col"> Bid Time</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($bids as $bid)
                  <tr class="{{ ($loop->iteration == 1) ? 'table-active' : '' }}">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $bid->user->name }}</td>
                    <td><span>@rupiah($bid->bid_amount)</span></td>
                    <td>{{ $bid->created_at }}</td>
                  </tr>
                  @endforeach
                </tbody>
                @else
                <p class="text-center fw-medium fs-4 mt-3 mb-4">Belum ada penawaran dalam lelang ini</p>
                @endif
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</section>
@endsection