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

   function selected(selectedid){
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
