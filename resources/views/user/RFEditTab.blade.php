<div class="tab-pane fade show " id="RFEditTab"> 
    <div class="card">
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for="">User Edit</label>
            <div class="btn">
                <a class="btn btn-primary" onclick="saveRF()">Save</a>
                <a class="btn btn-outline-primary" onclick="listSettingClick('RFManagerTab')">Cancel</a>
            </div>
        </div>
        <div class="card-body">
            @if(isset($rfInfor))
            <form action="">
                <div class="row g-4 align-items-center">
                    <div class="col-md-12">
                        {{-- <label for="">RF ID</label> --}}
                        <input type="text" class="form-control" style="background-color: whitesmoke;" id="rf_id" name="rf_id" value="{{ $rfInfor['RFID'] }}" readonly hidden>
                    </div>
                    <div class="col-md-12">
                        <label for="">RF Address</label>
                        <input type="number" class="form-control" id="client_addr" name="client_addr" value="{{ $rfInfor['clientAddr'] }}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Port</label>
                        <input type="number" class="form-control" id="client_port" name="client_port" value="{{ $rfInfor['port'] }}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Device ID</label>
                        <select class="form-select" id="device_id" name="device_id" onchange="selectMachineRF()">
                            @foreach ($listDeviceInfor as $DeviceInfor)

                                @if($DeviceInfor['deviceID'] == $rfInfor['deviceID'])
                                    <option selected>{{ $DeviceInfor['deviceID'] }}</option>
                                @else
                                    <option>{{ $DeviceInfor['deviceID'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Device Code</label>
                        @foreach ($listDeviceInfor as $DeviceInfor)
                            @if($DeviceInfor['deviceID'] == $rfInfor['deviceID'])
                            <input type="text" class="form-control" id="device_code" name="device_code" value="{{ $DeviceInfor['deviceCode'] }}" readonly>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-12">
                        <label for="">Status</label>
                        <input type="text" class="form-control" style="background-color: whitesmoke;" id="status" name="status" value="{{ $rfInfor['status'] }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="">Region</label>
                        <select class="form-select" id="region_name" name="region_name">
                            @foreach ($listRegion as $region)
                                @if($region['deviceCode'] == $rfInfor['region'])
                                    <option selected>{{ $region['deviceCode'] }}</option>
                                @else
                                    <option>{{ $region['deviceCode'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Number device</label>
                        <input type="number" class="form-control" id="numberDevice" name="numberDevice" value="{{ $rfInfor['numberDevice'] }}">
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>