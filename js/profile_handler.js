// function to edit profile
function handleProfile(id){

    var type = document.getElementById('user_type').value;

    if(type=="Administrator" || 'Receptionist' || 'Beautician'){
        $.ajax({
            url:"../controller/fetch-employee-handler.php",
            method: "post",
            data: {emp_id:id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#content').load('profiles/edit-profile.php',{'id':data.emp_id,'first_name': data.first_name,
                'last_name':data.last_name,'email':data.emp_email,'phone':data.emp_phone,'address':data.emp_address,
                    'gender':data.emp_gender,'profile_pic':data.profile_pic});
            }
        });
    }
    else if(type=="Customer"){

    }
}

