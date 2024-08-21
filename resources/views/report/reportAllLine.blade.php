@extends("layouts.master")
@section("ccs")
@endsection
@section("js")
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="{{asset('js/report.js')}}"></script>

@endsection
@section("content")
    <h2 class="text-center"> Visual Reporting</h2>
    <div class="row">
        <div class="col-12">
            <button class="btn btn-outline-primary active" id="btn_allLine" onclick="viewModeClick('btn_allLine')">All line</button>
            <button class="btn btn-outline-primary " id="btn_eachLine" onclick="viewModeClick('btn_eachLine')">Each line</button>
            <button class="btn btn-outline-primary " id="btn_mttr" onclick="viewModeClick('btn_mttr')">MTTR</button>
            <button class="btn btn-outline-primary " id="btn_mtbf" onclick="viewModeClick('btn_mtbf')">MTBF</button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-2">
            <input class="form-control" type="date" name="daySearch" id="daySearch" onchange="dateClicked()">
        </div>
        <div class="col-2">
            <select class="form-select text-center" name="weekSearch" id="weekSearch" onchange="weekClicked()">
                @for ($weekCnt = 1; $weekCnt <= 52; $weekCnt++)    
                    <option value="Week {{  $weekCnt }}">Week {{  $weekCnt }}</option>
                @endfor     
            </select>
        </div>
        <div class="col-2">
            <select class="form-select text-center" name="monthSearch" id="monthSearch" onchange="monthClicked()">
                @for ($weekCnt = 1; $weekCnt <= 12; $weekCnt++)    
                @php
                    $str_month = DateTime::createFromFormat('!m', $weekCnt)->format('F');
                @endphp
                    <option value="{{ $str_month }}">{{ $str_month}}</option>
                @endfor     
            </select>
        </div>
    </div>
    <div class="row mt-4">
        <h4 class="text-center" id="nameReport"> All line</h4>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <canvas id="myChart" width="800" height="400"></canvas>
        </div>
    </div>
    <script>
        // Add active class to the current button (highlight it)
        var btns = document.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {
          var current = document.getElementsByClassName("active");
          // remove all btn active
          for(var j = 0; j < current.length; i++)
          {
              current[j].className = current[0].className.replace(" active", "");
          }
          this.className += " active";
          });
        }
    </script>
@endsection