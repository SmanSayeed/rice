@extends('layouts.dealer_master')
@section('content')
{{--
    <table class="table">
        <tr>

            <td>Card ID</td>
            <td>Name</td>
            <td>Father Name</td>
            <td>Mother Name</td>
            <td>Phone</td>
            <td>Village</td>
            <td>Full Address</td>
            <td>Nid</td>
            <td>Bid</td>
            <td>Mid</td>
            <td>Image</td>
        </tr>
        <tr>
            <td>{{$d->card_id}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->father}}</td>
            <td>{{$d->phone}}</td>
            <td>{{$d->address1}}</td>
            <td>{{$d->address2}}</td>
            <td>{{$d->nid}}</td>
            <td>{{$d->bid}}</td>
            <td>{{$d->mid}}</td>
        <td> <img src="{{url('/images/taker_image')}}/{{$d->image}}" alt="no" class="rounded float-left" height="100px" width="80px">  </td>
        </tr>
    </table> --}}

@if($d->taker_key == 2)
    <h2 class="btn btn-danger">Already Taken Once</h2>

@endif
        <table id="" class="table table-bordered table-striped">
            <thead>
            <tr>

              <th>Card ID</th>
              <th>Name</th>
              <th>Father Name</th>
              <th>Mother Name</th>
              <th>Phone</th>
              <th>Village</th>
              <th>Full Address</th>

              <th>NID</th>
              <th>MID</th>
              <th>BID</th>


              <th>Card Start Date</th>
              <th>Card End Date</th>

              <th>Image</th>

            </tr>
            </thead>
            <tbody>

            <tr>


            <td>{{$d->card_id}} </td>
            <td>{{$d->taker_name}} </td>
            <td>{{$d->father}} </td>
            <td>{{$d->mother}} </td>
            <td>{{$d->phone}} </td>
            <td>{{$d->address1}}</td>
            <td> {{$d->address1}}</td>
            <td>{{$d->nid}} </td>
            <td>{{$d->mid}}</td>
            <td> {{$d->bid}}</td>

            <td>{{$d->card_start_date}}</td>
            <td> {{$d->card_end_date}}</td>
            <td><img src="{{url('/images/taker_image')}}/{{$d->image}}" alt="no" class="rounded float-left" height="100px" width="80px"> </

            </tr>

            </tbody>
    </table>





<form action="{{route('store_dealer_giving_rice')}}" method="post" class="form" >
        @csrf



           <label>Amount: </label>
           <br>
           <input type="number" name="amount" class="form-group "><br>

           <div class="form-group">
            <input type="hidden" name="dealer_id" value="{{Auth::user()->id}}" >
            <input type="hidden" name="taker_id" value="{{$d->id}}" >
            <input type="hidden" name="taker_key" value="{{$d->taker_key}}" >

           </div>


            <div class="form-group">
                <button class="btn btn-success" type="submit" class="form-group">Submit</button>
              </div>



    </form>

@endsection
