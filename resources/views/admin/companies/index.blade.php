@extends('admin.master')

@section('title' ,__('keywords.companies'))
@section('content')




<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-companies-center justify-content-between mb-3">
             <h2 class="page-title">{{__('keywords.companies')}}</h2>
                <div class="page-title-right">
                    {{-- <a href="{{route('companies.create')}}" class="btn btn-sm btn-primary">
                        {{__('keywords.add')}}
                    </a> --}}
                    <x-action-component href="{{route('companies.create')}}" type="create" text="__('keywords.add')" color="primary"></x-action-component>
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
                            <th style="font-weight: bold;">{{__('keywords.address')}}</th>
                            <th style="font-weight: bold;">{{__('keywords.aff_or_not')}}</th>
                            <th style="font-weight: bold;">{{__('keywords.owner_or_not')}}</th>
                            <th style="font-weight: bold;">{{__('keywords.is_active')}}</th>
                            <th style="font-weight: bold;">{{__('keywords.email')}}</th>
                            <th style="font-weight: bold;">{{__('keywords.telephone')}}</th>
                            <th style="font-weight: bold;">{{__('keywords.code')}}</th>
                            <th style="font-weight: bold;">{{__('keywords.website')}}</th>

                          </tr>
                        </thead>
                        <tbody>
                        @if(count($companies)> 0 )
                        @foreach($companies as $key=>$item )
                        <tr>
                            <td style="background-color:lightgrey;">{{$companies->firstItem() + $loop->index}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->address}}</td>                          
                            @if($item->aff_or_not == 0)
                            <td>   تابعة </td>
                            @else
                            <td>  غير تابعة </td>
                            @endif
                            @if($item->owner_or_not == 0)
                            <td>  مالكة </td>
                            @else
                            <td>  غير مالكة </td>
                            @endif
                            @if($item->is_active == 0)
                            <td>  مسموح </td>
                            @else
                            <td>  غير مسموح </td>
                            @endif
                            <td>{{$item->email}}</td>
                            <td>{{$item->telephone}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->website}}</td>


                            <td>                          
                            <x-action-component href="{{route('companies.edit',['copmany'=>$item])}}" type="edit" text="<i class='fe fe-edit fa-2x'></i>" color="success"></x-action-component>

                            <x-action-component href="#" type="show" text="<i class='fe fe-edit fa-2x'></i>" color="warning"></x-action-component>
                            <x-button-component href="{{route('companies.destroy',['copmany'=>$item])}}" id="{{$item->id}}"></x-button-component>                        
                            </td>
                        </tr>
                        @endforeach
                        @else
                          <x-empty-alert></x-empty-alert>
                        @endif
                        </tbody>
                    </table>
                    {{$companies->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
