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
<br>
    
<h1>Employees with selected skill</h1>
<div class="dataentry">

<table class="emplist">
    <tr>
    <td>Name</td>
    <td>Employee ID</td>
    </tr>

    <tr>
        
    <td><a href="./empdetail.php?id=1">
        <div style="height:100%;width:100%">
        John Doe
        </div>
        </a>
    </td>

        
    <td><a href="./empdetail.php?id=1">
        <div style="height:100%;width:100%">
        1
        </div>
        </a>
    </td>
        
    </tr>
    
    <tr>
        
    <td><a href="./empdetail.php?id=2">
        <div style="height:100%;width:100%">
        Jane Adams
        </div>
        </a>
    </td>
        
    <td><a href="./empdetail.php?id=2">
        <div style="height:100%;width:100%">
        2
        </div>
        </a>
    </td>
        
    </tr>
        
    <tr>
        
    <td><a href="./empdetail.php?id=3">
        <div style="height:100%;width:100%">
        George Jones
        </div>
        </a>
    </td>
        
    <td><a href="./empdetail.php?id=3">
        <div style="height:100%;width:100%">
        3
        </div>
        </a>
    </td>

    </tr>
        
    <tr>
        
    <td><a href="./empdetail.php?id=4">
        <div style="height:100%;width:100%">
        Alice Smith
        </div>
        </a>
    </td>
        
    <td><a href="./empdetail.php?id=4">
        <div style="height:100%;width:100%">
        4
        </div>
        </a>
    </td>
    
    </tr>
   
</table>
    
</div>    
    
    
<!--use instructions-->
<br>
<h4>Select an employee to view detailed information</h4>
<!--end use instructions-->
    
</body>
</html>
