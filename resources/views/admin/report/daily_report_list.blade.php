@extends('layouts.master')
@section('content')
    {{-- <ul>

        @foreach($data as $d)
    <li>{{$d->id}} {{$d->name}} {{$d->email}} <img src="{{url('/images/dealer_image')}}/{{$d->image}}" alt=""> </li>
        @endforeach

    </ul> --}}
<div class="container">
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
              <th>Name</th>
              <th>Phone</th>
              <th>Address</th>
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

                        <td>@php
                            echo $i++;
                        @endphp</td>
                        <td>{{$d->name}}
                        </td>
                        <td>{{$d->email}}</td>
                        <td> {{$d->address}}</td>
                        <td><img src="{{url('/images/dealer_image')}}/{{$d->image}}" alt="no" class="rounded float-left" height="100px" width="80px"> </td>
                        <td>

                            <a href="{{ url('admin/daily_report/'.$d->id) }}"  class="btn btn-success" > আজকের রিপোর্ট দেখুন</a>


                        </td>

            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
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
