<?php
    include("link.php");

    //read post vars;
    $cui = $_POST['cui'];
    


    //create query
    $query = "SELECT * FROM `".$cui."`";
    $res = mysqli_query($link, $query);
    $html = "<table>";
    $first_row = true;
    while($row = mysqli_fetch_assoc($res)){
        if($first_row){
            $first_row = false;
            $html .= "<tr>";
            foreach($row as $key => $field){
                $html .= "<th>";
                $html .= htmlspecialchars(ucfirst($key));
                $html .= "</th>";
            }
            $html .= "</tr>";
        }
        $html .= "</tr>";
        foreach($row as $key => $field){
            $html .= "<td>";
            $a = "click";
            if ($field == "Verif"){
                $html .='<button type="button" onclick="verifyOnline('.$cui.', '.$row['id'].')">Verifica</button>';
            } else {
                $html .= htmlspecialchars($field);   
            }
            $html .= "</td>";
        }
        $html .= "</tr>";
    }
    $html .= "</table>";
    echo $html;
    



?>