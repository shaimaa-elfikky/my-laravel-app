@extends('admin.master')

@section('title' ,__('keywords.add_new_items'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.add_new_items')}}</h2>
            
            </div>

        <div class="card shadow">
            <div class="card-body">  
                <form action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">                  
                      <div class="form-group mb-3">
                        <label for="name">{{__('keywords.name')}} </label>
                        <input type="text" id="example-email" name="name" class="form-control" placeholder="{{__('keywords.name')}}">
                      </div>   
                      @error('name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror             
                    </div>
                    <div class="col-md-6">                  
                      <div class="form-group mb-3">
                        <label for="name">{{__('keywords.code')}} </label>
                        <input type="text" id="example-email" name="code" class="form-control" placeholder="{{__('keywords.code')}}">
                      </div>                
                      @error('code')
                      <span class="text-danger">{{$message}}</span>
                      @enderror 
                    </div>
                    <div class="col-md-6">                  
                      <div class="form-group mb-3">
                        <label for="name">{{__('keywords.follow_item_id')}} </label>
                        <input type="text" id="example-email" name="follow_item_id" class="form-control" placeholder="{{__('keywords.follow_item_id')}}">
                      </div>     
                      @error('follow_item_id')
                      <span class="text-danger">{{$message}}</span>
                      @enderror           
                    </div>
                    <div class="col-md-6">                  
                      <div class="form-group mb-3">
                        <label for="name">{{__('keywords.calc_fl')}} </label>
                        <input type="text" id="example-email" name="calc_fl" class="form-control" placeholder="{{__('keywords.calc_fl')}}">
                      </div>
                      @error('calc_fl')
                      <span class="text-danger">{{$message}}</span>
                      @enderror                   
                    </div>
                    <button type="submit" class="btn btn-primary  btn-sm mt-2">{{__('keywords.submit')}}</button>
                </form>              
                
            </div>
                    
            </div> 
        </div> 
    </div> 
</div> 

@endsection