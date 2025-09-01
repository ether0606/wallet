<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Item\AddNewRequest;
use App\Http\Requests\Item\UpdateRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datas=Item::latest()
                ->when($request->name && $request->name !='', function ($query) use($request) {
                    $query->where('name', $request->name);
                })
                ->when($request->category_id, function ($query) use($request) {
                    $query->where('category_id', $request->category_id);
                })
                ->paginate(10)->withQueryString();

        return view('item.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::orderBy('name')->get();
        $tags=Tag::orderBy('name')->get();
        return view('item.create',compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {

        $request['created_by']=auth()->user()->id;

        $item=Item::create($request->all());
        $item->tags()->attach($request->tags);

        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $category=Category::orderBy('name')->get();
        $item=Item::find($id);
        return view('item.edit',compact('category','item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $request['updated_by']=auth()->user()->id;
        Item::find($id)->update($request->all());

        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
