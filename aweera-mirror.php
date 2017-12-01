
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="AWEERA - Hair and Beauty">
    <meta name="author" content="TeamScorp">

    <title>AWEERA - Hair and Beauty</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <link href="css/loginstyle.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="../js/appointment.js"></script>

</head>

<div class="my-content">

    <body>

    <?php include ("view/homepage/home-navbar.php");?>


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">AWEERA Mirror
                </h1>
            </div>
        </div>

        <br>
        <!-- /.row -->

        <!-- Page Content -->
        <div class="container">

            <div class="row">
                <div class="col-md-8">

                    <div id="panel"class="panel panel-default" style="height:380px; margin-top:20px; background-color: rgba(230,238,255,0.5);">
                        <div class="panel-body">
                            <canvas id="display" style="top:0; bottom: 0; left: 0; right: 0; margin:auto; position:absolute; width: 90%;height: 85%;"></canvas>
                            <img id="mask" src="img/frame.png"
                                 style="position: absolute; top:0; bottom: 0; left: 0; right: 0;
                                                           margin:auto;

                                                           z-index: 2;
                                                           width: 90%;
                                                           height:85%;" />
                            <canvas height=350 width=715 id="photo" style=" top:0; bottom: 0; left: 0; right: 0; position:absolute; width: 90%;height: 85%;"></canvas>

                            <div class="text-right">

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-1 ">



                    <a role="button" title="capture" class="btn btn-primary btn-sm center-block" style="margin-top:80px;" id="takePhoto" value="Click"><img class="img1" src="./img/camera.png" alt="" style=""></a>

                    <a role="button" title="back" class="btn btn-primary btn-sm center-block" style="margin-top:10px;" id="takePhoto2" value="Click"><img class="img1" src="./img/back.png" alt="" style=""></a>

                    <a role="button" title="download" class="btn btn-primary btn-sm center-block" style="margin-top:10px;" id="download" value="Click" onclick="downloadCanvas();"><img class="img1" src="./img/download.png" alt="" style=""></a>

                </div>
                <div class="col-md-3">
                    <div class="panel panel-default" style="height:380px; margin-top:20px; background-color: rgba(230,238,255,0.5);">
                        <div class="panel-body" id="jtype" style="height:380px; overflow-y: scroll; overflow-x: hidden; white-space:nowrap;">
                            <div id="f4">
                                <div style="text-align:center;">

                                    <select class="form-control" id="jewelleryType" onchange='' style="margin-bottom:5px;">
                                        <option value="jeweltype">Jewellery Type</option>
                                        <option name="frame" value="necklace" >Necklace </option>
                                        <option  name="hand" value="ring" >Ring </option>
                                        <option   name="earface" value="earring"  >Earring </option>


                                    </select>

                                    <select class="form-control" id="vendorType" onchange='' style="margin-bottom:5px;">
                                        <option value="vendor">Select Vendor</option>
                                        <?php
                                        $sql3q2=mysqli_query($link,"SELECT * FROM vendor");
                                        while($row=mysqli_fetch_array($sql3q2)){
                                            $vendors[]=$row;
                                        }

                                        ?>
                                        <?php foreach($vendors as $vendor):?>
                                            <option name="jType" value="<?php echo $vendor['vendor_username'];?>" ><?php echo $vendor['vendor_name'];?> </option>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!--<div class="thumbnail text-center" style="height:auto; width:100px; display:inline-block; margin: 2px 5px 5px 5px;">-->





                            </div>
                            <div id="vritem">
                                <?php
                                $sql3q2=mysqli_query($link,"SELECT * FROM vr");
                                while($row=mysqli_fetch_array($sql3q2)){
                                    $vrs[]=$row;
                                }

                                ?>
                                <?php foreach($vrs as $vr):?>
                                    <div class="thumbnail caption1 transthumb text-center" style="height:auto; width:100px;  margin:auto; margin-bottom:15px;">
                                        <a id="" title="<?php echo $vr['vendor_name'];?>" value="<?php echo $vr['image'];?>" role="button"><img src="<?php echo $vr['image'];?>" style="height:100;width:100" alt=""></a>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; TeamScorp 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <?php include('view/modals/login-modal.php'); ?>
    <?php include('view/modals/message-modal.php'); ?>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- script to handle model login -->
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/script1.js"></script>

    <script>
        function  submitComment() {
            var appointment_id = document.getElementById("appointment_id").value;
            var comment = document.getElementById("comment").value;
            var formArray = [];
            formArray.push(appointment_id,comment);
            var jsonString = JSON.stringify(formArray);
            $.ajax({
                url:'controller/submit-comment-handler.php',
                type: "POST", //request type
                data: {data : jsonString},
                cache: false,
                success:function(result){
                    $('#msg_Modal').modal('show');
                    $('#msg_result').html(result);
                }
            });

            $('#msg_Modal').on('hidden.bs.modal', function () {
                window.location.href = "index.php";
            });
        }
    </script>


    </body>

</html>