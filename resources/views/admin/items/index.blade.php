@extends('admin.master')

@section('title' ,__('keywords.index'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.items')}}</h2>
                <div class="page-title-right">
                    <a href="{{route('items.create')}}" class="btn btn-sm btn-primary">
                        {{__('keywords.add')}}
                    </a>
                </div>
            </div>
       
            <div class="card shadow">
                <div class="card-body"> 
                @if(session('succsess'))
                    <div class="alert alert-success">{{session('succsess')}}</div>  
                    @endif   
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('keywords.name')}}</th>
                            <th>{{__('keywords.code')}}</th>
                            <th>{{__('keywords.follow_item_id')}}</th>
                            <th>{{__('keywords.calc_fl')}}</th> 
                            <th>{{__('keywords.actions')}}</th>   
                         
                          </tr>
                        </thead>
                        <tbody>
                        @if(count($items)> 0 )
                        @foreach($items as $key=>$item )
                        <tr>                        
                            <td style="background-color:lightgrey;">{{$items->firstItem() + $loop->index}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->follow_item_id}}</td>
                            <td>{{$item->calc_fl}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success">
                                    <i class="fe fe-edit fa-2x"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fe fe-eye fa-2x"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="fe fe-trash-2 fa-2x"></i>
                                </a>
                            </td>                                           
                        </tr>
                        @endforeach
                        @else
                        <tr> 
                            <td colspan="6"><div class="alert alert-danger"> {{__('keywords.no data found')}} </div>
                            </td>
                        </tr>
                        @endif
                        </tbody>
                    </table>
                    {{$items->links()}}
                </div>
            </div>
        </div> 
    </div> 
</div> 

@endsection