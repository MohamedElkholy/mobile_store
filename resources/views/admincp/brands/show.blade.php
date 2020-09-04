@extends('admincp.index')
@section('content')
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
  <div class="span9">
    @foreach($products as $product)
    <div class="well dash-box">
      <div class="row-fluid blog">
        <div class="span4">
          <img src="{{asset(Storage::url($product->image))}}" alt="">
        </div>
        <div class="span8">
          <div class="date" style="display:inline-block;">
            @if($product->count > 0 )
            <p class="month">@lang('admincp.we_have')</p>
            <p class="day">{{$product->count}}</p>
            @else
            <p class="month">@lang('admincp.we_dont_have')</p>
            <p class="day">@lang('admincp.we_have')</p>
            @endif
          </div>
          <div class="date" style="display: inline-block; float: left;">
            @if($product->discount > 0 )
            <p class="month">@lang('admincp.discount')</p>
            <p class="day">{{$product->discount}} %</p>
            @else
            <p class="month"></p>
            <p class="day"></p>
            @endif
          </div>
          
          <h2>
          <a href="blog_details.html">{{$product->name}}</a>
          </h2>
          <p style="min-height: 110px;font-family: cairo regular">
            {{$product->description}}
          </p>
          <ul>
            <li>
              <i class="icon-sitemap" style="width: 40px;"> </i><span> {{$product->category['name']}}</span>
            </li>
            <li><i class="icon-fire"> </i><span> {{$product->brand['name']}}</span></li>
          </ul>
          <a class="btn btn-info" style="float: left;">@lang('admincp.price_after_discount') &nbsp
            <span>{{p_after_d($product->sale_price,$product->discount)}}</span>&nbsp @lang('admincp.currency')
          </a>
        </div>
      </div>
    </div>
    @endforeach
    <div class="pagination pagination-centered">
      {{$products->links()}}
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
      <h2>popular tags</h2>
      <ul class="unstyled tag">
        <li><a href="#">Admin Panel</a></li>
        <li><a href="#"> Dashboard Theme</a></li>
        <li><a href="#"> Admin</a></li>
        <li><a href="#"> Control Panel</a></li>
        <li><a href="#"> UI</a></li>
        <li><a href="#"> Web Design</a></li>
        <li><a href="#"> UIX</a></li>
        <li><a href="#"> Blog</a></li>
      </ul>
      <hr>
      <h2>ARCHIVES</h2>
      <ul class="unstyled">
        <li><a href="#"><i class="icon-chevron-left"></i> January 2013</a></li>
        <li><a href="#"><i class="icon-chevron-left"></i> February 2013 </a></li>
        <li><a href="#"><i class="icon-chevron-left"></i> March 2013</a></li>
        <li><a href="#"><i class="icon-chevron-left"></i> April 2013</a></li>
        <li><a href="#"><i class="icon-chevron-left"></i> May 2013</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- END PAGE CONTENT-->
@endsection