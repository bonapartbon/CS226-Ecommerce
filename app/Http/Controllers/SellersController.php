<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Shop;

class SellersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::all();
        return view('sellers.index')->with('sellers', $sellers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sellers.createSeller');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sellerName' => 'required',
            'sellerEmail' => 'required',
            'sellerContact' => 'required',
        ]);

        Seller::create($request->all());
        return redirect()->route('sellers.index')->with('success', 'Seller Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        $shopOfSellers = Seller::join('shops', 'sellers.sellerId', '=', 'shops.sellerId')
            ->select('sellers.*', 'shops.*')
            ->get();

        return view('sellers.sellerDetail', compact('seller'))->with('shopOfSellers', $shopOfSellers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        return view('sellers.editSeller', compact('seller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seller $seller)
    {
        $request->validate([]);
        $seller->update($request->all());
        return redirect()->route('sellers.index')->with('success', 'Seller Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        $seller->delete();
        return redirect()->route('sellers.index')->with('success', 'Seller Deleted Successfully!');
    }
}
