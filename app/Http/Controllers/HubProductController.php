<?php

namespace App\Http\Controllers;

use App\Models\HubProduct;
use Illuminate\Http\Request;

class HubProductController
{
    public function hubtv1()
{
    $hubProducts = HubProduct::all();
    return view('hubtv1', compact('hubProducts'));
}

}
