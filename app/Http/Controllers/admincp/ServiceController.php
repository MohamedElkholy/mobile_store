<?php

namespace App\Http\Controllers\admincp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Operation;
use App\Invoice;
use App\Client;
class ServiceController extends Controller
{
    public function create(){
    	$title = trans('admincp.add_new_service');
    	return view('admincp.operations.new_service',compact('title'));
    }

    public function store(){
    	$title = trans('admincp.add_new_service');
    	return view('admincp.operations.new_service',compact('title'));
    }    
/*
    public function doservice(){

		// if the request has not products redirect back with alert
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
				
				// continue the loop
				$i++;
			}

			// part of invoice
			$invoice = new Invoice;
			!empty($client) ? $invoice->client_id = $client->id : '';
			$invoice->moderator_id = moderatorAuth()->user()->id;
			$invoice->status = 'waiting_paid';
			$invoice->total_amount = $total_amount;
			$invoice->deserved_amount = $deserved_amount;
			$invoice->additional_discount = 100 - ($deserved_amount / $total_amount * 100 );
			$invoice->save();

			foreach($operations as $opera){
				$opera->invoice_id = $invoice->id;
				$opera->save();
			}
			session()->flash('invoice_added',trans('admincp.invoice_created_successfully'));
			return redirect(aurl('invoice/' . $invoice->id));
		}	 		
    }*/
}
