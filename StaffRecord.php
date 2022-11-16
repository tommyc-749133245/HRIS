<?php
	session_start();
        require_once 'php/FromControl.php';
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>303COM Project</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/style2.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><span class="logo_colour">Human Rescource Information System</span></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="StaffRecord.php">Staff Record</a></li>
          <li><a href="LeaveRecord.php">Leave Record</a></li>
          <li><a href='php/logout.php'>Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <!-- insert your sidebar items here -->
            <h3>User Information</h3>
<p><?php  echo " Staff ID : " .$_SESSION['STAFFID'] . "<br /> Staff Name : " .$_SESSION['STAFFNAME'] . "<br />";?>
            </p>
            <h5><p id="time"></p></h5>
            <script>document.getElementById("time").innerHTML = Date();</script> 
          </div>
          <div class="sidebar_base"></div>
        </div>
      </div>
      <div id="content">

      <!-- Msg -->
<center><?php
               if(isset($_SESSION['ERRMSG_ARR']))
		      foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		          echo "<h3><font color='red'>". $msg . "</font><h3>"; 
				}
               unset($_SESSION['ERRMSG_ARR']);
?></center>

        <!-- Registation -->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form1" method="post" action="php/staff/insert.php">
<table width="100%" border="0" cellspacing="10" cellpadding="3">
<tr>
<td colspan="3"><h3>Registation</h3></td>
</tr>

<tr>
<td width="150">Staff Name</td>
<td width="6">:</td>
<td width="160">
<input name="name" type="text" id="name"></td>

<td width="150">Date Joined</td>
<td width="6">:</td>
<td width="160">
<input name="dj" type="date" id="dj"></td>

</tr>

<tr>
<td>HKID</td>
<td>:</td>
<td><input name="hkid" type="text" id="hkid"></td>
<td>Annual Leave Limit</td>
<td>:</td>
<td><input name="ALLimit" type="number" id="ALLimit" min="0"></td>
</tr>

<tr>
<td>Dept.</td>
<td>:</td>
<td><input name="department" type="text" id="department"></td>
<td>Sick Leave Limit</td>
<td>:</td>
<td><input name="SLLimit" type="number" id="SLLimit" min="0"></td>
</tr>

<tr>
<td>Postion</td>
<td>:</td>
<td><select name="position">
  <option value="NULL">----------</option>
  <option value="Manager">Manager</option>
  <option value="Assistant Manager">Assistant Manager</option>
  <option value="Supervisor">Supervisor</option>
  <option value="Senior Supervisor">Senior Supervisor</option>
  <option value="Receptionist">Receptionist</option>
  <option value="Server">Server</option>
  <option value="Cashier">Cashier</option>
  <option value="FoodRunner">FoodRunner</option>
  <option value="Operation Manager">Operation Manager</option>
</select></td>
</tr>

<tr>
<td>Employment Type</td>
<td>:</td>
<td>
<select name="etype">
  <option value="NULL">----------</option>
  <option value="Full Time">Full Time</option>
  <option value="Part Time">Part Time</option>
</select></td>
</tr>

<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td align="right"><input type="reset" name="Reset" value="Reset">  
<input type="submit" name="Submit" value="Submit"></td>
</tr>

</table>
</form>
</td>
</tr>
</table>

<!--Search-->
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form1" method="post" action="php/staff/searchAction.php">
<table width="100%" border="0" cellspacing="10" cellpadding="3">
<tr>
<td colspan="3"><h3>Search</h3></td>
</tr>
<tr>
<td width="301">
<input name="keyword" type="text" id="keyword">
<input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="css/search.png" alt="Search" title="Search" /></td>
</tr>
</table>
</form>
</td>
</tr>
</table>
</br>
<!-- result-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form2" method="post" action=" ">
<table width="100%" border="1" cellpadding="20" cellspacing="0" bgcolor="white">

<caption><h3>Results</h3></caption>

<tr>
<td>Staff ID</td>
<td>Staff Name</td>
<td>HKID</td>
<td>Department</td>
<td width="71">Position</td>
<td width="71">Date Joined</td>
<td>Employment Type</td>
<td width="50">AL Limit</td>
<td width="50">SL Limit</td>
</tr>
<?php
              if(isset($_SESSION['DATA_ARR']))
                      foreach ($_SESSION['DATA_ARR'] as $row){
 echo "<tr><td> " . $row["staff_id"]. "</td><td>" . $row["staff_name"]. "</td><td>" . $row["HKID"]. "</td><td>"
	. $row["dept"].  "</td><td>" . $row["position"]. "</td><td>" . $row["date_joined"]. "</td><td>" 
        . $row["e_type"]. "</td><td>" . $row["AL_limit"]. "</td><td>" . $row["SL_limit"]. "</td></tr>";
}
               unset($_SESSION['DATA_ARR']);
?>
<tr>
<td height="20"></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td height="20"></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td height="20"></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

</table>
</form>
</td>
</tr>
</table>
</br>

<!-- Edit Record -->

<form name="form1" method="post" action="php/staff/searchActionEdit.php">
<table width="360" border="0" cellspacing="1" cellpadding="2">

<tr>
<td colspan="3"><h3>Edit Staff Record</h3></td>
</br>
</tr>

<tr>
<td width="140">Staff ID</td>
<td width="6">:</td>
<td width="280">
<input name="keyword" type="number" id="keyword" min="1"><input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="css/search.png" alt="Search" title="Search" /></td>
</tr>

</table>
</form>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form2" method="post" action="php/staff/update.php">
<table width="100%" border="0" cellspacing="10" cellpadding="3">

<?php
              if(isset($_SESSION['DATA_ARR_EDIT']))
                      foreach ($_SESSION['DATA_ARR_EDIT'] as $row){
                      echo "<tr><td width='150'>Staff ID</td><td width='6'>:</td><td width='160'><input name='staffid' 
                      type='text' id='staffid' readonly value='" . $row['staff_id']. "'></td>
                      <td width='150'>Date Joined</td><td width='6'>:</td><td width='160'><input name='dj' 
                      type='date' id='dj' value='" . $row['date_joined']. "'></td></tr>";
                      echo "<tr><td>Staff Name</td><td>:</td><td><input name='name' 
                      type='text' id='name' value='" . $row['staff_name']. "'></td>
                      <td>Annual Leave Limit</td><td>:</td><td><input name='ALLimit' 
                      type='number' id='ALLimit' value='" . $row['AL_limit']. "'></td></tr>";
                      echo "<tr><td>HKID</td><td>:</td><td><input name='hkid' 
                      type='text' id='hkid' value='" . $row['HKID']. "'></td>
                      <td>Sick Leave Limit</td><td>:</td><td><input name='SLLimit' 
                      type='number' id='SLLimit' value='" . $row['SL_limit']. "'></td></tr>";
                      echo "<tr><td>Dept.</td><td>:</td><td><input name='department' 
                      type='text' id='department' value='" . $row['dept']. "'></td>
                      <td>Employment Type</td><td>:</td><td>
                      <select name='etype'>";
echo '<option value="NULL" '.(($e_check== 0)?'selected="selected"':"").'>----------</option>';
echo '<option value="Full Time" '.(($e_check== 1)?'selected="selected"':"").'>Full Time</option>';
echo '<option value="Part Time" '.(($e_check== 2)?'selected="selected"':"").'>Part Time</option>';
                      echo"</select></td></tr>";
                      echo "<tr><td>Position</td><td>:</td><td>
                      <select name='position'>";
 echo '<option value="NULL" '.(($p_check== 0)?'selected="selected"':"").'>----------</option>';
 echo '<option value="Manager" '.(($p_check== 1)?'selected="selected"':"").'>Manager</option>';
 echo '<option value="Assistant Manager" '.(($p_check== 2)?'selected="selected"':"").'>Assistant Manager</option>';
 echo '<option value="Supervisor" '.(($p_check== 3)?'selected="selected"':"").'>Supervisor</option>';
 echo '<option value="Senior Supervisor" '.(($p_check== 4)?'selected="selected"':"").'>Senior Supervisor</option>';
 echo '<option value="Receptionist" '.(($p_check== 5)?'selected="selected"':"").'>Receptionist</option>';
 echo '<option value="Server" '.(($p_check== 6)?'selected="selected"':"").'>Server</option>';
 echo '<option value="Cashier" '.(($p_check== 7)?'selected="selected"':"").'>Cashier</option>';
 echo '<option value="FoodRunner" '.(($p_check== 8)?'selected="selected"':"").'>FoodRunner</option>';
 echo '<option value="Operation Manager" '.(($p_check== 9)?'selected="selected"':"").'>Operation Manager</option>';
                      echo"</select></td></tr>";
}
              else{
                      echo "<tr><td width='150'>Staff ID</td><td width='6'>:</td><td width='160'><input name='staffid' 
                      type='text' id='staffid' readonly></td>
                      <td width='150'>Date Joined</td><td width='6'>:</td><td width='160'><input name='dj' 
                      type='date' id='dj'></td></tr>";
                      echo "<tr><td>Staff Name</td><td>:</td><td><input name='name' 
                      type='text' id='name'></td>
                      <td>Annual Leave Limit</td><td>:</td><td><input name='ALLimit' 
                      type='number' id='ALLimit'></td></tr>";
                      echo "<tr><td>HKID</td><td>:</td><td><input name='hkid' 
                      type='text' id='hkid'></td>
                      <td>Sick Leave Limit</td><td>:</td><td><input name='SLLimit' 
                      type='number' id='SLLimit'></td></tr>";
                      echo "<tr><td>Dept.</td><td>:</td><td><input name='department' 
                      type='text' id='department'></td>
                      <td>Employment Type</td><td>:</td><td>
                      <select name='etype'>
                      <option value='NULL'>----------</option>
                      <option value='Full Time'>Full Time</option>
                      <option value='Part Time'>Part Time</option>
                      </select></td></tr>";
                      echo "<tr><td>Position</td><td>:</td><td>
                      <select name='position'>
                      <option value='NULL'>----------</option>
                      <option value='Manager'>Manager</option>
                      <option value='Assistant Manager'>Assistant Manager</option>
                      <option value='Supervisor'>Supervisor</option>
                      <option value='Senior Supervisor'>Senior Supervisor</option>
                      <option value='Receptionist'>Receptionist</option>
                      <option value='Server'>Server</option>
                      <option value='Cashier'>Cashier</option>
                      <option value='FoodRunner'>FoodRunner</option>
                      <option value='Operation Manager'>Operation Manager</option>
                      </select></td></tr>";

}
               unset($_SESSION['DATA_ARR_EDIT']);
?>

<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td align="right"><input type="reset" name="Reset" value="Reset">  
<input type="submit" name="Submit" value="Submit"></td>
</tr>
</table>
</form>
</td>
</tr>
</table>
</br>

<!-- Delete staff Record -->
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form3" method="post" action="php/staff/delete.php">
<table width="100%" border="0" cellspacing="10" cellpadding="3">
<tr>
<td colspan="3"><h3>Delete Staff Record</h3></td>
</tr>


<tr>
<td width="150">Staff id</td>
<td width="6">:</td>
<td width="160">
<input name="staffid" type="number" id="staffid"></td>
</tr>

<tr>
<td></td>
<td></td>
<td align="right"><input type="reset" name="Reset" value="Reset">  
<input type="submit" name="Submit" value="Submit"></td>
</tr>

</table>
</form>
</td>
</tr>
</table>
</br>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="StaffRecord.php">Staff Record</a> | <a href="LeaveRecord.php">Leave Record</a> | <a href="search.php">Search</a> | <a href='php/logout.php'>Logout</a></p>
      <p>Copyright &copy;| <a href="#">HTML5</a> | <a href="#">CSS</a></p>
    </div>
  </div>
</body>
</html>