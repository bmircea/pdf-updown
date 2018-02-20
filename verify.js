$("#soc a").click(function(){
    $("#cui").val($(this).text());
})

$("#verifyData").submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("cui", $("#cui").val());
        $.ajax({
            type:"POST",
            url: "display.php",
            contentType: false,
            processData: false,
            data: formData,
            cache: false,
            success: function(result){
                $("#state").html(result);
                
            }
        })
    });
function verifyOnline(cui, id){
    var data = cui + "_" +id;
    $.ajax({
        type: "POST",
        url: "verifica.php",
        data: data,
        success: function(e){
            alert(e);
        }
    })
}
                                
                                
                                
                                
