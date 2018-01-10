// load new comments count
setInterval(function(){
    $.ajax({
        url:'../controller/comment-count-handler.php',
        type: "POST",
        data : "",
        success: function(data) {
            if (data!=0){
                $('#comment_count').html(data+" NEW");
            }
            else{
                $('#comment_count').html("");
            }
            //alert(data);
        }
    });
},3000);
