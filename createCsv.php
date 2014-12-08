<?php

//Add one to One elements to $list (profile and performance)
$list = array (
    array('ID', 
          'Name', 
          'Title', 
          'Country', 
          'Email',
          'Level', 
          'Hire Date', 
          'Region',
          'Supervisor', 
          'Team'),
    array($requested_id, 
          $empname,
          $emptitle,
          $empcountry,
          $empemail,
          $emplevel,
          $emphiredate,
          $empregion,
          $empsupervisor,
          $empteam),
    array('Performance Review Author',
          'Performance Review Start', 
          'Performance Review End', 
          'Performance Rating'),
    array($perauthor,
          $perstart,
          $perend,
          $perrating)

);

//Add one to many elements to separate arrays for each

//Company Work History
$i=0;

//Header
$cwh[$i]= array('Comp Work Hist Start',
                 'Comp Work Hist End',
                 'Comp Work Hist Title',
                 'Comp Work Hist Cntry',
                 'Comp Work Hist Desc',
                 'Comp Work Hist Level',
                 'Comp Work Hist Region',                
                 'Comp Work Hist Team',
                 'Comp Work Hist Skill');
$i++;

//Data
foreach($cwhstart as $a => $b){
 $cwh[$i] = array($cwhstart[$a],
                   $cwhend[$a],
                    $cwhtitle[$a],
                    $cwhcountry[$a],
                    $cwhdescription[$a],
                    $cwhlevel[$a],
                    $cwhregion[$a],
                    $cwhskillteam[$a],
                    $cwhskillsused[$a]);
 $i++;
}


//Non Company Work History
$i=0;

//Header
$ncwh[$i]= array('Non Comp Work Hist Start',
                 'Non Comp Work Hist End',
                 'Non Comp Work Hist Title',
                 'Non Comp Work Hist Comp',
                 'Non Comp Work Hist Desc',
                 'Non Comp Work Hist Team',
                 'Non Comp Work Hist Skill');
$i++;

//Data
foreach($ncwhstart as $a => $b){
 $ncwh[$i] = array($ncwhstart[$a],
                   $ncwhend[$a],
                    $ncwhtitle[$a],
                    $ncwhcompany[$a],
                    $ncwhdescription[$a],
                    $ncwhskillteam[$a],
                    $ncwhskillsused[$a]);
 $i++;
}

//Education
$i=0;

//Header
$ed[$i]= array('Education Start',
                 'Education End',
                 'School',
                 'Degree',
                 'Major',
                 'Minor');
$i++;

//Data
foreach($edstart as $a => $b){
 $ed[$i] = array($edstart[$a],
                   $edend[$a],
                    $edschool[$a],
                    $eddegree[$a],
                    $edmajor[$a],
                    $edminor[$a]);
 $i++;
}

//Skills
$i=0;

//Header
$skl[$i]= array('Skill',
                 'Skill Level');
$i++;

//Data
foreach($empskill as $a => $b){
 $skl[$i] = array($empskill[$a],
                   $skilllevel[$a]);
 $i++;
}

//Open file to write csv
$fp = fopen('employeeInfo.csv', 'w');

//Add one to one elements to csv file
foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

//Add one to many elements to csv file

//Company Work History
foreach ($cwh as $fields) {
    fputcsv($fp, $fields);
}
    
//Non Company Work History
foreach ($ncwh as $fields) {
    fputcsv($fp, $fields);
}

//Education
foreach ($ed as $fields) {
    fputcsv($fp, $fields);
}

//Skills
foreach ($skl as $fields) {
    fputcsv($fp, $fields);
}

//Close file
fclose($fp);

?>