@extends("layouts.master")
@section("ccs")
    <link href="{{ asset('css/table.css')}}" rel="stylesheet" />
@endsection
@section("js")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/listMachinePlan.js')}}"></script>
    <script src="{{asset('js/newMachinePlan.js')}}"></script>
@endsection
@section("content")
    <h2 class="text-center">List machine plan</h2>
    <table class="table table-bordered table-hover" id="mytable">
        <thead>
            <tr class="text-center">
                <th>Line</th>
                <th>Machine</th>
                <th>Item</th>
                <th>Cycles</th>
                <th>Time lates</th>
                <th>Time maintenace</th>
                <th>Time remaining</th>
                <th>Note</th>
                <th>Status</th>
                <th>Update Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($listMachinePlan as $MachinePlan)
            <tr class="text-center inforMachine-row" style="vertical-align: middle">
                <td class="line-column">{{ $MachinePlan['line'] }}</td>
                <td class="machine-column" >{{ $MachinePlan['deviceName'] }}</td>
                <td>{{ $MachinePlan['item'] }}</td>
                <td>{{ $MachinePlan['cycles'] }}</td>
                <td>{{ $MachinePlan['timeLates'] }}</td>
                <td>{{ $MachinePlan['timeMaintenace'] }}</td>
                <td>{{ $MachinePlan['timeRemaining'] }}</td>
                <td class="note" data-toggle="tooltip" data-placement="top" title="{{ $MachinePlan['note'] }}"> {{ $MachinePlan['note'] }}</td>
                @if ($MachinePlan['status'] == 'OK')
                    <td style="color: green">{{ $MachinePlan['status'] }}</td>
                @else
                    <td style="color: red">{{ $MachinePlan['status'] }}</td>
                @endif
                <td>
                    @php
                        $deviceID = $MachinePlan['deviceID'];
                        $item = $MachinePlan['item'];
                        $statusUpdate = $MachinePlan['status'];
                        $maintenaceID = $MachinePlan['maintenanceID'];
                    @endphp
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="updateClick('{{ $deviceID }}', '{{ $item }}','{{ $statusUpdate }}', {{ $maintenaceID }})">Update</a>
                </td>
                <td>
                    @php
                        $maintenaceID = $MachinePlan['maintenanceID'];
                        $timeMaintenace =  $MachinePlan['timeMaintenace'];
                    @endphp
                    <a href="{{ route('updateMachinePlan',['maintenanceID'=>$maintenaceID]) }}" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger " onclick="deleteClick('{{ $maintenaceID }}','{{ $timeMaintenace }}')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- The Modal -->
    <div class="modal" id="myModal">   
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update status</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->           
            <div class="modal-body">
            <input type="hidden" name="code" id="code" value=""/>
            <input type="hidden" name="item" id="item" value=""/>
            <input type="hidden" name="statusUpdate" id="statusUpdate" value=""/>
            <input type="hidden" name="maintenaceID" id="maintenaceID" value=""/>

            <label class="mb-2" > Status:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioOK" checked onchange="checkRadio('OK')">
                <label class="form-check-label" for="flexRadioDefault1">
                    OK
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioWarning" onchange="checkRadio('WAITING')">
                <label class="form-check-label" for="flexRadioDefault2">
                    WAITING
                </label>
            </div>
            <fieldset id="fieldset_plan">
                <h6 class="text-center">New plan</h6>                    
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Cycle:</label>
                    <input type="number" class="form-control" id="cycle" placeholder="Enter cycle" name="cycle" required onchange="selectCycle()">
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2"> Time start:</label>
                    <input type="date" class="form-control" id="timeStart" placeholder="Enter time start" name="timeStart" required onchange="selectTimeStart()">
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Time Maintenace:</label>
                    <input type="date" class="form-control" id="timeEnd" name="timeEnd" required readonly>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Note:</label>
                    <textarea class="form-control" rows="3" id="note" name="note"></textarea>
            <fieldset>    
            </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">            
                <button type="submit" class="btn btn-primary" id="modalSave" onclick="modalClick()">Save</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
@endsection