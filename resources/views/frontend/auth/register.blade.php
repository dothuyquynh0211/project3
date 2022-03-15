<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="images/shorcut.jpg">
	<title>Register Form</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Passion+One'>
	<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Oxygen'>
  
</head>
<style>
  body{
  background: url('https://png.pngtree.com/thumb_back/fw800/back_our/20190620/ourmid/pngtree-fashion-women-s-products-investment-joining-poster-background-material-image_161486.jpg');
  font-family: 'Oxygen', sans-serif;
  color: #fff !important;
}
p {
  margin: 0 !important;
}
.main{
  margin-top: 25px;
}

.title { 
	font-size: 50px;
	font-family: 'Passion One', cursive; 
	font-weight: 400; 
  color: rgb(219, 71, 71);
}

hr{
	width: 10%;
	color: #000;
}

.form-group{
	margin-bottom: 15px;
}

label{
	margin-bottom: 15px;
}

input,
input::-webkit-input-placeholder {
  font-size: 13px;
  padding-top: 3px;
}

.main-login{
  background-color: #00000080;
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
}

.main-center{
  margin: 0 auto;
  max-width: 450px;
  padding: 40px 40px;

}

.login-button{
	margin-top: 15px;
}
.message {
  color: #fff;
  text-shadow: 1px 1px 2px red;
  padding-left: 50px;
  font-weight: bold;
}
  </style>
<body>
	<div class="container">
		<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
					<h1 class="title">RESGISTER</h1>
					<hr />
				</div>
			</div> 
			<div class="main-login main-center">
				<form class="form-horizontal" method="post">
				
						@csrf
					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Your Name</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" />
							</div>
							<div class="message" id="message_name">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Your Email</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
							</div>
							<div class="message" id="message_mail">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="adderss" class="cols-sm-2 control-label">Your Address</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-map-marker fa-lg"></i></span>
								<input type="address" class="form-control" name="address" id="address"  placeholder="Enter your Address"/>
							</div>
							<div class="message" id="message_address">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="phone" class="cols-sm-2 control-label">Number Phone</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone-square fa-lg" aria-hidden="true"></i></span>
								<input type="phone" class="form-control" name="phone" id="phone"  placeholder="Enter your Phone Number"/>
							</div>
							<div class="message" id="message_phone">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="username" class="cols-sm-2 control-label">Avatar</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								<input type="file" class="form-control" name="avatar" id="username"  placeholder="Enter your Username"/>
							</div>
							<div class="message" id="message_username">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="cols-sm-2 control-label">Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-unlock fa-lg" aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
							</div>
							<div class="message" id="message_password">
							</div>
						</div>
					</div>
					
					<div class="form-group ">
						{{-- <button type="button" class="btn btn-primary btn-lg btn-block login-button" >Register</button> --}}
						<button type="submit" class="btn btn-primary btn-lg btn-block login-button" >Register</button>
					</div>
				</form>
			</div>
			<div class="panel-heading">
				<div class="panel-title text-center">
					<h3 class="title">Todd & Quinn Shop</h3>
					<hr />
				</div>
			</div> 
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>