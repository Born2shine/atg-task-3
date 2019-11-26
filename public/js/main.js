$(function(){

    $("#form-data").submit(function(e) {
        e.preventDefault();
        var route = $("#form-data").data("route");
        var form_data = $(this).serialize();

        $.ajax({
            type:'POST',
            url: route,
            data: form_data,
            success: function(res) {
                    console.log(res);
                if(res.status == 'error'){
                    $("#msg").text('');
                    $("#msg").removeClass("sr-only").addClass("alert-danger");
                    let element = res;
                    for(element in res.data){
                        $("#msg").append('<li>'+ res.data[element] +'</li>');
                    }
                }else{
                    $("#msg").text('');
                    $("#msg").removeClass("sr-only alert-danger").addClass("alert-success");
                    $("#msg").addClass("alert-success");
                    $("#msg").append("<p>"+ res.data +"</p>");
                    $("#form-data")[0].reset();
                }
                
            },
            failure: function(err){
                $('#error').text('');
            }
            
        });

       
    });
});