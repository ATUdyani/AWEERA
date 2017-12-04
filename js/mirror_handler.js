// webrtc script file

var img1;
var imagefirst=$('#jtype a').first().attr('value');
$('#jtype a').parent('.thumbnail').first().addClass("active1");


var canvas;
base1 = new Image();
var panelw= $( '#panel' ).width();
//$('#photo').width('100');

var webrtc = (function() {

    var getVideo = true,
        getAudio = true,

        //creating video tag
        video = document.createElement('video'),


        display = document.getElementById('display'),
        displayContext = display.getContext('2d'),

        photo1 = document.getElementById('photo'),
        context = photo1.getContext('2d');

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

            displayContext.translate(display.width,0);
            displayContext.scale(-1,1);
            //get into display canvas
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

    // when back/reload button is clicked
    function back(){
        location.reload();
        display.style.visibility='visible';
        photo.style.visibility='hidden';
    }

    // convert the canvas to png image
    function convertCanvasToImage(canvas) {
        var image = canvas.toDataURL("image/png");
        return image;
    }

    // add image to canvas
    function additem(item){
        var name=item;
        if(img1!=null){
            canvas.remove(img1);
        }
        fabric.Image.fromURL(name, function(img2) {
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

    //get into dispaly canvas
    function streamFeed() {
        //get frame by frame or update frame time to time
        requestAnimationFrame(streamFeed);
        displayContext.drawImage(video, 0, 0, display.width, display.height);
    }

    function initEvents() {
        var photoButton = document.getElementById('takePhoto');
        photoButton.addEventListener('click', takePhoto, false);
        var photoButton2 = document.getElementById('takePhoto2');
        photoButton2.addEventListener('click', back, false);
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
            //alert(value);
            $('#jtype a').parent('.thumbnail').removeClass("active1");
            $(this).parent('.thumbnail').addClass("active1");
            additem(value);
        });
    }
    activeitem();

})();





