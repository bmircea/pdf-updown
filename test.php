<?php 
    namespace Facebook\WebDriver;

    use Facebook\WebDriver\Remote\DesiredCapabilities;
    use Facebook\WebDriver\Remote\RemoteWebDriver;

    require_once('vendor/autoload.php');
    include("startSelenium.php");
    include("link.php");

    $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome(), 1000);

    //access site
    $driver->get('http://www.e-guvernare.ro/redirectfunic.htm');


    sleep(3);
    
    
    
    
    

    //termiante Selenium
    execInBackground('c:\WINDOWS\system32\cmd.exe /c START /min C:\XAMPP\htdocs\declaratii\terminateSelenium.bat');


    







?>