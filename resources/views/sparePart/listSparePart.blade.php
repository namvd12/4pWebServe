@extends("layouts.master")
@section("ccs")
    <link href="{{ asset('ccs/table.css')}}" rel="stylesheet" />
@endsection
@section("js")
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/listSparePart.js')}}"></script>
    <script src="{{asset('js/newSparePart.js')}}"></script>
@endsection
@section("content")
    <h2 class="text-center">List Spare Part</h2>
    <a href="{{ route('NewSparePart') }}" class="btn btn-outline-primary btn-lg m-1 " role="button" aria-pressed="true">New spare part</a>
    <table class="table table-bordered table-hover" id="mytable">
        <thead>
            <tr class="text-center">
                {{-- <th>No.</th> --}}
                <th>Spare Part code</th>
                <th>Spare Part Name</th>
                <th>Machine Name</th>
                <th>Line</th>
                <th>Serial number</th>
                <th>Time maintenace</th>
                <th>Number of item</th>
                <th>Cycle</th>
                <th>Time remaining</th>
                <th>Update</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
            $number = 0;
             @endphp
            @foreach($listSparePart as $SparePart)
            <tr class="text-center inforMachine-row" style="vertical-align: middle">
                {{-- @php
                    $number += 1;
                @endphp
                <td>{{ $number }}</td> --}}
                <td>{{ $SparePart['spareCode'] }}</td>
                <td>{{ $SparePart['spareName'] }}</td>
                <td>{{ $SparePart['deviceName'] }}</td>
                <td>{{ $SparePart['line'] }}</td>
                <td>{{ $SparePart['serialNumber'] }}</td>
                <td>{{ Date('d-m-Y',strtotime(str_replace('/','-', $SparePart['timeMaintenace'])))}}</td>
                <td>{{ $SparePart['numberItem'] }}</td>
                <td>{{ $SparePart['cycles'] }}</td>
                @php
                    $timeRemaining = $SparePart['timeRemaining'];
                @endphp
                @if($timeRemaining < 5)
                    <td style="color: red"> {{ $timeRemaining }} </td>
                @else
                    <td style="color: green"> {{ $timeRemaining }} </td>
                @endif

                <td>
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="updateClick({{ $SparePart['sparePartID'] }})">Update</a>
                </td>
                <td>
                    @php
                        $sparePartID = $SparePart['sparePartID']
                    @endphp
                    <a href="{{ route('editSparePart',['sparePartID' => $sparePartID]) }}" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger " onclick="deleteClick('{{ $sparePartID }}')">Delete</a>
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
            <input type="hidden" name="sparePartID" id="sparePartID" value=""/>

            <h6 class="text-center">New plan</h6>                    
            <div class="mb-3 mt-3">
                <label class="mb-2" > Cycle:</label>
            </div>
            <input type="number" class="form-control" id="cycle" placeholder="Enter cycle" name="cycle" required onchange="selectCycle()">
            <div class="mb-3 mt-3">
                <label class="mb-2" > Replacement date:</label>
                <input type="date" class="form-control" id="replacementDate" name="replacementDate" required onchange="selectReplacementDate()">
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