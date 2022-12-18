<?php
include_once 'front/dbh-inc.php';
?>

<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>

<html lang="en">

<head>
	<link rel='stylesheet' type='text/css' media='screen' href='front/login.css'>
</head>

<body>
	<div class="container form-signin">

		<?php
        session_start();
        $msg = '';
		if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {

			if ( $_POST['username'] == '235647' && $_POST['password'] == 'passwd1') {
				$_SESSION['loginID'] = '235647';
		        header('location: \front\main.html');
			} else {
				$msg = 'Wrong username or password';
			}
		}
		?>
	</div> <!-- /container -->

	<div class="container">
		<div>
			<link href="./login.css" rel="stylesheet" />
			<div class="login-container">
				<div class="login-container1"></div>
				<form class="login-form" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<h4 class="form-signin-heading">
						<?php echo $msg; ?>
					</h4>
					
					<h1 class="login-text">
						<span>Enter Username and Password</span> <br />
					</h1>
					
					<div class="login-container2">
						<input type="text" placeholder="username" name="username" class="input" />
					</div>
					
					<div class="login-container3">
						<input type="text" placeholder="password" name="password" class="login-staff-password input" />
					</div>
					<button href="\\front\\main.php" name ="login" class="login-button button">Login</button>
				</form>
			</div>
		</div>
</body>

</html>