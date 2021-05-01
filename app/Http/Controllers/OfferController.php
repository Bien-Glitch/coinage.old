<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $offers = Offer::all()->where('user_id', Auth::id());
        return view('offers.index', compact('offers', $offers));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
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
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
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
     * @param Offer $offer
     * @return Application|Factory|View
     */
    public function show(Offer $offer)
    {
        return view('components.show-offer-modal', ['offer' => $offer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Offer $offer
     * @return Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Offer $offer
     * @return Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Offer $offer
     * @return Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
