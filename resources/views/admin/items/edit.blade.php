@extends('admin.master')

@section('title' ,__('keywords.edit_item'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.edit_item')}}</h2>

            </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="{{route('items.update',['item'=>$item])}}" method="post" enctype="multipart/form-data">
                  @method('PUT')
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="name">{{__('keywords.name')}} </label>
                        <input type="text" id="example-email" name="name" class="form-control" value="{{$item->name}}" placeholder="{{__('keywords.name')}}">
                      </div>
                      @error('name')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="name">{{__('keywords.code')}} </label>
                        <input type="text" id="example-email" name="code" class="form-control"value="{{$item->code}}" placeholder="{{__('keywords.code')}}">
                      </div>
                      @error('code')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="name">{{__('keywords.follow_item_id')}} </label>
                           <select class="form-control" name="follow_item_id">
                                <option value="">اختر</option>
                            @foreach($follow_item_id as $item)
                                    <option value="{{ $item->id }}"{{ old('follow_item_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach                             
                        </select>

                      </div>
                      @error('follow_item_id')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label for="name">{{__('keywords.calc_fl')}} </label>
                        <select id="inputState5" class="form-control" name="calc_fl">
                              <option value="0" {{ $item->calc_fl == 0 ? 'selected' : '' }}>تجميع لنفس البند من الشركات</option>
                              <option value="1" {{ $item->calc_fl == 1 ? 'selected' : '' }}>قيمة نفس البند للقابضة</option>
                              <option value="2" {{ $item->calc_fl == 2 ? 'selected' : '' }}>من بنود اخرى</option>

                        </select>

                      </div>
                      @error('calc_fl')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary  btn-sm mt-2">{{__('keywords.edit_item')}}</button>
                </form>

            </div>

            </div>
        </div>
    </div>
</div>

@endsection
