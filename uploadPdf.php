<?php 

    include('link.php');

    // Parse pdf file and build necessary objects.


    $target_dir = 'files/pdf/';
    $uploadOk = 1;
    $targetFile = $target_dir;

    if($_POST['ext'] != "pdf" && $_POST['ext'] != "PDF") {
        $uploadOk = 0;
    }
    if ($uploadOk == 0){
        echo "Fisier incorect";
    } else {
        //move uploaded pdf to files/pdf
        $filename = $_FILES['file']['tmp_name'];
        $name = 'decl.pdf';
        $target = $target_dir.$name;
        move_uploaded_file($filename, $target);
        
        
        //execute shell
        exec('c:\WINDOWS\system32\cmd.exe /c START C:\XAMPP\htdocs\declaratii\unpacker.bat');
        
        
        //Read xml
        $xml=simplexml_load_file('files/xml/DecUnica.xml') or die("Error: Cannot create object");
        
        $den = $xml->angajator['den'];
        $cif = $xml->angajator['cif'];
        
        //get xml attributes for month , year 
        $attr = $xml->attributes();
        $luna = $attr['luna_r'];
        $an = $attr['an_r'];
        $rec = $attr['d_rec'];
        $type = $_POST['type'];
        
        //check if particular db table exists (for spec code)
        mysqli_query($link , "SELECT 1 FROM `".$cif."` LIMIT 1");
        if (mysqli_errno($link) == 1146){
            //table does not exist - create one 
            $create = "CREATE TABLE `".$cif."` (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            an INT(11) NOT NULL,
            luna INT(11) NOT NULL,
            type TEXT NOT NULL,
            rec INT(1) NULL,
            up_date TIMESTAMP,
            state TEXT
            )";
            mysqli_query($link , $create);
        };  
        
        
        //prepare query
        $query = "INSERT INTO `".$cif."` (an, luna, rec, type, up_date) VALUES ('".$an."' , '".$luna."' , '".$rec."', '".$type."' , UTC_TIMESTAMP())";
        if (!mysqli_query($link, $query)){
            echo "error";
        } else {
            //ON SUCCESS
            
            //DELETE XML
            unlink("files/xml/DecUnica.xml");
            //create pdf name -- to update with dec type
            $name = $type ."_". $cif . "_" .$an. "_" .$luna;
             
            if ($rec == 1) {
                $name .= "_rectificativa.pdf";
            } else {
                $name .= ".pdf";
            };
            
            //rename pdf
            $path = "files/pdf/".$name;
            rename("files/pdf/decl.pdf", $path);
            
            
            //send data back
            $last_id = $link->insert_id;
            echo $cif."_".$last_id;
            
        }
        
        
        
            
        
    }




?>