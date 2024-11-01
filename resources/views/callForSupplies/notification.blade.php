@extends("layouts.master")
@section("ccs")
@endsection
@section("js")
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <link href="{{ asset('ccs/table.css')}}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">      
    <script src="{{asset('js/notification.js')}}"></script>
    <script src="{{asset('js/pusher.js')}}"></script>
    <script src="{{asset('js/callMaterial.js')}}"></script>
@endsection
@section("content")
    <h1 class="text-center">Calling Materials</h1>
    <div class="row mt-4">
        <div class="col-1 text-center">
            <a class="btn btn-outline-primary" onclick="toDayClicked('{{ date('Y-m-d') }}')"> Today</a>
        </div>
        <div class="col-2">
            <input class="form-control datePicker" type="date" name="daySearch" id="daySearch" value="{{ date('Y-m-d') }}" onchange="dateClicked()">   
        </div>
        <div class="col-1 text-center">
        </div>
        <div class="col-2">
        </div>
    </div>
    <div class="row mt-4">  
        <div id="table">      
            @include('callForSupplies.listNotification')
        </div>
    </div>
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
                <input type="hidden" name="callID" id="callID" value=""/>
                <input type="hidden" name="status" id="status" value=""/>
                <label class="mb-2" > Status:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioOK" checked onchange="checkRadio('OK')">
                    <label class="form-check-label" for="flexRadioDefault1">
                        OK
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioWarning" onchange="checkRadio('CANCEL')">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Cancel
                    </label>
                </div>
                <label class="mb-2" > Note:</label>
                <textarea class="form-control" rows="3" id="note" name="note"></textarea>
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