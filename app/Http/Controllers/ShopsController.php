<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Seller;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $shops = Shop::all();
        // $sellers = Seller::all();
        // return view('shops.index')->with('shops', $shops)->with('sellers', $sellers);
        $shops = Shop::join('sellers', 'shops.sellerId', '=', 'sellers.sellerId')
            ->select('shops.*', 'sellers.sellerName as sellerName')
            ->get();
        return view('shops.index')->with('shops', $shops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellers = Seller::all();
        return view('shops.createShop')->with('sellers', $sellers);
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
            'shopName' => 'required',
            'shopAddress' => 'required',
            'shopContact' => 'required',
        ]);

        Shop::create($request->all());
        return redirect()->route('shops.index')->with('success', 'Shop Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        $sellers = Seller::all();
        $sellerName = Seller::where('sellerId', $shop->sellerId)->get();
        return view('shops.editShop', compact('shop'))->with('sellers', $sellers)->with('sellerName', $sellerName);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $request->validate([]);
        $shop->update($request->all());
        return redirect()->route('shops.index')->with('success', 'Shop Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();
        return redirect()->route('shops.index')->with('success', 'Shop Deleted Successfully!');
    }
}
