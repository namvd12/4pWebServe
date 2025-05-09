<div class="tab-pane fade show " id="modeTab">
    <div class="card">
        <!-- Default panel contents -->
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for=""> Setup mode</label>
            <div>
                <a class="btn btn-primary" onclick="saveModeClick()">Save</a>
                <a href="javascript:window.location.href=window.location.href" class="btn btn-outline-primary">Cancel</a>
            </div>
        </div>
        <div class="card-body">    
            @php
                $runningSelect = "";
                $testingSelect = "";
                $updateSelect = "";
                $offSelect = "";
                $color = "";
                switch ($config['modeSystem']) {
                    case 'run':
                        $runningSelect = "selected";
                        $color = "limegreen";
                        break;
                    case 'test':
                        $testingSelect = "selected";
                        $color = "brown";
                        break;
                    case 'update':
                        $updateSelect = "selected";
                        $color = "blue";
                        break;
                    case 'off':
                        $offSelect = "selected";
                        $color = "red";
                        break;                   
                    default:
                        $runningSelect = "selected";
                        $color = "limegreen";
                        break;
                }
            @endphp                          
            <select class="form-select" style="color: {{ $color }}" id="modeSelect" onchange="modeChange()">
                <option style="color: limegreen" value="run" {{ $runningSelect }}>Run</option>
                <option style="color: brown" value="test" {{ $testingSelect }}>Test</option>
                <option style="color: blue" value="update" {{ $updateSelect }}>Update</option>
                <option style="color: red" value="off" {{ $offSelect }}>OFF</option>
            </select>

        </div> 
    </div> 
</div>