<?php
if(isset($_GET['images'])) { 
    header("Content-type: image/jpeg");
    $url = rawurldecode($_GET['images']);
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            ),
        );  
    $str = @file_get_contents($url, true, stream_context_create($arrContextOptions));
    echo $str;
}
?>
