@extends('Frontend.master')

@section('content')


<style>

.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-logo{
    position: relative;
    margin-left: -41.5%;
}
.login-logo img{
    position: absolute;
    width: 20%;
    margin-top: 19%;
    background: #282726;
    border-radius: 4.5rem;
    padding: 5%;
}
.login-form-1{
    padding: 13.99%;
    background:#010100;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    margin-bottom:12%;
    color:#fff;
}
.login-form-2{
    padding: 9%;
    background: #b90404;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    margin-bottom:12%;
    color: #fff;
}
.btnSubmit{
    font-weight: 600;
    width: 50%;
    color: #282726;
    background-color: #fff;
    border: none;
    border-radius: 1.5rem;
    padding:2%;
}
.btnForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.btnForgetPwd:hover{
    text-decoration:none;
    color:#fff;
}
</style>
<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Login</h3>
                    
                    <form action="{{route('Frontend.pages.customer_login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name ="password" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        </form>
                    
                </div>
                <div class="col-md-6 login-form-2">
                    <div class="login-logo">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                    </div>

                    <h3>Registration</h3>
                    <form action="{{route('Frontend.pages.customer_register')}}" method= "POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name ="name"  class="form-control" placeholder="Full Name" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name ="email"  class="form-control" placeholder="Email" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name = "password" class="form-control" placeholder="Your Password " value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name ="phone"  class="form-control" placeholder="Phone number" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Register" />
                        </div>
                      
                    </form>
                </div>
            </div>
        </div>
@endsection