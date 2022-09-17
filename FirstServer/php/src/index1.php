<?php
if(isset($_GET["num"])){
  $num = $_GET["num"];
  $num = $num & 7;
  if ($num == 0){ #0
    $img = imagecreatetruecolor(200, 200);
    $blue  = imagecolorallocate($img,   0,   0, 255);
    imagearc($img, 100,  100,  160,  160,  0, 360, $blue);
  }
  else if ($num == 1){ #1
    $img = imagecreatetruecolor(200, 200);
    $blue  = imagecolorallocate($img,   0,   0, 255);
    imageFilledRectangle($img, 20, 20, 180, 180, $blue);
  }
  else if ($num == 2){ #2
    $img = imagecreatetruecolor(200, 200);
    $red  = imagecolorallocate($img, 255, 0, 0);
    imagearc($img, 100,  100,  160,  160,  0, 360, $red);
  }
  else if ($num == 3){ #3
    $img = imagecreatetruecolor(200, 200);
    $red  = imagecolorallocate($img, 255, 0, 0);
    imageFilledRectangle($img, 20, 20, 180, 180, $red);
  }
  else if ($num == 4){ #4
    $img = imagecreatetruecolor(600, 600);
    $blue  = imagecolorallocate($img,   0,   0, 255);
    imagearc($img, 300,  300,  560,  560,  0, 360, $blue);
  }
  else if ($num == 5){ #5
    $img = imagecreatetruecolor(600, 600);
    $blue  = imagecolorallocate($img,   0,   0, 255);
    imageFilledRectangle($img, 20, 20, 580, 580, $blue);
  }
  else if($num == 6){#6
    $img = imagecreatetruecolor(600, 600);
    $red  = imagecolorallocate($img, 255, 0, 0);
    imagearc($img, 300,  300,  560,  560,  0, 360, $red);
  }
  else if($num == 7){#7
    $img = imagecreatetruecolor(600, 600);
    $red  = imagecolorallocate($img, 255, 0, 0);
    imageFilledRectangle($img, 20, 20, 580, 580, $red);
  }
  header("Content-type: image/png");
  imagepng($img);
  imagedestroy($img);
}
?>