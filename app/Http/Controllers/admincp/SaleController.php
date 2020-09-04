<?php

namespace App\Http\Controllers\admincp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Operation;
use App\Invoice;
use App\Client;
class SaleController extends Controller
{
    public function sale(){
    	$Products = Product::all();
    	$title = trans('admincp.sales_operations');
    	return view('admincp.operations.sales',compact('Products','title'));
    }



    public function search(){
    	$Products;
    	$result = "";
    	// search by product name
    	if(request()->name){
	    	$txt = request()->name;
	    	$Products = Product::where('name','like','%'.$txt.'%')
	    	->orWhere('code','like','%'.$txt.'%')
	    	->orWhere('id','like','%'.$txt.'%')
	    	->get();
	    	if($Products->count() > 0){
	    		$nodata = false;
	    		foreach ($Products as $product) {
		    		$result .= 
			    		"<tr>".
			    			"<td>". get_image_50($product->image) ."</td>".
			    			"<td>".$product->id."</td>".
			    			"<td>".$product->code."</td>".
			    			"<td><a target='_blank' href='".aurl('product/'.$product->id)."'>".$product->name."</a></td>".
			    			"<td>".$product->count."</td>".
			    			"<td><button class='btn btn-primary' onclick='selected(".
			    				$product->id.",".$product->count .")'><i class='icon-plus'></i></button></td>".
			    		"</tr>";
	    		}
	    	}else{
	    		$nodata = true;
	    	}
    	// send search result by json to sales.blade.php again
    	$result_array = ['html'=>$result,'nodata'=>$nodata];
    	$output = json_encode($result_array);
    	return $output;
    	}
    	
    }



    /* 	when moderator click on the add button 
    	to select one of search result 
    	this function will call to put the selected product
    	in the first table
    */
    public function select(){
    		$i = request()->selected_count + 1;
    		$selected = request()->selected;
    		$product = Product::where('id',$selected)->first();
    		if($product->discount > 0){
    			$price = $product->new_price;
    		}else{
    			$price = $product->sale_price;
    		}
    		$result = 
    		"<tr id='selected".$i."'>".
    			"<td>".$i ."</td>".
    			"<input type='hidden' name='i".$i."' value='".$i."'/>".
    			"<input type='hidden' name='type".$i."' value='product'/>".
    			"<input type='hidden' name='product_id".$i."' value='".$product->id."'/>".
			    "<td><a target='_blank' href='".aurl('product/'.$product->id)."'>".$product->name."</a></td>".
    			"<td>
					<div class='controls'>
	                     <div class='input-prepend'>
	                        <input class='input-mini text-center' type='text' id='final_price".$i."' value='".$price
	                        ."' name='final_price".$i."' onkeyup='change_total_by_price(this.value,".$i.")' />
	                        <span class='add-on'>".trans('admincp.LE')."</span>
	                     </div>
	                 </div>    			
    			</td>".
    			"<td><input class='input-mini text-center' type='text' value='1' id='count_to_sale".$i."'  name='count_to_sale".$i."'
    			onkeyup='change_total_by_count(this.value,".$i.")' /></td>".
    			"<td>
					<div class='controls'>
	                     <div class='input-prepend'>
	                        <input class='input-mini text-center' type='text' id='total".$i."' value='".$price
	                        ."' name='total".$i."' disabled />
	                        <span class='add-on'>".trans('admincp.LE')."</span>
	                     </div>
	                 </div>   
    			</td>".
    			// "<td><button class='btn btn-danger' onclick='delete_selected(this.id)' id='".$i."'><i class='icon-trash'></i></button</td>".
    		"</tr>";
    		$result_array =['html'=>$result];
	    	$output = json_encode($result_array);
	    	return $output;  
    }

    public function dosale(){

		// if the request dont has products redirect back with alert
    	$i = 1;
    	if(!request()->has("i". $i)){
			session()->flash('alert',trans('admincp.selected_product_required'));
			return redirect()->back();
		}else{

    	//validate the request 
    	$data = $this->validate(request(),[
    		'client_name'=>'nullable|string',
    		'client_phone'=>'nullable|regex:([0-9]+)|size:11',
    		'client_address'=>'nullable|string',
    	],[],[
    		'client_name'=>trans('admincp.client_name'),
    		'client_phone'=>trans('admincp.client_phone_number'),
    		'client_address'=>trans('admincp.client_address'),
    	]);

    	// part of title
    	$title = trans('admincp.complete_sale_operation');


    	// part of client 
    	$client;
    	if(!empty(request()->client_name) || !empty(request()->client_phone) ){
    			$client = Client::where('phone_number',request()->client_phone)->first();
    			if(empty($client)){
		    		$client = new Client;
		    		$client->name = request()->client_name;
			    	$client->phone_number = request()->client_phone;
			    	request()->has('client_address') ? $client->address = request()->client_address : '';
					$client->save();
					session()->flash('client_addedd',trans('admincp.client_addedd_successfully'));			    	
    			}elseif (!empty(request()->client_address)) {
	    			$client->address = request()->client_address;
					session()->flash('client_address_updated',trans('admincp.client_address_updated_successfully'));
					$client->save();					
    			}
    		}
    	


    	// part of products
    	$products = [];
    	$operations = [];
    	$total_amount = 0;
    	$deserved_amount = 0;

    		// what will done if the request has products
			while (request()->has("i". $i)){
				if (request("type".$i) === "product"){
				// get product one by one
				$product_id = "product_id". $i;
				$product_id = request()->$product_id;
				$product = Product::where('id',$product_id)->firstOrFail();

				// add another variables to product object
				$count_to_sale = "count_to_sale".$i; 
				$product->saled_count = request()->$count_to_sale;
				$product->i = $i;
				$final_price = "final_price".$i;
				$product->final_price = request()->$final_price;

				// push the product object to products array
				array_push($products, $product);
				//create operation
				$operation = new Operation;
				$operation->type = "sale";
				$operation->product_id = $product->id;
				$operation->moderator_id = moderatorAuth()->user()->id;
				$operation->original_price = $product->original_price;
				$operation->sale_price = $product->sale_price;
				$operation->new_price = $product->final_price;
				$operation->discount = 100 - ($product->final_price / $product->sale_price * 100);
				$operation->saled_count = $product->saled_count;
				$operation->total_price = $operation->new_price * $operation->saled_count;
				$operation->status = 'waiting';
				
				// save operation
				$operation->save();
				session()->flash('operation_added',trans('admincp.operation_created_successfully'));
				
				// pass this operation amount to totall vairable
				$total_amount += $operation->sale_price * $operation->saled_count;
				$deserved_amount += $operation->new_price * $operation->saled_count;
				
				// push the operation object to operations array
				array_push($operations, $operation);				
				
				}elseif (request("type".$i) === "service") {
					if (empty(request("service_type" .$i)) || empty(request("service_price" .$i))) {
						return redirect()->back();
					}else{
				//create operation
				$operation = new Operation;
				$operation->type = "sale";
				$operation->service_type = request("service_type" .$i);
				$operation->moderator_id = moderatorAuth()->user()->id;
				$operation->sale_price = request("service_price" .$i);
				$operation->new_price = request("service_price" .$i);
				$operation->total_price = request("service_price" .$i);
				$operation->status = 'waiting';
				
				// save operation
				$operation->save();
				session()->flash('operation_added',trans('admincp.operation_created_successfully'));
				
				// pass this operation amount to totall vairable
				$total_amount += $operation->sale_price;
				$deserved_amount += $operation->new_price;
					}
				}


				// push the operation object to operations array
				array_push($operations, $operation);				
				$i++;
			}

			// part of invoice
			$invoice = new Invoice;
			!empty($client) ? $invoice->client_id = $client->id : '';
			$invoice->moderator_id = moderatorAuth()->user()->id;
			$invoice->status = 'waiting_paid';
			$invoice->total_amount = $total_amount;
			$invoice->deserved_amount = $deserved_amount;
			$invoice->rest = $deserved_amount;
			$invoice->additional_discount = 100 - ($deserved_amount / $total_amount * 100 );
			$invoice->save();

			foreach($operations as $opera){
				$opera->invoice_id = $invoice->id;
				$opera->save();
			}
			session()->flash('invoice_added',trans('admincp.invoice_created_successfully'));
			return redirect(aurl('invoice/' . $invoice->id));
		}	 		
    }

}
