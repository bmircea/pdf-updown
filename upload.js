$("#drop a").on('click', function(){
    $("#type").val($(this).text());
})
$("#data").submit(function(e){
    e.preventDefault();
        
        var filename = $("#fileInput").val().split('fakepath\\').pop();
        var ext = filename.substr( (filename.lastIndexOf('.')+1) );
        var type = $("#type").val();
        $("#ext").val(ext);
        $("#filename").val(filename);
        $("#type").val(type);
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: 'uploadPdf.php',
            contentType: false,
            processData: false,     ///NEAPARAT DE ADAUGAT contentType:false  si processData:false  cand se foloseste FormData in ajax
            data: formData,
            cache: false,
            success: function(result){
                alert(result);
                if (result != "error"){
                    var data = new FormData();
                    data.append("nom", result);
                    $.ajax({
                        type: "POST",
                        url: "depune.php",
                        contentType: false,
                        processData: false,
                        data: data,
                        cache: false,
                        success: function(res){
                            alert(res);
                        }
                    })
                }
                
                
            }
            
        });
    });


/*$("#fileInput").change(function() {
    var filename = $("#fileInput").val().split('fakepath\\').pop();
    $("#uploadButton").html('Upload ' + filename);
})*/