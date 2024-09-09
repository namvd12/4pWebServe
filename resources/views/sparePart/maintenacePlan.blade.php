@extends("layouts.master")
@section("ccs")
    <link href="{{ asset('ccs/calendar.css')}}" rel="stylesheet" />
@endsection
@section("js") 
@endsection
@section("content")
        <h2 class="text-center"> Maintenance Machine Plan</h2>
        <div class="row mt-4">
            <div class="col-12">
                <a href="{{ route('newMachinePlan') }}" class="btn btn-outline-primary btn-lg m-1 " role="button" aria-pressed="true">New plan</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center" >
                <a href="{{ route('showLastMonth',['monthShowNow'=>$monthShowNow]) }}" class="btn btn-primary btn-lg m-4 " role="button" aria-pressed="true"><</a>
                <h3 class="m-4 mx-auto">{{ date('F-Y', $monthShowNow)}}</h3>
                <a href="{{ route('showNextMonth',['monthShowNow'=>$monthShowNow]) }}" class="btn btn-primary btn-lg m-4" role="button" aria-pressed="true">></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
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
                                {{-- Init value --}}
                                @php
                                    $totalOnDayLine0 = 0; 
                                    $okOnDayLine0 = 0;
                                    $totalOnDayLine1 = 0; 
                                    $okOnDayLine1 = 0;
                                    $totalOnDayLine2 = 0; 
                                    $okOnDayLine2 = 0;
                                    $totalOnDayLine3 = 0; 
                                    $okOnDayLine3 = 0;
                                    $totalOnDayLine4 = 0; 
                                    $okOnDayLine4 = 0;
                                    $totalOnDayLine5 = 0; 
                                    $okOnDayLine5 = 0;
                                    $totalOnDayLine6 = 0; 
                                    $okOnDayLine6 = 0;
                                    $totalOnDayLine7 = 0; 
                                    $okOnDayLine7 = 0;
                                    $totalOnDayLine8 = 0; 
                                    $okOnDayLine8 = 0;
                                @endphp                                            
                                @if ($Day == $arrayDayofWeek[$i])  
                                    {{-- caculate event totalOnDay, okOnday --}}
                                    @php
                                        $dayValue = $day; 
                                        // Line 0 (LTE)
                                        $okOnDayLine0 = $arrayPlanLine0[$day]['OK'];
                                        $totalOnDayLine0 = $arrayPlanLine0[$day]['total'];
                                        // Line 1
                                        $okOnDayLine1 = $arrayPlanLine1[$day]['OK'];
                                        $totalOnDayLine1 = $arrayPlanLine1[$day]['total'];
                                        // Line 2
                                        $okOnDayLine2 = $arrayPlanLine2[$day]['OK'];
                                        $totalOnDayLine2 = $arrayPlanLine2[$day]['total'];
                                        // Line 3
                                        $okOnDayLine3 = $arrayPlanLine3[$day]['OK'];
                                        $totalOnDayLine3 = $arrayPlanLine3[$day]['total'];
                                        // Line 4
                                        $okOnDayLine4 = $arrayPlanLine4[$day]['OK'];
                                        $totalOnDayLine4 = $arrayPlanLine4[$day]['total'];
                                        // Line 5
                                        $okOnDayLine5 = $arrayPlanLine5[$day]['OK'];
                                        $totalOnDayLine5 = $arrayPlanLine5[$day]['total'];
                                        // Line 6
                                        $okOnDayLine6 = $arrayPlanLine6[$day]['OK'];
                                        $totalOnDayLine6 = $arrayPlanLine6[$day]['total'];
                                        // Line 7
                                        $okOnDayLine7 = $arrayPlanLine6[$day]['OK'];
                                        $totalOnDayLine7 = $arrayPlanLine6[$day]['total'];
                                        // Line 8
                                        $okOnDayLine8 = $arrayPlanLine6[$day]['OK'];
                                        $totalOnDayLine8 = $arrayPlanLine6[$day]['total'];
                                        
                                        $daySelect = strtotime(date('Y/m',$monthShowNow)."/$dayValue");
                                    @endphp
                                    {{-- event to CCS --}}
                                    @if ($daySelect == strtotime(date('Y/m/d')))  
                                        @php
                                        $eventDayCCS = "today";
                                        $eventCCSOK = 'event-success';
                                        $eventCCSWarning = 'event-danger';
                                        @endphp
                                    @elseif ($daySelect < strtotime(date('Y/m/d')))  
                                    @php
                                        $eventDayCCS = "other-day";
                                        $eventCCSOK = 'event-success';
                                        $eventCCSWarning = 'event-danger';
                                        @endphp                                             
                                    @elseif ($daySelect == strtotime(date('Y/m/d', strtotime("+1 day"))) ||
                                            $daySelect == strtotime(date('Y/m/d', strtotime("+2 day"))) ||
                                            $daySelect == strtotime(date('Y/m/d', strtotime("+3 day"))))
                                            @php
                                                $eventDayCCS = "other-day";       
                                                $eventCCSOK = 'event-success';
                                                $eventCCSWarning = 'event-warning';
                                            @endphp                               
                                    @else     
                                        @php
                                            $eventDayCCS = "other-day";
                                            $eventCCSOK = 'event-success';
                                            $eventCCSWarning = 'event-normal';
                                        @endphp                                       
                                    @endif
                                    {{-- eventCCS each line --}}
                                    @php
                                        // line 0
                                        if($totalOnDayLine0 == $okOnDayLine0)
                                        {
                                            $eventCCSLine0 = $eventCCSOK;
                                        }
                                        else {
                                            $eventCCSLine0 = $eventCCSWarning;
                                        }
                                        // line 1
                                        if($totalOnDayLine1 == $okOnDayLine1)
                                        {
                                            $eventCCSLine1 = $eventCCSOK;
                                        }
                                        else {
                                            $eventCCSLine1 = $eventCCSWarning;
                                        }
                                        // line 2
                                        if($totalOnDayLine2 == $okOnDayLine2)
                                        {
                                            $eventCCSLine2 = $eventCCSOK;
                                        }
                                        else {
                                            $eventCCSLine2 = $eventCCSWarning;
                                        }
                                        // line 3
                                        if($totalOnDayLine3 == $okOnDayLine3)
                                        {
                                            $eventCCSLine3 = $eventCCSOK;
                                        }
                                        else {
                                            $eventCCSLine3 = $eventCCSWarning;
                                        }
                                        // line 4
                                        if($totalOnDayLine4 == $okOnDayLine4)
                                        {
                                            $eventCCSLine4 = $eventCCSOK;
                                        }
                                        else {
                                            $eventCCSLine4 = $eventCCSWarning;
                                        }
                                        // line 5
                                        if($totalOnDayLine5 == $okOnDayLine5)
                                        {
                                            $eventCCSLine5 = $eventCCSOK;
                                        }
                                        else {
                                            $eventCCSLine5 = $eventCCSWarning;
                                        }
                                        // line 6
                                        if($totalOnDayLine6 == $okOnDayLine6)
                                        {
                                            $eventCCSLine6 = $eventCCSOK;
                                        }
                                        else {
                                            $eventCCSLine6 = $eventCCSWarning;
                                        }
                                        // line 7
                                        if($totalOnDayLine7 == $okOnDayLine7)
                                        {
                                            $eventCCSLine7 = $eventCCSOK;
                                        }
                                        else {
                                            $eventCCSLine7 = $eventCCSWarning;
                                        }
                                        // line 8
                                        if($totalOnDayLine8 == $okOnDayLine8)
                                        {
                                            $eventCCSLine8 = $eventCCSOK;
                                        }
                                        else {
                                            $eventCCSLine8 = $eventCCSWarning;
                                        }   
                                    @endphp        
                                    {{-- event to display --}}
                                    @php
                                        $eventLine0 = $totalOnDayLine0 == 0? "":" Job Order line LTE ($okOnDayLine0/$totalOnDayLine0)";
                                        $eventLine1 = $totalOnDayLine1 == 0? "":" Job Order line 1 ($okOnDayLine1/$totalOnDayLine1)";                                       
                                        $eventLine2 = $totalOnDayLine2 == 0? "":" Job Order line 2 ($okOnDayLine2/$totalOnDayLine2)";
                                        $eventLine3 = $totalOnDayLine3 == 0? "":" Job Order line 3 ($okOnDayLine3/$totalOnDayLine3)";
                                        $eventLine4 = $totalOnDayLine4 == 0? "":" Job Order line 4 ($okOnDayLine4/$totalOnDayLine4)";
                                        $eventLine5 = $totalOnDayLine5 == 0? "":" Job Order line 5 ($okOnDayLine5/$totalOnDayLine5)";
                                        $eventLine6 = $totalOnDayLine6 == 0? "":" Job Order line 6 ($okOnDayLine6/$totalOnDayLine6)";
                                        $eventLine7 = $totalOnDayLine7 == 0? "":" Job Order line 7 ($okOnDayLine7/$totalOnDayLine7)";
                                        $eventLine8 = $totalOnDayLine8 == 0? "":" Job Order line 8 ($okOnDayLine8/$totalOnDayLine8)";
                                    @endphp
                                    @break
                                @else 
                                    @php
                                        $dayValue = "";
                                        $eventLine0 = "";
                                        $eventLine1 = "";                                   
                                        $eventLine2 = "";
                                        $eventLine3 = "";
                                        $eventLine4 = "";
                                        $eventLine5 = "";
                                        $eventLine6 = "";
                                        $eventLine7 = "";
                                        $eventLine8 = "";
                                        $eventDayCCS = "other-day";
                                        $eventCCSOK = 'event-normal';
                                        $eventCCSWarning = 'event-normal';
                                    @endphp                              
                                @endif                                    
                            @endforeach
                            <td class="{{ $eventDayCCS }}"> 
                                <div class="date">{{ $dayValue }}</div>
                                @if($eventLine0 != "" || $eventLine1 != "" || $eventLine2 != "" || $eventLine3 != "" || $eventLine4 != "" || $eventLine5 != ""
                                || $eventLine6 != ""|| $eventLine7 != ""|| $eventLine8 != "")                      
                                <div class="event"> 
                                    @if($eventLine0 != "")                   
                                    <a href="{{ route('listMachinePlan',['day'=>$daySelect, 'line' => 0]) }}" class="event-underline-hover {{ $eventCCSLine0 }} " >{{ $eventLine0 }}</a>   
                                    @endif                                                                                                                                         
                                    @if($eventLine1 != "")                   
                                    <a href="{{ route('listMachinePlan',['day'=>$daySelect, 'line' => 1]) }}" class="event-underline-hover {{ $eventCCSLine1 }} " >{{ $eventLine1 }}</a>   
                                    @endif                                                                                                                                         
                                    @if($eventLine2 != "")                   
                                    <a href="{{ route('listMachinePlan',['day'=>$daySelect, 'line' => 2]) }}" class="event-underline-hover {{ $eventCCSLine2 }} ">{{ $eventLine2 }}</a>   
                                    @endif                                                                                                                                         
                                    @if($eventLine3 != "")                   
                                    <a href="{{ route('listMachinePlan',['day'=>$daySelect, 'line' => 3]) }}" class="event-underline-hover {{ $eventCCSLine3 }} ">{{ $eventLine3 }}</a>   
                                    @endif                                                                                                                                         
                                    @if($eventLine4 != "")                   
                                    <a href="{{ route('listMachinePlan',['day'=>$daySelect, 'line' => 4]) }}" class="event-underline-hover {{ $eventCCSLine4 }} ">{{ $eventLine4 }}</a>   
                                    @endif                                                                                                                                         
                                    @if($eventLine5 != "")                   
                                    <a href="{{ route('listMachinePlan',['day'=>$daySelect, 'line' => 5]) }}" class="event-underline-hover {{ $eventCCSLine5 }} ">{{ $eventLine5 }}</a>   
                                    @endif                                                                                                                                         
                                    @if($eventLine6 != "")                   
                                    <a href="{{ route('listMachinePlan',['day'=>$daySelect, 'line' => 6]) }}" class="event-underline-hover {{ $eventCCSLine6 }} ">{{ $eventLine6 }}</a>   
                                    @endif                                                                                                                                         
                                    @if($eventLine7 != "")                   
                                    <a href="{{ route('listMachinePlan',['day'=>$daySelect, 'line' => 7]) }}" class="event-underline-hover {{ $eventCCSLine7 }} ">{{ $eventLine7 }}</a>   
                                    @endif                                                                                                                                         
                                    @if($eventLine8 != "")                   
                                    <a href="{{ route('listMachinePlan',['day'=>$daySelect, 'line' => 8]) }}" class="event-underline-hover {{ $eventCCSLine8 }} ">{{ $eventLine8 }}</a>   
                                    @endif                                                                                                                                         
                                </div>
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </table>
            </div>
        </div>

@endsection