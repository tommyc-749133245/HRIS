<?php
session_start();
require_once '../dbconfig.php';

    $name=$_POST['name'];
    $dept=$_POST['department'];
    $position=$_POST['position'];
    $hkid=$_POST['hkid'];
    $etype=$_POST['etype'];
    $dj=$_POST['dj'];
    $ALLimit=$_POST['ALLimit'];
    $SLLimit=$_POST['SLLimit'];

    if($name == ''){
		$errmsg_arr[] = 'You must enter staff name';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../StaffRecord.php');
		exit();
	}
    if($dept == ''){
		$errmsg_arr[] = 'You must enter department';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../StaffRecord.php');
		exit();
	}	
    if($position == ''){
		$errmsg_arr[] = 'You must enter position';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../StaffRecord.php');
		exit();
	}	
    if($hkid == ''){
		$errmsg_arr[] = 'You must enter HKID';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../StaffRecord.php');
		exit();
	}	
  	
    if(empty($_SESSION['ERRMSG_ARR'])){
    $sql="INSERT INTO $staff_tbl(staff_name, dept, position, HKID, e_type,date_joined,AL_limit,SL_limit)
                      VALUES('$name', '$dept', '$position', '$hkid', '$etype', '$dj', '$ALLimit', '$SLLimit')";
    $conn->exec($sql);
                $errmsg_arr[] = 'Insert success';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../StaffRecord.php');
		exit();
    }else{
           $errmsg_arr[] = 'Missing data';
           $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
           session_write_close();
	   header('location:../../StaffRecord.php');
	   exit();
			}

$conn = null;
?>