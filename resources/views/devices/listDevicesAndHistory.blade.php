@extends("layouts.master")
@section("ccs")
    <link href="{{ asset('ccs/table.css')}}" rel="stylesheet" />
    <link href="{{ asset('ccs/image.css')}}" rel="stylesheet" />
@endsection
@section("js")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/listDevice.js')}}"></script>
@endsection
@section("content")
    <h2 class="text-center"> List device and history</h2>
    <div class="row mt-4">
        <div class="col-12">
            <label class="m-1" style="font-size: 20px">Device data</label>
            <input class="m-1" type="text" name="dataDeviceSearch" id="dataDeviceSearch">
            <a class="btn btn-outline-primary mx-2" onclick="searchDeviceClick()">Search</a>
            <a href="{{ route('newDevice') }}" class="btn btn-outline-primary mx-2">Add new </a>
        </div>
    </div>        
    <div class="row mt-4">
        <div class="col-12">
            <label class="m-1" style="font-size: 20px">Status data</label>
            <input class=" m-1" type="text" name="dataHistorySearch" id="dataHistorySearch">
            <label class="m-1" style="font-size: 20px">From</label>
            <input class="form-control datePicker mx-2" type="date" name="timeFrom" id="timeFrom" value="{{ date('Y-m-d') }}">
            <label class="m-1" style="font-size: 20px">To</label>
            <input class="form-control datePicker mx-2" type="date" name="timeTo" id="timeTo" value="{{ date('Y-m-d') }}">
            <a class="btn btn-outline-primary mx-2" onclick="searchReportClick()">Search for report</a>
        </div>
    </div>
    <div class="row mt-4">
        <div id="table">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Device code</th>
                        <th>Device name</th>
                        <th>Model</th>
                        <th>Serial</th>
                        <th>Top/Bot</th>
                        <th>Line</th>
                        <th>Lane</th>
                        <th>Status</th>
                        <th>Time</th>
                        <th>Picture</th>
                        <th>Note</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($listDevice as $device)                            
                    <tr style="vertical-align: middle">
                        <td>{{ $no++ }}</td>
                        <td>{{ $device['deviceCode'] }}</td>
                        <td>{{ $device['deviceName'] }}</td>
                        <td>{{ $device['model'] }}</td>
                        <td>{{ $device['serial'] }}</td>
                        <td>{{ $device['topBot'] }}</td>
                        <td>{{ $device['line'] }}</td>
                        <td>{{ $device['lane'] }}</td>
                        <td>{{ $device['status'] }}</td>
                        <td>{{ $device['time'] }}</td>
                        <td>
                            @php
                                $fileImage = $device['pictureDevice'];
                                $ImageData  ="";
                                if(file_exists($fileImage))
                                {
                                    $myfile = fopen("$fileImage", "r") or die("Unable to open file!");
                                    if(filesize("$fileImage") > 0){
                                    $content = fread($myfile, filesize("$fileImage"));
                                    $ImageData = $content;
                                    fclose($myfile);
                                    }
                                }
                            @endphp
                            @if($ImageData != '')    
                            <div class="image-container" style="max-width: 60%;">                                
                                <img src="data:image/jpeg;base64,{{$ImageData}}" class="small-image" alt="..."></td>
                            </div>
                            @endif
                        <td>{{ $device['note'] }}</td>                            
                        <td>
                            @php
                                $deviceID = $device['deviceID'];
                            @endphp
                            <a href="{{ route('editDevice',['deviceID' => $deviceID])}}" class="btn btn-outline-secondary">Edit</a>
                        </td>                           
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
