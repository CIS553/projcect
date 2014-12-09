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
        
        if (isset($_GET["id"])){ //An id was passedto be deleted
            $requested_id = $_GET["id"]; 
        }

//PROFILE
        //delete employee record sql transaction
        $sql_profile = "DELETE FROM employee WHERE id=$requested_id";
        if ($verbose) echo "<br>Executing: <b>". $sql_profile. "<br><br>" ;
        if ($conn->query($sql_profile) === TRUE) 
        {
            if ($verbose) echo "Profile SQL Executed";
        } else {
            if ($verbose)echo "Error: " . $sql_profile . "<br>" . $conn->error;
        }

//PERFORMANCE
        //define strings used in deleting performance record sql transaction
        $sql_performance = "DELETE performance WHERE per_id=$requested_id";

        if ($verbose) echo "<br>Executing: <b>". $sql_performance. "<br><br>" ;
        if ($conn->query($sql_performance) === TRUE) 
        {
            if ($verbose) echo "Performance SQL Executed";
        } else {
            if ($verbose)echo "Error: " . $sql_performance . "<br>" . $conn->error;
        }

//COMPANY WORK HISTORY
        //Delete existing records
        $sql_cwh_delete = "DELETE FROM company_work_history WHERE cwh_id=$requested_id";

        if ($verbose) echo "<br>Executing: <b>". $sql_cwh_delete. "<br><br>" ;
        if ($conn->query($sql_cwh_delete) === TRUE) 
        {
            if ($verbose) echo "CWH Delete SQL Executed";
        } else {
            if ($verbose)echo "Error: " . $sql_cwh_delete . "<br>" . $conn->error;
        }
       
//NON COMPANY WORK HISTORY
        //Delete existing records
        $sql_ncwh_delete = "DELETE FROM non_company_work_history WHERE ncwh_id=$requested_id";

        if ($verbose) echo "<br>Executing: <b>". $sql_ncwh_delete. "<br><br>" ;
        if ($conn->query($sql_ncwh_delete) === TRUE) 
        {
            if ($verbose) echo "NCWH Delete SQL Executed";
        } else {
            if ($verbose)echo "Error: " . $sql_ncwh_delete . "<br>" . $conn->error;
        }

//EDUCATION
        //Delete existing records
        $sql_edu_delete = "DELETE FROM education WHERE ed_id=$requested_id";

        if ($verbose) echo "<br>Executing: <b>". $sql_edu_delete. "<br><br>" ;
        if ($conn->query($sql_edu_delete) === TRUE) 
        {
            if ($verbose) echo "EDU Delete SQL Executed";
        } else {
            if ($verbose)echo "Error: " . $sql_edu_delete . "<br>" . $conn->error;
        }

//SKILLS
        //Delete existing records
        $sql_sk_delete = "DELETE FROM skills WHERE sk_id=$requested_id";

        if ($verbose) echo "<br>Executing: <b>". $sql_sk_delete. "<br><br>" ;
        if ($conn->query($sql_sk_delete) === TRUE) 
        {
            if ($verbose) echo "Skill Delete SQL Executed";
        } else {
            if ($verbose)echo "Error: " . $sql_sk_delete . "<br>" . $conn->error;
        }

//DISCONNECT
        $conn->close();
        if ($verbose) echo "<br><br>Connection Closed.<br><br>";

        $message = "Employee ID:".$requested_id." was deleted from the system.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Refresh: 0; url=./mainPage.php");
?>
