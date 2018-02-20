<?php



?>






<html lang="en">

    <header>
        <title>Verifica Stare Firma</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        
        <style type="text/css">
            table {
                font-family: sans-serif , arial;
                border-collapse: collapse;
                width: 100%;
                
            }
            td, th{
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            
            tr:nth-child(even){
                background-color: #dddddd;
            }
        
        
        </style>
    </header>

    <body>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        
        
        <div class="container">
            <div class="row">
                <form id="verifyData" method="post" enctype="multipart/form-data">
                    <input type="text" id="cui" style="display:none">
                    <button id="verifyButton" class="btn btn-success" type="submit">Verifica</button>
                </form>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Firma
                    </button> 
                    
                    <div class="dropdown-menu" aria-labelledby="dropButton" id="soc">
                        <a class="dropdown-item" href="#" id="echipa">22918582</a>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="container" id="state"></div>
        
        <script src="verify.js"></script>
    
    
    
    
    </body>



</html>