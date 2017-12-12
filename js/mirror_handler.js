// webrtc script file

var img1;
var imagefirst=$('#jtype a').first().attr('value'); // path to first image is assigned to imagefirst


var canvas;
base1 = new Image();
var panelw= $( '#panel' ).width();

var webrtc = (function() {

    var getVideo = true,
        getAudio = true,

        //creating video tag
        video = document.createElement('video'),


        display = document.getElementById('display'), // get the canvas
        displayContext = display.getContext('2d'), // to create 2 dimensional display context

        photo1 = document.getElementById('photo'), // get the other canvas
        context = photo1.getContext('2d'); // to create 2 dimensional display context


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

            displayContext.translate(display.width,0);
            displayContext.scale(-1,1);
            //get into display canvas
            streamFeed();
        }

    }

    function onError() {
        alert('There has been a problem retreiving the streams - are you running on file:/// or did you disallow access?');
    }

    // when back/reload button is clicked
    function back(){
        location.reload();
    }

    // convert the canvas to png image
    function convertCanvasToImage(canvas) {
        var image = canvas.toDataURL("image/png");
        return image;
    }

    // add image to canvas
    function additem(item){

        if(img1!=null){
            canvas.remove(img1);
        }
        fabric.Image.fromURL(item, function(img2) {
            img1=img2;
            canvas.add(img1.set({ left:panelw/2-170, top: -30, angle:0 }).scale(0.15));
        });
    }


    //take photos
    function takePhoto() {

        display.style.visibility='hidden';
        photo.style.visibility='visible';
        document.getElementById("mask").style.display="none";

        context.drawImage(display, 0, 0, panelw-30, photo.height);

        var img=convertCanvasToImage(photo);

        canvas=new fabric.Canvas('photo');

        fabric.Image.fromURL(imagefirst, function(img2) {
            img1=img2;
            canvas.add(img1.set({ left: panelw/2-170, top: -30, angle:0 }).scale(0.15));
        });

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

    //get into display canvas
    function streamFeed() {
        //get frame by frame or update frame time to time
        requestAnimationFrame(streamFeed);
        displayContext.drawImage(video, 0, 0, display.width, display.height);
    }

    function initEvents() {
        var photoButton = document.getElementById('takePhoto');
        photoButton.addEventListener('click', takePhoto);
        var photoButton2 = document.getElementById('takePhoto2');
        photoButton2.addEventListener('click', back);
    }

    //initially happen function
    (function init() {
        //get stream
        requestStreams();
        //initialling click events
        initEvents();
    }());


    function activeitem(){
        $('#jtype a').on('click',function(){
            var value=$(this).attr('value');
            additem(value);
        });
    }
    activeitem();

})();





