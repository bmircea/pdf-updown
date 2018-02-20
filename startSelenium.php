<?php
    function execInBackground($cmd) { 
        if (substr(php_uname(), 0, 7) == "Windows"){ 
            pclose(popen("start /B ". $cmd, "r"));  
        } 
        else { 
            exec($cmd . " > /dev/null &");   
        } 
    } 
    // start selenium & chromedriver
    execInBackground('c:\WINDOWS\system32\cmd.exe /c START /min C:\XAMPP\htdocs\declaratii\seleniumServer.bat');
    execInBackground('c:\WINDOWS\system32\cmd.exe /c START /min C:\XAMPP\htdocs\declaratii\chromedriver.bat');
    sleep(2);
    //create host
    $host = 'http://localhost:4444/wd/hub';



?>