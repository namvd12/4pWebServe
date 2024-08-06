<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('ccs')
    @yield('js')
    <title>Document</title>
</head>
<body style="height:1500px">
    <nav class="navbar navbar-expand-sm bg-light fixed-top">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('maintenacePlan') }}">Home</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="">Maintenace Plan</a>
                </li> --}}
            </ul>
        </div>
    </nav>
    <div class="container-fluid" style="margin-top:80px">
      <div style="height: 1500px">
        @yield('content')
      </div>
    </div>
    {{-- footer --}}
    <footer class="text-center text-lg-start text-white" style="background-color: #1c2331" >
      <div
          class="text-center p-3"
          style="background-color: rgba(0, 0, 0, 0.2)"
          >
          Bản quyền © {{ date('Y') }}, Công ty TNHH Giải pháp TULA sở hữu
      </div>
    </footer>
</body>
</html>