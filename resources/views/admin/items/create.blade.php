@extends('admin.master')

@section('title' ,__('keywords.add_new_items'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.add_new_items')}}</h2>

            </div>

        <div class="card shadow" style="background-color:lightgrey;">
            <div class="card-body">
                <form action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                      <x-form-label title="name"></x-form-label>
                        <input type="text" id="example-email" name="name" class="form-control" placeholder="{{__('keywords.name')}}">
                      </div>                     
                      <x-validation-error field="name"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                       <x-form-label title="code"></x-form-label>
                        <input type="text" id="code" name="code" class="form-control" placeholder="{{__('keywords.code')}}">
                      </div>
                      <x-validation-error field="code"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <x-form-label title="follow_item_id"></x-form-label>
                        <select class="form-control" name="follow_item_id">
                                <option value="">اختر</option>
                            @foreach($follow_item_id as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>

                      </div>
                      <x-validation-error field="follow_item_id"></x-validation-error>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <x-form-label title="calc_fl"></x-form-label>
                        <select id="inputState5" class="form-control" name="calc_fl">
                              <option value= "0">تجميع لنفس البند من الشركات</option>
                              <option value= "1">قيمة نفس البند للقابضة</option>
                              <option value= "2">من بنود اخرى</option>

                            </select>

                      </div>
                      <x-validation-error field="calc_fl"></x-validation-error>
                    </div>
                    <x-button-submit></x-button-submit> 
                </form>

            </div>

            </div>
        </div>
    </div>
</div>

@endsection
