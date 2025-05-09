<div class="tab-pane fade show " id="RFAddRegionTab"> 
    <div class="card">
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for="">RF Add New Region</label>
            <div class="btn">
                <a class="btn btn-primary" onclick="saveAddRFRegion()">Save</a>
                <a class="btn btn-outline-primary" onclick="listSettingClick('RFManagerTab')">Cancel</a>
            </div>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row g-4 align-items-center">
                    <div class="col-md-12">
                        <label for="">Line</label>
                        <select class="form-select" id="line_region" name="line_region">
                        @for($line = 0 ; $line < 9 ; $line++)
                            <option> {{$line}}</option>
                        @endfor
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Region</label>
                        <select class="form-select" id="region_add" name="region_add">
                        @for($number = 1 ; $number <= 20 ; $number++)
                            <option> {{"Region".$number }}</option>
                        @endfor
                    </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>