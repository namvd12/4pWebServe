@php
use App\Models\User;
@endphp
<table class="table table-hover table-striped" id="mytable">
    <thead>
        <tr class="text-center">
            <th>No.</th>
            <th>Line</th>
            <th>Lane</th>
            <th>Position</th>
            <th>Machine</th>
            <th>Slot</th>
            <th>Time</th>
            <th>User</th>
            <th>Urgent</th>
            <th>Status</th>
            <th>Note</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
        $number = 0;
         @endphp
        @forEach($listCall as $call)

        @if ($call->tula_Key == $callID)
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
            <td>{{ $call->tula2 }}</td>
            <td>{{ $call->tula3 }}</td>
            <td>
                @if ($call->tula4 == "T")              
                TOP
                @else
                BOT
                @endif
            </td>
            <td>{{ $call->tula1 }}</td>
            <td>{{ $call->tula5 }}</td>
            <td>{{ $call->tula8 }}</td>
            <td>
                @php
                $userInfor = user::getUserinforByKey($call->tula9);
                if($userInfor != null)
                {
                    $call->tula9 = $userInfor['userName'];
                }
                else {
                    $call->tula9 = "Unknows";
                }
                @endphp
                {{  $call->tula9 }}
            </td>
            @if ($call->tula7 == 'OK')
            @php
                    $colorStatus = '';
                    $colorUrgent = '';
                    @endphp
            @elseif($call->tula7 == 'CANCEL')
            @php
                    $colorStatus = '';
                    $colorUrgent = '';
            @endphp
            @else
            @php
                    $colorStatus = 'red';
                    
                    if($call->tula6 == 'H')
                    {
                        $colorUrgent = 'red';
                    }
                    elseif ($call->tula6 == 'M') {
                        $colorUrgent = 'blue';
                    }
                    else {                   
                        $colorUrgent = 'black';
                    }
                    @endphp
            @endif
            @php
     
            if($call->tula6 == 'H')
            {
                $call->tula6 = "HIGH";
            }
            elseif ($call->tula6 == 'M') {
                $call->tula6 = "MID";
            }
            else {                   
                $call->tula6 = "LOW";
            }
            @endphp
            <td style="color: {{ $colorUrgent }} ">{{ $call->tula6}}</td>
            <td style="color: {{ $colorStatus }} ">{{ $call->tula7 }}</td>
            <td>{{ $call->tula10 }}</td>
            @if ($call->tula7 == 'WAIT')
                <td>
                    <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal" onclick="updateClick('{{ $call->tula_Key }}','OK', '{{ $call->tula10 }}')">OK</a>
                    {{-- <a href="" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="updateClick('{{ $call['callID'] }}','CANCEL', '{{ $call['note'] }}')">Cancel</a> --}}
                </td>
            @else                
                <td>
                    {{-- <a href="" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="updateClick('{{ $call['callID'] }}','OK', '{{ $call['note'] }}')">Edit</a> --}}
                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>