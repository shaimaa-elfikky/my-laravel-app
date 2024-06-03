<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=  Company::paginate(10);

        return view('admin.companies.index' ,get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create' ,get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();
        Company::create($data);
        return redirect()->route('companies.index')->with('succsess',__('keywords.created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        return view('admin.companies.edit',get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        return redirect()->route('companies.index')->with('succsess',__('keywords.updated_successfully'));
    }

    
    public function destroy($id)
    {
        return redirect()->route('companies.index')->with('succsess', __('keywords.deleted_successfully'));
    }
}
