<?php 

/**
 *@For Logout Processing
 *@Author KoHein
 */

$user = new UserClass();
$user ->logout();

RedirectController::to('home');

?>