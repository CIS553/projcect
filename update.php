<?php

//Begin updates

        include('dbConnect.php'); //SQL connection parameters

        //Test sql connection 
        if($conn == true)
        {
            if ($verbose) echo "<br>connected";
        } else {
            echo "<br>not connected";
            die(print_r(sqlsrv_errors(), true)); 
        }    
        
//PROFILE
        //define strings used in creating employee record sql transaction
        $sql_profile = "UPDATE employee 
        SET emp_name='$empname',
                    emp_title='$emptitle',
                    emp_country='$empcountry', 
                    emp_email='$empemail',
                    emp_level='$emplevel',
                    emp_hire_date='$emphiredate', 
                    emp_region='$empregion',
                    emp_supervisor='$empsupervisor', 
                    emp_team='$empteam'
        WHERE id=$requested_id";

        //Execute profile sql to create employee record and obtain an id
        if ($verbose) echo "<br>Executing: <b>". $sql_profile. "<br><br>" ;
        if ($conn->query($sql_profile) === TRUE) 
        {
            if ($verbose) echo "Profile SQL Executed";
        } else {
            echo "Error: " . $sql_profile . "<br>" . $conn->error;
        }

//PERFORMANCE
        //define strings used in creating performance record sql transaction
        $sql_performance = "UPDATE performance 
        SET per_rating='$perrating',
                    per_review_author_Name='$perauthor',
                    per_start_date='$perstart', 
                    per_end_date='$perend'
        WHERE per_id=$requested_id";

        //Execute performance sql to create employee record and obtain an id
        if ($verbose) echo "<br>Executing: <b>". $sql_performance. "<br><br>" ;
        if ($conn->query($sql_performance) === TRUE) 
        {
            if ($verbose) echo "Performance SQL Executed";
        } else {
            echo "Error: " . $sql_performance . "<br>" . $conn->error;
        }

        //define strings used in creating performance record sql transaction
        $sql_performance = "UPDATE performance 
        SET per_rating='$perrating',
                    per_review_author_Name='$perauthor',
                    per_start_date='$perstart', 
                    per_end_date='$perend'
        WHERE per_id=$requested_id";

        //Execute performance sql to create employee record and obtain an id
        if ($verbose) echo "<br>Executing: <b>". $sql_performance. "<br><br>" ;
        if ($conn->query($sql_performance) === TRUE) 
        {
            if ($verbose) echo "Performance SQL Executed";
        } else {
            echo "Error: " . $sql_performance . "<br>" . $conn->error;
        }

//COMPANY WORK HISTORY
        //Delete existing records
        $sql_cwh_delete = "DELETE FROM company_work_history
        WHERE cwh_id=$requested_id";

        if ($verbose) echo "<br>Executing: <b>". $sql_cwh_delete. "<br><br>" ;
        if ($conn->query($sql_cwh_delete) === TRUE) 
        {
            if ($verbose) echo "CWH Delete SQL Executed";
        } else {
            echo "Error: " . $sql_cwh_delete . "<br>" . $conn->error;
        }

        //Add Updated - Iterate over all rows in company work history section
        foreach($cwhstart as $a => $b){
            $sql_cwh = "INSERT INTO company_work_history 
            (cwh_id,
            cwh_start_date,
            cwh_end_date,
            cwh_title,
            cwh_country,
            cwh_description,
            cwh_level,
            cwh_region,
            cwh_skill_team,
            cwh_skills_used )
        VALUES 
        ($requested_id,
        '$cwhstart[$a]',
        '$cwhend[$a]',
        '$cwhtitle[$a]',
        '$cwhcountry[$a]',
        '$cwhdescription[$a]',
        '$cwhlevel[$a]',
        '$cwhregion[$a]',
        '$cwhskillteam[$a]',
        '$cwhskillsused[$a]')";  
            
            //Execute sql transactions
            if ($verbose) echo "<br>Executing: <b>". $sql_cwh. "<br><br>" ;
            if ($conn->query($sql_cwh) === TRUE) 
            {
                if ($verbose) echo "CWH SQL Executed";
            } else {
                echo "Error: " . $sql_cwh . "<br>" . $conn->error;
            }
        }

//NON COMPANY WORK HISTORY
        //Delete existing records
        $sql_ncwh_delete = "DELETE FROM non_company_work_history
        WHERE ncwh_id=$requested_id";

        if ($verbose) echo "<br>Executing: <b>". $sql_ncwh_delete. "<br><br>" ;
        if ($conn->query($sql_ncwh_delete) === TRUE) 
        {
            if ($verbose) echo "NCWH Delete SQL Executed";
        } else {
            echo "Error: " . $sql_ncwh_delete . "<br>" . $conn->error;
        }

        //Add Updated - Iterate over all rows in non company work history section
        foreach($ncwhstart as $a => $b){
            $sql_ncwh = "INSERT INTO non_company_work_history 
            (ncwh_id,
            ncwh_start_date,
            ncwh_end_date,
            ncwh_title,
            ncwh_company,
            ncwh_description,
            ncwh_skill_team,
            ncwh_skills_used )
        VALUES 
        ($requested_id,
        '$ncwhstart[$a]',
        '$ncwhend[$a]',
        '$ncwhtitle[$a]',
        '$ncwhcompany[$a]',
        '$ncwhdescription[$a]',
        '$ncwhskillteam[$a]',
        '$ncwhskillsused[$a]')";  
            
            //Execute sql transactions
            if ($verbose) echo "<br>Executing: <b>". $sql_ncwh. "<br><br>" ;
            if ($conn->query($sql_ncwh) === TRUE) 
            {
                if ($verbose) echo "CWH SQL Executed";
            } else {
                echo "Error: " . $sql_ncwh . "<br>" . $conn->error;
            }
        }


//EDUCATION
        //Delete existing records
        $sql_edu_delete = "DELETE FROM education
        WHERE ed_id=$requested_id";

        if ($verbose) echo "<br>Executing: <b>". $sql_edu_delete. "<br><br>" ;
        if ($conn->query($sql_edu_delete) === TRUE) 
        {
            if ($verbose) echo "EDU Delete SQL Executed";
        } else {
            echo "Error: " . $sql_edu_delete . "<br>" . $conn->error;
        }

        //Add Updated - Iterate over all rows in education section
        foreach($edstart as $a => $b){
            $sql_edu = "INSERT INTO education 
            (ed_id,
            ed_start_date,
            ed_end_date,
            ed_school,
            ed_degree,
            ed_major,
            ed_minor )
        VALUES 
        ($requested_id,
        '$edstart[$a]',
        '$edend[$a]',
        '$edschool[$a]',
        '$eddegree[$a]',
        '$edmajor[$a]',
        '$edminor[$a]')";  
            
            //Execute sql transactions
            if ($verbose) echo "<br>Executing: <b>". $sql_edu. "<br><br>" ;
            if ($conn->query($sql_edu) === TRUE) 
            {
                if ($verbose) echo "EDU SQL Executed";
            } else {
                echo "Error: " . $sql_edu . "<br>" . $conn->error;
            }
        }

//SKILLS
        //Delete existing records
        $sql_sk_delete = "DELETE FROM skills
        WHERE sk_id=$requested_id";

        if ($verbose) echo "<br>Executing: <b>". $sql_sk_delete. "<br><br>" ;
        if ($conn->query($sql_sk_delete) === TRUE) 
        {
            if ($verbose) echo "Skill Delete SQL Executed";
        } else {
            echo "Error: " . $sql_sk_delete . "<br>" . $conn->error;
        }

        //Add Updated - Iterate over all rows in skill section
        foreach($skills as $a => $b){
            $sql_skill = "INSERT INTO skills
            (sk_id,
            sk_skill,
            sk_skill_level)
        VALUES 
        ($requested_id,
        '$skills[$a]',
        $skilllevels[$a])";
            
            //Execute sql transactions
            if ($verbose) echo "<br>Executing: <b>". $sql_skill. "<br><br>" ;
            if ($conn->query($sql_skill) === TRUE) 
            {
                if ($verbose) echo "Skill SQL Executed";
            } else {
                echo "Error: " . $sql_skill . "<br>" . $conn->error;
            }
        }

//DISCONNECT
        $conn->close();
        if ($verbose) echo "<br><br>Connection Closed.<br><br>";
	
?>