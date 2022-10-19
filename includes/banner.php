<?php if (isset($_SESSION['user']['username'])) { ?>
	<div class="logged_in_info">
		<span>Bienvenue, <?php echo $_SESSION['user']['username'] ?></span>
		|
		<span><a href="logout.php">Se déconnecter</a></span>
	</div>
<?php } else { ?>
	<div class="banner">
		<div class="welcome_msg">
			<h1>Steam Deck Blog</h1>
			<p>
				Gardons le fil...d'actualités ! <br>
				<span>~ Sarah, admin</span>
			</p>
			<a href="register.php" class="btn">Participer</a>
		</div>

		<div class="login_div">
			<form action="<?php echo BASE_URL . 'index.php'; ?>" method="post">
				<h2>Login</h2>
				<div style="width: 60%; margin: 0px auto;">
					<?php include(ROOT_PATH . '/includes/errors.php') ?>
				</div>
				<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Nom d'utilisateur">
				<input type="password" name="password" placeholder="Mot de passe">
				<button class="btn" type="submit" name="login_btn">Se connecter</button>
			</form>
		</div>
	</div>
<?php } ?>