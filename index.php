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

?>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Test</title>

  </head>
  <body>
    <h1>Test</h1>
    <form action="/export.php" method="post" target="_blank">
        <button type="submit" name="export">Download CSV</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>UID</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile No.</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($output['data'] as $key => $item) 
                {
                    echo '<tr>
                        <td>'.$item['uid'].'</td>
                        <td>'.$item['email'].'</td>
                        <td>'.$item['first_name'].'</td>
                        <td>'.$item['last_name'].'</td>
                        <td>'.$item['mobile'].'</td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
  
</body>
</html>