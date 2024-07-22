<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{asset('js/newPassword.js')}}"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="{{ route('resetPassword', ['seriesID'=> $seriesID]) }}" method="post">
                    @csrf
                    {{-- <input type="hidden" name="seriesID" value="{{ $seriesID }} "> --}}
                    <h2 class="text-center mt-4 mb-3" style="color: black">New password</h2>
                    <P>Enter your new password:</P>
                    <input type="password" id="newPassword" name="newPassword" class="form-control mt-3 mb-3"
                        placeholder="Enter password" required />
                    <P>Confirm password:</P>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control mt-3"
                        placeholder="Enter password" required
                        onchange="confirmPassChange('newPassword','confirmPassword')" />
                    <div class="text-danger" name="text-warning" id="text-warning"></div>
                    <button class="btn btn-danger btn-block mb-5 mt-3" type="submit" disabled id="Button">Reset
                        password</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</body>

</html>