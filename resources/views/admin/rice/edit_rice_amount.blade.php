@extends('layouts.master')
@section('content')



{{-- <form action="{{route('store_rice_amount')}}" method="post" enctype="multipart/form-data">
        @csrf



            Dealer: <select name="dealer_id" >
                <option>--- Select Dealer ---</option>
                @if(!empty($data))
                  @foreach($data as $d)
                    <option value="{{ $d->id }}">{{ $d->name }} </option>
                  @endforeach
                @endif

            </select><br>

           Amount: <input type="number" name="amount"><br>
           Giving time: <input type="date" name="rice_giving_time"><br>





            <div class="form-group">
                <button class="btn btn-success" type="submit">Submit</button>
              </div>



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
                      <h3 class="card-title">চালের পরিমাণ এডিট করুন</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('update_rice_amount')}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                      {{-- <label> Dealer Name: {{$data->name}}</label> --}}


                      <input type="hidden" class="form-control" id="" placeholder="Enter Amount" name="id" value="{{$rid->id}}">


                        <div class="form-group">
                          <label for=""> প্রদেয় চালের পরিমাণ </label>
                          <input type="text" class="form-control" id="" placeholder="Enter Amount" name="amount" value="{{$rid->amount}}">
                        </div>
                        <div class="form-group">
                            <label for=""> চাল প্রদানের তারিখ </label>
                            <input type="text" class="form-control" id="" placeholder="Enter Date" name="rice_giving_time" value="{{$rid->rice_giving_time}}">

                          </div>



                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
            </div>

@endsection

