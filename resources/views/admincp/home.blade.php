@extends('admincp.index')
@section('content')
<!-- BEGIN OVERVIEW STATISTIC BARS-->
<div class="row-fluid circle-state-overview">
    <div class="span2 responsive clearfix" data-tablet="span3" data-desktop="span2">
        <div class="circle-wrap">
            <div class="stats-circle turquoise-color">
                <i class="icon-group"></i>
            </div>
            <p>
                <strong>{{clients()->count()}}</strong>
                @lang('admincp.one_client')
            </p>
        </div>
    </div>
    <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
        <div class="circle-wrap">
            <div class="stats-circle red-color">
                <i class="icon-barcode"></i>
            </div>
            <p>
                <strong>{{available_product()->count()}}</strong>
                @lang('admincp.available_product')
            </p>
        </div>
    </div>
    <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
        <div class="circle-wrap">
            <div class="stats-circle green-color">
                <i class="icon-shopping-cart"></i>
            </div>
            <p>
                <strong>{{sale_operation()->count()}}</strong>
                @lang('admincp.sales_operation')
            </p>
        </div>
    </div>
    <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
        <div class="circle-wrap">
            <div class="stats-circle gray-color">
                <i class="icon-fire"></i>
            </div>
            <p>
                <strong>{{brands()->count()}}</strong>
                @lang('admincp.one_brand')
            </p>
        </div>
    </div>
    <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
        <div class="circle-wrap">
            <div class="stats-circle purple-color">
                <i class="icon-sitemap"></i>
            </div>
            <p>
                <strong>{{categories()->count()}}</strong>
                @lang('admincp.one_category')
            </p>
        </div>
    </div>
    <div class="span2 responsive" data-tablet="span3" data-desktop="span2">
        <div class="circle-wrap">
            <div class="stats-circle blue-color">
                <i class="icon-money"></i>
            </div>
            <p>
                <strong>{{invoices()->count()}}</strong>
                @lang('admincp.invoice')
            </p>
        </div>
    </div>
</div>
<!-- BEGIN BORDERED TABLE widget-->
<div class="widget">
    <div class="widget-title">
        <h4>@lang('admincp.latest_operations')</h4>
    </div>
    <div class="widget-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>@lang('admincp.operation_number')</th>
                    <th>@lang('admincp.operation_type')</th>
                    <th>@lang('admincp.product') / @lang('admincp.service')</th>
                    <th>@lang('admincp.count')</th>
                    <th>@lang('admincp.invoice_number')</th>
                    <th>@lang('admincp.operation_amount')</th>
                    <th>@lang('admincp.operation_date')</th>
                    <th>@lang('admincp.status')</th>
                </tr>
            </thead>
            <tbody>
                @foreach(operations(5) as $operation)
                <tr>
                    <td><a href="{{aurl('operation/'.$operation->id)}}">{{$operation->id}}</a></td>
                    <td>{{trans('admincp.'.$operation->type)}}</td>
                    <td><a href="{{aurl('product/'.$operation->product['id'])}}">{{$operation->product['name']}}</a></td>
                    <td>{{$operation->saled_count}}</td>
                    <td><a href="{{aurl('invoice/'.$operation->invoice_id)}}">{{$operation->invoice_id}}</a></td>
                    <td>{{$operation->total_price}}<span> @lang('admincp.currency')</span></td>
                    <td>{{$operation->created_at->format('Y/m/d')}}</td>
                    <td>{{trans('admincp.'.$operation->status)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <div class="row-fluid">
            <div class="span12">
                <a href="{{aurl('operation/sale')}}">
                    <button class="btn btn-large btn-primary"><i class="icon-plus icon-white"></i>
                    @lang('admincp.new_sale_operation')
                    </button>
                </a>
{{--                 <a href="{{aurl('operation/newService')}}">
                    <button class="btn btn-large btn-warning"><i class="icon-plus icon-retweet"></i>
                    @lang('admincp.add_new_service')
                    </button>
                </a>  --}}
                <a href="{{aurl('operation/retrieve')}}">
                    <button class="btn btn-large btn-danger"><i class="icon-plus icon-undo"></i>
                    @lang('admincp.retrieval')
                    </button>
                </a>                                   
            </div>
        </div>
    </div>
</div>
<!-- END BORDERED TABLE widget-->
<div class="square-state">
    <div class="row-fluid">
        <a class="icon-btn span2" href="{{aurl('client')}}">
            <i class="icon-group"></i>
            <div>@lang('admincp.clients')</div>
        </a>
        <a class="icon-btn span2" href="{{aurl('product')}}">
            <i class="icon-barcode"></i>
            <div>@lang('admincp.products')</div>
        </a>
        <a class="icon-btn span2" href="#">
            <i class="icon-bar-chart"></i>
            <div>@lang('admincp.reports')</div>
        </a>
        <a class="icon-btn span2" href="#">
            <i class="icon-glass"></i>
            <div>@lang('admincp.services')</div>
        </a>
        <a class="icon-btn span2" href="{{aurl('category')}}">
            <i class="icon-sitemap"></i>
            <div>@lang('admincp.categories')</div>
        </a>
        <a class="icon-btn span2" href="{{aurl('moderator')}}">
            <i class="icon-user"></i>
            <div>@lang('admincp.moderators_accounts')</div>
        </a>
    </div>
    <div class="row-fluid">
        <a class="icon-btn span2" href="{{aurl('brand')}}">
            <i class="icon-fire"></i>
            <div>@lang('admincp.brands')</div>
        </a>
        <a class="icon-btn span2" href="#">
            <i class="icon-bullhorn"></i>
            <div>@lang('admincp.notifications')</div>
        </a>
        <a class="icon-btn span2" href="#">
            <i class="icon-glass"></i>
            <div>@lang('admincp.do_services')</div>
        </a>
        <a class="icon-btn span2" href="{{aurl('invoice')}}">
            <i class="icon-money"></i>
            <div>@lang('admincp.invoices')</div>
        </a>
        <a class="icon-btn span2" href="{{aurl('operation/sale')}}">
            <i class="icon-thumbs-up"></i>
            <div>@lang('admincp.sales_operations')</div>
        </a>
        <a class="icon-btn span2" href="{{aurl('settings')}}">
            <i class="icon-wrench"></i>
            <div>@lang('admincp.settings')</div>
        </a>
    </div>
</div>
<!-- END SQUARE STATISTIC BLOCKS-->
<!-- BEGIN BORDERED TABLE widget-->
<div class="widget">
    <div class="widget-title">
        <h4>@lang('admincp.latest_products')</h4>
    </div>    
    <div class="widget-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>@lang('admincp.name')</th>
                    <th>@lang('admincp.category')</th>
                    <th>@lang('admincp.brand')</th>
                    <th>@lang('admincp.count')</th>
                    <th>@lang('admincp.sale_price')</th>
                </tr>
            </thead>
            <tbody>
                @foreach(get_latest_products(5) as $product)
                <tr>
                    <td><img src="{{asset(Storage::url($product->image))}}" class="image50" alt="{{$product->name}}"></td>
                    <td><a href="{{aurl('product/'.$product->id)}}">{{$product->name}}</a></td>
                    <td>{{$product->category['name']}}</td>
                    <td>{{$product->brand['name']}}</td>
                    <td>{{$product->count}}</td>
                    <td>{{$product->sale_price}} <span> {{trans('admincp.currency')}}</span> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END BORDERED TABLE widget-->
@endsection