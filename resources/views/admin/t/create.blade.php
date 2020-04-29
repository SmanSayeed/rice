@extends('layouts.master')
@section('content')



{{-- <form action="{{route('store_taker')}}" method="post" enctype="multipart/form-data">
        @csrf



            Name: <input type="text" name="name"  /> <br>
            Father: <input type="text" name="father"  /> <br>
            Mother: <input type="text" name="mother"  /> <br>
            Address1: <input type="text" name="address1"  /> <br>
            Address2: <input type="text" name="address2" /> <br>

            Nid: <input type="text" name="nid" /> <br>

            Bid: <input type="text" name="bid" /> <br>

            Mid: <input type="text" name="mid" /> <br>

            Phone: <input type="text" name="phone" /> <br>

           Image: <input type="file" name="myimg"> <br>
            <input type="submit" name="submit"> <br>


    </form> --}}














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
                      <h3 class="card-title">উপকারভোগীর তথ্য সংগ্রহ</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('store_taker')}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Name" name="name" >
                          </div>

                          <div class="form-group">
                            <label for="">Father Name</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Father Name" name="father" >
                          </div>

                          <div class="form-group">
                            <label for="">Mother Name</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Mother Name" name="mother" >
                          </div>

                          <div class="form-group">
                            <label for="">Village</label>
                            <input type="text" class="form-control" id="" placeholder="Enter  Address1" name="address1" >
                          </div>

                          <div class="form-group">
                            <label for="">Full Address</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Address2" name="address2" >
                          </div>

                          <div class="form-group">
                            <label for="">NID</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Name" name="nid" >
                          </div>



                        <div class="form-group">
                          <label for="">MID</label>
                          <input type="text" class="form-control" id="" placeholder="Enter MID" name="mid" >
                        </div>
                        <div class="form-group">
                          <label for="">BID</label>
                          <input type="text" class="form-control" id="" placeholder="Enter BID" name="bid">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" id="" placeholder="Phone" name="phone">
                          </div>

                        <div class="form-group">
                          <label for="exampleInputFile">File input</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="myimg">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>

                          </div>
                        </div>

                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
            </div>



        </div>
    </div>

@endsection
