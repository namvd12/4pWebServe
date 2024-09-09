<div class="tab-pane fade show" id="RFManagerTab">
    <div class="card">
        <!-- Default panel contents -->
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for="">RF clients</label>
            <button type="button" class="btn btn-primary">Add new</button>
        </div>
        <div class="card-body">                                
            <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Machine code</th>
                        <th>RF Adress</th>
                        <th>RF Port</th>
                        <th>Status</th>
                        <th>X location</th>
                        <th>Y location</th>
                        <th>Region</th>
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
                        <td>{{ $rf['deviceName'] }}</td>
                        <td>{{ $rf['clientAddr'] }}</td>
                        <td>{{ $rf['port'] }}</td>
                        <td>{{ $rf['status'] }}</td>
                        <td>{{ $rf['location_x'] }}</td>
                        <td>{{ $rf['location_y'] }}</td>
                        <td>{{ $rf['region'] }}</td>
                        <td><a href="" class="btn btn-outline-primary">Edit</a></td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div> 
    </div> 
</div>