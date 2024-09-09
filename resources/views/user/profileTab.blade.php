<div class="tab-pane fade show active" id="profileTab">
    <div class="card">
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for="">Profile</label>
            <button type="button" class="btn btn-primary" onclick="saveProfile()">Save</button>
        </div>
        <div class="card-body">
            <form action="#">
                <div class="row">
                    <div class="col-md-2">
                        <div class="d-flex justify-content-center mb-2">
                            @if($userInfor['avatar'] == '')
                                <img id="avatar" src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                class="rounded-circle" style="width: 70px; height: 70px; object-fit: cover;" alt="example placeholder" />
                                @else
                                <img id="avatar" src="data:image/png;base64,{{ $userInfor['avatar'] }}"
                                class="rounded-circle" style="width: 70px; height: 70px; object-fit: cover;" alt="example placeholder" />
                            @endif
                        </div>
                        <div class="d-flex btn btn-outline-primary m-3 justify-content-center">
                            <label class="form-label mb-0 text-center" for="customFile2">Edit</label>
                            <input type="file" class="form-control d-none" id="customFile2" onchange="displaySelectedImage(event,'avatar')"/>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="">User Name</label>
                            <input class="form-control" type="text" style="background-color: whitesmoke" id="userName" value= "{{ $userInfor['userName'] }}" readonly>
                            <label for="">User ID</label>
                            <input class="form-control" type="text" style="background-color: whitesmoke" id="userID" value="{{ $userInfor['userID'] }}" readonly>
                            <label for="">Position</label>
                            <input class="form-control" type="text" style="background-color: whitesmoke" id="position" value= "{{ $userInfor['position'] }}" readonly>
                            <label for="">Full name</label>
                            <input class="form-control" type="text" id="fullName" value= "{{ $userInfor['fullName'] }}" required>
                            <label for="">Phone</label>
                            <input class="form-control" type="number" id="phone" value= "{{ $userInfor['phone'] }}" required>
                            <label for="">Email</label>
                            <input class="form-control" type="email" id="email" value= "{{ $userInfor['email'] }}" required>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>