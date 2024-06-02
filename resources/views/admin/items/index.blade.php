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
                            <td>{{$item->follow_item_id}}</td>
                            <td>{{$item->calc_fl}}</td>
                            <td>
                                <a href="{{route('items.edit',['item'=>$item])}}" class="btn btn-sm btn-success">
                                    <i class="fe fe-edit fa-2x"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fe fe-eye fa-2x"></i>
                                </a>
                             <form action="{{route('items.destroy',['item'=>$item])}}" id="deleteForm-{{$item->id}}"method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onClick="confirmDelete({{$item->id}})">
                                    <i class="fe fe-trash-2 fa-2x"></i>
                                </button>

                             </form>

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

<script>

     function confirmDelete(id){

        if(confirm('Are You Sure You Want TO delete !')){
              document.getElementById('deleteForm' + id).submit();
        }

     }

</script>

@endsection
