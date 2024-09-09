@extends("layouts.master")
@section("ccs")
    <link href="{{ asset('ccs/setting.css')}}" rel="stylesheet" />
    <link href="{{ asset('ccs/table.css')}}" rel="stylesheet" />
@endsection
@section("js")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/setting.js')}}"></script>
@endsection
@section("content")
   <h2 class="text-center"> Settings</h2>
   <div class="row">
        <div class="col-md-2 col-xl-3">
            <div class="card">
                <div class="card-header" style="background-color: whitesmoke; font-size: 130%">Setting</div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a class="list-group-item list-group-item-action" onclick="listSettingClick('profileTab')">Profile</a>
                        <a class="list-group-item list-group-item-action" onclick="listSettingClick('passwordTab')">Password</a>                
                        <a class="list-group-item list-group-item-action" onclick="listSettingClick('configTab')">Config System</a> 
                        @if($hasPermission) 
                            <a class="list-group-item list-group-item-action dropdown-toggle" data-bs-toggle="dropdown">Categories</a> 
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" onclick="listSettingClick('categoriesListTab')">Categories List</a></li>
                                <li><a class="dropdown-item" onclick="listSettingClick('categoriesAddTab')">Categories Add</a></li>
                            </ul> 
                            <a class="list-group-item list-group-item-action dropdown-toggle" data-bs-toggle="dropdown">Admin</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" onclick="listSettingClick('userAllTab')">Users</a></li>
                                <li><a class="dropdown-item" onclick="listSettingClick('RFManagerTab')">RF clients</a></li>
                                <li><a class="dropdown-item" onclick="listSettingClick('modeTab')">Mode system</a></li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col md-10 col-xl-8">
            <div class="tab-content">
                @include('user.profileTab')
                @include('user.passwordTab')
                @include('user.configTab')
                @include('user.userAllTab')
                @include('user.RFManagerTab')
                @include('user.modeTab')
                @include('user.categoriesListTab')
                @include('user.categoriesAddTab')
                @include('user.categoriesEditTab')
                @include('user.UsereditTab')
                @include('user.UserAddTab')
            </div>
        </div>
   </div>
       <!-- The Modal categories add devices -->
       <div class="modal" id="modalAddDevice">   
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add device</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->           
            <div class="modal-body">
                <input type="hidden" id="deviceName" name="deviceName">
                <input type="hidden" id="modalMode" name="modalMode">
                <label class="mb-2" > Device name:</label>
                <select class="form-select" id="deviceSelect" onchange="selectMachine()">
                    <option selected>Select machine </option>
                    @foreach($listDevice as $devices)
                    <option value="{{ $devices['deviceID'] }}">{{ $devices['deviceName'] }}</option>
                @endforeach                                   
                </select>
                <label class="mt-3" > Device code:</label>
                <input type="text" class="form-control" id="deviceCode" name="deviceCode" style="background-color: whitesmoke" readonly required>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">            
                <button type="submit" class="btn btn-primary" id="modalSave" onclick="modalAddDeviceClick()">Save</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
@endsection