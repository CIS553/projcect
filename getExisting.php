<?php

    include('dbConnect.php'); //SQL connection parameters

        //Test sql connection 
        if($conn == true)
        {
            if ($verbose) echo "<br>connected";
        } else {
            echo "<br>not connected";
            die(print_r(sqlsrv_errors(), true)); 
        }
        
        //define strings used in capturing employee record sql transaction
        $sql_profile = "SELECT * FROM employee WHERE id = $requested_id";
        $sql_performance = "SELECT * FROM performance WHERE per_id = $requested_id";
        $sql_cwh = "SELECT * FROM company_work_history WHERE cwh_id = $requested_id";
        $sql_ncwh = "SELECT * FROM non_company_work_history WHERE ncwh_id = $requested_id";
        $sql_edu = "SELECT * FROM education WHERE ed_id = $requested_id";
        $sql_skills = "SELECT * FROM skills WHERE sk_id = $requested_id";

//PROFILE
        //Execute profile sql to fetch employee record
        if ($verbose) echo "<br>Executing: <b>". $sql_profile. "<br><br>" ;
        $select_profile = $conn->query($sql_profile);


            if ($select_profile->num_rows > 0) {
                if ($verbose) echo "SELECT Results:<br>";
                while($row = $select_profile->fetch_assoc()) {
                    $empname = $row["emp_name"];
                    $emptitle = $row["emp_title"];
                    $empcountry = $row["emp_country"];
                    $empemail = $row["emp_email"];
                    $emplevel = $row["emp_level"];
                    $emphiredate = $row["emp_hire_date"];
                    $empregion = $row["emp_region"];
                    $empsupervisor = $row["emp_supervisor"];
                    $empteam = $row["emp_team"];
                    if ($verbose) echo $empname ."<br>" . $emptitle . "<br>";
                }
            } else {
                if ($verbose) echo "0 results";
            }
//PERFORMANCE
        //Execute performance sql to fetch performance record
        if ($verbose) echo "<br>Executing: <b>". $sql_performance. "<br><br>" ;
        $select_performance = $conn->query($sql_performance);


            if ($select_performance->num_rows > 0) {
                if ($verbose) echo "SELECT Results:<br>";
                while($row = $select_performance->fetch_assoc()) {
                    $perrating = $row["per_rating"];
                    $perauthor = $row["per_review_author_Name"];
                    $perstart = $row["per_start_date"];
                    $perend = $row["per_end_date"];                   
                    
                    if ($verbose) echo $perrating . $perauthor . $perstart . $perend;
                }
            } else {
                if ($verbose) echo "0 results";
            }
//COMPANY WORK HISTORY
        //Execute cwh sql to fetch company_work_history record
        if ($verbose) echo "<br>Executing: <b>". $sql_cwh. "<br><br>" ;
        $select_cwh = $conn->query($sql_cwh);


            if ($select_cwh->num_rows > 0) {
                $a=0;
                if ($verbose) echo "SELECT Results:<br>";
                while($row = $select_cwh->fetch_assoc()) {
                    $cwhstart[$a] = $row["cwh_start_date"];
                    $cwhend[$a] = $row["cwh_end_date"];
                    $cwhtitle[$a] = $row["cwh_title"];
                    $cwhcountry[$a] = $row["cwh_country"];
                    $cwhdescription[$a] = $row["cwh_description"];
                    $cwhlevel[$a] = $row["cwh_level"];
                    $cwhregion[$a] = $row["cwh_region"];
                    $cwhskillteam[$a] = $row["cwh_skill_team"];
                    $cwhskillsused[$a] = $row["cwh_skills_used"];
                    $a++;
                }
            } else {
                if ($verbose) echo "0 results";
            }
//NON COMPANY WORK HISTORY
        //Execute ncwh sql to fetch company_work_history record
        if ($verbose) echo "<br>Executing: <b>". $sql_ncwh. "<br><br>" ;
        $select_ncwh = $conn->query($sql_ncwh);


            if ($select_ncwh->num_rows > 0) {
                $a=0;
                if ($verbose) echo "SELECT Results:<br>";
                while($row = $select_ncwh->fetch_assoc()) {
                    $ncwhstart[$a] = $row["ncwh_start_date"];
                    $ncwhend[$a] = $row["ncwh_end_date"];
                    $ncwhtitle[$a] = $row["ncwh_title"];
                    $ncwhcompany[$a] = $row["ncwh_company"];
                    $ncwhdescription[$a] = $row["ncwh_description"];
                    $ncwhskillteam[$a] = $row["ncwh_skill_team"];
                    $ncwhskillsused[$a] = $row["ncwh_skills_used"];
                    $a++;
                }
            } else {
                if ($verbose) echo "0 results";
            }

//EDUCATION
        //Execute ncwh sql to fetch education record
        if ($verbose) echo "<br>Executing: <b>". $sql_edu. "<br><br>" ;
        $select_edu = $conn->query($sql_edu);


            if ($select_edu->num_rows > 0) {
                $a=0;
                if ($verbose) echo "SELECT Results:<br>";
                while($row = $select_edu->fetch_assoc()) {
                    $edstart[$a] = $row["ed_start_date"];
                    $edend[$a] = $row["ed_end_date"];
                    $edschool[$a] = $row["ed_school"];
                    $eddegree[$a] = $row["ed_degree"];
                    $edmajor[$a] = $row["ed_major"];
                    $edminor[$a] = $row["ed_minor"];
                    $a++;
                }
            } else {
                if ($verbose) echo "0 results";
            }

//SKILLS
        //Execute skills sql to fetch skills record
        if ($verbose) echo "<br>Executing: <b>". $sql_skills. "<br><br>" ;
        $select_skills = $conn->query($sql_skills);


            if ($select_skills->num_rows > 0) {
                $a=0;
                if ($verbose) echo "SELECT Results:<br>";
                while($row = $select_skills->fetch_assoc()) {
                    $skills[$a] = $row["sk_skill"];
                    $skilllevels[$a] = $row["sk_skill_level"];                
                    if ($verbose) echo $skills[$a] . $skilllevels[$a];
                    $a++;
                }
            } else {
                if ($verbose) echo "0 results";
            }

        //Close connection
        $conn->close();
        if ($verbose) echo "<br><br>Connection Closed.<br><br>";

?>