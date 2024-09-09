<div class="tab-pane fade show " id="userAllTab">
    <div class="card">
        <!-- Default panel contents -->
        <div class="card-header d-flex justify-content-between" style="background-color: whitesmoke; font-size: 130%">
            <label for="">All user</label>
            <button type="button" class="btn btn-primary" onclick="addNewUser()">Add new</button>
        </div>
        <div class="card-body">                                
            <table class="table table-hover">
                <thead>
                    <tr class="text-center">
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Position</th>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Group</th>
                        <th>Topic</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listUser as $user)                        
                        <tr class="text-center" style="vertical-align: middle">
                            <td>{{ $user['userID'] }}</td>
                            <td>{{ $user['userName'] }}</td>
                            <td>{{ $user['position'] }}</td>
                            <td>{{ $user['fullName'] }}</td>
                            <td>{{ $user['phone'] }}</td>
                            <td class="email" data-toggle="tooltip" data-placement="top" title="{{ $user['email'] }}">{{ $user['email'] }}</td>
                            <td>{{ $user['groupName'] }}</td>
                            <td>{{ $user['topic'] }}</td>
                            <td>
                                <a class="btn btn-outline-primary" onclick="editUser('{{ $user['userID'] }}')">Edit</a>
                                @if($user['userName'] != 'admin')
                                    <a class="btn btn-outline-primary" onclick="deleteUser('{{ $user['userKey'] }}')">Delete</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div> 
    </div> 
</div>