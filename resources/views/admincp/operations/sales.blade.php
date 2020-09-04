@extends('admincp.index')
@section('content')

<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-title">
       <h4>@lang('admincp.choose_products')</h4>
      </div>
      <div class="widget-body">
        <div class="row-fluid">
          <input type="text" class="span4" style="height: 40px;" name="searchByName" id="searchByName" placeholder="@lang('admincp.search_by_name_id_code')"/>
        </div>
          <table class="table table-striped table-bordered table-hover">
            <thead id="tthead" class="">
              <th>@lang('admincp.image')</th>
              <th>@lang('admincp.id')</th>
              <th>@lang('admincp.product_code')</th>
              <th>@lang('admincp.product_name')</th>
              <th>@lang('admincp.count_available')</th>
              <th>@lang('admincp.add')</th>
            </thead>
            <tbody id="search-table">
            </tbody>
              <tr><td colspan="7" id="nodata" class=""> @lang('admincp.no_data_to_view')</td></tr>
          </table>
      </div>
      <!-- END BORDERED TABLE widget-->
    </div>
  </div>
</div>
{!!Form::open(['url'=>aurl('operation/sale/do'),'method'=>'post'])!!}
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-title">
       <h4>@lang('admincp.choosen_products')</h4>
      </div>
      <div class="widget-body">
          <table class="table table-striped table-bordered table-hover">
            <thead id="fthead" class="">
              <th style="width: 6%">#</th>
              <th style="width: 35%">@lang('admincp.product_name')</th>
              <th style="width: 20%">@lang('admincp.price')</th>
              <th style="width: 15%">@lang('admincp.count_to_sale')</th>
              <th style="width: 15%">@lang('admincp.total')</th>
            </thead>
            <tbody id="select-table">
            </tbody>
              <tr>
                <td colspan="7" id="fnodata" class=""> @lang('admincp.no_data_to_view')</td>
              </tr>
          </table>
          <br>
          <div class="btn btn-primary btn-large" onclick="addservice()">@lang('admincp.add_service')</div>
      
      </div>
      <!-- END BORDERED TABLE widget-->
    </div>
  </div>
</div>

<!-- table  -->

<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-title">
       <h4>@lang('admincp.client_info') (@lang('admincp.optional'))</h4>
      </div>
      <div class="widget-body">
        <div class="row-fluid">
          <div class="form-control span4">
            {!!Form::label('client_name',trans('admincp.client_name'))!!}
            {{Form::text('client_name','',['class'=>'input-large','style'=>'height:30px;','id'=>'client_name'])}}
          </div>
          <div class="form-control span3">
            {!!Form::label('client_phone',trans('admincp.client_phone_number'))!!}
            {{Form::text('client_phone','',['class'=>'input-large','style'=>'height:30px;','id'=>'client_phone'])}}
          </div>          
          <div class="form-control span3">
            {!!Form::label('client_address',trans('admincp.address'))!!}
            {{Form::text('client_address','',['class'=>'input-large','style'=>'height:30px;','id'=>'client_address'])}}
          </div>
        </div>
      </div>
      <!-- END BORDERED TABLE widget-->
    </div>
  </div>
</div>
<div class="row-fluid">
  <div class="span12">
    <!-- BEGIN BORDERED TABLE widget-->
    <div class="widget">
      <div class="widget-body">
        <div class="row-fluid">
            <button type="button" class="btn btn-danger btn-large" style="margin-left: 15px" onclick="delete_all_selected()">  
              <i class="icon-trash"> </i>@lang('admincp.reset')
            </button>
            {!!Form::submit(trans('admincp.generate_invoice'),['class'=>'btn btn-primary btn-large'])!!}
        </div>
      </div>
      <!-- END BORDERED TABLE widget-->
    </div>
  </div>
</div>
<?php
$add_service_info = trans('admincp.add_service_info');
?>
{!!Form::close()!!}
  @push('js')
<script type="text/javascript" >
  $("#searchByName").on('keyup',function(){
    var str = $(this).val();
    if(str == ""){
      $("#search-table").empty();
      $("#nodata").removeClass("hidden");
    }else{
    $.ajax({
      type: 'get',
      url:"{{aurl('search')}}",
      data:{'name' : str},
      success:function(result){
        var mydata = JSON.parse(result);
          $("#nodata").addClass("hidden");
          $("#search-table").text("");
          $("#search-table").html(mydata.html);
          if(mydata.nodata === true){
          $("#nodata").removeClass("hidden");
          }
      }
    });
    }
  });

   function selected(selectedid,product_count){
    if (product_count > 0){
    $(document).ready(function(){
    var selected_count = $("#select-table").children().length;
    $.ajax({
      type: 'get',
      url:"{{aurl('select')}}",
      data:{'selected' : selectedid, 'selected_count' : selected_count},
      success:function(result){
        var mydata = JSON.parse(result);
          $(mydata.html).appendTo("#select-table");
      }
    });
    if($("#select-table").children.length > 0){
      $("#fnodata").addClass("hidden");
    }
    $("#search-table").empty();
    });
  }
  }

  function delete_selected(i){
    var x = "#selected" + i;
    $("tr").remove(x);
    // i'll come here again to resort the selected tr id after delete one of them
    // var selected_count = document.getElementById("select-table").childElementCount;
    // if(selected_count> 0){
    //   $("#select-table").
    // }
  }

  function delete_all_selected(){
    $("#select-table").empty();
    $("#select-serv-table").empty();
    $("#client_phone").val('');
    $("#client_name").val('');
    $("#client_address").val('');
    $("#service_price").val('');
    $("#service_type").val('');
    $("#service_description").val('');
  }

</script>
<script type="text/javascript">
function change_total_by_count(count,i){
  $(document).ready(function(){
  var unit_price = $("#final_price"+(i)).val();
  $("#total"+(i)).val(unit_price * count);
});
}
function change_total_by_price(price,i){
  $(document).ready(function(){
  var count = $("#count_to_sale"+(i)).val();
  $("#total"+(i)).val(price * count);
});
}

function addservice() {
  var i = $("#select-table").children().length + 1;
  var service_data =  "<tr><td>"+i+"</td><td>"+
                      "<input type='hidden' name='i"+i+"' value='"+i+"'/>"+
                      // new line to determine the type of product or service
                      "<input type='hidden' name='type"+i+"' value='service'/>"+
                      "<input type='text' name='service_type"+i+"'/></td><td> <div class='input-prepend'>"+
                      "<input class='input-mini text-center'  type='text'"+
                      " name='service_price"+i+"' id='service_price' onkeyup='change_service_total_price(this.value,"+i+")' />"+
                      "<span class='add-on'>ج.م</span>"+
                      "</div></td><td></td><td> <div class='input-prepend'>"+
                      "<input class='input-mini text-center'  type='text'"+
                      " name='service_final_price"+i+"' id='service_final_price"+i+"' disabled>"+
                      "<span class='add-on'>ج.م</span>"+
                      "</div></td></tr>";
  $(service_data).appendTo("#select-table");
  $("#fnodata").addClass("hidden");

}
function change_service_total_price(price,i){
  $("#service_final_price"+(i)).val(price);
}      

</script>
@endpush
@endsection