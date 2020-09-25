<?php

namespace App\Http\Controllers\admincp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Product;

class BrandController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        $title = trans('admincp.brands');
        return view('admincp.brands.index',compact('brands','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.brands.create',['title'=>trans('admincp.add_new_brand')]);        
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
            'description'=>'nullable|string',
            'keywords'=>'nullable|string',
            'image'=>'nullable|'.v_image(),
        ],[],[
            'name'=>trans('admincp.name'),
            'description'=>trans('admincp.description'),
            'keywords'=>trans('admincp.keywords'),
            'image'=>trans('admincp.image'),
            'image'=>trans('admincp.image'),
        ]);
        if(request()->hasFile('image')){
            $data['image'] = request()->file('image')->store('brands');
        }
        Brand::create($data);
        session()->flash('added',trans('admincp.record_added'));
        return redirect(aurl('brand'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::where('brand_id',$id)->paginate(5);
        $title = Brand::findOrFail($id)['name'];
        return view('admincp.products.index',compact('products','title'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $title = trans('admincp.edit_brand');
        return view('admincp.brands.edit',compact('brand','title')); 
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
            'description'=>'nullable|string',
            'keywords'=>'nullable|string',
            'image'=>'nullable|'.v_image(),
        ],[],[
            'name'=>trans('admincp.name'),
            'description'=>trans('admincp.description'),
            'keywords'=>trans('admincp.keywords'),
            'image'=>trans('admincp.image'),
            'image'=>trans('admincp.image'),
        ]);
        if(request()->hasFile('image')){
            $data['image'] = request()->file('image')->store('brands');
        }
        Brand::where('id', $id)->update($data);
        session()->flash('updated',trans('admincp.record_updated'));
        return redirect(aurl('brand'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);
        session()->flash('deleted',trans('admincp.deleted'));
        return redirect(aurl('brand'));          
    }
}
