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
<h3>Enter Employee Information</h3>
<br>
<form action="submitted.html" method="post">
<div id="odd">
<h4>Profile</h4>
<div class="dataentry">
Name:<br>
<input type="text" name="empname" value="">
<br><br>
Title:<br><input type="text" name="emptitle" value="">
<br><br>
Level:<br>
<select>
    <option value="1">1</option>
    <option value="2">2</option> 
    <option value="3">3</option> 
    <option value="4">4</option> 
    <option value="5">5</option> 
    <option value="6">6</option> 
    <option value="7">7</option> 
    <option value="8">8</option> 
    <option value="9">9</option> 
    <option value="10">10</option> 
</select>
<br><br>
Team:<br><input type="text" name="empteam" value="">    
<br><br>
Company Region:<br>
<select>
    <option value="useast">US - Eastern</option>
    <option value="usmid">US - Midwest</option> 
    <option value="uswest">US - Western</option> 
    <option value="europe">Europe</option> 
    <option value="asia">Asia</option> 
</select>
<br><br>
</div>
</div>

<div id="even">
<h4>Performance</h4>
<div class="dataentry">
Review Period Start Date:<br><input type="text" name="perstart" value="">
<br><br>
Review Period End Date:<br><input type="text" name="perend" value="">
<br><br>
Rating:<br>
<select>
    <option value="1">Low - 1</option>
    <option value="2">2</option> 
    <option value="3">3</option> 
    <option value="4">4</option> 
    <option value="5">High - 5</option>  
</select>
<br><br>
Review Author:<br><input type="text" name="perend" value="">
<br><br>
</div>
</div>
    
<div id="odd">
<h4>Company Work History</h4>
<div class="dataentry">
<table id="workTable">
  <tr>
    <td>Start Date</td>
    <td>End Date</td>
    <td>Title</td>
    <td>Employee Level</td>
    <td>Skill Team</td>
  </tr>
</table>
<br>
<button type="button" onclick='addRow("workTable")'>Add Row</button>
<br><br>
</div>
</div>

<div id="even">
<h4>Non-Company Work History</h4>
<div class="dataentry">
<table id="nonWorkTable">
  <tr>
    <td>Start Date</td>
    <td>End Date</td>
    <td>Title</td>
    <td>Company</td>
    <td>Skill Team</td>
  </tr>
</table>
<br>
<button type="button" onclick='addRow("nonWorkTable")'>Add Row</button>
<br><br>
</div>
</div>

<div id="odd">
<h4>Education</h4>
<div class="dataentry">
<table id="education">
  <tr>
    <td>Degree</td>
    <td>Major</td>
    <td>Minor</td>
    <td>School</td>
    <td>Dates Attended</td>
  </tr>
</table>
<br>
<button type="button" onclick='addRow("education")'>Add Row</button>
<br><br>
</div>
</div>

<div id="even">
<h4>Skills</h4>
<div class="dataentry">
<table id="skills">
  <tr>
    <td>Skill</td>
    <td>Skill Level</td>
  </tr>
</table>
<br>
<button type="button" onclick='addRow("skills")'>Add Row</button>
<br><br>
</div>
</div>


<input class="submitbutton" type="submit" value="Submit Employee Information">
</form>

    
<script>
function addRow(tableId) {
    var table = document.getElementById(tableId);
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
if (tableId!="skills"){
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = '<input type="text" name="workstart" value="">';
    cell2.innerHTML = '<input type="text" name="workend" value="">';
    cell3.innerHTML = '<input type="text" name="workstart" value="">';
    if (tableId=="workTable"){
        cell4.innerHTML = "<select><option value='1'>1</option><option value='2'>2</option> <option value='3'>3</option><option value='4'>4</option> <option value='5'>5</option> <option value='6'>6</option> <option value='7'>7</option> <option value='8'>8</option> <option value='9'>9</option> <option value='10'>10</option> </select>";}
    else {
        cell4.innerHTML = '<input type="text" name="workstart" value="">';}
    cell5.innerHTML = '<input type="text" name="workend" value="">';

}
else {
    cell1.innerHTML = '<input type="text" name="workstart" value="">';
    cell2.innerHTML = "<select><option value='1'>Low - 1</option><option value='2'>2</option> <option value='3'>3</option><option value='4'>4</option> <option value='5'>High - 5</option></select>";}

}
</script>    

</body>
</html>
