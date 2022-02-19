<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Seller;

class DashboardController extends Controller
{
    public function index()
    {
        $sellers = Seller::all();
        $shops = Shop::all();
        return view('dashboard')->with('sellers', $sellers)->with('shops', $shops);
    }
}
