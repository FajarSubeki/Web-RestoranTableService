<?php
$agent = @$_SERVER['HTTP_USER_AGENT'];
$uri = @$_SERVER['REQUEST_URI'];

$ip = @$_SERVER['REMOTE_ADDR'];
 
$ref = @$_SERVER['HTTP_REFERER'];

$asli = @$_SERVER['HTTP_X_FORWARDED_FOR'];

$via = @$_SERVER['HTTP_VIA'];

$dtime = date('r');


$entry_line = "Waktu: $dtime | IP asli: $ip | Browser: $agent? | URL: $uri | Referrer: $ref | Proxy: $asli | Koneksi: $via | Message: 'Test'
";

$fp = fopen("jejak.txt", "a");

fputs($fp, $entry_line);

fclose($fp);

?>