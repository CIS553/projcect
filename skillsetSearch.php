<html>

<title>Employee Information</title>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<!-- Header Banner-->
	<?php
		include('./header.php');
	?>
	<!-- End Header Banner-->	

<body>
<h4>Select a skill to view employees</h4>
<br>
<form action="skilllist.html" method="post">
<div class="dataentry">
<select>
    <option value="1">Java</option>
    <option value="2">C++</option> 
    <option value="3">SCRUM</option> 
    <option value="4">Project Management</option> 
    <option value="5">HTML 5</option> 
    <option value="6">SQL</option> 
    <option value="7">Linux</option> 
    <option value="8">Hadoop</option> 
    <option value="9">Android</option> 
</select>
 
<br><br><br>
</div>
<input class="submitbutton" type="submit" value="Search Employees">
</form>

</body>
</html>
