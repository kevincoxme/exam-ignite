<?php
    $url = 'https://ignite-careers.com/test/endpoint.php';
    $data = array("jobId" => 10);
    $authorization = "Authorization: Bearer qwertyuiop";
    $postdata = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
    $result = curl_exec($ch);
    $output = json_decode($result, true);

    curl_close($ch); 

     if(isset($_POST["export"])){     
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=people.csv');  
        $file_output = fopen("php://output", "w");  
        fputcsv($file_output, array('ID', 'First Name', 'Last Name', 'Mobile', 'Email'));  
        foreach ($output['data'] as $key => $item) 
        {          
            fputcsv($file_output, $item); 
        } 
        fclose($file_output);  
    }