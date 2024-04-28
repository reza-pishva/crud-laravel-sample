@extends('layout.app')
@section('content')


    <div class="row" style="width: 50%;height:200px;margin:auto">      
      <div class="col">
        @include('alerts.errors')
        <div class="card">
          <div class="card-header"><h4>Create New Customer</h4></div>
          <div class="card-body">
            <form action="{{route('customer.store')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="Firstname">First Name:</label>
                    <input type="text" id="Firstname" class="form-control" name="Firstname" value="{{ old('Firstname') }}">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="Lastname">Last Name:</label>
                    <input type="text" id="Lastname" class="form-control" name="Lastname" value="{{old('Lastname')}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  
                  <div class="form-group">
                    <label for="DateOfBirth">Birthday:</label>
                    <input type="text" id="DateOfBirth" placeholder="Year-Month-Day" class="form-control datepicker" name="DateOfBirth" value="{{old('DateOfBirth')}}">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="PhoneNumber">Phone Number:</label>
                    <input type="text" id="PhoneNumber" class="form-control" name="PhoneNumber" value="{{old('PhoneNumber')}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="text" id="Email" class="form-control" name="Email" value="{{old('Email')}}">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="BankAccountNumber">Bank Account Number:</label>
                    <input type="text" id="BankAccountNumber" class="form-control" name="BankAccountNumber" value="{{old('BankAccountNumber')}}">
                  </div>
                </div>
              </div>
              <button class="btn btn-outline-success">submit</button>
              <a href="{{route('customer.index')}}" class="btn btn-outline-dark">return</a>
          </div>
              
            </form>
            
        </div>
       
      </div>     
     
    </div>

@endsection