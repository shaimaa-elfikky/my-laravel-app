<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeriodRequest;
use App\Http\Requests\UpdatePeriodRequest;
use App\Models\Period;
use Illuminate\Http\Request;

class periodController extends Controller
{



    public function index()
    {

        $periods= Period::paginate(5);
        return view('admin.periods.index',get_defined_vars());
    }


    public function create()
    {
        return view('admin.periods.create', get_defined_vars());
    }


    public function store(StorePeriodRequest $request)
    {
        //dd($request);
        $data = $request->validated();

        $existingPeriod = Period::where('date_from', '<=', $data['date_to'])
        ->where('date_to', '>=', $data['date_from'])
        ->first(); // Check for existing overlapping period

        if ($existingPeriod) {

            return redirect()->back()->withErrors(['date_from' => __('keywords.duplicate_date_range')]);
        }

        Period::create($data);
        redirect()->route('periods.index')->with('success',__('keywords.created_successfully'));
    }


    public function show($id)
    {
        //
    }


    public function edit(Period $period)
    {
        return view('admin.periods.edit', get_defined_vars());
    }


    public function update(UpdatePeriodRequest $request, Period $period)
    {

        //dd($period);
        $data = $request->validated();

        $existingPeriod = Period::where('date_from', '<=', $data['date_to'])
        ->where('date_to', '>=', $data['date_from'])
        ->first(); // Check for existing overlapping period

        if ($existingPeriod) {

            return redirect()->back()->withErrors(['date_from' => __('keywords.duplicate_date_range')]);
        }

        $period->update($data);
        redirect()->route('periods.index')->with('success', __('keywords.created_successfully'));
    }


    public function destroy($id)
    {
        //
    }
}
