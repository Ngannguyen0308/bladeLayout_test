<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Products;
use App\Models\ProductType;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $new_product = Products::where('new',1)->paginate(8);
        $top_product = Products::where('promotion_price','<>',0)->orderBy('promotion_price')->paginate(4);
        return view('page.trangchu', compact('slide','new_product', 'top_product'));
    }

    public function getLoaiSp($type){

        $types = ProductType::all();
        $type_name = ProductType::where('id',$type)->first();
        $type_product = Products::all();
        $product_filter = Products::where('id_type',$type)->limit(3)->get();
        $sug = Products::where('id_type', '<>', $type)->limit(3)->get();
        return view('page.loai_sanpham', compact( 'type_name','types','type_product', 'product_filter', 'sug'));
    }
    public function getDetail(){
        return view('page.chitiet_sanpham');
    }
    public function getContact(){
        return view('page.lienhe');
    }
    public function getAbout(){
        return view('page.about');
    }
}
