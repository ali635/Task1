<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProductRequest;
use App\Model\Product;
use App\Model\suppliers;
use App\Model\varieties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::with(['varieties' => function ($prod) {
        //     $prod->select('id');
        // }])->select('varietie_id','price', 'product_name');

        $products = Product::selection()-> paginate(15);
        
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =[];
        $data['suppliers'] = suppliers::all();
        $data['varieties'] = varieties::all();
        return view('products.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $product = Product::create([
            'product_name'=>$request->product_name,
            'price'=>$request->price,
            'varietie_id'=>$request->varietie_id,
        ]);
        $product->suppliers()->attach($request->suppliers);
        
        session()->flash('Add', 'تم اضافة بيانات المنتج بنجاح');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[];
        $data['products'] = Product::findOrFail($id);
        $data['suppliers'] = suppliers::orderBy('id', 'DESC')->get();
        $data['varieties'] = varieties::orderBy('id', 'DESC')->get();
        return view('products.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request)
    {
        $product = Product::where('id', $request->id)->first(); 
        $product->update([
            'product_name'=>$request->product_name,
            'price'=>$request->price,
            'varietie_id'=>$request->varietie_id,
        ]);
        $product->suppliers()->detach();
        $product->suppliers()->attach($request->suppliers);
        session()->flash('edit', 'تم تعديل بيانات المنتج بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        suppliers::find($id)->delete();
        session()->flash('delete','تم حذف بيانات الصنف بنجاح');
        return redirect('/suppliers');
    }
    public function search(Request $request)
    {
        
        // $products  = DB::table('products')->where('price','like','%'. $request->search .'%')->paginate(10);
        
        $products  = DB::table('products');
        if( $request->search){
            $products = $products->where('product_name', 'LIKE', "%" . $request->search . "%")->paginate(10);
        }
        return view('products.index',compact('products'));
    }
}
