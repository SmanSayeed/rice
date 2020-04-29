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
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
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
                <td><img src="{{url('/images/taker_image')}}/{{$d->image}}" alt="no" class="rounded float-left" height="100px" width="80px"> </td>

                            <td>
                            <a href="{{ url('admin/edit_dealer/'. $d->id) }}" class="btn btn-info">Edit</a>
                            {{-- {{route('edit_dealer')}}/{{$d->id}}  " --}}
                                <a href="{{ url('admin/delete_taker/'. $d->id) }}"  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>

                            </td>

                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Serial</th>
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
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
            </div>
        </div>
    </div>

@endsection
