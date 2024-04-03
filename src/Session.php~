<?php
if (!isset($_SESSION)) {
	ini_set("session.gc_maxlifetime", 1800);
}
session_start();
// Set our own timestamp for the session to last, 30 minutes of idle and it gets removed
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp