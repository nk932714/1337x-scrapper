<?php
    /***************   some Universal Constants here        **********************/
   /*************/     $script_name = " ";         /********************/
  /*************/      $site_name = "";         /*******************/
 /*************/       $site_link = $_SERVER['SERVER_NAME'];  /******************/
/**************        END OF UNIVERSAL CONSTANTS           ******************/
//$search     = $_POST["word"];
//$whomtosents    = $whomtosent;
?>
<html>
<head>
      <title><?php echo $script_name ?> </title>


</head><body>
                <font color="red" size="5"><strong><b> <?php echo $script_name ?> </b></strong></font><br>
                <form action="<?php  echo $PHP_SELF; ?>">
                         <input type="text" class="text" maxlength="99" name="word" placeholder="Word"><br><br>
                         <input type="submit" name="submit" class="button" value="Submit">			
                </form></center>
                       <center><font class="heading"><strong><font color="red" size="5"><a href="<?php echo $site_link?>" style="text-decoration:none">  <?php echo $site_name ?>  </a></font><br>
</font></strong></center>




 <?php 
            $pagea  = $_GET["page"];
            if (!empty($pagea)) { $page1 = $pagea; }
            else{ $page1 = 1; }
 
 ?>
  <!--for for showing search results -->
<?php

    $search  = $_GET["word"];
    $url = "https://1337x.to/search/".$search."/".$page1."/";
    $raw = file_get_contents($url);
    //echo $raw;
    $table_making = '<table border="1"><th>Results</th><th>Seeds</th><th>Leeches</th><th>Date Added</th><th>Size</th><th>Uloadeder</th>';
    echo $table_making;
    $re = '/<tbody>(.*?)<\/tbody>/ms';
    preg_match_all($re, $raw, $matches, PREG_SET_ORDER, 0);
    // echo $matches[0][1];
    //$result = str_replace('</tr>','</tr><br>',$matches[0][1]);
    $re01 = '/<i class="flaticon-message"><\/i>.*?<\/span>/m';
    $re02 = '/<span class="seeds">.*?<\/span>/m';
    $result = str_replace('<a href="/torrent/','<a href="magnet_link.php?link=',$matches[0][1]);
    $result = preg_replace($re01, '', $result);
    $result = preg_replace($re02, '', $result);
    echo $result;
 ?>
    <!--for next page and backpage -->
<?php $full_url = $_SERVER['REQUEST_URI']; $qurey_url = '?'.$_SERVER['QUERY_STRING']; $full_url1 = str_replace($qurey_url,'', $full_url); ?>
 <li><a href="<?php echo $full_url1; ?>">Reload</a></li> <li><a href="<?php $page2 = $page1 + 1; $next_page = $full_url1.'?word='.$search.'&page='.$page2;  echo $next_page ?>">Next Page</a></li><li><a href="<?php $page3 = $page1 - 1; $prev_page = $full_url1.'?word='.$search.'&page='.$page3; echo $prev_page ?>">Previous Page</a></li>
 </body>
