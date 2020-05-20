@extends('layouts.master')
@section('content')
    {{-- <ul>

        @foreach($data as $d)
    <li>{{$d->id}} {{$d->name}} {{$d->card_id}} {{$d->card_start_date}} {{$d->card_id}} <img src="{{url('/images/taker_image')}}/{{$d->image}}" alt=""> </li>
        @endforeach

    </ul> --}}


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                  <div class="card">
            <div class="card-header">
              <h3 class="card-title">Add Taker Rice Amount</h3>
            </div>
            <!-- /.card-header -->
            <form action="{{route('store_taker_rice_amount')}}" method="post">
                @csrf
                <input class="form-control" type="text" Placeholder="Amount of rice" name="rice_amount">
                <input class="form-control btn btn-success" type="submit" name="submit" >

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Card ID</th>
                  <th>Name</th>

                  <th>Village</th>
                  <th>Full Address</th>
                  <th>Card Start Date</th>
                  <th>Card End Date</th>

                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                @endphp
                @foreach($data as $d)
                <tr>

                <td>@php echo $i++;  @endphp</td>
                <td>{{$d->card_id}} </td>
                <td>{{$d->name}} </td>

                <td>{{$d->address1}}</td>
                <td> {{$d->address1}}</td>


                <td>{{$d->card_start_date}}</td>
                <td> {{$d->card_end_date}}</td>
                <td><input type="checkbox" name="taker[]" value="{{$d->id}}"></td>

                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Serial</th>
                    <th>Card ID</th>
                    <th>Name</th>

                    <th>Village</th>
                    <th>Full Address</th>


                    <th>Card Start Date</th>
                    <th>Card End Date</th>

                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>

        </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
            </div>
        </div>
    </div>

@endsection
