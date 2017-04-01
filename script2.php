<?php
  include('media.php');
  $link = $test;
  $pos = strpos($link, "instagram.com/p/");
  if($link != "" && $count = 1){
    if($pos !== false){
        $api = file_get_contents("http://api.instagram.com/oembed?url=".$link.""); 
            $apiObj = json_decode($api, true);
            $media_id = $apiObj["media_id"];
        //echo $media_id;
    }
  }
?>
