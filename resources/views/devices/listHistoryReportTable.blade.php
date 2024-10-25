@php
use App\Models\Permission;
@endphp
<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <th>No. Trouble</th>
            <th>Month</th>
            <th>Week</th>
            <th>Date Production</th>
            <th>Day/Night</th>
            {{-- <th>Opening time</th> --}}
            <th>Line(A)</th>
            <th>Lane(B)</th>
            <th>BOT/TOP/PCBA</th>
            <th>Line_A_C</th>
            <th>Machine Name</th>
            <th>Trouble Name</th>
            <th>Status</th>
            <th>Time NG</th>
            <th>Status</th>
            <th>Time OK</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
            @php
                $no = 1;
            @endphp
        @if($listHistoryReport != null)    
            @foreach ($listHistoryReport as $HistoryReport)                            
                <tr class="text-center" style="vertical-align: middle">
                    <td>{{ $no++ }}</td>
                    <td>{{ $HistoryReport['noTrouble'] }}</td>
                    <td>{{ date('m',strtotime($HistoryReport['time'])) }}</td>
                    <td>{{ date('W',strtotime($HistoryReport['time'])) }}</td>
                    <td>{{ date('d-F',strtotime($HistoryReport['time'])) }}</td>

                    <td>{{ date('A',strtotime($HistoryReport['time'])) ==  'AM' ? 'Day':'Night'  }}</td>
                    {{-- <td>{{ $HistoryReport['time']}}</td> --}}
                    <td>{{ $HistoryReport['lane'] }}</td>
                    <td>{{ $HistoryReport['line'] }}</td>
                    <td>{{ $HistoryReport['topBot'] }}</td>
                    <td>{{ $HistoryReport['topBot'] == "Top"? "Line_".$HistoryReport['line']."_T" : "Line_".$HistoryReport['line']."_B"}}</td>
                    <td>{{ $HistoryReport['deviceName'] }}</td>
                    <td>{{ $HistoryReport['troubleName'] }}</td>     
                    <td style="color: red">{{ $HistoryReport['status'] }}</td> 
                    <td>{{ $HistoryReport['time'] }}</td>                     
                    <td style="color: green">{{ $HistoryReport['statusOK'] }}</td>                   
                    <td>{{ $HistoryReport['timeOK'] }}</td>                     
                    <td>
                        @if ($HistoryReport['statusOK'] == "OK")                            
                            @php
                                $historyID = $HistoryReport['historyID'];
                            @endphp
                            <a href="{{ route('viewExport',['historyID'=> $historyID]) }}" class="btn btn-outline-secondary">Export</a>
                            @if (Permission::userHasPermission(['Delete_history']))     
                                <a class="btn btn-outline-danger" onclick="deleteHistoryClick('{{ $HistoryReport['historyID'] }}','{{ $HistoryReport['historyIDOK'] }}')">Delete</a>
                            @endif
                            @endif
                    </td>                           
                </tr>
            @endforeach
        @endif
    </tbody>
</table>