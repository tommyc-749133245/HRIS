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
          <li><a href="LeaveRecord.php">Leave Record</a></li>
          <li class="selected"><a href="search.php">Search</a></li>
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
            <h4><p id="time"></p></h4>
            <script>document.getElementById("time").innerHTML = Date();</script>
            <p><?php  echo " Staff ID : " .$_SESSION['STAFFID'] . "<br /> Staff Name : " .$_SESSION['STAFFNAME'] . "<br />";?> 
            </p>
          </div>
          <div class="sidebar_base"></div>
        </div>
        
      </div>
      <div id="content">
        <!-- insert the page content here -->

<center><?php
               if(isset($_SESSION['ERRMSG_ARR']))
		      foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		          echo  $msg; 
				}
               unset($_SESSION['ERRMSG_ARR']);

?></center>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form1" method="post" action="php/searchAction.php">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
<tr>
<td colspan="3"><strong>Search</strong></td>
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

<!-- result-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><form name="form2" method="post" action=" ">
<table width="100%" border="1" cellpadding="20" cellspacing="0" bgcolor="white">
<tr>
<td colspan="5"><strong>Result</strong></td>
</tr>

<tr>
<td width="71">Staff ID</td>
<td width="71">Staff Name</td>
<td width="71">HKID</td>
<td width="71">Department</td>
<td width="71">Position</td>
</tr>
<?php
              if(isset($_SESSION['DATA_ARR']))
                      foreach ($_SESSION['DATA_ARR'] as $row){
 echo "<tr><td> " . $row["staff_id"]. "</td><td>" . $row["staff_name"]. "</td><td>" . $row["HKID"]. "</td><td>"
	. $row["dept"].  "</td><td>" . $row["position"]. "</td></tr>";
}
               unset($_SESSION['DATA_ARR']);
?>

<tr>
<td height="20"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
</tr>

<tr>
<td height="20"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
</tr>

<tr>
<td height="20"> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
</tr>
</table>
</form>
</td>
</tr>
</table>

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