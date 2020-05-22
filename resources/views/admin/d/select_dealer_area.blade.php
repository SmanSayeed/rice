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

            <div class="col-md-12">
                   <!-- general form elements -->

        @if(session()->has('success'))
        <div class="alert alert-success">
           <h1 style = "color:green"> {{ session()->get('success') }}</h1>
        </div>
        @endif
                   <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">ডিলার এলাকা নির্বাচন</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('store_dealer_area')}}" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <label> ডিলার এর নাম: </label>
                        <div class="form-group">

                            <select class="form-control" name="dealer" >
                                <option>--- ডিলার নির্বাচন ---</option>
                                @if(!empty($data))
                                  @foreach($data as $d)
                                      @if($d->approve_key==2 and $d->dealer_area_id == '' and $d->dealer_word == '')
                                            <option value="{{ $d->id }},{{ $d->name }}">{{ $d->name }} </option>
                                      @endif
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
                            $columns = Schema::getColumnListing('areas');

                             @endphp

                                <table border="1" class="table">
                                    <tr>
                                        <th>Union</th>

                                        <th>Word no 1</th>
                                        <th>Word no 2</th>
                                        <th>Word no 3</th>
                                        <th>Word no 4</th>

                                        <th>Word no 5</th>
                                        <th>Word no 6</th>
                                        <th>Word no 7</th>
                                        <th>Word no 8</th>
                                        <th>Word no 9</th>

                                    </tr>
                                    <?php $id_count=1; ?>
                                    @if(!empty($data))
                                      @foreach($data as $d)

                                    <tr>
                                        <td>

                                            <input

                                            onclick="document.getElementById('word_id_+<?php echo $id_count; ?>').disabled = false; document.getElementById('charstype').disabled = true;"


                                            id="area_<?php echo $id_count; ?>"
                                            type="radio"
                                            name="dealer_area"
                                            value="{{ $d->id }},{{ $d->name }}"
                                            >

                                            {{$d->name}}

                                        </td>

                                        @php $i = 1  @endphp


                                        @for($i=1;$i<=9;$i++)
                                        <td>
                                        <?php
                                             $check_word = $columns[$i+4];

                                            //  echo $d->$check_word;
                                        ?>

                                        @if( $d->${'check_word'} != '')
                                         <input  type="checkbox" name="dealer_word_{{$i}}"  value="{{$i}}" disabled >{{$i}}-
                                        <span style="color:red">Belongs to <?php echo $d->${'check_word'} ?></span>
                                        @else
                                        <input id="word_id_<?php echo $id_count; ?>" type="checkbox" name="dealer_word_{{$i}}"  value="{{$i}}"  >

                                        @endif
                                         &nbsp;&nbsp;
                                        </td>
                                        @endfor





                                    </tr>
                                    @endforeach
                                    @endif


                                </table>


                            {{-- <select class="form-control" name="dealer_area" >
                                <option>--- ইউনিয়ন অথবা পৌরসভা নির্বাচন ---</option> --}}
                                {{-- @if(!empty($data))
                                  @foreach($data as $d)
                                    <input type="radio" name="dealer_area" value="{{ $d->id }},{{ $d->name }}"> {{$d->name}}

                                    @php $i = 1;  @endphp


                                    @for($i=1;$i<=9;$i++)

                                     <input type="checkbox" name="dealer_word_{{$i}}"  value="{{$i}}">{{$i}} &nbsp;&nbsp;

                                    @endfor



                                    <br>
                                    {{-- <option value="{{ $d->id }},{{ $d->name }}">{{ $d->name }} </option> --}}
                                  {{-- @endforeach
                                @endif
                                 --}}

                            {{-- </select> --}}



                          </div>


                          {{-- <div class="form-group">
                            <label> ওয়ার্ড নির্বাচন </label><br> --}}

                            {{-- @php $i = 1;  @endphp --}}


                           {{-- @for($i=1;$i<=9;$i++)

                            <input type="checkbox" name="dealer_word_{{$i}}"  value="{{$i}}">{{$i}} &nbsp;&nbsp;

                           @endfor --}}



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
