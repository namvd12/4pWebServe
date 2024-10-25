<table class="table table-hover" id="mytable">
    <thead>
        <tr class="text-center">
            <th>No.</th>
            <th>Machine Code</th>
            <th>Line</th>
            <th>Lane</th>
            <th>Position</th>
            <th>Slot</th>
            <th>Time</th>
            <th>User</th>
            <th>Urgent</th>
            <th>Status</th>
            <th>Note</th>
            <th>Handle</th>
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
            <td>{{  ++$number }}</td>
            <td>{{ $call['machineCode'] }}</td>
            <td>{{ $call['line'] }}</td>
            <td>{{ $call['lane'] }}</td>
            <td>{{ $call['position'] }}</td>
            <td>{{ $call['slot'] }}</td>
            <td>{{ $call['time'] }}</td>
            <td>{{ $call['userCall'] }}</td>
            @if ($call['status'] == 'OK')
            @php
                    $colorStatus = 'green';
                    $colorUrgent = 'green';
                    @endphp
            @elseif($call['status'] == 'CANCEL')
            @php
                    $colorStatus = 'Blue';
                    $colorUrgent = 'Blue';
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
            <td style="color: {{ $colorUrgent }} ;font-weight:bold">{{ $call['urgent'] }}</td>
            <td style="color: {{ $colorStatus }} ;font-weight:bold">{{ $call['status'] }}</td>
            <td>{{ $call['note'] }}</td>
            @if ($call['status'] == 'WAIT')
                <td>
                    <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal" onclick="updateClick('{{ $call['callID'] }}','OK', '{{ $call['note'] }}')">OK</a>
                    <a href="" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="updateClick('{{ $call['callID'] }}','CANCEL', '{{ $call['note'] }}')">Cancel</a>
                </td>
            @else                
                <td>
                    <a href="" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="updateClick('{{ $call['callID'] }}','OK', '{{ $call['note'] }}')">Edit</a>
                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>