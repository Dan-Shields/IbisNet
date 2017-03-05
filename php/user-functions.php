<?php

function displayUser($user) {
	$userInfo = $user->getInfo();

	$profile_pic_url = expandPPURL($userInfo['profile_pic_url']);

	echo "<img src='" . $profile_pic_url . "'></img>";
	echo '<br/>';
	echo 'Name: ' . $userInfo['alias'];
	echo '<br/>';
	echo 'User since: ' . $userInfo['registration'];
	echo '<br/>';
}

function expandPPURL($shorturl) {
	$profile_pic_url = 'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/fa/' . $shorturl . '_medium.jpg';
	return $profile_pic_url;
}

?>