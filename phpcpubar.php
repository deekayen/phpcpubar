<?php
header ("Content-type: image/png");

/**
  * This function is not called.
  * It is in the main code in 5 lines
  * of code instead, but it was good
  * practice.
  */
function cpu() {
  $idle=0;
  $prog=0;

  $tokens = " \t\n";

  $fp = fopen ("/proc/stat", "r");
  for($i=0; $i<2; $i++) {
    $prev_user  = $user;
    $prev_nice  = $nice;
    $prev_system  = $system;
    $prev_idle  = $idle;

    while($tmp = fgets($fp, 128)) {
      if(strstr($tmp, "cpu")) {
        $cpuarray = preg_split('/\s+/', trim($tmp));
        $user  = $cpuarray[1];
        $nice  = $cpuarray[2];
        $system  = $cpuarray[3];
        $idle  = $cpuarray[4];
      }
    }
    sleep(1);
  }
  fclose($fp);
  echo $user;

  $values = array();
  $values["user"] = ($user - $prev_user);
  $values["nice"] = ($nice - $prev_nice);
  $values["system"] = ($system - $prev_sytem);
  $values["idle"] = ($idle - $prev_idle);

  // later
  //  $values = $progtime * 100 / ($idletime + $progtime);
  return ($result);
}

$fp = fopen('/proc/stat', 'r');
$cpustats = explode(' ', fgets($fp, 4096));
fclose($fp);
for($i=2; $i<5; $cpuused = $cpustats[$i] + $cpuused, $i++);
$prosent = round($cpuused / $cpustats[5] * 100, 1);

$im = @ImageCreate (40, 150)
    or die ("Cannot Initialize new GD image stream");
$background_color = ImageColorAllocate ($im, 255, 255, 255);
$text_color_red = ImageColorAllocate ($im, 233, 0, 0);
$text_color_gray = ImageColorAllocate ($im, 100,100,100);
$text_color_black = ImageColorAllocate ($im, 0, 0, 0);

ImageString ($im, 2, 9, 125,  "$prosent%", $text_color_black);

imageline ($im, 0,0,50, 0, $text_color_black);
imageline ($im, 0,0,0,150, $text_color_black);
imageline ($im, 39,149,39,0, $text_color_black);
imageline ($im, 39,149,0,149, $text_color_black);


$linje = 119 - $prosent;


imageline ($im, 10,19,10,119,$text_color_black);
imageline ($im, 30,19,30,119,$text_color_black);
imageline ($im, 30,120,10,120,$text_color_black);
imageline ($im, 30,18,10,18,$text_color_black);

imageline ($im, 30,$linje,10,$linje,$text_color_black);
imagefill ($im, 11,118,$text_color_red);

ImagePng ($im);

?>
