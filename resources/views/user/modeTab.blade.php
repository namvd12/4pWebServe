<div class="tab-pane fade show " id="modeTab">
    <div class="card">
        <!-- Default panel contents -->
        <div class="card-header" style="background-color: whitesmoke; font-size: 130%">Setup mode</div>
        <div class="card-body">    
            @php
                $runningSelect = "";
                $testingSelect = "";
                $updateSelect = "";
                $offSelect = "";
                $color = "";
                switch ($config['modeSystem']) {
                    case 'running':
                        $runningSelect = "selected";
                        $color = "limegreen";
                        break;
                    case 'testing':
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
                <option style="color: limegreen" value="running" {{ $runningSelect }}>Running</option>
                <option style="color: brown" value="testing" {{ $testingSelect }}>Testing</option>
                <option style="color: blue" value="update" {{ $updateSelect }}>Update</option>
                <option style="color: red" value="off" {{ $offSelect }}>OFF</option>
            </select>
            <button class="btn btn-outline-primary mt-3" onclick="saveModeClick()">Save</button>
        </div> 
    </div> 
</div>