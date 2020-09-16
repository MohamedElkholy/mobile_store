<?php

namespace App\Http\Controllers\admincp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(5);
        $title = trans('admincp.products');
        return view('admincp.products.index',compact('products','title'));
    }

    public function show_in_table(){
        $products = Product::orderBy('id','desc')->paginate(5);
        $title = trans('admincp.products');
        return view('admincp.products.show_in_table',compact('products','title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.products.create',['title'=>trans('admincp.add_new_product')]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate(request(),[
            'name'=>'required',
            'sale_price'=>'required|numeric',
            'original_price'=>'numeric|nullable',
            'description'=>'string|nullable|max:400',
            'keywords'=>'string|nullable|max:400',
            'count'=>'required|numeric',
            'discount'=>'numeric|nullable',
            'brand_id'=>'required|numeric',
            'category_id'=>'required|numeric',
            'image'=>'nullable|'.v_image().'|dimensions:ratio=1/1',
            ],[],[
                'name'=>trans('admincp.name'),
                'sale_price'=>trans('admincp.sale_price'),
                'original_price'=>trans('admincp.original_price'),
                'description'=>trans('admincp.description'),
                'keywords'=>trans('admincp.keywords'),
                'discount'=>trans('admincp.discount'),
                'image'=>trans('admincp.image'),
                'count'=>trans('admincp.count'),
                'brand_id'=>trans('admincp.brand'),
                'category_id'=>trans('admincp.category'),
            ]);
        if(request()->hasFile('image')){
            $data['image'] = request()->file('image')->store('public/products');
        }
        if (request()->has('discount') && request()->discount > 0) {
            if(request()->has('sale_price')){
                $data['new_price'] = p_after_d($data['sale_price'],$data['discount']);
            }else{
                $x = Product::where('id',$id)->findOrFail();
                $sale_price = $x->sale_price;
                $data['new_price'] = p_after_d($sale_price,$data['discount']);
            }
        }else{
            if(request()->has('sale_price')){
                $data['new_price'] = $data['sale_price'];
            }else{
                $x = Product::where('id',$id)->findOrFail();
                $sale_price = $x->sale_price;
                $data['new_price'] = $sale_price;
            }
        }        
        Product::create($data);
        session()->flash('added',trans('admincp.record_added'));
        return redirect()->back();    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $title = $product->name;
        return view('admincp.products.show',compact('product','title'));        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $title = trans('admincp.edit_product');
        return view('admincp.products.edit',compact('product','title')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate(request(),[
            'name'=>'required',
            'sale_price'=>'required|numeric',
            'original_price'=>'numeric|nullable',
            'description'=>'string|nullable|max:400',
            'keywords'=>'string|nullable|max:400',
            'count'=>'required|numeric',
            'discount'=>'numeric|nullable',
            'brand_id'=>'required|numeric',
            'category_id'=>'required|numeric',
            'image'=>'nullable|'.v_image().'|dimensions:ratio=1/1',
            'new_price'=>'nullable',
            ],[],[
                'name'=>trans('admincp.name'),
                'sale_price'=>trans('admincp.sale_price'),
                'original_price'=>trans('admincp.original_price'),
                'description'=>trans('admincp.description'),
                'keywords'=>trans('admincp.keywords'),
                'discount'=>trans('admincp.discount'),
                'image'=>trans('admincp.image'),
                'count'=>trans('admincp.count'),
                'brand_id'=>trans('admincp.brand'),
                'category_id'=>trans('admincp.category'),
                'new_price'=>trans('admincp.p_after_d'),
            ]);
        if(request()->hasFile('image')){
            $data['image'] = request()->file('image')->store('public/products');
        }
        if (request()->has('discount') && request()->discount > 0) {
            if(request()->has('sale_price')){
                $data['new_price'] = p_after_d($data['sale_price'],$data['discount']);
            }else{
                $x = Product::where('id',$id)->findOrFail();
                $sale_price = $x->sale_price;
                $data['new_price'] = p_after_d($sale_price,$data['discount']);
            }
        }else{
            if(request()->has('sale_price')){
                $data['new_price'] = $data['sale_price'];
            }else{
                $x = Product::where('id',$id)->findOrFail();
                $sale_price = $x->sale_price;
                $data['new_price'] = $sale_price;
            }
        }          
        Product::findOrFail($id)->update($data);
        session()->flash('updated',trans('admincp.record_updated'));
        return redirect(aurl('product')); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        session()->flash('deleted',trans('admincp.deleted'));
        return redirect(aurl('product')); 
    }

    public function search(Request $request){
        $txt = $request->search_text;
        $products = Product::Where('name','like','%'.$txt.'%')->orderBy('id','desc')->paginate(50);
        $title = trans('admincp.products');
        return view('admincp.products.search_result',compact('products','title'));
    }
}
