<?php
    session_start();
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL,"http://localhost:10000/token.php");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS,
          "cid=$cid&auth_code=$auth_code&uid=$uid");

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec ($curl);


    $jos = json_decode($server_output,true);
    $vtok = $jos["access_token"];
    curl_close ($curl);
    echo $vtok;
    
?>
