@extends('layouts.master')
@section('content')

<?php
    session_start();
    //require 'vendor/autoload.php';
    use cloudabis_sdk\ApiManager\CloudABISAPI;
    use cloudabis_sdk\Models\CloudABISBiometricRequest;
    use cloudabis_sdk\Models\EnumOperationName;
    use cloudabis_sdk\Utilities\CloudABISConstant;
    use cloudabis_sdk\Utilities\CloudABISResponseParser;

    define('CloudABIS_API_URL', 'https://fpsvr101.cloudabis.com/v1/');
    define('CloudABISAppKey', '54a4cf14b9fc4e3cbc5fc4d8058d5c11');
    define('CloudABISSecretKey', 'GVgN/8Q3z/P/5RmpBf6EONq9G/0=');
    define('CloudABISCustomerKey', '19713DF218AC45E6A03B8E2372705E64');
    define('ENGINE_NAME', 'FPFF02');
    define('TEMPLATE_FORMAT', 'ISO');
    //Read token from CloudABIS Server
    $cloudABISAPI = new CloudABISAPI(CloudABISAppKey, CloudABISSecretKey, CloudABIS_API_URL);
    $token = $cloudABISAPI->GetToken();
    if ( ! is_null($token) && isset($token->access_token) != "" )
        $_SESSION['access_token'] = $token->access_token;
    else
        SetStatus("CloudABIS Not Authorized!. Please check credentails");



?>

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
                            <label for="">Select Area</label>
                            @php
                            use App\Area;
                            $area = new Area();
                            $data = $area->get();

                             @endphp

                            <select name="area_id" class="form-control">
                                <option>--- Select Area ---</option>
                            @foreach($data as $d)
                            <option value="{{$d->id}}">{{$d->name}}</option>
                            @endforeach

                            </select>
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
                          <input class="" type="button" name="biometricCapture" value="Biometric Capture" onclick="captureBiometric()">
                          <input type="hidden" name="templateXML" id="templateXML" value="">
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
