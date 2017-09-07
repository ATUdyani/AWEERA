<!-- jQuery -->
<script src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/loader.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<script>
    setInterval(function(){
        $.ajax({
            url:'../controller/request-count-handler.php', // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data : "",
            success: function(data)   // A function to be called if request succeeds
            {
                $('#test').html(data);
                alert(data);
            }
        });
    },3000);
</script>

<html>

<div id="test">

</div>


</html>