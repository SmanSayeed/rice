@extends('layouts.dealer_master')
@section('content')

<div class="container-fluid">
     <!-- Small boxes (Stat box) -->
     <div class="row">
        @if(session()->has('success'))
        <div class="alert alert-success">
           <h1 style = "color:green"> {{ session()->get('success') }}</h1>
        </div>
        @endif
<div class="col-md-6">
<table class="table">
    <tr>
        <td>  বরাদ্দ চালের পরিমান</td>
          <td>{{$rice->dealer_rice_amount}} KG</td>
    </tr>


    <tr>
        <td>  ডিলারের অধীনে মোট উপকারভোগীর সংখ্যা -
        </td>
          <td><?php echo count($data); ?></td>
    </tr>

    <tr>
        <td>  আজকের দিনে চাল বিতরণের পরিমাণ -
        </td>
          <td>

            @php  $total = 0;  $i = 0; @endphp
                @foreach ($given as $g)
                    @php
                        $timestamp =$g->created_at;  $date = date("d-m-Y");  $match_date = date('d-m-Y', strtotime($timestamp));
                        if($date == $match_date) { $total += $g->amount;  $i = $i+1; }
                      @endphp

                @endforeach
            @php  echo   $total .' KG'; @endphp

          </td>


    </tr>

    <tr>
        <td>  বর্তমান চালের পরিমাণ </td>
          <td>{{$rice->dealer_rice_amount - $total }} KG</td>
    </tr>

    <tr>
        <td>  আজকের দিনে চাল উত্তোলনকারী উপকারভোগীর সংখ্যা -
        </td>
          <td>
            @php
                 echo   $i ;
            @endphp


          </td>
    </tr>

</table>
</div>
     </div>

</div>

@endsection
