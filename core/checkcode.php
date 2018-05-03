<?php
/**生成验证码*/
function adminCheckCode($width=110,$height=30){
    $checckCode="";
    $size=rand(14,18);
    $x=5+rand(1,4)*$size;
    $y=rand(5,$height-$size);
    for($i=0;$i<4;$i++){
        //把10进制转换成十六进制
        $checckCode.=dechex(rand(1,15));
    }
    //session_start();
    $_SESSION['adminCheckCode']=$checckCode;
    //保存
    $image1=imagecreatetruecolor($width,$height);
    $white=imagecolorallocate($image1,255,255,255);
    for($i=0;$i<10;$i++){
        imageline($image1,rand(0,$width-1),rand(0,$height-1),rand(0,$width-1),rand(0,$height-1),imagecolorallocate($image1,rand(50,90),rand(80,200),rand(90,180)));
    }
    for($i = 0; $i < 50; $i ++) {
        imagesetpixel ( $image1, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $white);
    }
    imagestring($image1,$size,$x,$y,$checckCode,$white);
    header("content-type:image/png");
    imagepng($image1);
    imagedestroy($image1);
}
function userCheckCode($width=110,$height=30){
    $checckCode="";
    $size=rand(14,18);
    $x=5+rand(1,4)*$size;
    $y=rand(5,$height-$size);
    for($i=0;$i<4;$i++){
        //把10进制转换成十六进制
        $checckCode.=dechex(rand(1,15));
    }
    //session_start();
    $_SESSION['userCheckCode']=$checckCode;
    //保存
    $image1=imagecreatetruecolor($width,$height);
    $white=imagecolorallocate($image1,255,255,255);
    for($i=0;$i<10;$i++){
        imageline($image1,rand(0,$width-1),rand(0,$height-1),rand(0,$width-1),rand(0,$height-1),imagecolorallocate($image1,rand(50,90),rand(80,200),rand(90,180)));
    }
    for($i = 0; $i < 50; $i ++) {
        imagesetpixel ( $image1, mt_rand ( 0, $width - 1 ), mt_rand ( 0, $height - 1 ), $white);
    }
    imagestring($image1,$size,$x,$y,$checckCode,$white);
    header("content-type:image/png");
    imagepng($image1);
    imagedestroy($image1);
}