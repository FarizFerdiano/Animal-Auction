@extends('layouts.main')
@section('judul', 'mybid')
@section('app')
    {{-- Content mybid--}}
    <section>
        <div class="container">
            <div class="history_lelang row d-flex my-5">
                <div class="card shadow-sm">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex">

                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex">
                                
                            </div>
                        </div>
                    </div>
                  <table class="table caption-top">
                    <h5 class="m-2"><img clas="" src="{{ asset('icons/feather_E88D13/coin-stack.svg') }}"> <span class="ms-1">My Bid</span></h5>
                    <tbody>
                      <tr>
                        {{-- Image product --}}
                        <td scope="row d-flex"><img src="{{ asset('img/Foto produk_sample.png') }}" class="col img-fluid rounded" alt="..." style="width: 80px"></td>
                        {{-- Nama produk --}}
                        <td>Kambing Etawa Jantan</td>
                        <td>
                        {{-- Nama pemilik --}}
                            <div class="fw-bold mb-2"> <img clas="" src="{{ asset('icons/feather_328D2A/user icon.svg') }}">
                                <span class="ms-1">Nama Pemilik</span></div>
                        </td>
                        {{-- Date Time --}}
                        <td>06/11/2023  17:00:01 WIB</td>
                        {{-- Bid --}}
                        <td><img clas="" src="{{ asset('icons/feather_328D2A/ph_money.svg') }}"><span class="ms-1">RP.2.000.000.00</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
    </section>
@endsection