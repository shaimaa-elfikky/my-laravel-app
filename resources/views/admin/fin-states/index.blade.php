@extends('admin.master')

@section('title' ,__('keywords.fin-states'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-fin-states-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.fin-states')}}</h2>
                <div class="page-title-right">

                    <x-action-component href="{{route('fin-states.create')}}" type="create" text="__('keywords.add')" color="primary"></x-action-component>
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
                            <th style="font-weight: bold;">{{__('keywords.fin_stat_type')}}</th>


                        </tr>
                        </thead>
                        <tbody>
                        @if(count($finStates)> 0 )
                        @foreach($finStates as $key=>$finState )
                        <tr>
                           <td style="background-color:lightgrey;">{{$finStates->firstItem() + $loop->index}}</td>
                            <td>{{$finState->name}}</td>
                            <td>{{$finState->code}}</td>
                            <td>{{$finState->fin_stat_type}}</td>


                            <td style="white-space: nowrap;">
                            {{-- <x-action-component href="{{route('fin-states.edit',['finState'=>$finState])}}" type="edit" text="<i class='fe fe-edit fa-2x'></i>" color="success"></x-action-component> --}}

                            <x-action-component href="#" type="show" text="<i class='fe fe-edit fa-2x'></i>" color="warning"></x-action-component>
                            {{-- <x-button-component href="{{route('fin-states.destroy',['finState'=>$finState])}}" id="{{$finState->id}}"></x-button-component> --}}
                            </td>
                        </tr>
                        @endforeach
                        @else
                          <x-empty-alert></x-empty-alert>
                        @endif
                        </tbody>
                    </table>
                          {{$finStates->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
