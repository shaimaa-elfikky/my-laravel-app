@extends('admin.master')

@section('title' ,__('keywords.items'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.items')}}</h2>
                <div class="page-title-right">
                    
                    <x-action-component href="{{route('items.create')}}" type="create" text="__('keywords.add')" color="primary"></x-action-component>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-body">
                 <x-error-alert></x-error-alert>
                 <x-success-alert></x-success-alert>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th style="font-weight: bold;">{{__('keywords.name')}}</th>
                            <th style="font-weight: bold;">{{__('keywords.code')}}</th>
                            <th style="font-weight: bold;">{{__('keywords.follow_item_id')}}</th>
                            <th style="font-weight: bold;">{{__('keywords.calc_fl')}}</th>
                            <th style="font-weight: bold;">{{__('keywords.actions')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(count($items)> 0 )
                        @foreach($items as $key=>$item )
                        <tr>
                            <td style="background-color:lightgrey;">{{$items->firstItem() + $loop->index}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->code}}</td>
                            @if ($item->following)
                            <td>{{$item->following->name }}</td> @else
                            <td>-</td> @endif
                            @if($item->calc_fl == 0)
                            <td>تجميع لنفس البند من الشركات</td>
                            @elseif($item->calc_fl == 1)
                            <td>قيمة نفس البند للقابضة</td>
                            @elseif($item->calc_fl == 2)
                            <td> من بنود اخرى</td>
                            @endif

                            <td>
                            <x-action-component href="{{route('items.edit',['item'=>$item])}}" type="edit" text="<i class='fe fe-edit fa-2x'></i>" color="success"></x-action-component>

                            <x-action-component href="#" type="show" text="<i class='fe fe-edit fa-2x'></i>" color="warning"></x-action-component>
                            <x-button-component href="{{route('items.destroy',['item'=>$item])}}" id="{{$item->id}}"></x-button-component>
                            </td>
                        </tr>
                        @endforeach
                        @else
                          <x-empty-alert></x-empty-alert>
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
