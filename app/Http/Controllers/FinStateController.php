<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorefinStateRequest;
use App\Http\Requests\UpdateFinStateRequest;
use App\Models\finState;
use Illuminate\Http\Request;

class FinStateController extends Controller
{




    public function index()
    {

        $finStates = finState::paginate(5);
        return view('admin.fin-states.index',get_defined_vars());
    }



    public function create()
    {
        return view('admin.fin-states.create',get_defined_vars());
    }



    public function store(StorefinStateRequest $request)
    {
        $data = $request->validated();
        FinState::create($data);

        redirect()->route('fin-states.index')->with('succsess', __('keywords.created_successfully'));
    }



    public function show($id)
    {
       //
    }



    public function edit(FinState $finState)
    {


        return view('admin.fin-states.edit', get_defined_vars());
    }


    public function update(UpdateFinStateRequest $request, FinState $finState)
    {
        $data = $request->validated();
        $finState->update($data);

        redirect()->route('fin-states.update')->with('succsess', __('keywords.updated_successfully'));
    }



    public function destroy($id)
    {
        return redirect()->route('fin-states.index')->with('succsess', __('keywords.deleted_successfully'));
    }
}
