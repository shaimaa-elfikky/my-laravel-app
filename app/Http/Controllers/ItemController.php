<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;

class ItemController extends Controller
{
 

    public function index()
    {
        $items = Item::paginate(10);

        return view('admin.items.index' ,get_defined_vars());
    }

 
    public function create()
    {
        return view('admin.items.create' ,get_defined_vars());
    }


    public function store(StoreItemRequest $request)
    {
       // dd($request->all() );
        $data = $request->validated();

        Item::create($data);


        return redirect()->route('items.index')->with('succsess',__('keywords.created_successfully'));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

  
    public function edit(Item $item)
    {
        return view('admin.items.edit',get_defined_vars());
    }


    public function update(UpdateItemRequest $request , Item $item)
    {
        $data = $request->validated();

        $item->update($data);

        return redirect()->route('items.index')->with('succsess',__('keywords.updated_successfully'));
    }


    public function destroy(Item $item)
    {
        //
    }
}
