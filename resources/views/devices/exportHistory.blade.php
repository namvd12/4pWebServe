@extends("layouts.master")
@section("ccs")
    <link href="{{ asset('css/image.css')}}" rel="stylesheet" />
@endsection
@section("js")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/exportData.js')}}"></script>
@endsection
@section("content")
    <h2 class="text-center"> Export History</h2>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <form action="" method="POST" >
                @csrf
                <div class="mb-3 mt-3 d-flex">
                    <input type="hidden" class="form-control"  style="max-width: 80%; background-color: whitesmoke" id="historyID" name="historyID" value="{{ $historyInfor['historyID'] }}" readonly>
                    <input type="hidden" class="form-control"  style="max-width: 80%; background-color: whitesmoke" id="folderExport" name="folderExport">
                </div>
                <div class="mb-3 mt-3 d-flex">
                    <label class="m-1" style="width: 100px" > Device code:</label>
                    <input type="text" class="form-control"  style="max-width: 80%; background-color: whitesmoke" id="machineCode" name="machineCode" value="{{ $historyInfor['deviceCode'] }}" readonly>
                </div>
                <div class="mb-3 mt-3 d-flex">
                    <label class="m-1" style="width: 100px"  > Device name: </label>
                    <input type="text" class="form-control" style="max-width: 80%; background-color: whitesmoke" id="machineName" name="machineName" value="{{ $historyInfor['deviceName'] }}" readonly>
                </div>
                <div class="mb-3 mt-3 d-flex ">
                    <label class="m-1" style="width: 100px"  > Line/Lane:</label>
                    <input type="text" class="form-control" style="max-width: 80%; background-color: whitesmoke" id="line_lane" name="line_lane" value="{{ $historyInfor['line']  }}" readonly>
                </div>
                <div class="mb-3 mt-3 d-flex ">
                    <label class="m-1" style="width: 100px"  > Trouble name:</label>
                    <input type="text" class="form-control" style="max-width: 80%;" id="troubleName" name="troubleName" value="{{ $historyInfor['troubleName']}}">
                </div>
                <div class="mb-3 mt-3 d-flex ">
                    <label class="m-1" style="width: 100px"  > Issue:</label>
                    <textarea class="form-control" style="max-width: 80%;" id="issue" name="issue" >{{ $historyInfor['issue']}}</textarea>
                    @php
                    $fileImage = $historyInfor['issue_picture'];
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
                    <div class="image-container" style="max-width: 5%;">
                       <img src="data:image/jpeg;base64,{{$ImageData}}" class="small-image"  alt="..." name='issue_picture' id="issue_picture">
                    </div>                                    
                   @endif
                </div>
                <div class="mb-3 mt-3 d-flex ">
                    <label class="m-1" style="width: 100px"  > Checking1:</label>
                    <textarea type="text" class="form-control" style="max-width: 80%;" id="checking1" name="checking1" >{{ $historyInfor['checking1']}}</textarea>
                    @php
                    $fileImage = $historyInfor['checking_picture1'];
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
                        <div class="image-container" style="max-width: 5%;">
                            <img src="data:image/jpeg;base64,{{$ImageData}}" class="small-image" name="checking_picture1" id="checking_picture1" alt="...">
                        </div>                                    
                    @endif
                </div>
                <div class="mb-3 mt-3 d-flex ">
                    <label class="m-1" style="width: 100px"  >Checking2:</label>
                    <textarea type="text" class="form-control" style="max-width: 80%;" id="checking2" name="checking2" >{{ $historyInfor['checking2']}}</textarea>
                    @php
                    $fileImage = $historyInfor['checking_picture2'];
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
                        <div class="image-container" style="max-width: 5%;">
                            <img src="data:image/jpeg;base64,{{$ImageData}}" class="small-image" name="checking_picture2" id="checking_picture2" alt="...">
                        </div>                                    
                    @endif
                </div>
                <div class="mb-3 mt-3 d-flex ">
                    <label class="m-1" style="width: 100px"  > Action1:</label>
                    <textarea type="text" class="form-control" style="max-width: 80%;" id="action1" name="action1">{{ $historyInfor['action1']}}</textarea>
                    @php
                    $fileImage = $historyInfor['action_picture1'];
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
                    <div class="image-container" style="max-width: 5%;">
                        <img src="data:image/jpeg;base64,{{$ImageData}}" class="small-image" name="action_picture1" id="action_picture1" alt="...">
                    </div>                                    
                    @endif
                </div>
                <div class="mb-3 mt-3 d-flex ">
                    <label class="m-1" style="width: 100px"  > Action2:</label>
                    <textarea type="text" class="form-control" style="max-width: 80%;" id="action2" name="action2" >{{ $historyInfor['action2']}}</textarea>
                    @php
                    $fileImage = $historyInfor['action_picture2'];
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
                    <div class="image-container" style="max-width: 5%;">
                        <img src="data:image/jpeg;base64,{{$ImageData}}" class="small-image" name="action_picture2" id="action_picture2" alt="...">
                    </div>                                    
                    @endif
                </div>
                <div class="mb-3 mt-3 d-flex ">
                    <label class="m-1" style="width: 100px"  > Result:</label>
                    <textarea type="text" class="form-control" style="max-width: 80%;" id="result" name="result">{{ $historyInfor['result']}}</textarea>
                    @php
                    $fileImage = $historyInfor['result_picture'];
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
                        <div class="image-container" style="max-width: 5%;">
                            <img src="data:image/jpeg;base64,{{$ImageData}}" class="small-image" name="result_picture" id="result_picture" alt="...">
                        </div>                                    
                    @endif
                </div>
                <div class="mb-3 mt-3 d-flex">
                    <label class="m-1" style="width: 100px"> User check:</label>
                    <div class="d-block m-1">
                        <label class="m-1">Writer by</label>
                        <select class="form-select" id="writer" name= "writer">
                            {{-- @if(count($userInfor) == 1)
                            <option name= selected>{{ $user['fullName'] }} </option>
                            @else --}}
                            @foreach($userInfor as $user)
                                <option name= selected>{{ $user['fullName'] }} </option>
                            @endforeach
                            {{-- @endif --}}
                        </select>
                    </div>
                    <div class="d-block m-1">
                        <label class="m-1">Checked by</label>
                        <select class="form-select" id="checked" name="checked">
                            @foreach($listUserCheck as $userCheck)
                                <option selected>{{ $userCheck['fullName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-block m-1">
                        <label class="m-1">Approved by</label>
                        <select class="form-select" id="approved" name="approved">
                            @foreach($listUserApprove as $userApprove)
                                <option selected>{{ $userApprove['fullName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 mt-3 d-inline">
                    <button  type="button" class="btn btn-success " style="width: 15%" onclick="saveExportClick()">Save and Export</button>                    
                    <a href="{{ route('listDeviceAndHistory') }}" class="btn btn-outline-info btn-block mb-3 mt-3" type="submit">Back</a>                     
                </div>
            </form>
        </div>
        <div class="col-1"></div>
    </div>
@endsection