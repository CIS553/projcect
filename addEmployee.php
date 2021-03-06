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

    //Handle form data when submitted
    if (isset($_POST['empname'])){
        if ($verbose) echo "handling form<br>";
        include('handleForm.php');

        //New employee and valid form data
        if ($requested_id == null && $valid==1)  {
            if ($verbose) echo "inserting<br>";
            include('insert.php');
            ob_clean();
            header('Location: ./submitted.php?id=' . $_empid);
            exit();
            
        }
        
        //Existing employee and valid form data
        if ($requested_id != null && $valid==1){
            if ($verbose) echo "updating<br>";
            include('update.php');
            ob_clean();
            header('Location: ./empdetail.php?id=' . $requested_id);
            exit();
        }
        
        //HANDLE INVALID DATA HERE
        if ($valid==0){ if ($verbose) echo "Invalid Data"; }
        
    }


	//VALIDATE DATA entered
        //added to pattern input attributes as RegEx's for validation/formatting assistance.
        $alphanumericPattern = "[a-zA-Z0-9.' ]+";
        $letterOnlyPattern = "[a-zA-Z.' ]+";
        
?>
    
<!-- Header Banner-->
<?php
    include('./header.php');
?>
<!-- End Header Banner-->	
    
<body>


    
    <h3>Enter Employee Information</h3>

    <br>
    
    <form action="addEmployee.php" method="post">
        
        <!-- Track existing employee id -->
        <input type="text" name="requestedid" hidden=true value="<?php echo $requested_id ?>">
 
        
<!-- Profile Entry -->
        <div id="odd">
            <h4>Profile</h4>
            <div class="dataentry">
                
                Name:<br>
                <input type="text" name="empname" maxlength="50" required pattern="<?php echo $letterOnlyPattern; ?>" value="<?php echo $empname ?>">
                <br><br>
                Title:<br><input type="text" name="emptitle" maxlength="100" required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $emptitle ?>">
                <br><br>
                Country:<br><input type="text" name="empcountry" maxlength="100" required pattern="<?php echo $letterOnlyPattern; ?>" value="<?php echo $empcountry ?>">
                <br><br>
                Email:<br><input type="email" name="empemail" maxlength="50" required  value="<?php echo $empemail ?>">
                <br><br>
                Level:<br><input type="text" name="emplevel" maxlength="100" required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $emplevel ?>">
                <br><br>
                Hire Date:<br><input type="date" name="emphiredate" required value="<?php echo $emphiredate ?>">
                <br><br>
                Region:<br><input type="text" name="empregion" maxlength="100" required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $empregion ?>">
                <br><br>
                Supervisor:<br><input type="text" name="empsupervisor" maxlength="100" required pattern="<?php echo $letterOnlyPattern; ?>" value="<?php echo $empsupervisor ?>">
                <br><br>
                Team:<br><input type="text" name="empteam" maxlength="255" required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $empteam ?>">
                <br><br>
            

            </div>
        </div>
        
<!-- Performance Entry -->
        <div id="even">
            <h4>Performance</h4>
            <div class="dataentry">
                
                Review Period Start Date:<br>
                <input type="date" name="perstart" required value="<?php echo $perstart ?>"><br><br>
                
                Review Period End Date:<br>
                <input type="date" name="perend" required value="<?php echo $perend ?>"><br><br>

                Rating:<br>
                <select name="perrating" required >
                <?php 
                    for($i=0;$i<6;$i++){
                        $value = $i != 0 ? $i : null;
                        $selected = $i == $perrating ? 'selected' : null;
                        echo "<option value='" . $value . "' " .
                           $selected . " >" . $value .
                            "</option>";
                    } 
                ?>
                </select><br><br>
                
                Review Author:<br>
                <input type="text" name="perauthor" required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $perauthor ?>"><br><br>
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
                        <td>
                            <input type="date" name="cwhstart[]" value="<?php echo $cwhstart[$a]; ?>">
                        </td>
                        <td>
                            <input type="date" name="cwhend[]" value="<?php echo $cwhend[$a]; ?>">
                        </td>
                        <td>
                            <input type="text" name="cwhtitle[]" maxlength="100" required pattern="<?php echo $alphanumericPattern; ?>" pattern="" value="<?php echo $cwhtitle[$a]; ?>">
                        </td>
                        <td>
                            <input type="text" name="cwhcountry[]" maxlength="100" required pattern="<?php echo $letterOnlyPattern; ?>" pattern="" value="<?php echo $cwhcountry[$a]; ?>">
                        </td>
                        <td>
                            <input type="text" name="cwhdescription[]" maxlength="500" required pattern="<?php echo $alphanumericPattern; ?>" pattern="[a-zA-Z0-9]+" value="<?php echo $cwhdescription[$a]; ?>">
                        </td>
                        <td>
                            <input type="text" name="cwhlevel[]" maxlength="100"  required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $cwhlevel[$a]; ?>">
                        </td>
                        <td>
                            <input type="text" name="cwhregion[]" maxlength="100"  required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $cwhregion[$a]; ?>">
                        </td>
                        <td>
                            <input type="text" name="cwhskillteam[]" maxlength="100"  required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $cwhskillteam[$a]; ?>">
                        </td>
                        <td>
                            <input type="text" name="cwhskillsused[]" maxlength="100"  required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $cwhskillsused[$a]; ?>">
                        </td>

                    </tr>                    
                    <?php } ?>                    
                <!-- additional skill rows added dynamically by javascript -->
                </table>
                <br>
                <button type="button" onclick='addRow("workTable")'>Add Row</button>
                <br><br>
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
                        <td><input type="date" name="ncwhstart[]" required value="<?php echo $ncwhstart[$a]; ?>"></td>
                        <td><input type="date" name="ncwhend[]" value="<?php echo $ncwhend[$a]; ?>"></td>
                        <td><input type="text" name="ncwhtitle[]" maxlength="100" required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $ncwhtitle[$a]; ?>"></td>
                        <td><input type="text" name="ncwhcountry[]" maxlength="100" required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $ncwhcompany[$a]; ?>"></td>
                        <td><input type="text" name="ncwhdescription[]" maxlength="500" required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $ncwhdescription[$a]; ?>"></td>
                        <td><input type="text" name="ncwhskillteam[]" maxlength="100" required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $ncwhskillteam[$a]; ?>"></td>
                        <td><input type="text" name="ncwhskillsused[]" maxlength="100" required pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $ncwhskillsused[$a]; ?>"></td>

                    </tr>                    
                    <?php } ?>                    
                <!-- additional skill rows added dynamically by javascript -->
                </table>
                <br>
                <button type="button" onclick='addRow("nonworkTable")'>Add Row</button>
                <br><br>
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
                        <td><input type="date" name="edstart[]" required value="<?php echo $edstart[$a]; ?>"></td>
                        <td><input type="date" name="edend[]" value="<?php echo $edend[$a]; ?>"></td>
                        <td><input type="text" name="edschool[]" maxlength="100" required pattern="<?php echo $letterOnlyPattern; ?>" value="<?php echo $edschool[$a]; ?>"></td>
                        <td><input type="text" name="eddegree[]" maxlength="100" required pattern="<?php echo $letterOnlyPattern; ?>" value="<?php echo $eddegree[$a]; ?>"></td>
                        <td><input type="text" name="edmajor[]" maxlength="100" required pattern="<?php echo $letterOnlyPattern; ?>" value="<?php echo $edmajor[$a]; ?>"></td>
                        <td><input type="text" name="edminor[]" maxlength="100" required pattern="<?php echo $letterOnlyPattern; ?>" value="<?php echo $edminor[$a]; ?>"></td>
                    </tr>                    
                    <?php } ?>                    
                <!-- additional skill rows added dynamically by javascript -->
                </table>
                <br>
                <button type="button" onclick='addRow("educationTable")'>Add Row</button>
                <br><br>
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
                        <td><input type="text" name="empskill[]" pattern="<?php echo $alphanumericPattern; ?>" value="<?php echo $skills[$a]; ?>"></td>
                        <td>                     
                        <select name='skilllevel[]'>
                        <?php 
                            for($i=0;$i<11;$i++){
                                $value = $i != 0 ? $i : null;
                                $selected = $i == $skilllevels[$a] ? 'selected' : null;
                                echo "<option value='" . $value . "' " .
                                $selected . " >" . $value .
                                "</option>";
                            } 
                        ?>
                        </select>
                        </td>
                    </tr>                    
                    <?php } ?>
                    
                    <!-- additional skill rows added dynamically by javascript -->
                </table>
                <br>
                <button type="button" onclick='addRow("skills")'>Add Row</button>
                <br><br>
            </div>
        </div>

    <input class="submitbutton" type="submit" value="Submit Employee Information">
    </form>
    
<!-- Add Row Script -->   
<script src="./addRows.js"></script>
    
    
</body>
    
</html>
