

<?php
    $file = 'employeeInfo.csv';

    if (file_exists($file)) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename='.$file);
        header('Content-Description: File Transfer');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
?>

