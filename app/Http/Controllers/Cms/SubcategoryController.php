<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\CmsController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Subcategory;
use App\Model\Category;
use Validator;

class SubcategoryController extends CmsController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subcategory = Subcategory::orderBy("subcategory_id", "DESC");
        $category    = Category::orderBy("category_id", "DESC");

        if ($request->input('name')) {
            $subcategory->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->input('status')) {
            $subcategory->where('status', $request->input('status'));
        }

        return view("cms/subcategory/index", array(
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
        $category    = Category::orderBy("category_id", "DESC");

        return view("cms/subcategory/show", array(
            "category"    => $category->paginate(50)
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
            $subcategory = Subcategory::create($request->all());
            return redirect(route('cms-subcategory-show', $subcategory->subcategory_id));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code' => 'error', 'text'  => $e));
            return redirect(route('cms-subcategory'));
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
        $subcategory = Subcategory::find($id);
        $category    = Category::get();

        if (empty($subcategory)) {
            abort(404);
        }

        return view("cms/subcategory/show", array(
            "subcategory" => $subcategory,
            "category"    => $category
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

            Subcategory::find($id)->update($request->except("image"));
            $request->session()->flash('alert', array('code' => 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code' => 'error', 'text'  => $e));
        }

        return redirect(route('cms-subcategory'));
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
            $subcategory = Subcategory::find($id);


            if (empty($subcategory)) {
                abort(404);
            }

            $subcategory->delete();
            $request->session()->flash('alert', array('code' => 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code' => 'error', 'text'  => $e));
        }

        return redirect(route('cms-subcategory'));
    }
}
