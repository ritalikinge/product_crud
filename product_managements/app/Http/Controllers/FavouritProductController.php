<?php

namespace App\Http\Controllers;
use App\Models\FavouriteProductModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FavouritProductController extends Controller
{
    public function index(){
        $aData = array();
        $aData['All_Products'] = FavouriteProductModel::join('products','products.id','=','favourite_products.product_id')
                                ->select( 'favourite_products.product_id', 'products.product_name','products.image')
                                ->get();
        return view('favourite_product.list', $aData);
    }

    public function create(){
        $aData = array();
        $aData['aProducts'] = ProductModel::whereNotIn('id', DB::table('favourite_products')
                                ->pluck('product_id'))
                                ->get();
        return view('favourite_product.create', $aData);
    }

    public function store(Request $request){
        $this->validate($request,[
            'product' => 'required'
        ]);

        $product = new FavouriteProductModel();
        $product->product_id = $request->product;
        $product->created_at = strtotime("now");
        $product->save();
        return redirect()->route('favourite.list')->with('success', 'Favourite Product Added Successfully'); 
    }
}
