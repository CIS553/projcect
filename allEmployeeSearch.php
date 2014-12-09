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
<h4>Select up to 5 search fields and search terms</h4>
<br>
<form action="searchlist.php" method="post">
<div class="dataentry">

<table class="search">
    <tr>
    <td></td>
    <td>Field to Search</td>
    <td>Search Term</td>
    </tr>

    <?php 
        for($i=1;$i<6;$i++){ 
    ?>
    <tr>       
    <td><?php echo $i; ?></td>
    <td>
    
    <select name="field<?php echo $i; ?>">
    <option value=""></option>
    <option value="id">Employee ID</option>
    <option value="emp_name">Name</option>
    <option value="emp_country">Country</option> 
    <option value="emp_email">Email</option> 
    <option value="emp_level">Employee Level</option> 
    <option value="emp_hire_date">Hire Date</option> 
    <option value="emp_region">Region</option> 
    <option value="emp_supervisor">Supervisor</option> 
    <option value="emp_team">Team</option> 
    <option value="emp_title">Title</option>
    <option value="per_rating">Performance Rating</option>
    <option value="per_review_author_Name">Review Author</option>
    <option value="per_start_date">Review Start Date</option>
    <option value="per_end_date">Review End Date</option>

    <option value="cwh_country">Comp Work Hist Country</option>
    <option value="cwh_description">Comp Work Hist Desc</option>
    <option value="cwh_level">Comp Work Hist Level</option>
    <option value="cwh_region">Comp Work Hist Region</option>
    <option value="cwh_skill_team">Comp Work Hist Team</option>
    <option value="cwh_skills_used">Comp Work Hist Used</option>
    <option value="cwh_start_date">Comp Work Hist Start</option>
    <option value="cwh_end_date">Comp Work Hist End</option>
    <option value="cwh_title">Comp Work Hist Title</option>

    <option value="ncwh_company">Non Co Work Hist Company</option>
    <option value="ncwh_description">Non Co Work Hist Desc</option>
    <option value="ncwh_skill_team">Non Co Work Hist Team</option>
    <option value="ncwh_skills_used">Non Co Work Hist Used</option>
    <option value="ncwh_start_date">Non Co Work Hist Start</option>
    <option value="ncwh_end_date">Non Co Work Hist End</option>
    <option value="ncwh_title">Non Co Work Hist Title</option>

    <option value="ed_degree">Degree</option>
    <option value="ed_major">Major</option>
    <option value="ed_minor">Minor</option>
    <option value="ed_school">School</option>
    <option value="ed_start_date">Education Start</option>
    <option value="ed_end_date">Education End</option>

    <option value="sk_skill">Skill</option>
    <option value="sk_skill_level">Skill Level</option>
    </select>
    </td>
    
    <td><input type="text" name="value<?php echo $i; ?>" value=""></td>
    </tr>
    
    <?php } ?>
</table>
    
<br><br><br>
</div>
<input class="submitbutton" type="submit" value="Search Employees">
</form>

</body>
</html>
