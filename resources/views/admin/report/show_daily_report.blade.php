@extends('layouts.master')
@section('content')
    {{-- <ul>

        @foreach($data as $d)
    <li>{{$d->id}} {{$d->name}} {{$d->email}} <img src="{{url('/images/dealer_image')}}/{{$d->image}}" alt=""> </li>
        @endforeach

    </ul> --}}
    <h6> মাস্টাররোল প্রস্তুত এর তারিখ <?php echo date('Y-M-d'); ?> </h6> <br><br>
    <h3> জনাব {{$dealer->name}}  ডিলার এর আজকের বিবরণী ছক (দৈনিক) </h3> <br>
<table border="1">
    <tr>
        <td>মোট মজুদ</td>

        <td>মোট বিতরণ</td>
        <td>বর্তমান স্থিতি</td>
        <td>মোট চাল উত্তোলনকারী</td>

        <td>চাল উত্তোলনে অনুপস্থিত ব্যক্তির সংখ্যা</td>
        <td>মোট মূল্য</td>
        <td>UCF থেকে মোট চালের প্রাপ্ত বরাদ্দ</td>
        <td>মন্তব্য</td>
    </tr>

        <tr>
            <td>{{$rice->dealer_rice_amount}} KG</td>

            <td>

                    @php  $total = 0;   $i = 0;  @endphp


                    @foreach ($given as $g)  @php

                            $timestamp =$g->created_at;

                            $date = date("d-m-Y");

                            $match_date = date('d-m-Y', strtotime($timestamp));
                            if($date == $match_date) {

                                    $total += $g->amount;
                                    $i = $i+1;

                                }
                     @endphp

                    @endforeach


                    @php  echo   $total ;   @endphp KG

            </td>

            <td>{{$rice->dealer_rice_amount - $total}} KG</td>
            <td><?php echo count($given); ?></td>

            <td><?php echo count($data)-count($given); ?> </td>
            <td>{{$total * 10}}</td>
            <td>{{$rice->dealer_rice_amount}} KG</td>
            <td></td>
        </tr>

</table>

<br>
<button class="btn btn-success">Download PDF</button>

@endsection
