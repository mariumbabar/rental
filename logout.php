<?php

//disconnecting from the databnase
@include 'config.php';

session_start();
session_unset();
session_destroy();

//redirecting to the login page
header('location:login_form.php');

?>