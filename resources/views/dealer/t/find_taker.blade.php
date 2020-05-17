@extends('layouts.dealer_master')
@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
   <h1 style = "color:green"> {{ session()->get('success') }}</h1>
</div>
@endif

<form action="{{route('action_find_taker')}}" method="post" class="form">
        @csrf
        <div class="form-group">
              Card ID: <input type="text" name="card_id" class="form-control"><br>

              <h1 class="headline">Identity</h1>
<div class="mt-10">
    <label>Capture Type:</label>
    <select name="captureType" id="captureType">
        <option value="SingleCapture">Single Capture</option>
        <option value="DoubleCapture">Double Capture</option>
    </select>
</div>
<div class="mt-10">
    <label>Quick Scan:</label>
    <select name="quickScan" id="quickScan">
        <option value="Enable">Enable</option>
        <option value="Disable">Disable</option>
    </select>
</div>
<div>
    <label id="lblCurrentDeviceName">Current Device Name:</label>
    <input type="button" name="biometricCapture" value="Biometric Capture" onclick="captureBiometric()">
    <input type="submit" name="identify" value="Identify">
</div>
<input type="button" value="Back" onClick="javascript:backToHome()">
<input type="hidden" name="templateXML" id="templateXML" value="">

        </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Submit</button>
              </div>



    </form>

@endsection
