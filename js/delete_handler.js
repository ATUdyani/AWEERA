
function deleteRecord(){
    $('#delete_Modal').modal('hide');
    var record_id = document.getElementById('record_id').value;
    var table_name = document.getElementById('table_name').value;
    var formArray = [];
    formArray.push(record_id,table_name);
    var jsonString = JSON.stringify(formArray);
    $.ajax({
        url:"../controller/delete-record-handler.php", //the page containing php script
        type: "POST", //request type
        data: {data : jsonString},
        cache: false,
        success:function(result){
            $('#update_msg_Modal').modal('show');
            $('#update_msg_result').html(result);
        }
    });
}

function notDeleteRecord() {
    $('#delete_Modal').modal('hide');
}

$('#msg_Modal').on('hidden.bs.modal', function () {
    //refresh the content of the div
    // $('#content').load('manage-users.php');
});
