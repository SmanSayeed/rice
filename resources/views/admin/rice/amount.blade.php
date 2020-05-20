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
                      <h3 class="card-title">চালের পরিমাণ ইনপুট</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('store_rice_amount')}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <label> ডিলার এর নাম: </label>
                        <div class="form-group">

                            <select class="form-control" name="dealer_id" >
                                <option>--- ডিলার নির্বাচন ---</option>
                                @if(!empty($data))
                                  @foreach($data as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }} </option>
                                  @endforeach
                                @endif
                            </select>



                          </div>

                          <div class="form-group">
                            <label> ইউনিয়ন অথবা পৌরসভা নির্বাচন </label>

                            @php
                            use App\Area;
                            $area = new Area();
                            $data = $area->get();

                             @endphp

                            <select class="form-control" name="area_id" >
                                <option>--- ইউনিয়ন অথবা পৌরসভা নির্বাচন ---</option>
                                @if(!empty($data))
                                  @foreach($data as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }} </option>
                                  @endforeach
                                @endif
                            </select>



                          </div>

                          <div class="form-group">
                            <label for=""> মোট চালের পরিমাণ </label>
                            <input type="number" class="form-control" id="" placeholder="Enter Amount" name="dealer_rice_amount" >
                          </div>

                          <div class="form-group">
                            <label for=""> প্রদেয় চালের পরিমাণ </label>
                            <input type="number" class="form-control" id="" placeholder="Enter Amount" name="taker_limit" >
                          </div>


                        <div class="form-group">
                            <label for=""> চাল প্রদানের তারিখ </label>
                            <input type="date" class="form-control" id="" placeholder="Enter Date" name="rice_giving_time" >
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
