<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\Item;

class AuctionController extends Controller
{
    public function index(){
        return view('pages.auctions', [
            'title' => 'All Auctions',
            'auctions' => Auction::latest()->paginate(24),
        ]);
    }

    public function show(Auction $auction){
        $bids = Bid::where('auction_id',$auction->id)->get();
        
        return view('pages.auction', [
            'title' => $auction->item->name,
            'auction' => $auction,
            'bids' => $bids->sortByDesc('bid_amount'),
        ]);
    }

    public function store(Request $request, Auction $auction){
        $bids = Bid::where('auction_id',$auction->id)->get();
        if($bids->count()){
            $minBid = $auction->bid->max('bid_amount') + 1;
        }else{
            $minBid = $auction->item->start_price + 1;
        }

        $validated = $request->validate([
            'bid_amount' => 'required|numeric',
            'bid_amount' => ['required', 'numeric', 'min:'.$minBid],
        ]);

        Bid::create([
            'user_id' => Auth::user()->id,
            'auction_id' => $auction->id,
            'bid_amount' => $validated['bid_amount'],
            'result' => 'ongoing',
        ]);

        return redirect()->route('auction-show', $auction)
                        ->with('success' , 'Tawaran berhasil diajukan.');
    }

    public function search(Request $request) {
        if ($request->has('search')) {
            $items = Item::where('name', 'LIKE', '%'.$request->input('search').'%')->get();
            $items_id = $items->pluck('id')->toArray();
            $auctions = Auction::latest()->whereIn('item_id',$items_id)->paginate(24);
        }
        else {
            $auctions = Auction::latest()->paginate(24);
        }

        return view('pages.auctions',[
            'auctions' => $auctions,
            'title' => 'All Auctions',
        ]);
    }
}