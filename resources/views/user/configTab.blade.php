<div class="tab-pane fade show " id="configTab"> 
    <div class="card">
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for="">Config system</label>
            <div>
                <button type="button" class="btn btn-primary" onclick="saveConfig()">Save</button>
                <a href="javascript:window.location.href=window.location.href" class="btn btn-outline-primary">Cancel</a>
            </div>
        </div>
        <div class="card-body">
            <label for="">Time NG</label>
            <input type="number" class="form-control" id="timeNG" value="{{ $config['timeReportNG'] }}" onkeyup="inputChange('warningTimeNG')">
            <span id="warningTimeNG" style="color: red; display: none;">Empty value</span>
            <label for="">Folder save report</label>
            <input type="text" class="form-control" id="folderReport" value="{{ $config['folderSaveReport'] }}" onkeyup="inputChange('warningFolderReport')">
            <span id="warningFolderReport" style="color: red; display: none;">Error folder</span>
            {{-- <button type="button" class="btn btn-outline-primary mt-3" onclick="saveConfig()"> Save</button> --}}
        </div>
    </div>
    <div class="card">
        <!-- Default panel contents -->
        <div class="card-header" style="background-color: whitesmoke; font-size: 130%">Line working</div>
        <div class="card-body">  
            @php
            if($config['lineWorking'] != null)
            {
                $listLineWorking = json_decode($config['lineWorking']);
            }
            else {
                $listLineWorking = json_decode('{"LineLTE":"true","Line1":"true","Line2":"true","Line3":"true","Line4":"true","Line5":"true","Line6":"true","Line7":"true","Line8":"true"}') ;
            }
            @endphp                              
            <ul class="list-group list-group-flush">
                @foreach ($listLineWorking as $key=>$value)  
                                      
                    <li class="list-group-item">
                        {{$key}}
                        @php
                            if($value == 'true')
                            {
                                $checked = 'checked';
                            }
                            else {
                                $checked = '';
                            }
                        @endphp
                        <label class="switch ">
                            <input type="checkbox" id="checkBox{{$key}}" class="success" {{ $checked  }} onchange="saveLineWorking()">
                            <span class="slider round"></span>
                        </label>
                    </li>
                @endforeach
            </ul>
            {{-- <button type="button" class="btn btn-outline-primary mt-3" onclick="saveLineWorking()">Save</button> --}}
        </div> 
    </div> 
</div>