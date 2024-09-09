<div class="tab-pane fade show " id="UserAddTab"> 
    <div class="card">
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for="">User Edit</label>
            <a class="btn btn-primary" onclick="saveAddUser()">Save</a>
        </div>
        <div class="card-body">
            @if(isset($listPosition))
            <form action="">
                <div class="row g-10 align-items-center">
                    <div class="col-md-12">
                        <label for="">User ID</label>
                        <input type="text" class="form-control" id="user_id" name="user_id">
                    </div>
                    <div class="col-md-12">
                        <label for="">User Name</label>
                        <input type="text" class="form-control" id="user_name" name="user_name">
                    </div>
                    <div class="col-md-12">
                        <label for="">Position</label>
                        <select class="form-select" id="user_position" name="user_position">
                            @foreach ($listPosition as $position)
                                <option>{{ $position['nameGroup'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" id="full_name" name="full_name">
                    </div>
                    <div class="col-md-12">
                        <label for="">Phone</label>
                        <input type="number" class="form-control" id="user_phone" name="user_phone">
                    </div>
                    <div class="col-md-12">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="user_email" name="user_email">
                    </div>
                    <div class="col-md-12">
                        <label for="">Group</label>
                        <select class="form-select" id="user_group" name="user_group">
                            @foreach ($listPosition as $position)
                                <option>{{ $position['nameGroup'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Topic</label>
                        <select class="form-select" id="user_topic" name="user_topic">
                            @foreach ($listPosition as $position)
                                <option>{{ $position['nameGroup'] }}</option>
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