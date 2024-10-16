<!DOCTYPE html>
<html lang="en">
<head>
    @php
    use App\Models\Permission;
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="{{ asset('ccs/layout.css')}}" rel="stylesheet" />
    <script src="{{asset('js/layout.js')}}"></script>
    @yield('ccs')
    @yield('js')
    <title>Saban-Wi</title>
</head>
<body style="padding-top: 65px">
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="">Saban-Wi</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              @if (Permission::userHasPermission(['View_device','Edit_device', 'Delete_device',
                                                'View_devicePlan','Edit_devicePlan', 'Delete_devicePlan',
                                                'View_sparePart','Edit_sparePart', 'Delete_sparePart']))     
                  <li class="nav-item">
                  <a class="nav-link" href="{{ route('maintenacePlan') }}">Home</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="{{ route('listDeviceAndHistory') }}">Device</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="{{ route('viewReportAllLine') }}">Report</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> Spare part </a>
                      <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{ route('maintenacePlan') }}">Machine plan</a></li>
                          <li><a class="dropdown-item" href="{{ route('listSparePartView')}}">Spare part</a></li>
                      </ul>
                  </li>
                @endif
                @if (Permission::userHasPermission(['View_callMaterial','Edit_callMaterial', 'Delete_callMaterial']))                    
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('viewCallMaterial') }}">Calling Materials</a>
                  </li>
                @endif
            </ul>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
              <li class="nav-item dropdown p-0">
                @php
                  $userFullName = session('userFullName');
                  $nameDisplay = substr($userFullName, 0, 1);
                  $nameDisplay = strtoupper($nameDisplay);
                @endphp
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" ><span class="badge bg-primary rounded-circle fs-6" style="font-family: 'Times New Roman', Times, serif">{{ $nameDisplay}}</span> </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('settings') }}">Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"  onclick="logoutClick()">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="container">
      @yield('content')
    </div>
    <div style="height: 1000px">
    </div>
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