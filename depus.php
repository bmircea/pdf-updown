<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Declaratii Tracker</title>    
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    
    
    <body>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        
        
        
        <div class="container">
            <div class="row">
                <form id="data" method="post" enctype="multipart/form-data">
                    <input id="fileInput" type="file" name="file" style="position:absoulte; top: -100px">
                    <input type="text" name="ext" id="ext" style="display:none">
                    <input type="text" name="filename" id="filename" style="display:none">
                    <input type="text" name="type" id="type" style="display:none">
                    <button id="uploadButton" type="submit" class="btn btn-success" data-readystate="0">Incarca PDF</button>
                </form>
            </div>
            <div class="row">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tip declaratie
                  </button>
                    
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="drop">
                    <a class="dropdown-item" href="#" id="100">D100</a>
                    <a class="dropdown-item" href="#" id="112">D112</a>
                    <a class="dropdown-item" href="#" id="300">D300</a>
                  </div>
                </div>
            </div>
        </div>
        
        
    
        <script src="upload.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>







</html>