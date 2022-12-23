<?php  
    session_start();
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'mu_job_application';

    $dbconnect = mysqli_connect($host, $user, $password, $dbname);

    if(!$dbconnect) 
    {
        echo "Database connection error";
    }
?>