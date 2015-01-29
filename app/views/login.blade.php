@extends("templates/master")
@section("head")

	<link rel="stylesheet" href="/css/login.css">

@stop
@section("content")
	
	<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in to continue</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                <form method="POST" action="/login" accept-charset="UTF-8" class="form-signin">

                    <input name="_token" type="hidden" value="R7slwqm83nMgxauDn7KEEcGuHOTUzbRFvAlXAnzW">   
				    <input class="form-control" placeholder="Email" required="required" autofocus="autofocus" name="email" type="text">
				    <span class="required"></span>
					<input class="form-control" placeholder="Password" required="required" name="password" type="password" value="">
				    <span class="required"></span>
				    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				</form>
            </div>
        </div>
    </div>
</div>

@stop
