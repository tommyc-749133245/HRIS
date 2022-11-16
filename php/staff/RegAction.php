<?php
session_start();
require_once '../dbconfig.php';

    $staffid=$_POST['staffid'];
    $pw=$_POST['password'];
    $pw1=$_POST['password1'];

    if($pw== ''){
		$errmsg_arr[] = 'Please enter password';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../Register.php');
		exit();
	}

    if($pw1== ''){
		$errmsg_arr[] = 'Please  enter confirm password';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../Register.php');
		exit();
	}
    if($pw != $pw1){
		$errmsg_arr[] = 'Passwords Do not Match';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../Register.php');
		exit();
	}

    $sql="SELECT staff_id FROM $staff_tbl WHERE staff_id LIKE '%$staffid%'"; 
    $result = $conn->query($sql);
    if($result->rowCount()== 1){
    $sql="UPDATE $staff_tbl SET Password = '$pw' WHERE staff_id ='$staffid'";
    $conn->exec($sql);
                $errmsg_arr[] = 'Password Changed ';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../index.php');
		exit();
    }else{
                $errmsg_arr[] = 'This Staff ID has not registered yet.';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../Register.php');
		exit();
			}

$conn = null;
?>