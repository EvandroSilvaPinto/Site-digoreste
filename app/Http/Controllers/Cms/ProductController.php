<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\CmsController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Product;
use App\Model\Subcategory;
use App\Model\Category;
use Validator;

class ProductController extends CmsController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subcategory = Subcategory::orderBy("subcategory_id", "DESC");
        $category    = Subcategory::orderBy("category_id", "DESC");
        $product     = Product::orderBy("product_id", "DESC");

        if ($request->input('name')) {
            $product->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->input('status')) {
            $product->where('status', $request->input('status'));
        }

        return view("cms/product/index", array(
            "product"     => $product->paginate(50),
            "subcategory" => $subcategory->paginate(50),
            "category"    => $category->paginate(50)
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category     = Category::orderBy("category_id", "DESC");
        $subcategory  = Subcategory::orderBy("category_id", "DESC");
        
        return view("cms/product/show", array(

            "category"    => $category->paginate(50),
            "subcategory" => $subcategory->paginate(50)
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $product = Product::create($request->all());
            return redirect(route('cms-product-show', $product->product_id));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code' => 'error', 'text'  => $e));
            return redirect(route('cms-product'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product     = Product::find($id);
        $subcategory = Subcategory::get();
        $category    = Category::get();

        if (empty($product)) {
            abort(404);
        }

        return view("cms/product/show", array(
            "subcategory" => $subcategory,
            "category"    => $category,
            "product"     => $product
        ));
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

        try {

            Product::find($id)->update($request->except("image"));
            $request->session()->flash('alert', array('code' => 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code' => 'error', 'text'  => $e));
        }

        return redirect(route('cms-product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $product = Product::find($id);


            if (empty($product)) {
                abort(404);
            }

            $product->delete();
            $request->session()->flash('alert', array('code' => 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code' => 'error', 'text'  => $e));
        }

        return redirect(route('cms-product'));
    }
}
