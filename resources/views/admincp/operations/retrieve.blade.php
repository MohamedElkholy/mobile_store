@extends('admincp.index')
@section('content')
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-body">
        <div class="row-fluid">
          {!! Form::open(['route'=>'operation_search']) !!}
          {!! Form::number('invoice_number','', ['class'=>'span2','style'=>'height:40px', 'placeholder'=>trans('admincp.invoice_number'),'onkeyup'=>'operation_search()','id'=>'invoice_number']) !!}          
{{--           {!! Form::text('product_name','', ['class'=>'span3','style'=>'height:40px', 'placeholder'=>trans('admincp.product_name'),'onkeyup'=>'operation_search()','id'=>'product_name']) !!}
          {!! Form::text('client_name','', ['class'=>'span3','style'=>'height:40px', 'placeholder'=>trans('admincp.client_name'),'onkeyup'=>'operation_search()','id'=>'client_name']) !!}
          {!! Form::text('invoice_date','', ['class'=>'span3','style'=>'height:40px', 'placeholder'=>trans('admincp.invoice_date'),'onkeyup'=>'operation_search()','id'=>'invoice_date']) !!}       --}}    
          {!! Form::close() !!}
        </div>        
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>@lang('admincp.product_name_or_servie_type')</th>
              <th>@lang('admincp.count')</th>
              <th>@lang('admincp.invoice_number')</th>
              <th>@lang('admincp.client_name')</th>
              <th>@lang('admincp.operation_amount')</th>
              <th>@lang('admincp.invoice_date')</th>
              <th>@lang('admincp.retrieval')</th>
            </tr>
          </thead>
          <tbody id="search-table">
            @foreach($operations as $operation)
            <tr>
              <td>
                @if($operation->product !=null)
                  <a href="{{aurl('product/'.$operation->product['id'])}}">{{$operation->product['name']}}</a>
                @else()
                 {{$operation->service_type}}                 
                @endif
              </td>
              <td>{{$operation->saled_count}}</td>
              <td><a href="{{aurl('invoice/'.$operation->invoice_id)}}">{{$operation->invoice_id}}</a></td>
              <td>{{$operation->invoice['client']['name']}}</td>
              <td>{{$operation->total_price}}</td>
              <td>{{$operation->created_at->format('Y/m/d')}}</td>
              <td><button class="btn btn-primary">@lang('admincp.retrieval')</button></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="pagination pagination-centered">
        {{$operations->links()}}
      </div>
    </div>
    <!-- END BORDERED TABLE widget-->
  </div>
</div>
@endsection
@push('js')
<script type="text/javascript" >
  function operation_search(){
    var product_name = $('#product_name').val();
    var client_name = $('#client_name').val();
    var invoice_date = $('#invoice_date').val();
    var invoice_number = $('#invoice_number').val();
    $.ajax({
      type:'get',
      url:'{{route('operation_search')}}',
      data:{
        'product_name': product_name,
        'client_name': client_name,
        'invoice_date': invoice_date,
        'invoice_number': invoice_number
      },
      success:function(result){
        var mydata = JSON.parse(result);
        // I'll come here again to complete this function
        $("#search-table").html(mydata.html);
      }
    });
  }   
</script>
@endpush