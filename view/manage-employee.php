<?php session_start(); ?>
<?php require_once('../model/database.php') ?>
<?php require_once('../model/employee.php') ?>

<!-- jQuery -->
<script src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript">
    function checkForm() {
        var formArray = [];
        formArray.push(document.getElementById("first_name").value);
        formArray.push(document.getElementById("last_name").value);
        formArray.push(document.getElementById("emp_email").value);
        formArray.push(document.getElementById("emp_phone").value);
        formArray.push(document.getElementById("emp_address").value);
        formArray.push(document.getElementById("emp_type").value);
        var jsonString = JSON.stringify(formArray);
        $.ajax({
            url:"../controller/add-staff-handler.php", //the page containing php script
            type: "POST", //request type
            data: {data : jsonString},
            cache: false,
            success:function(result){
                document.getElementById("errorMsg").innerHTML = result;
            }
        });

    }
</script>

<h2>Manage Staff <span><a href="../view/add-staff.php" class="add-link">  +Add New</a></span></h2>

<table class="table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Type</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // create an object from Employee class
    $employee = new Employee();
    $employee_list = $employee->loadEmployeeDetails();
    echo $employee_list;
    ?>
    </tbody>
</table>