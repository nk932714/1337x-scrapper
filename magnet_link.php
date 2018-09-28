<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <style>#snackbar { visibility: hidden; min-width: 250px; margin-left: -125px; background-color: #333; color: #fff; text-align: center; border-radius: 2px; padding: 16px; position: fixed; z-index: 1; left: 50%; bottom: 30px; font-size: 17px;}#snackbar.show { visibility: visible; -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s; animation: fadein 0.5s, fadeout 0.5s 2.5s;}@-webkit-keyframes fadein { from {bottom: 0; opacity: 0;} to {bottom: 30px; opacity: 1;}}@keyframes fadein { from {bottom: 0; opacity: 0;} to {bottom: 30px; opacity: 1;}}@-webkit-keyframes fadeout { from {bottom: 30px; opacity: 1;} to {bottom: 0; opacity: 0;}}@keyframes fadeout { from {bottom: 30px; opacity: 1;} to {bottom: 0; opacity: 0;}}</style>
</head>
<body>

<?php

        $link_for_magnet = $_GET["link"];
$url = 'https://1337x.to/torrent/'.$link_for_magnet;
//$url = 'https://1337x.to/torrent/3090792/LYNDA-Learning-Siemens-NX-CourseDevil/';
//$url = "https://1337x.to/torrent/3093138/Lynda-Learning-Siemens-NX/";
$raw = file_get_contents($url);
//echo $raw;
$re = '/<div class="tab-content">(.*?)<div role="tabpanel" class="tab-pane" id="comments">/ms';
preg_match_all($re, $raw, $matches);
//print_r($matches);
echo $matches[1][0];

$re2 = $re = '/magnet:\?xt=urn:btih:(.*?)"/sm';
preg_match_all($re2, $raw, $magnet);
$magnet_link = "magnet:?xt=urn:btih:".$magnet[1][0];
//echo $magnet_link;
echo '<textarea rows="4" cols="50" name="comment" id="myInput" form="myInput">'.$magnet_link.'</textarea>';
echo '<button onclick="myFunction()">Copy text</button><div id="snackbar">Text has been copied</div>';

$re3 = '/data-original="(.*?)"/sm';
$count3 = preg_match_all($re3, $raw, $images);
echo $count3;
//print_r($images);
for ($y = 0; $y < $count3; $y++) {
                                    echo '<br><img src="'.$images[1][$y].'" alt="loading" >';
}
?>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
   var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  copyText.select();
  document.execCommand("Copy");
// alert("Copied the text: \n" + copyText.value);
}
</script>
