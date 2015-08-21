<?php

include 'multithread.php';


if (isset($_POST["target"]))
{
$tar = $_POST["target"];

$sub = explode("\n", file_get_contents('list.txt'));
$count = count($sub);


function arraywalk(&$value,$key,$tar) {
  $value="$value".".".$tar;
}
array_walk($sub,"arraywalk",$tar);



for($i=0; $i<$count; $i++)
{

$data = $sub;
$r = multiRequest($data);
 

    if($r[$i]==0)
    {
        
    }
    else
    {
     
     $file = file_get_contents("valid.txt");
     $file .= $sub[$i] . "/n";
     file_put_contents("valid.txt", $file);
     echo $file;
    }

}
}
 
?>
    
