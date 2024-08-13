@extends("layouts.master")
@section("ccs")
    <link href="{{ asset('ccs/calendar.css')}}" rel="stylesheet" />
@endsection
@section("js")
    
@endsection
@section("content")
        <h2 class="text-center"> Maintenance Machine Plan</h2>
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-10 d-flex justify-content-center" >
                <a href="{{ route('showLastMonth',['monthShowNow'=>$monthShowNow]) }}" class="btn btn-primary btn-lg m-4 " role="button" aria-pressed="true"><</a>
                <h3 class="m-4 mx-auto">{{ date('F-Y', $monthShowNow)}}</h3>
                <a href="{{ route('showNextMonth',['monthShowNow'=>$monthShowNow]) }}" class="btn btn-primary btn-lg m-4" role="button" aria-pressed="true">></a>
            </div>
            <div class="col-1">
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
            <table id="calendar">
                <tr class="weekdays">
                    @foreach($arrayDayofWeek as $DayofWeek)
                        <th scope="col"> {{ $DayofWeek }}</th>
                    @endforeach
                </tr>
                @foreach ($arrayDays as $weeks)
                    <tr class="days">
                        @for ($i = 0; $i < count($arrayDayofWeek); $i++)                  
                            @foreach($weeks as $Day=>$day)                      
                                    @if ($Day == $arrayDayofWeek[$i])  
                                        {{-- caculate event totalOnDay, okOnday --}}
                                        @php
                                            $dayValue = $day; 
                                            $okOnDay = $arrayMachineMaintenace[$day]['OK'];
                                            $totalOnDay = $arrayMachineMaintenace[$day]['total'];
                                            $daySelect = strtotime(date('Y/m',$monthShowNow)."/$dayValue");
                                        @endphp
                                        {{-- event to CCS --}}
                                        @if ($daySelect == strtotime(date('Y/m/d')))  
                                            @php
                                            $eventDayCCS = "today";
                                            if($totalOnDay == $okOnDay)
                                            {
                                                $eventCCS = 'event-success';
                                            }
                                            else {
                                                $eventCCS = 'event-danger';
                                            }
                                            @endphp
                                        @elseif ($daySelect < strtotime(date('Y/m/d')))  
                                        @php
                                            $eventDayCCS = "other-day";
                                            if($totalOnDay == $okOnDay)
                                            {
                                                $eventCCS = 'event-success';
                                            }
                                            else {
                                                $eventCCS = 'event-danger';
                                            }
                                            @endphp                                             
                                        @elseif ($daySelect == strtotime(date('Y/m/d', strtotime("+1 day"))) ||
                                                $daySelect == strtotime(date('Y/m/d', strtotime("+2 day"))) ||
                                                $daySelect == strtotime(date('Y/m/d', strtotime("+3 day"))))
                                                @php
                                                    $eventDayCCS = "other-day";
                                                    if($totalOnDay == $okOnDay)
                                                    {
                                                        $eventCCS = 'event-success';
                                                    }
                                                    else {
                                                        $eventCCS = 'event-warning';
                                                    }
                                                @endphp                               
                                        @else     
                                            @php
                                                $eventDayCCS = "other-day";
                                                if($totalOnDay == $okOnDay)
                                                    {
                                                        $eventCCS = 'event-success';
                                                    }
                                                    else {
                                                        $eventCCS = 'event-normal';
                                                    }
                                            @endphp                                       
                                        @endif
                                        {{-- event to display --}}
                                        @php
                                            $event = $totalOnDay == 0? "":" Job Order ($okOnDay/$totalOnDay)";
                                        @endphp
                                        @break
                                    @else 
                                        @php
                                            $dayValue = "";
                                            $event = ""; 
                                            $eventDayCCS = "other-day";
                                            $eventCCS = 'event-normal'; 
                                        @endphp                              
                                    @endif                                            
                            @endforeach
                            <td class="{{ $eventDayCCS }}"> 
                                <div class="date">{{ $dayValue }}</div>
                                @if ($event != "")                                
                                <div class="event">                          
                                        <a href="{{ route('listMachinePlan',['day'=>$daySelect]) }}" class="event-underline-hover {{ $eventCCS }} ">{{ $event }}</a>                                    
                                </div>
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </table>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row mt-4">
            <div class="col-1"></div>
            <div class="col-10">
                <a href="{{ route('newMachinePlan') }}" class="btn btn-primary btn-lg m-1 " role="button" aria-pressed="true">New plan</a>
            </div>
            <div class="col-1"></div>
        </div>
@endsection