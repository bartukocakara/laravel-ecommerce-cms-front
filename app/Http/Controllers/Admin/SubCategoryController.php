<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public $subCategories;

    public function __construct(SubCategory $subCategories)
    {
        $this->subCategories = $subCategories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::latest()->get();
        return view('admin.sub-categories.index', compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $this->rules($request);
        SubCategory::insert([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Alt kategori eklendi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subCategory = SubCategory::find($id);
        return view('admin.sub-categories.edit', compact('subCategory'));
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
        $request->validate([
            'name' => 'required'
        ]);

        SubCategory::find($id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('sub-categories.index')->with('subCatUpdated', 'Alt kategori güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::destroy($id);

        return redirect()->route('sub-categories.index')->with('subCatDeleted', 'Alt kategori silindi');
    }
}
