$(document).ready(function (e) {
    $("#uploadimage").on('submit',(function(e) {
        e.preventDefault();
        $("#message").empty();
        $('#loading').show();
        $.ajax({
            url: "../controller/upload-image-handler.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $('#loading').hide();
                $("#message").html(data);
            }
        });
    }));

// Function to preview image after validation
    $(function() {
        $("#file").change(function() {
            $("#message").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
            {
                $('#previewing').attr('src','noimage.png');
                $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<strong>Note - </strong>"+"<span id='error_message'>Only jpeg, jpg and png Images types are allowed</span>");
                return false;
            }
            else
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    function imageIsLoaded(e) {
        $("#file").css("color","green");
        $('#image_preview').css("display", "block");
        $('#previewing').attr('src', e.target.result);
        $('#previewing').attr('width', '350px');
        $('#previewing').attr('height', '263px');
    };

    $('#msg_Modal').on('hidden.bs.modal', function () {
        $('#content').load('edit-gallery.php');
    });
});

// load edit gallery page
function editGallery(){
    $("#content").load('edit-gallery.php');
}

// load upload image page
function newUpload(){
    $("#content").load('manage-gallery.php');
}

// load a modal to delete or edit images
function loadEditImageModal(imageId) {
    $('#edit_image_Modal').modal('show');
    $('#image_id').val(imageId);
}

// function to delete an image from gallery
function deleteImage(){
    var imageId = document.getElementById('image_id').value;
    $('#edit_image_Modal').modal('hide');
    $.ajax({
        url:'../controller/delete-gallery-image-handler.php',
        type: "POST", //request type
        data: {image_id : imageId},
        cache: false,
        success:function(result){
            $('#msg_Modal').modal('show');
            $('#msg_result').html(result);
        }
    });
}


// function to set the priority of the image to high
function setPriority(){
    var imageId = document.getElementById('image_id').value;
    $('#edit_image_Modal').modal('hide');
    $.ajax({
        url:'../controller/priority-gallery-image-handler.php',
        type: "POST", //request type
        data: {image_id : imageId},
        cache: false,
        success:function(result){
            $('#msg_Modal').modal('show');
            $('#msg_result').html(result);
        }
    });
}

