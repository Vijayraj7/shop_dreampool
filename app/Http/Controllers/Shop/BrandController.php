<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Repositories\BrandRepository;

class BrandController extends Controller
{
    /**
     * Display a listing of the brands.
     */
    public function index()
    {
        $shop = generaleSetting('shop');

        // Get brands
        $brands = $shop->brands()->paginate(20);

        return view('shop.brand.index', compact('brands'));
    }
    /**
     * store a new brand
     */
    public function store(BrandRequest $request)
    {
        BrandRepository::storeByRequest($request);

        return to_route('shop.brand.index')->withSuccess(__('Brand created successfully'));
    }

}
