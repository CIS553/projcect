<?php


//define variables and set to empty values
$empNameError = $empTitleError = $empTeamError = "";
$rvwPrdStartError = $rvwPrdEndError = $rvwAuthorError= "";
$errosOnPage="F";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if (empty($_POST["empName"])) {
     $empNameError = "Name is required";
     $errosOnPage="T";
   } else {
     $empName = formatInput($_POST["empName"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$empName)) {
       $empNameError= "Only letters and white space allowed in name"; 
       $errosOnPage="T";
     }
   }
   
   if (empty($_POST["empTitle"])) {
     $empTitleError = "Title is required";
   } else {
     $empTitle = formatInput($_POST["empTitle"]);
     $errosOnPage="T";
     // check if title contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$empTitle)) {
       $empTitleError = "Only letters and white space allowed in title";
       $errosOnPage="T"; 
     }
   }

   if (empty($_POST["empTeam"])) {
     $empTeamError = "Team is required";
     $errosOnPage="T";
   } else {
     $empTeam = formatInput($_POST["empTeam"]);
     // check if Team only contains letters,numbers and whitespace
     if (!preg_match("/^[a-zA-Z0-9 ]*$/",$empTeam)) {
       $empTeamError = "Only letters, numbers and white space allowed in name"; 
       $errosOnPage="T";
     }
   }

   if (empty($_POST["rvwPrdStart"])) {
     $rvwPrdStartError= "Review Period Start Date is required";
     $errosOnPage="T";
   } else {
     $rvwPrdStart= $_POST["rvwPrdStart"];
     // check if proper format
     $startDate = validateDate($rvwPrdStart);
     if ($startDate == 'F') {
        $rvwPrdStartError= "Incorrect Date Format. Should be DD-MM-YYYY"; 
        $errosOnPage="T";
     }
   }

   if (empty($_POST["rvwPrdEnd"])) {
     $rvwPrdEndError= "Review Period End Date is required";
     $errosOnPage="T";
   } else {
     $rvwPrdEnd= formatInput($_POST["rvwPrdEnd"]);
     // check if proper format
     $endDate= validateDate($rvwPrdEnd);
     if ($endDate== 'F') {
         $rvwPrdStartError= "Incorrect Date Format. Should be DD-MM-YYYY"; 
         $errosOnPage="T";
     }
   }

   if (empty($_POST["rvwAuthor"])) {
     $rvwAuthorError= "Review Author is required";
     $errosOnPage="T";
   } else {
     $rvwAuthor= formatInput($_POST["rvwAuthor"]);
     // check if only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z0-9 ]*$/",$rvwAuthor)) {
       $rvwAuthorError = "Only letters, numbers, and white space allowed in Review Author"; 
       $errosOnPage="T";
     }
   }
}

function validateDate($dateInput){
    $valid = 'F';
    $date = date_parse($dateInput);
    if ($date["error_count"] == 0 && checkdate($date["month"], $date["day"], $date["year"])){
        $valid = 'T';
    }
    return $valid;
}


function formatInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
