@extends("layouts.master")
@section("ccs")
@endsection
@section("js")
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <link href="{{ asset('ccs/table.css')}}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (!isset($callID))    
        <script src="{{asset('js/notification.js')}}"></script>
        <script src="{{asset('js/pusher.js')}}"></script>
    @endif
    <script src="{{asset('js/callMaterial.js')}}"></script>
@endsection
@section("content")
    <h1 class="text-center">Calling Materials</h1>
    <table class="table table-hover" id="mytable">
        <thead>
            <tr class="text-center">
                <th>No.</th>
                <th>Device Code</th>
                <th>Line</th>
                <th>Lane</th>
                <th>Part number</th>
                <th>Slot</th>
                <th>Number item</th>
                <th>Time call</th>
                <th>Status</th>
                <th>Urgent</th>
                <th>User call</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
            $number = 0;
             @endphp
            @forEach($listCall as $call)
 
            @if ($call['callID'] == $callID)
                @php
                    $tableHighlight =  "table-warning";
                @endphp
            @else
                @php
                    $tableHighlight =  "";
                @endphp
            @endif   
            <tr class="{{ $tableHighlight }} text-center" style="vertical-align: middle">
                <td>{{  $number++ }}</td>
                <td>{{ $call['machineCode'] }}</td>
                <td>{{ $call['line'] }}</td>
                <td>{{ $call['lane'] }}</td>
                <td>{{ $call['partNumber'] }}</td>
                <td>{{ $call['slot'] }}</td>
                <td>{{ $call['number'] }}</td>
                <td>{{ $call['time'] }}</td>
                @if ($call['status'] == 'OK')
                    @php
                        $colorStatus = 'green';
                        $colorUrgent = 'green';
                    @endphp
                @else
                    @php
                        $colorStatus = 'red';
                        if($call['urgent'] == 'HIGH')
                        {
                            $colorUrgent = 'red';
                        }
                        elseif ($call['urgent'] == 'MID') {
                            $colorUrgent = 'blue';
                        }
                        else {                   
                            $colorUrgent = 'black';
                        }
                    @endphp
                @endif
                <td style="color: {{ $colorStatus }}">{{ $call['status'] }}</td>
                <td style="color: {{ $colorUrgent }}">{{ $call['urgent'] }}</td>
                <td>{{ $call['userCall'] }}</td>
                <td>
                    @if($call['status'] != 'OK')
                        <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal" onclick="updateClick('{{ $call['callID'] }}','{{ $call['status'] }}')">Handle</a>
                    @else
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="updateClick('{{ $call['callID'] }}','{{ $call['status'] }}')">Edit</a>
                    @endif
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
                <input type="hidden" name="callID" id="callID" value=""/>
                <input type="hidden" name="status" id="status" value=""/>
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