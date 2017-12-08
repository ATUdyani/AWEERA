// function to update a profile
function updateProfile() {
    var type = document.getElementById('type').value;
    if(type=='Administrator' || 'Receptionist' || 'Beautician'){
        var formArray = [];
        formArray.push(document.getElementById("first_name").value);
        formArray.push(document.getElementById("last_name").value);
        formArray.push(document.getElementById("email").value);
        formArray.push(document.getElementById("phone").value);
        formArray.push(document.getElementById("address").value);
        formArray.push(document.getElementById("type").value);
        formArray.push(document.querySelector('input[name = "gender"]:checked').value);
        formArray.push(document.getElementById("id").value);
        var jsonString = JSON.stringify(formArray);
        $.ajax({
            url:"../controller/update-employee-handler.php", //the page containing php script
            type: "POST", //request type
            data: {data : jsonString},
            cache: false,
            success:function(data){
                if (data.trim()=="<h4>Employee successfully updated.</h4>"){
                    $('#update_msg_Modal').modal('show');
                    $('#update_msg_result').html("<h4>Successfully updated.</h4>");
                }
                else{
                    $('#msg_Modal').modal('show');
                    $('#msg_result').html(data);
                }

            }
        });
    }
}

$('#update_msg_Modal').on('hidden.bs.modal', function () {
    location.reload();
});


$("#uploadimage").on('submit',(function(e) {
    e.preventDefault();
    $("#message").empty();
    $('#loading').show();
    $.ajax({
        url: "../controller/upload-profile-picture-handler.php", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
        success: function(data)   // A function to be called if request succeeds
        {
            if (data.trim()=="<h4>Invalid file Size or Type</h4>"){
                $('#msg_Modal').modal('show');
                $('#msg_result').html(data);
            }
            else{
                $('#update_msg_Modal').modal('show');
                $('#update_msg_result').html(data);
            }

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
            $('#previewing').attr('src','../img/profiles/none.jpg');
            $('#msg_Modal').modal('show');
            $('#msg_result').html("<h4>Please Select A valid Image File</h4>"
                +"<h4><strong>Note - </strong>Only jpeg, jpg and png Images types are allowed</h4>");
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
    $('#previewing').attr('height', '350px');
};