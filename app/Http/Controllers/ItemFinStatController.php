<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemFinStatRequest;
use App\Models\FinState;
use App\models\Item;
use App\Models\ItemFinStat;
use Illuminate\Http\Request;

class ItemFinStatController extends Controller
{


    public function index()
    {
        $item_fin_stats = ItemFinStat::with('items')->get();
          //dd($item_fin_stats);
        return view('admin.item-fin-stats.index', get_defined_vars());

    }





    public function create()
    {
        $items = Item::all();
       // dd($items);
        return view('admin.item-fin-stats.create', get_defined_vars());
    }




    public function store(StoreItemFinStatRequest $request)
    {

        $data = $request->validated();
        ItemFinStat::create($data);

        return redirect()->route('item-fin-stats.index')->with('success',__('keywords.created_successfully'));
    }




    public function show($id)
    {
        //
    }




    public function edit(ItemFinStat $item_fin_stat)
    {
        return view('admin.item-fin-stats.edit', get_defined_vars());
    }




    public function update(Request $request, $id)
    {
        //
    }




    public function destroy(ItemFinStat $item_fin_stat)
    {

        $item_fin_stat ->delete();
        return redirect()->route('item-fin-stats.index')->with('success', __('keywords.deleted_successfully'));

    }
}
