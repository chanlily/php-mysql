<?php
require_once '../include.php';
if(checkIsAdmin()<1) {
    alertMes("你没有权限访问","index.php");
}