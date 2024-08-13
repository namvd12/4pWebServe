@extends("layouts.master")
@section("ccs")
    
@endsection
@section("js")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/newMachinePlan.js')}}"></script>
@endsection
@section("content")
    <h2 class="text-center"> Edit machine plan</h2>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-5">
            <form action="{{ route('savePlan') }}" method="POST" >
                @csrf
                <div class="mb-3 mt-3">
                    <input type="hidden" class="form-control"  id="maintenanceID" name="maintenanceID" value="{{ $maintenceData['maintenanceID'] }}" readonly required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Machine name:</label>
                    <input type="text" class="form-control" style="background-color: whitesmoke" id="machineName" name="machineName" value="{{ $maintenceData['deviceName'] }}" readonly required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Machine code:</label>
                    <input type="text" class="form-control" style="background-color: whitesmoke" id="code" name="code" value="{{ $maintenceData['deviceCode'] }}" readonly required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Line:</label>
                    <input type="text" class="form-control" style="background-color: whitesmoke" id="line" name="line" value="{{ $maintenceData['line'] }}" readonly required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Item: <span style="color: red">*</span></label>
                    <input type="text" class="form-control"  id="item" value="{{ $maintenceData['item'] }}" placeholder="Enter item name" name="item" required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Cycle: <span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="cycle" placeholder="Enter cycle" name="cycle" value="{{ $maintenceData['cycles'] }}" required onchange="selectCycle()">
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2"> Time start: <span style="color: red">*</span></label>
                    <input type="date" class="form-control" id="timeStart" placeholder="Enter time start" name="timeStart" value="{{ $maintenceData['timeLates'] }}" required onchange="selectTimeStart()">
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Time Maintenace: <span style="color: red">*</span></label>
                    <input type="date" class="form-control" id="timeEnd" name="timeEnd" value="{{ $maintenceData['timeMaintenace'] }}" required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Note:</label>
                    <textarea class="form-control" rows="3" id="note" name="note">{{ $maintenceData['note'] }}</textarea>
                </div>
                <div class="d-inline ">
                    <button  type="submit" class="btn btn-primary">Save</button>                
                    <a href="javascript:window.history.back()" class="btn btn-primary btn-block mb-3 mt-3" type="submit">Cancel</a>                     
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
@endsection