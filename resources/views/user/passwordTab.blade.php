<div class="tab-pane fade show " id="passwordTab"> 
    <div class="card">
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for="">Password</label>
            <button type="button" class="btn btn-primary" onclick="savePassWord('{{ $userInfor['userName'] }}')"> Save</button>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-md12">
                        <label for="">Current password</label>
                        <input type="password" id="oldPassword" class="form-control" onkeyup="inputChange('warningPassword')">
                        <span id="warningPassword" style="color: red; display: none;">Error Password.</span>
                        <label for="">New password</label>
                        <input type="password" id="newPassword" class="form-control">
                        <label for="">Verify password</label>
                        <input type="password" id="verifyPassword" class="form-control" onkeyup="inputChange('warningVerifyPassword')">
                        <span id="warningVerifyPassword" style="color: red; display: none;">Error verify Password.</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>