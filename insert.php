
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
        $sql_profile = "INSERT INTO employee (emp_name, emp_title, emp_country, emp_email, emp_level, emp_hire_date, emp_region, emp_supervisor, emp_team)
        VALUES 
        ('$empname','$emptitle','$empcountry','$empemail','$emplevel','$emphiredate','$empregion','$empsupervisor','$empteam' )";
        //Execute profile sql to create employee record and obtain an id
        if ($verbose) echo "<br>Executing: <b>". $sql_profile. "<br><br>" ;
        if ($conn->query($sql_profile) === TRUE) 
        {
            $_empid = $conn->insert_id;
            if ($verbose) echo "Profile SQL Executed";
            if ($verbose) printf("Last inserted record has id %d\n", $_empid);
        } else {
            echo "Error: " . $sql_profile . "<br>" . $conn->error;
        }

//PERFORMANCE
        //define strings used in additional sql transactions (performed here because needed $_empid)
        $sql_performance = "INSERT INTO performance 
        (per_id,
        per_rating,
        per_review_author_Name,
        per_start_date,
        per_end_date)
        VALUES 
        ($_empid,
        '$perrating',
        '$perauthor',
        '$perstart',
        '$perend')";      
        
        //Execute additional sql transactions
        if ($verbose) echo "<br>Executing: <b>". $sql_performance. "<br><br>" ;
        if ($conn->query($sql_performance) === TRUE) 
        {
            if ($verbose) echo "Profile SQL Executed";
        } else {
            echo "Error: " . $sql_performance . "<br>" . $conn->error;
        }

//COMPANY WORK HISTORY
        //Iterate over all rows in company work history section
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
        ($_empid,
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
        //Iterate over all rows in non company work history section
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
        ($_empid,
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
                if ($verbose) echo "NCWH SQL Executed";
            } else {
                echo "Error: " . $sql_ncwh . "<br>" . $conn->error;
            }
        }

//EDUCATION
        //Iterate over all rows in education section
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
        ($_empid,
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
        //Iterate over all rows in skill section
        foreach($skills as $a => $b){
            $sql_skill = "INSERT INTO skills (sk_id, sk_skill, sk_skill_level)
        VALUES 
        ($_empid,'$skills[$a]'
        ,$skilllevels[$a])";  
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

