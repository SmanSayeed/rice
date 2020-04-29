@extends('layouts.master')
@section('content')

    {{-- <ul>

        @foreach($data as $d)
            <li>{{$d->id}} {{$d->name}} {{$d->amount}} {{$d->dealer_id}}  </li>
        @endforeach

    </ul> --}}

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
              <th>Email</th>
              <th>Amount</th>
              <th>Giving Date</th>
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
                        <td> {{$d->amount}}</td>
                        <td> {{$d->rice_giving_time}}</td>
                        <td>
                          <?php  // echo $d->id ?>
                        <a href="{{ url('admin/edit_rice_amount/'. $d->id) }}" class="btn btn-info">Edit</a>
                        {{-- {{route('edit_dealer')}}/{{$d->id}}  " --}}
                            <a href="{{ url('admin/delete_rice_amount/'. $d->id) }}"  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>

                        </td>

            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Serial</th>

              <th>Name</th>
              <th>Email</th>
              <th>Amount</th>
              <th>Giving Date</th>
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

@endsection
