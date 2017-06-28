<?php
  session_start();
  $auth_code = $_GET['auth_code'];
  $uid = $_GET['uid'];
  $cid = $_GET['cid'];
  $_SESSION['uid'] = $uid;

  // function sndcurl(){
  //   $curl = curl_init();
  //   curl_setopt($curl, CURLOPT_URL,"http://localhost:10000/token.php");
  //   curl_setopt($curl, CURLOPT_POST, 1);
  //   curl_setopt($curl, CURLOPT_POSTFIELDS,
  //         "cid=$cid&auth_code=$auth_code&uid=$uid");
  //
  //   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //
  //   $server_output = curl_exec ($curl);
  //
  //
  //   $jos = json_decode($server_output,true);
  //   $vtok = $jos["access_token"];
  //   curl_close ($curl);
  //   echo $vtok;
  // }
  //
  // function sndcurl1(){
  //   $chh = curl_init();
  //   curl_setopt($chh, CURLOPT_URL,"http://localhost:10000/getresource.php");
  //   curl_setopt($chh, CURLOPT_POST, 1);
  //   curl_setopt($chh, CURLOPT_POSTFIELDS,      "token=$vtok");
  //   curl_setopt($chh, CURLOPT_RETURNTRANSFER, true);
  //
  //   $output = curl_exec ($chh);
  //   $jostoke = json_decode($output,true);
  //   $tokusername = $jostoke["username"];
  //   $tokuserfname = $jostoke["firstname"];
  //   $tokuserlname = $jostoke["lastname"];
  //   $_SESSION['username'] = $tokusername;
  //   $_SESSION['firstname'] = $tokuserfname;
  //   $_SESSION['lastname'] = $tokuserlname;
  //   curl_close ($chh);
  //   echo $tokuserlname;
  //   #header("location:http://localhost:8000");
  // }

  if($auth_code){
    $link = mysqli_connect('localhost', 'root', 'kini419,247',  'my_oauth2_db');
  }

  if($link){
    $query = "SELECT * FROM oauth_authorization_codes WHERE authorization_code='$auth_code' && user_id='$uid'";
    $res = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($res);
  }

  if($row['authorization_code'] == $auth_code && $row['user_id'] == $uid){
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
  }

  if ($server_output) {
      $chh = curl_init();
      #var_dump($chh);

      $uu = curl_setopt($chh, CURLOPT_URL,"http://localhost:10000/getresource.php");
      #var_dump($uu);

      $mm = curl_setopt($chh, CURLOPT_POST, 1);
      #var_dump($mm);

      $nn = curl_setopt($chh, CURLOPT_POSTFIELDS,      "token=$vtok");
      #var_dump($nn);

      $oo = curl_setopt($chh, CURLOPT_RETURNTRANSFER, true);
      #var_dump($oo);

      $output = curl_exec ($chh);
      #var_dump($output);

      $jostoke = json_decode($output,true);
      $tokusername = $jostoke["username"];
      $tokuserfname = $jostoke["firstname"];
      $tokuserlname = $jostoke["lastname"];

      $_SESSION['user_data'] = array('username'=>$tokusername, 'firstname'=>$tokuserfname, 'lastname'=>$tokuserlname);
      curl_close ($chh);
      header("location:http://localhost:8000");
  }




// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL,"http://localhost:10000/token.php");
// curl_setopt($curl, CURLOPT_POST, 1);
// curl_setopt($curl, CURLOPT_POSTFIELDS,
//       "cid=$cid&auth_code=$auth_code&uid=$uid");
//
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//
// $server_output = curl_exec ($curl);
//
//
// $jos = json_decode($server_output,true);
// $vtok = $jos["access_token"];
// curl_close ($curl);
// echo $vtok;

  // if ($server_output) {
  //   $chh = curl_init();
  //   #var_dump($chh);
  //
  //   $uu = curl_setopt($chh, CURLOPT_URL,"http://localhost:10000/getresource.php");
  //   #var_dump($uu);
  //
  //   $mm = curl_setopt($chh, CURLOPT_POST, 1);
  //   #var_dump($mm);
  //
  //   $nn = curl_setopt($chh, CURLOPT_POSTFIELDS,      "token=$vtok");
  //   #var_dump($nn);
  //
  //   $oo = curl_setopt($chh, CURLOPT_RETURNTRANSFER, true);
  //   #var_dump($oo);
  //
  //   $output = curl_exec ($chh);
  //   #var_dump($output);
  //
  //   $jostoke = json_decode($output,true);
  //   $tokusername = $jostoke["username"];
  //   $tokuserfname = $jostoke["firstname"];
  //   $tokuserlname = $jostoke["lastname"];
  //
  //   $_SESSION['username'] = $tokusername;
  //   $_SESSION['firstname'] = $tokuserfname;
  //   $_SESSION['lastname'] = $tokuserlname;
  //   curl_close ($chh);
  //   header("location:http://localhost:8000");
  // }

?>
