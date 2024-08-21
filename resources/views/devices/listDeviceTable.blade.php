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
                    <img src="data:image/jpeg;base64,{{$ImageData}}" class="img-fluid" alt="..."></td>
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