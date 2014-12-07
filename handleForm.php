<?php

    //Capture data from post
                    $requested_id = $_POST[requestedid];
                    $empname = $_POST[empname];
                    $emptitle = $_POST[emptitle];
                    $empcountry = $_POST[empcountry];
                    $empemail = $_POST[empemail];
                    $emplevel = $_POST[emplevel];
                    $emphiredate = $_POST[emphiredate];
                    $empregion = $_POST[empregion];
                    $empsupervisor = $_POST[empsupervisor];
                    $empteam = $_POST[empteam];
                    $perauthor = $_POST[perauthor];
                    $perstart = $_POST[perstart];
                    $perend = $_POST[perend];
                    $perrating = $_POST[perrating];
                    $cwhstart = $_POST['cwhstart'];
                    $cwhend = $_POST['cwhend'];
                    $cwhtitle = $_POST['cwhtitle'];
                    $cwhcountry = $_POST['cwhcountry'];
                    $cwhdescription = $_POST['cwhdescription'];
                    $cwhlevel = $_POST['cwhlevel'];
                    $cwhregion = $_POST['cwhregion'];
                    $cwhskillteam = $_POST['cwhskillteam'];
                    $cwhskillsused = $_POST['cwhskillsused'];
                    $ncwhstart = $_POST['ncwhstart'];
                    $ncwhend = $_POST['ncwhend'];
                    $ncwhtitle = $_POST['ncwhtitle'];
                    $ncwhcompany = $_POST['ncwhcompany'];
                    $ncwhdescription = $_POST['ncwhdescription'];
                    $ncwhskillteam = $_POST['ncwhskillteam'];
                    $ncwhskillsused = $_POST['ncwhskillsused'];
                    $edstart = $_POST['edstart'];
                    $edend = $_POST['edend'];
                    $edschool = $_POST['edschool'];
                    $eddegree = $_POST['eddegree'];
                    $edmajor = $_POST['edmajor'];
                    $edminor = $_POST['edminor'];
                    $skills=$_POST['empskill'];
                    $skilllevels=$_POST['skilllevel'];

    //unset post (prepare for next employee)
    unset($_POST);

    //VALIDATE DATA HERE
    if(true){ $valid=1; } //$valid=0; for false

    if ($verbose) echo "handle complete<br>";
?>