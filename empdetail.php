
<!DOCTYPE HTML>

<html> 

    <title>Employee Information</title>

    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>


<?php

    $verbose=false; //true for test or debug, false for production

    //Update existing employee requested
    if (isset($_GET["id"])){ //An id was passed, this is an existing employee update
        $requested_id = $_GET["id"]; 
        if ($verbose) echo "requested id". $requested_id . "<br>";
        include('getExisting.php'); //Populate php variables with existing data        
    } else {
        $requested_id = null;
    }

 include('./createCsv.php');

?>

    
<!-- Header Banner-->
<?php
    include('./header.php');
?>
<!-- End Header Banner-->	
    
<body>


    
    <h3>Employee Detail</h3>

    <br>
        
        <!-- Track existing employee id -->
        <input type="text" name="requestedid" hidden=true value="<?php echo $requested_id ?>">
  
    
    <!-- Profile Entry -->
        <div id="odd">
            <h4>Profile</h4>
            <div class="dataentry">
                
                <b>Name:</b> <?php echo $empname ?>
                <br>
                <b>Title:</b> <?php echo $emptitle ?>
                <br>
                <b>Country:</b> <?php echo $empcountry ?>
                <br>
                <b>Email:</b> <?php echo $empemail ?>
                <br>
                <b>Level:</b> <?php echo $emplevel ?>
                <br>
                <b>Hire Date:</b> <?php echo $emphiredate ?>
                <br>
                <b>Region:</b> <?php echo $empregion ?>
                <br>
                <b>Supervisor:</b> <?php echo $empsupervisor ?>
                <br>
                <b>Team:</b> <?php echo $empteam ?>
                <br>  
            </div>
        </div>
        
        
<!-- Performance Entry -->
        <div id="even">
            <h4>Performance</h4>
            <div class="dataentry">
                
                <b>Review Period Start Date:</b> <?php echo $perstart ?>
                <br>
                
                <b>Review Period End Date:</b> <?php echo $perend ?>
                <br>

                <b>Rating:</b> <?php echo $perrating ?>
                <br>
                
                <b>Review Author:</b> <?php echo $perauthor ?>
                <br>
                
            </div>
        </div>

<!-- Company Work History -->
        <div id="odd">
            <h4>Company Work History</h4>
            <div class="dataentry">
                <table id="workTable" class="empdetail">
                    <tr>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Title</td>
                        <td>Country</td>
                        <td>Description</td>
                        <td>Level</td>
                        <td>Region</td>
                        <td>Skill Team</td>
                        <td>Skills Used</td>
                    </tr>
                    
					<?php $a=0; foreach($cwhstart as $a => $b){ ?> 
                    <tr>
                        <td><?php echo $cwhstart[$a]; ?></td>
                        <td><?php echo $cwhend[$a]; ?></td>
                        <td><?php echo $cwhtitle[$a]; ?></td>
                        <td><?php echo $cwhcountry[$a]; ?></td>
                        <td><?php echo $cwhdescription[$a]; ?></td>
                        <td><?php echo $cwhlevel[$a]; ?></td>
                        <td><?php echo $cwhregion[$a]; ?></td>
                        <td><?php echo $cwhskillteam[$a]; ?></td>
                        <td><?php echo $cwhskillsused[$a]; ?></td>

                    </tr>                    
                    <?php } ?>                    
                </table>
            </div>
        </div>
    
    
<!-- NON Company Work History -->
        <div id="even">
            <h4>Non-Company Work History</h4>
            <div class="dataentry">
                <table id="nonworkTable" class="empdetail">
                    <tr>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Title</td>
                        <td>Company</td>
                        <td>Description</td>
                        <td>Skill Team</td>
                        <td>Skills Used</td>
                    </tr>
					<?php $a=0; foreach($ncwhstart as $a => $b){ ?> 
                    <tr>
                        <td><?php echo $ncwhstart[$a]; ?></td>
                        <td><?php echo $ncwhend[$a]; ?></td>
                        <td><?php echo $ncwhtitle[$a]; ?></td>
                        <td><?php echo $ncwhcompany[$a]; ?></td>
                        <td><?php echo $ncwhdescription[$a]; ?></td>
                        <td><?php echo $ncwhskillteam[$a]; ?></td>
                        <td><?php echo $ncwhskillsused[$a]; ?></td>
                    </tr>                    
                    <?php } ?>                    

                </table>
            </div>
        </div>        

<!-- Education -->
        <div id="odd">
            <h4>Education</h4>
            <div class="dataentry">
                <table id="educationTable" class="empdetail">
                    <tr>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>School</td>
                        <td>Degree</td>
                        <td>Major</td>
                        <td>Minor</td>
                    </tr>
					<?php $a=0; foreach($edstart as $a => $b){ ?> 
                    <tr>
                        <td><?php echo $edstart[$a]; ?></td>
                        <td><?php echo $edend[$a]; ?></td>
                        <td><?php echo $edschool[$a]; ?></td>
                        <td><?php echo $eddegree[$a]; ?></td>
                        <td><?php echo $edmajor[$a]; ?></td>
                        <td><?php echo $edminor[$a]; ?></td>
                    </tr>                    
                    <?php } ?>                    
                </table>
            </div>
        </div>        
        
<!-- Skills -->
        <div id="even">
            <h4>Skills</h4>
            <div class="dataentry">
                
                <table id="skills" class="empdetail">
                    <tr>
                        <td>Skill</td>
                        <td>Skill Level</td>
                    </tr>

					<?php $a=0; foreach($skills as $a => $b){ ?> 
                    <tr>
                        <td><?php echo $skills[$a]; ?></td>
                        <td><?php echo $skilllevels[$a]; ?></td>                   
                    </tr>                    
                    <?php } ?>
                </table>
            </div>
        </div>

    <p> 
        <button class="submitbutton"
                onclick="window.location='./addEmployee.php?id=<?php echo $requested_id; ?>';">
            Update Employee Information</button>
        
        <button class="submitbutton"
                onclick="window.open('./downloadCsv.php');">
            Download CSV</button>        
        <br><br>
    </p>    

    </body>
    
</html>