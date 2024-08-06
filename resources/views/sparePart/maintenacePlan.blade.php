@extends("layouts.master")
@section("ccs")
    <link href="{{ asset('ccs/calendar.css')}}" rel="stylesheet" />
@endsection
@section("content")
    <table id="calendar">
        <caption>{{ date('m-y')}}</caption>
        <tr class="weekdays">
            <th scope="col"> Monday</th>
            <th scope="col"> Tuesday</th>
            <th scope="col"> Wednesday</th>
            <th scope="col"> Thursday</th>
            <th scope="col"> Friday</th>
            <th scope="col"> Saturday</th>
            <th scope="col"> Sunday</th>
        </tr>
        <tr class="days">
            <td class="day other-month">
                <div class="date">29</div>
            </td>
            <td class="day other-month">
                <div class="date">30</div>
            </td>
            <td class="day other-month">
                <div class="date">31</div>
            </td>
            <td class="day other-month">
                <div class="date">1</div>
            </td>
            <td class="day other-month">
                <div class="date">2</div>
            </td>
            <td class="day other-month">
                <div class="date">3</div>
            </td>
            <td class="day other-month">
                <div class="date">4</div>
            </td>
        </tr>
        <tr class="days">
            <td class="day other-month">
                <div class="date">29</div>
            </td>
            <td class="day other-month">
                <div class="date">30</div>
            </td>
            <td class="day other-month">
                <div class="date">31</div>
            </td>
            <td class="day other-month">
                <div class="date">1</div>
            </td>
            <td class="day other-month">
                <div class="date">2</div>
            </td>
            <td class="day other-month">
                <div class="date">3</div>
            </td>
            <td class="day other-month">
                <div class="date">4</div>
            </td>
        </tr>
        <tr class="days">
            <td class="day other-month">
                <div class="date">5</div>
            </td>
            <td class="day other-month">
                <div class="date">6</div>
            </td>
            <td class="day other-month">
                <div class="date">7</div>
            </td>
            <td class="day other-month">
                <div class="date">8</div>
            </td>
            <td class="day other-month">
                <div class="date">9</div>
            </td>
            <td class="day other-month">
                <div class="date">10</div>
            </td>
            <td class="day other-month">
                <div class="date">11</div>
            </td>
        </tr>
        <tr class="days">
            <td class="day other-month">
                <div class="date">12</div>
            </td>
            <td class="day other-month">
                <div class="date">13</div>
            </td>
            <td class="day other-month">
                <div class="date">14</div>
            </td>
            <td class="day other-month">
                <div class="date">15</div>
            </td>
            <td class="day other-month">
                <div class="date">16</div>
            </td>
            <td class="day other-month">
                <div class="date">17</div>
            </td>
            <td class="day other-month">
                <div class="date">18</div>
            </td>
        </tr>
        <tr class="days">
            <td class="day other-month">
                <div class="date">19</div>
            </td>
            <td class="day other-month">
                <div class="date">20</div>
            </td>
            <td class="day other-month">
                <div class="date">21</div>
            </td>
            <td class="day other-month">
                <div class="date">22</div>
            </td>
            <td class="day other-month">
                <div class="date">23</div>
            </td>
            <td class="day other-month">
                <div class="date">24</div>
            </td>
            <td class="day other-month">
                <div class="date">25</div>
            </td>
        </tr>
        <tr class="days">
            <td class="day other-month">
                <div class="date">26</div>
            </td>
            <td class="day other-month">
                <div class="date">27</div>
            </td>
            <td class="day other-month">
                <div class="date">28</div>
            </td>
            <td class="day other-month">
                <div class="date">29</div>
            </td>
            <td class="day other-month">
                <div class="date">30</div>
            </td>
            <td class="day other-month">
                <div class="date">31</div>
            </td>
            <td class="day other-month">
                <div class="date">1</div>
            </td>
        </tr>
    </table>
@endsection