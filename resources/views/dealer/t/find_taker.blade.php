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
        </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">Submit</button>
              </div>



    </form>

@endsection
