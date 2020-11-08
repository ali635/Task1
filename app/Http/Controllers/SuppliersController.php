<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Model\suppliers;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = suppliers::all();
        return view('suppliers.index',compact('suppliers'));
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
    public function store(SupplierRequest $request)
    {
        suppliers::create($request->except('_token','_method', 'id'));
        session()->flash('Add', 'تم اضافة بيانات المورد بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update($id,SupplierRequest $request)
    {
        $varieties = suppliers::where('id', $id);
        $varieties->update($request->except('_token','_method', 'id'));
        session()->flash('edit', 'تم تعديل بيانات المورد بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        suppliers::find($id)->delete();
        session()->flash('delete','تم حذف بيانات الصنف بنجاح');
        return redirect('/suppliers');
    }
}
