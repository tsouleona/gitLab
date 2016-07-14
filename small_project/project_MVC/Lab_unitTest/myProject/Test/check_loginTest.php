<?php
    include_once("../mysql_connect.inc.php");
    header("Content-Type:text/html; charset=utf-8");
    
    namespace myProject\Test;
    use myProject\check_login;
    
    
    class check_loginTest extends \PHPUnit_Framework_TestCase
    {
        $check = new login();
        $check->check();
        $check->login_data("use");
        $check->login_out();
            
    }

?>