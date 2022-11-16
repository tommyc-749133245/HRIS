<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>303COM Project</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/style2.css" />

  <script type="text/javascript">
        function GetDays(){
                var edate = new Date(document.getElementById("e_date").value);
                var sdate = new Date(document.getElementById("s_date").value);
                return parseInt((edate - sdate) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("s_date")){
        var mindate = new Date(document.getElementById("s_date").value);
        var dd = mindate.getDate();
        var mm = mindate.getMonth()+1;
        var yyyy = mindate.getFullYear();
        if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} 
        mindate = yyyy+'-'+mm+'-'+dd;
        document.getElementById("e_date").setAttribute("min", mindate);
        }
        if(document.getElementById("e_date")){
        var maxdate = new Date(document.getElementById("e_date").value);
        var dd = maxdate.getDate();
        var mm = maxdate.getMonth()+1;
        var yyyy = maxdate.getFullYear();
        if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} 
        maxdate = yyyy+'-'+mm+'-'+dd;
        document.getElementById("s_date").setAttribute("max", maxdate);
            document.getElementById("duration").value=GetDays();
        }  
    }
        function GetDaysEdit(){
                var edate = new Date(document.getElementById("e_date_Edit").value);
                var sdate = new Date(document.getElementById("s_date_Edit").value);
                return parseInt((edate - sdate) / (24 * 3600 * 1000));
        }

        function calEdit(){
       if(document.getElementById("s_date_Edit")){
           var mindate = new Date(document.getElementById("s_date_Edit").value);
           var dd = mindate.getDate();
           var mm = mindate.getMonth()+1;
           var yyyy = mindate.getFullYear();
           if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} 
           mindate = yyyy+'-'+mm+'-'+dd;
         document.getElementById("e_date_Edit").setAttribute("min", mindate);
        }
        if(document.getElementById("e_date_Edit")){
        var maxdate = new Date(document.getElementById("e_date_Edit").value);
        var dd = maxdate.getDate();
        var mm = maxdate.getMonth()+1;
        var yyyy = maxdate.getFullYear();
        if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} 
        maxdate = yyyy+'-'+mm+'-'+dd;
        document.getElementById("s_date_Edit").setAttribute("max", maxdate);
            document.getElementById("duration_Edit").value=GetDaysEdit();
        }  
    }

   </script>
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
          <li><a href="StaffRecord.php">Staff Record</a></li>
          <li class="selected"><a href="LeaveRecord.php">Leave Record</a></li>

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

<center><?php

               if(isset($_SESSION['ERRMSG_ARR']))
		      foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		          echo  "<h3><font color='red'>". $msg . "</font></h>"; 
				}
               unset($_SESSION['ERRMSG_ARR']);
?></center>

        <!-- Add Leave Record -->
        <table width="360" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form1" method="post" action="php/Leave/insert.php">
<table width="100%" border="0" cellspacing="10" cellpadding="3">
<tr>
<td colspan="3"><h3>Add Leave Record </h3></td>
</tr>

<tr>
<td width="140">Staff ID</td>
<td width="6">:</td>
<td width="280">
<input name="keyword" type="text" id="keyword">
<input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="css/search.png" alt="Search" title="Search" formaction="php/Leave/searchActionAdd.php"/></td>
</tr>

<?php
              if(isset($_SESSION['DATA_ARR_ADD']))
                      foreach ($_SESSION['DATA_ARR_ADD'] as $row){
                      echo "<tr><td>Staff ID</td><td>:</td><td><input name='staffid' 
                      type='text' id='staffid' readonly value='" .$row['staff_id']. "'></td></tr>";
                      echo "<tr><td>Staff Name</td><td>:</td><td><input name='staffname' 
                      type='text' id='staffname' readonly value='" .$row['staff_name']. "'></td></tr>";
                      
              }else{
                      echo "<tr><td>Staff ID</td><td>:</td><td><input name='staffid' 
                      type='text' id='staffid' readonly ></td></tr>";
                      echo "<tr><td>Staff Name</td><td>:</td><td><input name='staffname' 
                      type='text' id='staffname' readonly ></td></tr>";
}
               unset($_SESSION['DATA_ARR_ADD']);

?>

<tr>
<td>From</td>
<td>:</td>
<td><input name="s_date" type="date" id="s_date" onchange="cal()"></td>
</tr>


<tr>
<td>To</td>
<td>:</td>
<td><input name="e_date" type="date" id="e_date" onchange="cal()"></td>
</tr>


<tr>
<td>Duration</td>
<td>:</td>
<td><input name="duration" type="number" id="duration" readonly>Day(s)</td>
</tr>

<tr>
<td>Leave Type</td>
<td>:</td>
<td>
<select name="leavetype">
  <option value="NULL">----------</option>
  <option value="Annual Leave">Annual Leave</option>
  <option value="Sick Leave">Sick Leave</option>
</select></td>
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

<table width="500" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form1" method="post" action="php/Leave/searchAction.php">
<table width="100%" border="0" cellspacing="10" cellpadding="3">
<tr>
<td colspan="3"><h3>Search</h3></td>
</tr>
<tr>
<td>
<input name="keyword" type="text" id="keyword">
<input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="css/search.png" alt="Search" title="Search" /></td>
</tr>
<tr><td><strong>Note: Searching date format AS (YYYY-MM-DD)</strong></td></tr>
</table>
</form>
</td>
</tr>
</table>

<!-- result-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form2" method="post" action=" ">
<table width="100%" border="1" cellpadding="20" cellspacing="0" bgcolor="white">

<caption><h3>Results</h3></caption>

<tr>
<td width="100">Record No.</td>
<td width="100">Staff ID</td>
<td width="100">Start Date</td>
<td width="100">End Date</td>
<td width="100">Duration Day(s)</td>
<td width="100">Leave Type</td>
</tr>
<?php
              if(isset($_SESSION['DATA_ARR']))
                      foreach ($_SESSION['DATA_ARR'] as $row){
 echo "<tr><td> " . $row["leave_id"]."</td><td>"
                  . $row["staff_id"]. "</td><td align='right'>" 
                  . $row["start_date"]. "</td><td align='right'>" 
                  . $row["end_date"]. "</td><td align='right'>"
                  . $row["duration"]. "</td><td>"
                  . $row["leave_type"]. "</td></tr>";
}
               unset($_SESSION['DATA_ARR']);
?>

<tr>
<td height="20"> </td>
<td></td>
<td> </td>
<td> </td>
<td></td>
<td> </td>
</tr>

<tr>
<td height="20"> </td>
<td></td>
<td> </td>
<td> </td>
<td></td>
<td> </td>
</tr>

<tr>
<td height="20"> </td>
<td></td>
<td> </td>
<td> </td>
<td></td>
<td> </td>
</tr>
</table>
</form>
</td>
</tr>
</table>
</br>

<!-- Edit Leave Record -->
<form name="form1" method="post" action="php/Leave/searchActionEdit.php">
<table width="360" border="0" cellspacing="1" cellpadding="2">

<tr>
<td colspan="3"><h3>Edit Leave Record</h3></td>
</br>
</tr>

<tr>
<td width="140">Record No</td>
<td width="6">:</td>
<td width="280">
<input name="keyword" type="text" id="keyword"><input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="css/search.png" alt="Search" title="Search" /></td>
</tr>

</table>
</form>

</table><table width="340" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form2" method="post" action="php/Leave/update.php">
<table width="100%" border="0" cellspacing="10" cellpadding="3">

<?php
              if(isset($_SESSION['DATA_ARR_EDIT']))
                      foreach ($_SESSION['DATA_ARR_EDIT'] as $row){
                      echo "<tr><td width='150'>Record No.</td><td width='6'>:</td><td width='340'><input name='leaveid' 
                      type='text' id='leaveid' readonly value='" .$row['leave_id']. "'></td></tr>";
                      echo "<tr><td>Staff ID</td><td>:</td><td><input name='staffid' 
                      type='text' id='staffid' readonly value='" .$row['staff_id']. "'></td></tr>";
                      echo "<tr><td>From</td><td>:</td><td><input name='s_date_Edit' 
                      type='date' id='s_date_Edit' onchange='calEdit()' 
                      value='" .$row['start_date']. "'></td></tr>";
                      echo "<tr><td>To</td><td>:</td><td><input name='e_date_Edit' 
                      type='date' id='e_date_Edit' onchange='calEdit()' 
                      value='" .$row['end_date']. "'></td></tr>";
                      echo "<tr><td>Duration</td><td>:</td><td><input name='duration_Edit' 
                      type='text' id='duration_Edit'  readonly value='" . $row['duration']. "'>Day(s)</td></tr>";
                      if($row['leave_type'] == 'Annual Leave')
                      {
                      echo "<tr><td>Leave Type</td><td>:</td><td>
                            <select name='leavetype'>
                            <option value='NULL'>----------</option>
                            <option value='Annual Leave' selected='selected'>Annual Leave</option>
                            <option value='Sick Leave'>Sick Leave</option>
                            </select></td></tr>";
                      }else{
                       echo "<tr><td>Leave Type</td><td>:</td><td>
                            <select name='leavetype'>
                            <option value='NULL'>----------</option>
                            <option value='Annual Leave'>Annual Leave</option>
                            <option value='Sick Leave'selected='selected'>Sick Leave</option>
                            </select></td></tr>";
                      }
        
}
              else{
                      echo "<tr><td width='150'>Record No.</td><td width='6'>:</td><td width='340'><input name='leaveid' 
                      type='text' id='leaveid' readonly></td></tr>";
                      echo "<tr><td>Staff ID</td><td>:</td><td><input name='staffid' 
                      type='text' id='staffid' readonly></td></tr>";
                      echo "<tr><td>From</td><td>:</td><td><input name='s_date' 
                      type='date' id='s_date_Edit' onchange='calEdit()'></td></tr>";
                      echo "<tr><td>To</td><td>:</td><td><input name='e_date' 
                      type='date' id='e_date_Edit' onchange='calEdit()'></td></tr>";
                      echo "<tr><td>Duration</td><td>:</td><td><input name='duration' 
                      type='text' id='duration_Edit' readonly>Day(s)</td></tr>";
                      echo "<tr><td>Leave Type</td><td>:</td><td>
                            <select name='leavetype'>
                            <option value='NULL'>----------</option>
                            <option value='Annual Leave'>Annual Leave</option>
                            <option value='Sick Leave'>Sick Leave</option>
                            </select></td></tr>";
}
               unset($_SESSION['DATA_ARR_EDIT']);
?>

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

<!-- Delete Single Record -->
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form3" method="post" action="php/Leave/deleteSingle.php">
<table width="100%" border="0" cellspacing="10" cellpadding="3">
<tr>
<td colspan="3"><h3>Delete Single Record</h3></td>
</tr>


<tr>
<td width="150">Record No.</td>
<td width="6">:</td>
<td width="160">
<input name="leaveid" type="text" id="leaveid"></td>
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

<!-- Delete All Record -->
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form3" method="post" action="php/Leave/deleteAll.php">
<table width="100%" border="0" cellspacing="10" cellpadding="3">
<tr>
<td colspan="3"><h3>Delete All Records</h3></td>
</tr>


<tr>
<td width="150">Staff ID</td>
<td width="6">:</td>
<td width="160">
<input name="staffid" type="text" id="staffid"></td>
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
      <p>Copyright &copy; | <a href="#">HTML5</a> | <a href="#">CSS</a></p>
    </div>
  </div>
</body>
</html>