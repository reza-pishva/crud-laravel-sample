@extends('layout.app')
@section('content')

    <div class="row" style="width: 50%;height:200px;margin:auto">
      
      <div class="col">
        
        <div class="card">
          <a class="btn btn-sm btn-outline-info mb-1" href="{{route('customer.create')}}" style="width:20%">New Customer</a>
          <div class="card-header"><h5>Name of Customers</h5></div>
          <div class="card-body">
            <ul class="list-group">
                @foreach ($customers as $customer)
                    <li class="list-group-item d-flex justify-content-between">
                        {{$customer->Firstname}}  {{$customer->Lastname}}
                        <a class="btn btn-sm btn-outline-secondary" href="{{route('customer.show',['customer'=>$customer->id])}}">Show</a>
                    </li>
                @endforeach
            </ul>
           
          </div>
        </div>
        <div class="row mt-2">
            <div class="col"></div>
            <div class="col"><div style="margin:auto">{{$customers->links()}}</div>   </div>
            <div class="col"></div>
        </div>
        
      </div>     
     
    </div>

@endsection