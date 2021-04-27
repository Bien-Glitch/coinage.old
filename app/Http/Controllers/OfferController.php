<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('offers.index', compact('offers', $offers));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //     $client = new Client(); //GuzzleHttp\Client
        //     $url = "https://pro-api.coinmarketcap.com/v1/tools/price-conversion?CMC_PRO_API_KEY=7d6b76e1-df20-442a-80ac-04363db5747b";


        //     $response = $client->request('GET', $url, [
        //         'verify'  => false,
        //     ]);

        //     $responseBody = json_decode($response->getBody());
        //     dd($responseBody);
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'crypto_type' => ['required', 'string'],
            'percentage' => ['required', 'integer', 'min:-10', 'max:10'],
            'min_amount' => ['required', 'numeric'],
            'max_amount' => ['required', 'numeric'],
        ]);

        Offer::create([
            'user_id' => auth()->id(),
            'crypto_type' => $request->crypto_type,
            'percentage' => $request->percentage,
            'min_amount' => $request->min_amount,
            'max_amount' => $request->max_amount,
        ]);

        return redirect('/offers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
