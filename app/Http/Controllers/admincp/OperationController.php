<?php

namespace App\Http\Controllers\admincp;

use App\Http\Controllers\Controller;
use App\Operation;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = null)
    {
        $title = trans('admincp.daily_transactions');
        if (!empty($type)) {
            $operations = Operation::where('type', $type)->orderBy('id', 'desc')->paginate(20);
        } else {
            $operations = Operation::orderBy('id', 'desc')->paginate(50);
        }
        return view('admincp.operations.index', compact('title', 'operations'));
    }

    public function retrieve()
    {
        $operations = Operation::paginate(10);
        $title      = trans('admincp.retrieve_operations');
        return view('admincp.operations.retrieve', compact('operations', 'title'));
    }

    public function do_retrieve($operation_id){
        echo 'do_retrieve';
    }

    public function search()
    {
        $in = request('invoice_number');
        $idate = request('invoice_date');
        $pn = request('product_name');
        $cn = request('client_name');
        $result = '';

        if (!empty(request('invoice_number'))) {
            $operations = Operation::where('invoice_id', request('invoice_number'))
                ->get();
        } else {
            $operations = Operation::paginate(50);

        }
        foreach ($operations as $operation) {
            $product_or_service;
            if ($operation->product != null) {
                $product_or_service = "<a href='" . aurl('product/' . $operation->product->id) . "'>" . $operation->product->name . "</a>";
            } else {
                $product_or_service = $operation->service_type;
            }
            $result .=
            "<tr>" .
            "<td>" . $product_or_service . "</td>" .
            "<td>" . $operation->saled_count . "</td>" .
            "<td><a href='" . aurl('invoice/' . $operation->invoice_id) . "'>" . $operation->invoice_id . "</a></td>" .
            "<td>".$operation->invoice['client']['name']."</td>".
            "<td>" . $operation->total_price . "</td>" .
            "<td>" . $operation->created_at->format('Y/m/d') . "</td>" .
            "<td><button class='btn btn-primary'>".trans('admincp.retrieval')."</button></td>" .
                "</tr>";
        }

        $output = ['html' => $result];
        $output = json_encode($output);
        return $output;

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
        //
    }

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
}
