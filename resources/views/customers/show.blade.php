@extends('layout.app')
@section('content')




    <div class="row" style="width: 50%;height:200px;margin:auto">
      <div class="col">
        
        <div class="card">
          <div class="card-header"><h4>{{$customer->Firstname}} {{$customer->Lastname}}</h4></div>
          <div class="card-body">
            <div class="row">
              <div class="col-4"><lable>Birthday:</lable></div>
              <div class="col-8">{{$customer->DateOfBirth}}</div>
            </div>
            <div class="row">
              <div class="col-4"><lable>Phone Number:</lable></div>
              <div class="col-8">{{$customer->PhoneNumber}}</div>
            </div>
            <div class="row">
              <div class="col-4"><lable>Email:</lable></div>
              <div class="col-8">{{$customer->Email}}</div>
            </div>
            <div class="row">
              <div class="col-4"><lable>Account Number:</lable></div>
              <div class="col-8">{{$customer->BankAccountNumber}}</div>
            </div>
            <hr>
            <div class="d-flex mb-3">
              <form action="{{route('customer.delete',['customer'=>$customer->id])}}" method="POST">
                @csrf  
                @method('delete') 
                <a href="{{ route('customer.delete',['customer'=>$customer->id]) }}" class="btn btn-sm btn-outline-danger ml-2" data-confirm-delete="true">Delete</a>                   
                
            </form>
            <a class="btn btn-sm btn-outline-primary ml-1" href="{{route('customer.edit',['customer'=>$customer->id])}}">Edit</a>
            <a href="{{route('customer.index')}}" class="btn btn-sm btn-outline-dark ml-1">return</a>
           
                
                
            </div>
            
          </div>
          
          
        </div>
       
      </div>     
     
    </div>

@endsection