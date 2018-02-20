<?php 
    namespace Facebook\WebDriver;

    use Facebook\WebDriver\Remote\DesiredCapabilities;
    use Facebook\WebDriver\Remote\RemoteWebDriver;

    require_once('vendor/autoload.php');
    include("startSelenium.php");
    include("link.php");

    //read received data
    $data = explode("_", $_POST['nom']);

    //launch query
    $query = "SELECT * FROM `".$data[0]."` WHERE `id`=".$data[1]." LIMIT 1";
    $res = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($res);
    $path = "C:/XAMPP/htdocs/declaratii/files/pdf/".$row['type']."_".$data[0]."_".$row['an']."_".$row['luna'];
    if ($row['rec'] == 1) {
        $path .= "_rectificativa.pdf";
    } else {
        $path .= ".pdf";
    };
    //launch chrome
    $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome(), 1000);

    //access site
    $driver->get('http://www.e-guvernare.ro/redirectfunic.htm');


    //find buttons
    $link = $driver->findElement(
        WebDriverBy::className('credentials_input_submit')
    );
    $link->click();

    //LOG certificate
    $driver->switchTo()->alert()->accept();
    
    //page load - wait
    $driver->wait(5, 500)->until(
        WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::name('linkdoc'))
    );

    //input dec path & upload
    $link = $driver->findElement(WebDriverBy::name('linkdoc'));
    $link->sendKeys($path);
    
    $link = $driver->findElement(WebDriverBy::xpath("//input[@value='Trimite']"));
    $link->click();
    
    //page load - wait
    $driver->wait(10, 500)->until(
        WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::xpath("//b[@style='color: #000000']"))
    );
    

    //read index
    $index = $driver->findElement(WebDriverBy::xpath("//b[@style='color: #000000']"))->getText();

    //add index to db record
    $query = "UPDATE `".$data[0]."` SET `indexRecipisa` =".$index." WHERE `id`=".$data[1]." LIMIT 1";
    mysqli_query($link, $query);
    echo $index;
    
    
    
    
    

    //termiante Selenium
    execInBackground('c:\WINDOWS\system32\cmd.exe /c START /min C:\XAMPP\htdocs\declaratii\terminateSelenium.bat');


    







?>