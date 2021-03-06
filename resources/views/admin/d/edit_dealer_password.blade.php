@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-6">
               <!-- general form elements -->

    @if(session()->has('success'))
    <div class="alert alert-success">
       <h1 style = "color:green"> {{ session()->get('success') }}</h1>
    </div>
    @endif
               <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">ডিলার এডিট</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('update_dealer_password')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$data->id}}" name="id">
                  <div class="card-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" id="" placeholder="Enter Name" name="name" value="{{$data->name}}" disabled>
                      </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{$data->email}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" id="" placeholder="Phone" name="phone" value="{{$data->phone}}">
                      </div>

                     <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" class="form-control" id="" placeholder="Password" name="password" value="{{$data->password}}">
                      </div>
                      <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" id="" placeholder="address" name="address" value="{{$data->address}}" disabled>
                      </div>
                    <div class="form-group">

                      <img src="{{url('/images/dealer_image')}}/{{$data->image}}" alt="no" class="rounded float-left" height="100px" width="80px">
                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
        </div>



{{-- <form class="form" action="{{route('store_dealer')}}" method="post" enctype="multipart/form-data">
        @csrf



            Name: <input type="text" name="name"  /> <br>
            Email: <input type="text" name="email" /> <br>
            Phone: <input type="text" name="phone" /> <br>
            Password: <input type="text" name="password" /> <br>
           Address: <input type="text" name="address"> <br>
           Image: <input type="file" name="myimg"> <br>
            <input type="submit" name="submit"> <br>


    </form> --}}

    </div>
</div>
@endsection
