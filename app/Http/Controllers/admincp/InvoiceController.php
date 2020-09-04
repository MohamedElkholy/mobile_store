<?php

namespace App\Http\Controllers\admincp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Operation;
use App\Invoice;
use App\Log;
use App\Client;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($paginate = 20)
    {
        $title = trans('admincp.invoices_view');
        $invoices = Invoice::orderBy('id','desc')->paginate($paginate);
        return view('admincp.invoices.index',compact('invoices','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = trans('admincp.invoice_number_i') .$id;
        $invoice = Invoice::find($id);
        $client = Client::find($invoice->client_id);
        $operations = Operation::where('invoice_id',$invoice->id)->get();
    return view('admincp.invoices.show',compact('invoice','client','operations','title'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function done_invoice($id){ 
        $data = $this->validate(request(),[
            'paid_amount'=>'required|numeric|between:0,'.request('deserved_amount'),
        ],[],[
            'paid_amount'=>trans('admincp.paid_amount')
        ]);
        $invoice = Invoice::findOrFail($id);
        if(request('paid_amount') > 0){
            $log = new Log;
            $log->log_type = 'pay';
            $log->invoice_id = $invoice->id;
            $log->client_id = $invoice->client_id;
            $log->moderator_id = moderatorAuth()->user()->id;
            $log->amount = request('paid_amount');
            $log->save();
        }
        if(request('paid_amount') < request('deserved_amount')){
            $invoice->status = 'partially_paid';
        }else{
        $invoice->status = 'paid';
        }
        $invoice->payment_date = now()->toDateTimeString();
        $invoice->rest = request('rest');
        $invoice->save();
        $operations = $invoice->operations;
        foreach ($operations as $operation) {
            $operation->status = 'done';
            $operation->save();
            if($operation->type == 'sale' && isset($operation->product)){
            $product = $operation->product;
            $product->saled_count += $operation->saled_count;
            $product->count -= $operation->saled_count;
            $product->save();
            }
        }
        session()->flash('updated',trans('admincp.invoice_done_successfully'));
        return redirect(aurl('invoice/'.$invoice->id));
    }
}
