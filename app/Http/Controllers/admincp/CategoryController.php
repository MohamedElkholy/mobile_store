<?php

namespace App\Http\Controllers\admincp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $title = trans('admincp.categories');
        return view('admincp.categories.index',compact('categories','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.categories.create',['title'=>trans('admincp.add_new_category')]);        
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
        ]);
        if(request()->hasFile('image')){
            $data['image'] = request()->file('image')->store('public/categories');
        }
        Category::create($data);
        session()->flash('added',trans('admincp.record_added'));
        return redirect(aurl('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::where('category_id',$id)->paginate(5);
        $title = Category::findOrFail($id)['name'];
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
        $category = Category::findOrFail($id);
        $title = trans('admincp.edit_category');
        return view('admincp.categories.edit',compact('category','title')); 
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
        ]);
        if(request()->hasFile('image')){
            $data['image'] = request()->file('image')->store('public/categories');
        }
        Category::where('id', $id)->update($data);
        session()->flash('updated',trans('admincp.record_updated'));
        return redirect(aurl('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        session()->flash('deleted',trans('admincp.deleted'));
        return redirect(aurl('category'));    
    }
}
