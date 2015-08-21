<?php
 
function multiRequest($data, $options = array()) {
 
  // array of curl handles
  $curly = array();
  // data to be returned
  $result = array();
 
 
  $mh = curl_multi_init();
 
 //curl setup
  foreach ($data as $id => $d) {
 
    $curly[$id] = curl_init();
 
    $url = (is_array($d) && !empty($d['url'])) ? $d['url'] : $d;
    curl_setopt($curly[$id], CURLOPT_URL,            $url);
    curl_setopt($curly[$id], CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curly[$id], CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:25.0) Gecko/20100101 Firefox/25.0");
    curl_setopt($curly[$id], CURLOPT_HEADER,         0);
    curl_setopt($curly[$id], CURLOPT_RETURNTRANSFER, 1);
 
    curl_multi_add_handle($mh, $curly[$id]);
  }
 
  // execute 
  $running = null;
  do {
    curl_multi_exec($mh, $running);
  } while($running > 0);
 
 
  // get http_status_code of each subdomain
  foreach($curly as $id => $c) {
    $result[$id] = curl_getinfo($c,CURLINFO_HTTP_CODE);
    curl_multi_remove_handle($mh, $c);
    }
 
  // close multi curl 
  curl_multi_close($mh);
  return $result;
}


 


 
?>
