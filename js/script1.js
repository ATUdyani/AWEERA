// webrtc script file
var img1;
var imagefirst=$('#jtype a').first().attr('value');
$('#jtype a').parent('.thumbnail').first().addClass("active1");
//alert(imagefirst);
var canvas;
 base1 = new Image();
 base1.src = 'img/frame.png';
 var panelw= $( '#panel' ).width();
 $('#photo').width('100');
 
var webrtc = (function() {

    var getVideo = true,
        getAudio = true,
        
        //creating video tag
        video = document.createElement('video'),

        
        display = document.getElementById('display'),
        displayContext = display.getContext('2d'),
        photo1 = document.getElementById('photo'),
        context = photo1.getContext('2d');
		//glasses = new Image();
		//glasses.src = "../img/like.png";
	display.style.visibility='visible';
        photo.style.visibility='hidden';
		
    navigator.getUserMedia ||
        (navigator.getUserMedia = navigator.mozGetUserMedia ||
        navigator.webkitGetUserMedia || navigator.msGetUserMedia);

    window.audioContext ||
        (window.audioContext = window.webkitAudioContext);
        
        //updating animation before repaint
    window.requestAnimationFrame ||
        (window.requestAnimationFrame = window.webkitRequestAnimationFrame || 
            window.mozRequestAnimationFrame || 
            window.oRequestAnimationFrame || 
            window.msRequestAnimationFrame || 
        function( callback ){
            //give time to update
            window.setTimeout(callback, 1000 / 60);
        });
        
        //if success usermedia run this
    function onSuccess(stream) {
        var videoSource,
            audioContext,
            mediaStreamSource;

        if (getVideo) {
            if (window.webkitURL) {
                videoSource = window.webkitURL.createObjectURL(stream);
            } else {
                videoSource = stream;
            }

           video.autoplay = true;
           video.src = videoSource;

            //display.width = 220;
            //display.height=260;
            
            //display canvas
            displayContext.translate(display.width,0);
            displayContext.scale(-1,1);
            //get into dispaly canvas
            streamFeed();
        }

        if (getAudio && window.audioContext) {
            audioContext = new window.audioContext();
            mediaStreamSource = audioContext.createMediaStreamSource(stream);
            mediaStreamSource.connect(audioContext.destination);
        }
    }

    function onError() {
        alert('There has been a problem retreiving the streams - are you running on file:/// or did you disallow access?');
    }
	function back(){
		location.reload();
		//context.clearRect(0, 0, photo.width, photo.height);
		display.style.visibility='visible';
                photo.style.visibility='hidden';
		
		
	}
	function convertCanvasToImage(canvas) {
  //var image = new Image();
  
	var image = canvas.toDataURL("image/png");
	//image.onload=function(){
		
	return image;
	//}
  
        }


    //download image in photo canvas
    function downloadCanvas(link,canvasId,filename) {
        link.href = document.getElementById(canvasId).toDataURL();
        link.download = filename;
        
    }
    //add event to download button
    document.getElementById('download').addEventListener('click',function(){
         (this,'photo','test.png');
    }, false);
    
    //add image to canvas
    function additem(item){
        
        var name=item;
        
        //var canvas=new fabric.Canvas('photo');
        if(img1!=null){
            canvas.remove(img1);
        }
        fabric.Image.fromURL(name, function(img2) {
            
            img1=img2;
        canvas.add(img1.set({ left:panelw/2-100, top: 150, angle:0 }).scale(0.15));
    });
    }
    //take photos
    function takePhoto() {
        
        display.style.visibility='hidden';
        photo.style.visibility='visible';
        document.getElementById("mask").style.display="none";
       // photo.width = display.width;
       // photo.height = display.height;
       //alert(panelw);
        context.drawImage(display, 0, 0, panelw-30, photo.height);
		//var img=context.getImageData(0, 0, photo.width, photo.height);
	var img=convertCanvasToImage(photo);
		
        canvas=new fabric.Canvas('photo');
        //canvas.setWidth('400');
       // canvas.setHeight('200');
		//canvas.clear();
	//alert(imagefirst);
        //canvas.add(new fabric.Circle({ radius: 30, fill: '#f55'}));
        fabric.Image.fromURL(imagefirst, function(img2) {
            img1=img2;
        canvas.add(img1.set({ left: panelw/2-100, top: 190, angle:0 }).scale(0.15));
        });
		//canvas.add(new fabric.Image.fromURL('../img/like.png',function(img) {
            /*img.set({
                left: fabric.util.getRandomInt(0, 10),
                top: fabric.util.getRandomInt(0, 10),
                angle: fabric.util.getRandomInt(0, 90)
            
            });
            img.scale(fabric.util.getRandomInt(10, 50) / 10);
        canvas.add(img);
        }); */
        canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
		
	}
        //get stream
    function requestStreams() {
        if (navigator.getUserMedia) {
            navigator.getUserMedia({
                video: getVideo,
                audio: getAudio
            }, onSuccess, onError);
        } else {
            alert('getUserMedia is not supported in this browser.');
        }
    }
    
    //get into dispaly canvas
    function streamFeed() {
		//get frame by frame or update frame time to time
        requestAnimationFrame(streamFeed);
		//displayContext.translate(display.width,0);
		//displayContext.scale(-1,1);
        displayContext.drawImage(video, 0, 0, display.width, display.height);
        
        //displayContext.drawImage(base1, 0, 0, display.width, display.height);
		//displayContext.scale(-1,1);
		//displayContext.drawImage(glasses,100,150,70,70);
    }

    function initEvents() {
        var photoButton = document.getElementById('takePhoto');
        photoButton.addEventListener('click', takePhoto, false);
	var photoButton2 = document.getElementById('takePhoto2');
        photoButton2.addEventListener('click', back, false);
        //window.addEventListener("resize", handleResize);
    }
    
    /*function handleResize(){
       //var panelw= $( '#panel' ).width();
       panelw=panelw-30;
      // var panelh=(350/715)*panelw;
       //canvas.setWidth(panelw);
       $('#photo').width(panelw);
    }*/
    //initially happen function
    (function init() {
        //get stream
        requestStreams();
        //initialling cliick events
        initEvents();
    }());
   function activeitem(){ 
    $('#jtype a').on('click',function(){
    var value=$(this).attr('value');
    //alert(value);
    $('#jtype a').parent('.thumbnail').removeClass("active1");
    $(this).parent('.thumbnail').addClass("active1");
    additem(value);
});
   }
   activeitem();
 
 //jewellery filtering
$('#jewelleryType').on('change',selectitem);
$('#vendorType').on('change',selectitem);
function selectitem(){
    var jeweltype=$("option:selected",'#jewelleryType').val();
    var vendor=$("option:selected",'#vendorType').val();
    var maskimg="img/"+$("option:selected",'#jewelleryType').attr('name')+".png";
    //alert(vendor);
    $('#mask').attr('src',maskimg);
    $.ajax({
		
    url : "vrimagefilter.php",  //change it with your own adress to the code
    method:'POST',
    data:{jeweltype:jeweltype,vendor:vendor},
    success:function(data){
        $('#vritem').html(data);
        activeitem();
        imagefirst=$('#jtype a').first().attr('value');
        $('#jtype a').parent('.thumbnail').first().addClass("active1");
        // alert("done");
	}
    });
       
}



})();

//add jewellery image to canvas




