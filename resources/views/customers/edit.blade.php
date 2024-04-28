@extends('layout.app')
@section('content')

    <div class="row" style="width: 50%;height:200px;margin:auto">
      
      <div class="col">
        @include('alerts.errors')
        <div class="card">
          <div class="card-header"><h4>Edit the Customer info</h4></div>
          <div class="card-body">
            <form action="{{route('customer.update',['customer'=>$customer->id])}}" method="POST">
              @csrf
              @method('put')
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="Firstname">First Name:</label>
                    <input type="text" id="Firstname" class="form-control" name="Firstname" value="{{$customer->Firstname}}">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="Lastname">Last Name:</label>
                    <input type="text" id="Lastname" class="form-control" name="Lastname" value="{{$customer->Lastname}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="DateOfBirth">Birthday:</label>
                    <input type="text" id="DateOfBirth" class="form-control" name="DateOfBirth" value="{{$customer->DateOfBirth}}">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="PhoneNumber">Phone Number:</label>
                    <input type="text" id="PhoneNumber" class="form-control" name="PhoneNumber" value="{{$customer->PhoneNumber}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="text" id="Email" class="form-control" name="Email" value="{{$customer->Email}}">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="BankAccountNumber">Bank Account Number:</label>
                    <input type="text" id="BankAccountNumber" class="form-control" name="BankAccountNumber" value="{{$customer->BankAccountNumber}}">
                  </div>
                </div>
              </div>
              <button class="btn btn-sm btn-outline-primary">submit</button>
              <a href="{{route('customer.index')}}" class="btn btn-sm btn-outline-dark ml-1">return</a>
              
            </form>

          
          </div>
        </div>
       
      </div>     
     
    </div>

@endsection