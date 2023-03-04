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

        <div class="col-10 col-md-5 pe-4 mx-auto">
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
                <span class="ms-1">Ongoing</span>
              </div>
                @break
              @default
              <div class="time-auction col-sm badge text-bg-danger text-danger my-2 fw-bold">
                <img src="{{ asset('assets/icons/feather_FF1221/mingcute_auction.svg') }}">
                <span class="ms-1">Closed</span>
              </div>
            @endswitch

            {{-- Current bid --}}
            <div class="fw-bold"><img clas="waktu_auction mb-2" src="{{ asset('assets/icons/feather_FF1221/tabler_hammer.svg') }}">
              <span class="ms-1 text-danger">Bid saat ini</span>
            </div>
            <p class="fw-bold fs-4 mb-2">
              @if ($bids->count())
                @rupiah($auction->bid->max('bid_amount'))
              @else
                @rupiah($auction->item->start_price)
              @endif
            </p>
            <p class="fw-semibold mb-2">ID {{ $auction->id }}</p>
            <p class="fw-semibold mb-1 fs-6">Description</p>
            <p class="">{{ $auction->item->description }}</p>

            {{-- Submit Bid --}}
            <hr>
            <h5 class="fw-semibold fs-3 mb-3">Bid Now</h5>
            <form action="#" method="POST">
              @csrf
              <div class="input-group input-group-lg">
                <span class="input-group-text">Rp</span>
              @auth
                @can('Member')
                <input type="number" placeholder="Enter your bid amount" class="form-control">
                <button type="submit" class="btn btn-success text-light fw-semibold">Submit Bid</button>
                @else
                <input type="number" placeholder="You're not allowed to join this auction" class="form-control text-center" disabled>                <button type="submit" class="btn btn-success text-light fw-semibold" disabled>Submit Bid</button>
                @endcan
              @else
                <input type="number" placeholder="You need to login first" class="form-control text-center" disabled>
                <button type="submit" class="btn btn-success text-light fw-semibold" disabled>Submit Bid</button>
              @endauth
              </div>
            </form>
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
                <p class="text-center fw-medium fs-3 mt-3 mb-4">No bids in this auction yet</p>
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