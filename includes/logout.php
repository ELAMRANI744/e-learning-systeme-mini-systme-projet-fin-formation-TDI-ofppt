<?php

    require 'config.php';
	session_start();

    $pseudo = $_SESSION['user'];

    // insert if not exists && update grp_id if exists
    $rq = " INSERT INTO groupe_historique VALUES('$pseudo','".$_POST['grp_id']."') ON DUPLICATE KEY UPDATE grp_id = '".$_POST['grp_id']."' ";
    mysqli_query($con,$rq);
    

    unset($_SESSION['user']);
    unset($_SESSION['plan']);

    echo "<script>window.location.href='../../login.php';</script>";

?>