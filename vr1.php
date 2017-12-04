<?php
// require_once 'init.php';
// $_SESSION['N2']=$_SESSION['N3']=$_SESSION['N1']=$_SESSION['N5']="";
// $_SESSION['N4']="activenav";
?>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Virtual Mirror</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dosis|Pacifico|Belleza|Domine|Slabo+27px" rel="stylesheet">	
    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
	<link href="css/home.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" media="screen" href="css/listscroller.css" >-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	.clickable{
		cursor: pointer;   
	}
	.panel-heading span {
		margin-top: -20px;
		font-size: 15px;
	}
	
	.selected{
		box-shadow:0px 12px 22px 1px #333;
		opacity: 0.5;
		filter: alpha(opacity=50);
	}
        
        .active1{
          
           background:url(img/tick.png)bottom right;
           background-size: 30px 30px;
           background-repeat: no-repeat;
           color:#66518D !important;
           z-index:-10;
        }

        .caption1:hover {
          
            background:rgba(124,138,138, 0.3);
           
            
            
            color:#fff !important;
            z-index:2;
        }
       
        
	</style>
</head>

<body style="background-color:#FFF6;background-size: 100% 100%;">

		<?php
		if(isset($_SESSION['er']) && $_SESSION['er']=="true"){$_SESSION['er1']="true";}
		else{$_SESSION['er1']="false";}?>
		<?php include 'template/menu.php' ?>

		<?php include 'template/headnav.php';?>

    <!-- Navigation -->

            <?php include("alert.php"); ?>
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
		<div class="row">
			<div class="col-md-12">
				
                        </div>
		</div>
       
    </div>
    <footer class="container1">
	<?php include 'template/footer.php';?>
    </footer>
        <!-- Footer 
        <footer class="container1">
			<div class="navbar navbar-inverse navbar-fixed-bottom navbar-custom">
				<div class="col-sm-4"></div>
				<div class="col-lg-4">
					<p>&#169Copyright -- House Of Diamante , 2016.</p>
				</div>
				<div class="col-sm-4">
					<a href=""><img class="img-responsive"src=""></a>
				</div>
			</div>
		</footer>-->

    
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script src="js/script1.js"></script>
	<script src="js/fabric.min.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/routes.js"></script>
    <script>
    $(document).ready(function(){
	/*$('#jewelleryType').on('change',selectitem);
        $('#vendorType').on('change',selectitem);
        function selectitem(){
             var jeweltype=$("option:selected",'#jewelleryType').val();
             var vendor=$("option:selected",'#vendorType').val();
             //alert(vendor);
             $.ajax({
		
		url : "vrimagefilter.php",  //change it with your own adress to the code
                method:'POST',
		data:{jeweltype:jeweltype,vendor:vendor},
		success:function(data){
                    $('#vritem').html(data);
                   // alert("done");
		}
            });
       
    }*/
    });
    </script>
</body>

</html>