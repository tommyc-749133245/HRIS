<?php
session_start();
require_once '../dbconfig.php';

    $staffid=$_POST['staffid'];
    $name=$_POST['name'];
    $dept=$_POST['department'];
    $position=$_POST['position'];
    $hkid=$_POST['hkid'];
    $etype=$_POST['etype'];
    $dj=$_POST['dj'];
    $ALLimit=$_POST['ALLimit'];
    $SLLimit=$_POST['SLLimit'];
	
    $sql="SELECT staff_id FROM $staff_tbl WHERE staff_id LIKE '%$staffid%'"; 
    $result = $conn->query($sql);
    if(empty($_SESSION['ERRMSG_ARR'])&&($result->rowCount()== 1)){
    $updatesql="UPDATE $staff_tbl SET staff_name = '$name',dept = '$dept', position = '$position', HKID = '$hkid' 
                                        ,e_type = '$etype',date_joined = '$dj', AL_limit = '$ALLimit'
                                        ,SL_limit = '$SLLimit' WHERE staff_id ='$staffid'";
    $conn->exec($updatesql);
                $errmsg_arr[] = 'Update Scuess ';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../StaffRecord.php');
		exit();
    }else{
                $errmsg_arr[] = 'Missing data ';
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header('location:../../StaffRecord.php');
		exit();
			}

$conn = null;
?>