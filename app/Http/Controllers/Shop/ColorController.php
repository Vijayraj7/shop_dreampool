<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Repositories\ColorRepository;

class ColorController extends Controller
{
    /**
     * Display the colors list.
     */
    public function index()
    {
        $shop = generaleSetting('shop');

        // Get colors
        $colors = $shop->colors()->paginate(20);

        return view('shop.color.index', compact('colors'));
    }

    /**
     * store a new color
     */
    public function store(ColorRequest $request)
    {
        ColorRepository::storeByRequest($request);

        return to_route('shop.color.index')->withSuccess(__('Color created successfully'));
    }
}
