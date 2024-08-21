@extends("layouts.master")
@section("ccs")
@endsection
@section("js")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/newMachinePlan.js')}}"></script>
    <script src="{{asset('js/newSparePart.js')}}"></script>
@endsection
@section("content")
    <h2 class="text-center"> Update Spare Part</h2>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-5">
            <form action="{{ route('saveEditSparePart') }}" method="POST" >
                @csrf
                <div class="mb-3 mt-3">
                    <input type="hidden" class="form-control" style="background-color: whitesmoke" id="sparePartID" name="sparePartID" value="{{ $sparePartInfor['sparePartID'] }}" readonly required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" for="machineName "> Machine name: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" style="background-color: whitesmoke" id="code" name="code" value="{{ $sparePartInfor['deviceName'] }}" readonly required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Machine code:</label>
                    <input type="text" class="form-control" style="background-color: whitesmoke" id="code" name="code" value="{{ $sparePartInfor['deviceCode'] }}" readonly required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Line:</label>
                    <input type="text" class="form-control" style="background-color: whitesmoke" id="line" name="line"  value="{{ $sparePartInfor['line'] }}" readonly required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Spare part code: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="sparePartCode" name="sparePartCode" placeholder="Enter spare part code" value="{{ $sparePartInfor['spareCode'] }}" required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Spare part name: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="sparePartName"  name="sparePartName" placeholder="Enter spare part name" value="{{ $sparePartInfor['spareName'] }}" required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2"> Serial number: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="serialNumber" placeholder="Enter serial number" name="serialNumber" value="{{ $sparePartInfor['serialNumber'] }}" required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Number of stock:<span style="color: red">*</span></label>
                    <input type="number" class="form-control" rows="3" id="numberOfStock" name="numberOfStock" placeholder="Enter number of stock" value="{{ $sparePartInfor['numberItem'] }}" required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Cycle:<span style="color: red">*</span></label>
                    <input type="number" class="form-control" rows="3" id="cycle" name="cycle" placeholder="Enter cycle" value="{{ $sparePartInfor['cycles'] }}" required onchange="selectCycle()">
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Replacement date: <span style="color: red">*</span></label>
                    <input type="date" class="form-control" id="replacementDate" name="replacementDate" value="{{ $sparePartInfor['timeMaintenace'] }}" required onchange="selectReplacementDate()">
                </div>
                <div class="d-inline ">
                    <button  type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('maintenacePlan') }}" class="btn btn-primary btn-block mb-3 mt-3" type="submit">Back</a>                     
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
@endsection