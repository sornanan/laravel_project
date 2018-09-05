<?php

namespace App\Http\Controllers;

use App\Purchase_orderModel;
use Illuminate\Http\Request;
use App\SupplierModel;
Use App\UserModel;

class Purchase_orderController extends Controller
{
    
    public function index(Request $request)
    {
        $model = new Purchase_orderModel();
        $q = $request->input('q');
        $table_purchase_order = $model->select_search($q);

        $data = ['table_purchase_order'=>$table_purchase_order,
        'q'=>$q];
        return view('purchase_order/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new SupplierModel();
            $table_supplier2 = $model->select();
            $data = ['table_supplier2' =>$table_supplier2];

        $model = new UserModel();
            $table_user2 = $model->select();
            $data = ['table_user2' =>$table_user2];



             return view('movement/create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price = $request->input('price');
        $id_supplier = $request->input('id_supplier');
        $id_user = $request->input('id_user');
        $model = new Purchase_orderModel();
        $model->insert($price,$id_supplier,$id_user);
        return redirect('/purchase_order');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase_orderModel  $purchase_orderModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new Purchase_orderModel();
        $table_purchase_order = $model->select_id($id);
        $data = ['table_purchase_order '=>$table_purchase_order];
        return view('purchase_order/show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase_orderModel  $purchase_orderModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = new Purchase_orderModel();
        $table_purchase_order = $model->select_id($id);
        $data = ['table_purchase_order '=>$table_purchase_order];
        return view('purchase_order/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase_orderModel  $purchase_orderModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_order)
    {
         $price = $request->input('price');
        $id_supplier = $request->input('id_supplier');
        $id_user = $request->input('id_user');
        $model = new Purchase_orderModel();
        $model->insert($price,$id_supplier,$id_user);
        return redirect('/purchase_order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase_orderModel  $purchase_orderModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_order)
    {
        $model = new PurchaseModel();
        $model->delete($id_order);

        return redirect('/purchase_order');
    }
}