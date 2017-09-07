<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/Supplier.php') ?>

<!-- jQuery -->
<script type="text/javascript" src="../js/check_form.js"></script>

<script src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript" src="../js/search_filter_change.js"></script>


<script>
    // load suitable results on keyup
    $(document).ready(function(){
        $('#search_text').keyup(function () {
            var dataArray =[];
            var filter = document.getElementById("search_param").value;
            var txt = $(this).val().trim();
            dataArray.push(filter);
            dataArray.push(txt);
            var jsonString = JSON.stringify(dataArray);
            if (txt != ''){
                $.ajax({
                    url: "../controller/view-supplier-handler.php",
                    method: "post",
                    data:{data:jsonString},
                    cache: false,
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }
            else{
                //$('#result').html('');
                $.ajax({
                    url: "../controller/view-supplier-handler.php",
                    method: "post",
                    data:{data:jsonString},
                    cache: false,
                    success: function (data) {
                        $('#result').html(data);
                    }
                });
            }
        });
    });

</script>

<h2>View Supplier Details</h2>

<div class="row ">
    <div class="col-md-12">
        <div class="input-group my-search-panel">
            <div class="input-group-btn search-panel">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span id="search_concept">Filter by</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" id="filter_select">
                    <li><a href="#supplier_id" value="supplier_id">ID</a></li>
                    <li><a href="#supplier_name" value="supplier_name">Supplier Name</a></li>
                    <li><a href="#supplier_phone" value="supplier_phone">Supplier Phone</a></li>
                    <li><a href="#supplier_address" value="supplier_email">Supplier Address</a></li>
                    <li><a href="#supplier_email" value="supplier_email">Supplier Email</a></li>
                    <li class="divider"></li>
                    <li><a href="#all" value="all">Anything</a></li>
                </ul>
            </div>
            <input type="hidden" name="search_param" value="all" id="search_param">
            <input type="text" class="form-control" name="x" placeholder="Search supplier here..." id="search_text">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 result-table" id="result">
            <?php
            // create an object from StockItem class
            $supplier= new Supplier();
            $supplier_list = $supplier->viewSupplierDetails("*","");
            echo $supplier_list;
            ?>
        </div>
    </div>
</div>
