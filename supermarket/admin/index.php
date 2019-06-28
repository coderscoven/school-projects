<?php 
    // load dashboard only when user is logged in 
    session_start();
    if(isset($_SESSION['input_login_name'])){ header('Location: dashboard.php'); } else { header('Location: login.php'); }
    
?>