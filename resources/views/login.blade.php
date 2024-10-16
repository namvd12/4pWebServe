<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('ccs/login.css')}}" rel="stylesheet" />
</head>

<body>
    <!-- <div class="row">
        <div class="col-7 p-0 outer_container">
            <div class="img_container">
                <div class="overlay_icon">
                    <img src="./Views/asset/img/tula_icon.png" alt="tula icon" style="width: 350px;">
                </div>
            </div>
        </div>
    </div> -->
    <div class="container login_container ">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4">
                @if (isset($nextRequest))
                    <form class="login" method="post" action="{{ route('loging',['nextRequest' => $nextRequest])}}">
                @else    
                    <form class="login" method="post" action="{{ route('loging')}}">
                @endif
                    @csrf
                    <h2 class="text-center">Login Saban-Wi</h2>
                    <div class="text-center text-success font-weight-bold">
                        <?php
                                if(isset($statusSignUp))
                                {
                                    echo($statusSignUp);
                                }                               
                            ?>
                    </div>
                    <input type="text" placeholder="User Name" name="user" required/>
                    <input type="password" placeholder="Password" name="password" required/>
                    {{-- <div class="form-check d-flex align-items-center p-0">
                        <input type="checkbox" style="max-width: 20px;" name="rememberMe">
                        <label class="form-check-label">Remember me</label>
                    </div> --}}
                    <div class="text-center text-danger">
                        <?php
                        if(isset($statusLogin))
                        {
                            echo($statusLogin);
                        }
                        ?>
                    </div>
                    <input type="submit" value="Log In" />
                    {{-- <div class="links">
                        <a href="index.php?controller=resetpw">Forgot password</a>
                        <!-- <a href="index.php?controller=signup" type="hidden">Register</a> -->
                    </div> --}}
                </form>
            </div>

        </div>
    </div>
</body>

</html>