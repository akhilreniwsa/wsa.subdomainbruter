<?php
@set_time_limit(0);
include 'multithread.php';

if (isset($_GET["target"]))
{
 
 //reset debug file
    file_put_contents("debug.txt", "");
    
$updateresult= 134; //default number of requests per minute
$i=0;    
$tar = $_GET["target"];

$sub = explode("\n", file_get_contents('list.txt'));
$count = count($sub);


function arraywalk(&$value,$key,$tar) {
  $value="$value".".".$tar;
}
array_walk($sub,"arraywalk",$tar);


$currenttime= time(); 
$requests=0;
    
while($i<$count) 
{
   
 
    $mc = EpiCurl::getInstance();
  $sub1[$i]= $mc->addURL($sub[$i]); 
    if($i<$count-1) 
    {
    $sub2[$i]= $mc->addURL($sub[$i+1]);
    }
    if($i<$count-2) 
    {
    $sub3[$i]= $mc->addURL($sub[$i+2]);
    }
    if($sub1[$i]->code==0)
    {
    }
    else
    {
     $file = file_get_contents("valid.txt");
     $file .= $sub[$i] . "</li><li>";
     file_put_contents("valid.txt", $file);
     
    }
    if($sub2[$i]->code==0)
    {
    }
    else
    {
     $file = file_get_contents("valid.txt");
     $file .= $sub[$i+1] . "</li><li>";
     file_put_contents("valid.txt", $file);
    }
    if($sub3[$i]->code==0)
    {
    }
    else
    {
     $file = file_get_contents("valid.txt");
     $file .= $sub[$i+2] . "</li><li>";
     file_put_contents("valid.txt", $file);
    }
   

    $requests= $requests+3;

$time= time()-$currenttime;
    
    $currentdom = $sub[$i];
     $currentdom =$currentdom . "<br><br>" . $updateresult ." per/minute";
    file_put_contents("debug.txt", $currentdom);
    if($time>=60) //requests per minute check
    {

        $currenttime=time();
        $updateresult= $requests;
        $requests= 0;
        
    }
    $i=$i+3;
}

    

}
 
?>
    
