<div class="tab-pane fade show " id="RFAddTab"> 
    <div class="card">
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for="">RF Add New</label>
            <div class="btn">
                <a class="btn btn-primary" onclick="saveAddRF()">Save</a>
                <a class="btn btn-outline-primary" onclick="listSettingClick('RFManagerTab')">Cancel</a>
            </div>
        </div>
        <div class="card-body">
            @if(isset($listDeviceInfor))
            <form action="">
                <div class="row g-4 align-items-center">
                    <div class="col-md-12">
                        <label for="">RF Address</label>
                        <input type="number" class="form-control" id="client_addr_add" name="client_addr_add">
                    </div>
                    <div class="col-md-12">
                        <label for="">Port</label>
                        <input type="number" class="form-control" id="client_port_add" name="client_port_add">
                    </div>
                    <div class="col-md-12">
                        <label for="">Device Code</label>
                        <select class="form-select" id="device_code_add" name="device_code_add">
                            @foreach ($listDeviceInfor as $DeviceInfor)
                                 <option>{{ $DeviceInfor['deviceCode'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Region_Line</label>
                        <select class="form-select" id="region_add" name="region_add">
                            @foreach ($listRegion as $region)
                                    <option>{{ $region['deviceCode'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Number device</label>
                        <input type="number" class="form-control" id="numberDevice_add" name="numberDevice_add" value="3">
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>