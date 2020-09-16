<?php

namespace App\Http\Controllers\admincp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ReportController extends Controller
{
    public function index(){
    	$products = Product::all();
    	$title = trans('admincp.reports');
    	$value = $this->getAllProductsValue($products);
    	$count = $products->count();
    	$count_all = $this->getProductsCount($products);
    	return view('admincp.reports.index',compact('title','value','count','count_all'));
    }

    protected function getAllProductsValue($products){
    	$all = [];
    	foreach ($products as $product) {
    		$sum =  $product->new_price * $product->count;
    		array_push($all, $sum);
    	}
    	$value = array_sum($all);    
    	return $value;
    }
    protected function getProductsCount($products){
    	return $products->pluck('count')->sum();
    }	

}
