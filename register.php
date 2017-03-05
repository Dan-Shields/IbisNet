<?php
require 'php/database.php';
require 'steamauth/steamauth.php';
require_once 'php/user-classes.php';



if (!isset($_SESSION['steamid'])) {
	echo loginbutton('rectangle');
} else {
	$shouldRegister = FALSE;
	require 'steamauth/userinfo.php';

	$loggedInUser = new LoggedInUser($steamprofile['steamid']);

	if ($loggedInUser->registered() === TRUE) {
		echo "<a href='http://localhost/ksp/profile?steamid=" . $loggedInUser->getSteam() . "'>My Profile</a>";
	} else {
		echo "Hi <b>". $steamprofile['personaname'] . "</b>, please register below.";
		$shouldRegister = TRUE;
	}
	echo logoutButton();

	if ($shouldRegister) {
		echo "
		<form id='user-registration' action='php/register-user.php' method='post'>
			E-mail: 		<input type='text' id='email' name='email'><br/>
			Alias (must be identical to KSP username, case-sensitive): 	<input type='text' id='alias' name='alias'><br/>

		<input type='submit'>
		</form>";
	}
}




?>