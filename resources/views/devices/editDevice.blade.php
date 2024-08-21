@extends("layouts.master")
@section("ccs")
@endsection
@section("js")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/listDevice.js')}}"></script>
@endsection
@section("content")
    <h2 class="text-center"> Edit Device</h2>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-5">
            <form action="{{ route('saveEditDevice') }}" method="POST" >
                @csrf
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Device code: </label>
                    <input type="text" class="form-control" style="background-color: whitesmoke" id="machineCode" name="machineCode" placeholder="Enter device code" value="{{ $device['deviceCode'] }}" required readonly>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Device name: <span style="color: red">*</span></label>
                    <input type="text" class="form-control"  id="machineName" name="machineName" placeholder="Enter device name" value="{{ $device['deviceName'] }}"  required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Model:</label>
                    <input type="text" class="form-control" id="model" placeholder="Enter Model" name="model" value="{{ $device['model'] }}" >
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Serial:</label>
                    <input type="text" class="form-control" id="serial" placeholder="Enter Serial" name="serial" value="{{ $device['serial'] }}" >
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2"> Top/Bot:</label>
                    <select class="form-select" name="topBot" id="topBot" value="{{ $device['topBot'] }}" >
                            @if($device['topBot'] == "Top")
                                <option value="Top">Top</option>
                                <option value="Bot">Bot</option>    
                                @else
                                <option value="Top">Bot</option>
                                <option value="Bot">Top</option>    
                            @endif
                    
                        </select>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Line: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="line" name="line" placeholder="Enter Line" value="{{ $device['line'] }}" required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Lane: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="lane" name="lane" placeholder="Enter lane" value="{{ $device['lane'] }}" required>
                </div>
                <div class="d-inline ">
                    <button  type="submit" class="btn btn-success">Save</button>
                    {{-- <button  type="button" class="btn btn-danger" onclick="deleteMachineClick()">Delete</button> --}}
                    <a href="{{ route('listDeviceAndHistory') }}" class="btn btn-outline-info btn-block" type="submit">Back</a>                     
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
@endsection