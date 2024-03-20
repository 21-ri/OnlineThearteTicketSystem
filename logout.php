<?php

// Start a session
session_start();

// Destroy the current session
session_destroy();

// Redirect to index.php page
header('location:index.php');

?>