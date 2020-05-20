@extends('layouts.master')
@section('content')
    {{-- <ul>

        @foreach($data as $d)
    <li>{{$d->id}} {{$d->name}} {{$d->email}} <img src="{{url('/images/dealer_image')}}/{{$d->image}}" alt=""> </li>
        @endforeach

    </ul> --}}



    <h6> মাস্টাররোল প্রস্তুত এর তারিখ <?php echo date('Y-M-d'); ?> </h6> <br><br>
    <h5> {{$area->name}} জনাব {{$dealer->name}} ডিলার কর্তৃক বিবরণকৃত চালের মাস্টার রোল </h5> <br>
<table border="1">
    <tr>
        <td>ক্রমিক নং</td>

        <td>ব্যবহার কারীর পরিচিতি নং</td>
        <td>ম্যানুয়াল কার্ড নং</td>
        <td>উপভোগকারীর নাম</td>

        <td>পিতা/স্বামীর নাম</td>
        <td>পরিমান</td>
        <td>চালের দর</td>
        <td>টিপসহি</td>
    </tr>
    <?php $i = 1; ?>
    @foreach($data as $d )

        <tr>
            <td>{{$i++}}</td>

            <td>{{$d->card_id}}</td>
            <td>{{$d->mid}}</td>
            <td>{{$d->taker_name}}</td>

            <td>{{$d->father}}</td>
            <td>{{$d->amount}}</td>
            <td>১০ /-</td>
            <td></td>
        </tr>

    @endforeach
</table>
<br>
<br>
<button class="btn btn-success">Download PDF</button>
@endsection
