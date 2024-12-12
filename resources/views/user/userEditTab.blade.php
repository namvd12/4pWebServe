<div class="tab-pane fade show " id="UsereditTab"> 
    <div class="card">
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for="">User Edit</label>
            <div>
                <a class="btn btn-primary" onclick="saveEditUser()">Save</a>
                <a class="btn btn-outline-primary" onclick="listSettingClick('userAllTab')">Cancel</a>
            </div>
        </div>
        <div class="card-body">
            @if(isset($userInfor) && isset($listPosition))
            <form action="">
                <div class="row g-4 align-items-center">
                    <div class="col-md-12">
                        <label for="">User ID</label>
                        <input type="text" class="form-control" style="background-color: whitesmoke;" id="user_id" name="user_id" value="{{ $userInfor['userID'] }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="">User Name</label>
                        @if($userInfor['userName'] != 'admin')
                            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $userInfor['userName'] }}">
                        @else
                            <input type="text" class="form-control" style="background-color: whitesmoke;" id="user_name" name="user_name" value="{{ $userInfor['userName'] }}" readonly>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="">Position</label>
                        <select class="form-select" id="user_position" name="user_position">
                            @foreach ($listPosition as $position)
                                @if($position['nameGroup'] == $userInfor['groupName'])
                                    <option selected>{{ $position['nameGroup'] }}</option>
                                @else
                                    <option>{{ $position['nameGroup'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $userInfor['fullName'] }}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Phone</label>
                        <input type="number" class="form-control" id="user_phone" name="user_phone" value="{{ $userInfor['phone'] }}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="user_email" name="user_email" value="{{ $userInfor['email'] }}">
                    </div>
                    <div class="col-md-12">
                        <label for="">Group</label>
                        <select class="form-select" id="user_group" name="user_group">
                            @foreach ($listPosition as $position)
                                @if($position['nameGroup'] == $userInfor['position'])
                                    <option selected>{{ $position['nameGroup'] }}</option>
                                @else
                                    <option>{{ $position['nameGroup'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Topic</label>
                        <select class="form-select" id="user_topic" name="user_topic">
                            @foreach ($listPosition as $position)
                                @if($position['nameGroup'] == $userInfor['topic'])
                                    <option selected>{{ $position['nameGroup'] }}</option>
                                @else
                                    <option>{{ $position['nameGroup'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">New password</label>
                        <input type="password" class="form-control" id="user_newPassword" name="user_newPassword">
                    </div>
                    <div class="col-md-12">
                        <label for="">Confirm password</label>
                        <input type="password" class="form-control" id="user_confirmPassword" name="user_confirmPassword">
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>