<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Twilio BulkSMS | Login</title>

		<!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
	</head>
	<body class="hold-transition login-page">
	<div class="login-box">
		<div class="container-sm">
			@if(session('error'))
			<div class="alert alert-danger alert-dismissible">{{session('error')}}</div>
			@endif
			@if(session('success'))
			<div class="alert alert-success alert-dismissible">{{session('success')}}</div>
			@endif
            <center><a href="#"><b>Laravel Bulk SMS Portal</b>With Twilio</a></center>
			<h5><center>ADMIN PANEL</center></h5>
			<hr>
			<p class="login-box-msg">Sign in to start your session</p>
			<form method="POST" action="{{route('postLogin')}}">
			@csrf
                <div class="mb-3">
                    <label for="lblEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="lblPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="lblremember">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	</body>
</html>