<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<table border="1">
    <tr>
        <td>  বরাদ্দ চালের পরিমান</td>
          <td>{{$rice->amount}}</td>
    </tr>

    <tr>
        <td>  ডিলারের অধীনে মোট উপকারভোগীর সংখ্যা -
        </td>
          <td><?php echo count($given); ?></td>
    </tr>

    <tr>
        <td>  আজকের দিনে চাল বিতরণের পরিমাণ -
        </td>
          <td>

            @php

    $total = 0;
    $i = 0;
@endphp

@foreach ($given as $g)

@php

            $timestamp =$g->created_at;
            // echo $timestamp.'<br>';
            $date = date("d-m-Y");
            // echo $date.'<br>';
            $match_date = date('d-m-Y', strtotime($timestamp));
            if($date == $match_date) {
                // echo 'yes<br>';

                    $total += $g->amount;
                    $i = $i+1;

                }
                // else {
                //     echo 'no<br>';
                // }

@endphp

@endforeach
@php
  echo   $total ;
@endphp

          </td>
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


</body>
</html>
