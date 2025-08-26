<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Category::all();
        return view('category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rihan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect()->route('rihan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $rihan)
    {
        return view('rihan.edit',compact('rihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $rihan)
    {
        $rihan->update($request->all());

        return redirect()->route('rihan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $rihan)
    {
        $rihan->delete();
        return redirect()->back();
    }
}
