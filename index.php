<?php 
require_once 'controllers/controllers.php';
if ((empty($_GET['page']))||($_GET['page']=="home"))
	{
		HomePageController::index();
	}


?>