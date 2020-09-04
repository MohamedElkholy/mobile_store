<?php

if(!function_exists('aurl')){

    function aurl($url=null){
        return  url('admincp/'.$url);
    }
}


if(!function_exists('moderatorAuth')){

    function moderatorAuth(){
        return  auth()->guard('moderator');
    }
}

if(!function_exists('settings')){

    function settings(){
        return App\Settings::orderBy('id','desc')->firstOrFail();
    }
}

if(!function_exists('moderators')){

    function moderators($count = null){
        if ($count ===null) {
        return  App\Moderator::all();
        }else{
        return  App\Moderator::take($count)->get();
        }
    }
}

if(!function_exists('clients')){

    function clients($count = null){
        if ($count ===null) {
        return  App\Client::all();
        }else{
        return  App\Client::take($count)->get();
        }
    }
}

if(!function_exists('invoices')){

    function invoices($count = null){
        if ($count ===null) {
        return  App\Invoice::all();
        }else{
        return  App\Invoice::take($count)->get();
        }
    }
}

if(!function_exists('sale_operation')){

    function sale_operation($count = null){
        if ($count ===null) {
        return  App\Operation::where('type','sale')->get();
        }else{
        return  App\Operation::where('type','sale')->take($count)->get();
        }
    }
}

if(!function_exists('operations')){

    function operations($count = null){
        if ($count ===null) {
        return  App\Operation::orderBy('id','desc')->get();
        }else{
        return  App\Operation::orderBy('id','desc')->take($count)->get();
        }
    }
}

if(!function_exists('v_image')){

    function v_image($ext=null){
        if($ext === null){
            return 'image|mimes:jpg,jpeg,bmp,gif,png|max:5000';
        }else{
            return 'image|mimes:'.$ext;
        }
    }
}

if(!function_exists('dataTableLang')){

    function dataTableLang(){
        $langJson=[
            'sProcessing'       =>trans('admincp.sProcessing'),
            'sLengthMenu'       =>trans('admincp.sLengthMenu'),
            'sZeroRecords'      =>trans('admincp.sZeroRecords'),
            'sEmptyTable'       =>trans('admincp.sEmptyTable'),
            'sInfo'             =>trans('admincp.sInfo'),
            'sInfoEmpty'        =>trans('admincp.sInfoEmpty'),
            'sSearch'           =>trans('admincp.sSearch'),
            'sInfoFiltered'     =>trans('admincp.sInfoFiltered'),
            'sInfoPostFix'      =>trans('admincp.sInfoPostFix'),
            'sUrl'              =>trans('admincp.sUrl'),
            'sInfoThousands'    =>trans('admincp.sInfoThousands'),
            'sLoadingRecords'   =>trans('admincp.sLoadingRecords'),
            'sUrl'              =>trans('admincp.sUrl'),
            'oPaginate'=>[
                'sFirst'        =>trans('admincp.sFirst'),
                'sLast'         =>trans('admincp.sLast'),
                'sNext'         =>trans('admincp.sNext'),
                'sPrevious'     =>trans('admincp.sPrevious'),

            ],
            'oAria'=>[
                'sSortAscending'=>trans('admincp.sSortAscending'),
                'sSortDescending'=>trans('admincp.sSortDescending'),
            ]

        ];
        return $langJson;  
    }
}

if(!function_exists('active_menu')){

    function active_menu($link){
        if(preg_match('/'.$link.'/i', request()->segment(2))){
            return 'active';
        }else{  
            return '';
        }
    }
}

if(!function_exists('upload_image')){

    function upload_image($data=[]){
        if(request()->hasFile($data['file']) && $data['upload_type']='single'){
            return  request()->file($data['file'])->store($data['path']);
        }
    }
}

if(!function_exists('categories')){

    function categories($id=null){
        if($id ===null){
            return App\Category::pluck('name','id');
        }else{
            $category = App\Category::where('id',$id)->first();
            return $category->name;
        }
    }
}

if(!function_exists('brands')){

    function brands($id=null){
        if($id ===null){
          return App\Brand::pluck('name','id');
        }else{
            $brand =App\Brand::where('id',$id)->first();
            return $brand->name;
        }
    }
}

if(!function_exists('some_categories')){

    function some_categories($count=5){
          return App\Category::take($count)->get();
        }
}

if(!function_exists('some_brands')){

    function some_brands($count=5){
          return App\Brand::take($count)->get();
        }
}

if(!function_exists('p_after_d')){

    function p_after_d($price,$discount){
          return $price - ($price * $discount / 100);
        }
}

if(!function_exists('get_latest_products')){

    function get_latest_products($count=5){
        return App\Product::orderBy('id','desc')->take($count)->get();
    }
}

if(!function_exists('available_product')){

    function available_product(){
        return App\Product::where('count','>',0)->get();
    }
}

if(!function_exists('get_image_url')){

    function get_image_url($url){
        return asset(Storage::url($url));
    }
}
if(!function_exists('get_image_50')){

    function get_image_50($url){
        return '<img src="'.asset(Storage::url($url)).'" style="height:50px;width:50px;"/>';
    }
}
// if(!function_exists('most_popular_keywords')){

//     function most_popular_keywords($count=5){
//         $products_keywords =  App\Product::select('keywords')->get();
        
//     }
// }