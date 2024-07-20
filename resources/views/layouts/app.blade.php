<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="background-color: aqua; height:100px">
        <p>This is Header</p>
    </div>
    @yield('content')
    <div style="background-color: red; height:100px">
        <p>This is footer</p>
    </div>
</body>
</html>