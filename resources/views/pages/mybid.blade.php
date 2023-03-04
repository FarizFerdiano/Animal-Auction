@extends('layouts.app')

@section('title', 'My Bid')
@section('app')
<section>
    <div class="container">
        <div class="row d-flex mb-5">
            {{-- Search --}}
            <div class="container">
                <div class="card bg-warning-subtle border-warning p-1 my-3 mb-4 shadow-sm">
                  <form class="d-flex" role="search">
                      <input class="form-control me-2" type="search" placeholder="Cari Bid anda" aria-label="Search">
                      <a href="#" class="btn btn-warning d-flex text-light" type="submit"><img src="{{ asset('assets/icons/feather_FFFFFF/search.svg') }}">
                          <span class="ms-1">
                              Search
                          </span>
                      </a>
                  </form>
                </div>
            </div>

            {{-- Table --}}
            <div class="container">

                <div class="card shadow-sm">
                    <div div class="table-responsive">
                        <table class="table caption-top align-middle">
                            <h5 class="fw-semibold fs-3 ms-3 my-3">My Bid</h5>
                        @if ($bids->count())
                            <thead>
                                <tr>
                                    <th class="fw-semibold" style="width: 7.5%">ID</th>
                                    <th class="fw-semibold" style="width: ">Auction</th>
                                    <th class="fw-semibold" style="width: 15%">Bid Amount</th>
                                    <th class="fw-semibold" style="width: 20%">Bid Time</th>
                                    <th class="fw-semibold" style="width: 15%">Result</th>
                                </tr>
                            </thead>
                            <tbody class="fw-medium">
                                @foreach ($bids as $bid)
                                <tr>
                                    <td>{{ $bid->auction->id }}</td>
                                    <td>
                                        <a href="/auction/{{ $bid->auction->id }}" class="text-decoration-none text-dark">
                                            <img src="/assets/item-img/{{ $bid->auction->item->image }}" 
                                                alt="{{ $bid->auction->item->name }}"
                                                class="rounded"
                                                style="height: 75px; width: 75px; object-fit: cover">
                                            <span class="ms-2">{{ $bid->auction->item->name }}</span>
                                        </a>
                                    </td>
                                    <td>@rupiah($bid->bid_amount)</td>
                                    <td>{{ $bid->created_at }}</td>
                                    <td>
                                        @switch($bid->result)
                                        @case('ongoing')
                                            <div class="time-auction col-sm badge text-bg-warning text-warning my-2 fw-bold">
                                                <img src="{{ asset('assets/icons/feather_FFB800/clock.svg') }}">
                                                <span class="ms-1">Ongoing</span>
                                            </div>
                                            @break
                                        @case('win')
                                            <div class="time-auction col-sm badge text-bg-success text-success my-2 fw-bold">
                                                <img src="{{ asset('assets/icons/feather_20_328D2A/mingcute_auction.svg') }}">
                                                <span class="ms-1">Win</span>
                                            </div>
                                            @break
                                        @case('lose')
                                        <div class="time-auction col-sm badge text-bg-danger text-danger my-2 fw-bold">
                                            <img src="{{ asset('assets/icons/feather_FF1221/mingcute_auction.svg') }}">
                                            <span class="ms-1">Lose</span>
                                          </div>
                                        @break
                                        @endswitch
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        @else
                        <p class="text-center fw-medium fs-3 mt-3 mb-4">No bids found.</p>
                        @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection