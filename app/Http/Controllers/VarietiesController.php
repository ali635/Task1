<?php

namespace App\Http\Controllers;

use App\Http\Requests\VarietieRequest;
use App\Model\varieties;
use Illuminate\Http\Request;

class VarietiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $varieties = varieties::all();
        return view('varieties.index',compact('varieties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VarietieRequest $request)
    {

        varieties::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        session()->flash('Add', 'تم اضافة الفاتورة بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\varieties  $varieties
     * @return \Illuminate\Http\Response
     */
    public function show(varieties $varieties)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\varieties  $varieties
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\varieties  $varieties
     * @return \Illuminate\Http\Response
     */
    public function update($id,VarietieRequest $request)
    {
        $varieties = varieties::where('id', $id);
        $varieties->update($request->except('_token','_method', 'id'));
        session()->flash('edit', 'تم تعديل الصنف بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\varieties  $varieties
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        varieties::find($id)->delete();
        session()->flash('delete','تم حذف بيانات الصنف بنجاح');
        return redirect('/varieties');
    }
}
