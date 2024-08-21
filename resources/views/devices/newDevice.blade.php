@extends("layouts.master")
@section("ccs")
@endsection
@section("js")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('js/newMachinePlan.js')}}"></script>
@endsection
@section("content")
    <h2 class="text-center"> New device</h2>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-5">
            <form action="{{ route('saveNewDevice') }}" method="POST" >
                @csrf
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Device code: <span style="color: red">*</span></label>
                    <input type="text" class="form-control"  id="machineCode" name="machineCode" placeholder="Enter device code" required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Device name: <span style="color: red">*</span></label>
                    <input type="text" class="form-control"  id="machineName" name="machineName" placeholder="Enter device name" required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Model:</label>
                    <input type="text" class="form-control" id="model" placeholder="Enter Model" name="model">
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Serial:</label>
                    <input type="text" class="form-control" id="serial" placeholder="Enter Serial" name="serial">
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2"> Top/Bot:</label>
                    <select class="form-select" name="topBot" id="topBot">
                            <option value="Top">Top</option>
                            <option value="Bot">Bot</option>                        
                        </select>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Line: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="line" name="line" placeholder="Enter Line" required>
                </div>
                <div class="mb-3 mt-3">
                    <label class="mb-2" > Lane: <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="lane" name="lane" placeholder="Enter lane" required>
                </div>
                <div class="d-inline ">
                    <button  type="submit" class="btn btn-success">Save</button>
                    <a href="{{ route('listDeviceAndHistory') }}" class="btn btn-outline-info btn-block mb-3 mt-3" type="submit">Back</a>                     
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
@endsection