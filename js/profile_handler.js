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
    if(type=="Customer"){
        $.ajax({
            url:"../controller/fetch-customer-handler.php",
            method: "post",
            data: {cust_id:id},
            dataType: "json",
            cache: false,
            success:function (data) {
                $('#content').load('profiles/edit-profile.php',{'id':data.cust_id,'first_name': data.first_name,
                'last_name':data.last_name,'gender':data.cust_gender,'phone':data.cust_phone,'address':data.cust_address,'email':data.cust_email,
                    'date_joined':data.date_joined,'profile_pic':data.profile_pic});
            }
        });

    }
}

