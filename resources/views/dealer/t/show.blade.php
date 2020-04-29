<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@if(session()->has('success'))
<div class="alert alert-success">
   <h1 style = "color:green"> {{ session()->get('success') }}</h1>
</div>
@endif



</body>
</html>
