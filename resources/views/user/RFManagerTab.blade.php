<div class="tab-pane fade show" id="RFManagerTab">
    <div class="card">
        <!-- Default panel contents -->
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for="">RF clients</label>
            <div class="button">
                <button type="button" class="btn btn-primary" onclick="addNewRF()">Add new</button>
                <button type="button" class="btn btn-primary" onclick="addNewRFRegion()">Add new region</button>
            </div>
        </div>
        <div class="card-body">                                
            <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>RF Adress</th>
                        <th>RF Port</th>
                        <th>Machine code/Region</th>
                        <th>Status</th>
                        <th>X location</th>
                        <th>Y location</th>
                        <th>Region_Line</th>
                        <th>Number device</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cnt = 1;
                    @endphp
                    @foreach ($listRF as $rf)
                    <tr class="text-center" style="vertical-align: middle">
                        <td>{{ $cnt++ }}</td>
                        <td>{{ $rf['clientAddr'] }}</td>
                        <td>{{ $rf['port'] }}</td>
                        <td>{{ $rf['deviceCode'] }}</td>
                        <td>{{ $rf['status'] }}</td>
                        <td>{{ $rf['location_x'] }}</td>
                        <td>{{ $rf['location_y'] }}</td>
                        <td>{{ $rf['region'] }}</td>
                        <td>{{ $rf['numberDevice'] }}</td>
                        <td>
                            @if(str_contains($rf['deviceCode'],"Region"))
                                {{-- <a class="btn btn-outline-primary" onclick="editRFRegion('{{ $rf['RFID'] }}')">Edit</a> --}}
                                <a class="btn btn-outline-danger" onclick="deleteRF('{{ $rf['RFID'] }}')">Delete</a>
                            @else
                                <a class="btn btn-outline-primary" onclick="editRF('{{ $rf['RFID'] }}')">Edit</a>
                                <a class="btn btn-outline-danger" onclick="deleteRF('{{ $rf['RFID'] }}')">Delete</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div> 
    </div> 
</div>