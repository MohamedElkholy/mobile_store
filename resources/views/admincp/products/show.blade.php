@extends('admincp.index')
@section('content')
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
  <div class="span9">
    <div class="widget">
      <div class="widget-body">
        <div class="row-fluid blog">
          <div class="span12">
            <h2>
            {{$product->name}}
            </h2>
            <hr>
            <div class="row-fluid">
              <div class="span6">
                <img src="{{asset(Storage::url($product->image))}}" alt="@lang('admincp.product_image')">
              </div>
              <div class="span6 product-details">
                <ul class="row-fluid ">
                  <li>@lang('admincp.created_at_date')</li>
                  <li>{{$product->created_at}}</li>
                </ul>
                <ul class="row-fluid">
                  <li>@lang('admincp.updated_at_date')</li>
                  <li>{{$product->updated_at}}</li>
                </ul>
                <ul class="row-fluid">
                  <li>@lang('admincp.category') : </li>
                  <li>{{$product->category['name']}}</li>
                </ul>
                <ul class="row-fluid">
                  <li>@lang('admincp.brand') : </li>
                  <li>{{$product->brand['name']}}</li>
                </ul>
                <ul class="row-fluid">
                  <li>@lang('admincp.original_price') : </li>
                  <li>{{$product->original_price}} @lang('admincp.currency')</li>
                </ul>
                <ul class="row-fluid">
                  <li>@lang('admincp.sale_price') : </li>
                  <li>{{$product->sale_price}}  @lang('admincp.currency')</li>
                </ul>
                <ul class="row-fluid">
                  <li>@lang('admincp.discount') : </li>
                  <li>{{$product->discount}} %</li>
                </ul>
                <ul class="row-fluid">
                  <li>@lang('admincp.price_after_discount') : </li>
                  <li>{{p_after_d($product->sale_price,$product->discount)}} @lang('admincp.currency')</li>
                </ul>
                <ul class="row-fluid">
                  <li>@lang('admincp.count_available') : </li>
                  <li>{{$product->count}}</li>
                </ul>
                <ul class="row-fluid">
                  <li>@lang('admincp.saled_count') : </li>
                  <li>{{$product->saled_count}}</li>
                </ul>
              </div>
            </div>
            <hr>
            <div class="row-fluid">
              <div class="span12" style="font-family: cairo regular; height: 100%">
                <blockquote>
                  <p>{{$product->description}}</p>
                </blockquote>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span6 ">
              </div>
            </div>
{{--             <hr>
            <!--begin post comments-->
            <div class="post-comment">
              <h3>@lang('admincp.notes')</h3>
              
              {!!Form::open(['url' =>'']) !!}
              <div class="control-group">
                {{Form::textarea('note',old('note'),['class'=>'span10','rows'=>'4'])}}
              </div>
              {!!Form::button(trans('admincp.add'),['class'=>'btn btn-inverse'])!!}
              {!!Form::close()!!}
            </div>
            <!--end post comments--> --}}
            <br>
            <div class="row-fluid">
              <div class="span3">
            <a href="{{aurl('product/'.$product->id.'/edit')}}" class="btn btn-inverse"><i class="icon-pencil icon-white"></i> @lang('admincp.edit')</a>
              </div>
              <div class="span3">
            {!!Form::open(['route'=>['product.destroy',$product->id],'method'=>'delete'])!!}
            {{Form::button('<i class="icon-trash"></i> '.trans('admincp.delete'),['type'=>'submit','class'=>'btn btn-danger','style'=>'display:block;'])}}
            {!!Form::close()!!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="span3">
    <div class="blog-side-bar">
      <h2>@lang('admincp.categories')</h2>
      <ul class="unstyled">
        @foreach( some_categories() as $category)
        <li><a href="{{aurl('category/'.$category->id)}}"><i class="icon-chevron-left"></i>{{$category->name}}</a></li>
        @endforeach
      </ul>
      <hr>
      <h2>@lang('admincp.brands')</h2>
      <ul class="unstyled">
        @foreach( some_brands() as $brand)
        <li><a href="{{aurl('brand/'.$brand->id)}}"><i class="icon-chevron-left"></i>{{$brand->name}}</a></li>
        @endforeach
      </ul>
      <hr>
      <h2>@lang('admincp.latest_products')</h2>
      <div class="space15"></div>
      @foreach(get_latest_products(5) as $product)
      <div class="row-fluid">
        <div class="span3">
          <img src="{{asset(Storage::url($product->image))}}" alt="">
        </div>
        <div class="span9">
          <h5>
          <a href="{{aurl('product/'.$product->id)}}">{{$product->name}}</a>
          </h5>
        </div>
      </div>
      <div class="space10"></div>
      @endforeach
      <hr>
      {{--       <h2>@lang('admincp.keywords')</h2>
      <ul class="unstyled tag">
        @foreach(most_popular_keywords(10) as $keyword)
        <li><a href="#">$keyword->name</a></li>
        @endforeach
      </ul>
      <hr> --}}
      {{--       <h2>ARCHIVES</h2>
      <ul class="unstyled">
        <li><a href="#"><i class="icon-chevron-left"></i> January 2013</a></li>
        <li><a href="#"><i class="icon-chevron-left"></i> February 2013 </a></li>
        <li><a href="#"><i class="icon-chevron-left"></i> March 2013</a></li>
        <li><a href="#"><i class="icon-chevron-left"></i> April 2013</a></li>
        <li><a href="#"><i class="icon-chevron-left"></i> May 2013</a></li>
      </ul> --}}
    </div>
  </div>
</div>
<!-- END PAGE CONTENT-->
@endsection