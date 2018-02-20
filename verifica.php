<?php
    namespace Facebook\WebDriver;

    use Facebook\WebDriver\Remote\DesiredCapabilities;
    use Facebook\WebDriver\Remote\RemoteWebDriver;

    require_once('vendor/autoload.php');
    include("startSelenium.php");
    include("link.php");
    
    //   ---- SELENIUM ----
    
    //retrieve values from $_POST
    $data = explode("_", $_POST['data']);
    $query = "SLECT * FROM `".$data[0]."` WHERE `id`=".$data[1]." LIMIT 1";
    $res = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($res);
    
    //create host
    $host =  'http://localhost:4444/wd/hub';

    sleep(2);

    //launch chrome
    $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome(), 5000);

    //acces verifStare
    $driver->get('https://www.anaf.ro/StareD112/');

    $driver->wait(20, 500)->until(
        WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::xpath("//input[@type='submit']"))
    );
    
    // input index si cui
    $driver->findElement(WebDriverBy::name('id'))
        ->sendKeys($row['indexRecipisa']);
    $driver->findElement(WebDriverBy::name('cui'))
        ->sendKeys($data[0]);
    

    //submit form
    $driver->findElement(WebDriverBy::xpath("//input[@type='submit']"))->click();

    $driver->wait(10, 500)->until(
        WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::name('afisareForm'))
    );
    
    
    //query through elements and find the right one
    $elements = $driver->findElements(WebDriverBy::xpath("//tr[@align='left']"));
    foreach($elements as $element){
        $text = $element->getText();
        
        if(strpos($text, $row['indexRecipisa']) !== false){
            $prestate = explode(" ", $text);
            $state = explode("IN" ,$prestate[3]);
            
            //update state db record
            $query = "UPDATE `".$data[0]."` SET `state`='".$state[0]."' WHERE `id` =".$data[1]." LIMIT 1";
            mysqli_query($link ,$query);
            
        };
    };

    //terminate Selenium
    execInBackground('c:\WINDOWS\system32\cmd.exe /c START /min C:\XAMPP\htdocs\declaratii\terminateSelenium.bat');
    

    
    
    

    
    
    
    
    




?>