<?php  
// $quotes=readfile('readme.txt');
// $file='readme.txt';
// echo $quotes;
// copy($file,'quote.txt');
// echo realpath($file);
// echo filesize($file);
$file= 'quotes.txt';
$handle= fopen($file,'r');
echo fread($handle,filesize($file));
echo fgets($handle);
 
echo fgetc($handle);
?>