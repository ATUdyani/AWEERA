// load new comments count
setInterval(function(){
    $.ajax({
        url:'../controller/out-stock-count-handler.php',
        type: "POST",
        data : "",
        success: function(data) {
            if (data!=0){
                $('#out_stock_count').html(data+" OUT OF STOCK");
            }
            else{
                $('#out_stock_count').html("");
            }
            //alert(data);
        }
    });
},3000);
