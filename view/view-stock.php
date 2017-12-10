<?php session_start(); ?>
<?php require_once('../model/Database.php') ?>
<?php require_once('../model/StockItem.php') ?>


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
                    url: "../controller/view-stock-handler.php",
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
                    url: "../controller/view-stock-handler.php",
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

<h2>View Stock Details</h2>

<div class="row ">
    <div class="col-md-12">
        <div class="input-group my-search-panel">
            <div class="input-group-btn search-panel">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span id="search_concept">Filter by</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" id="filter_select">
                    <li><a href="#stock_id" value="stock_id">ID</a></li>
                    <li><a href="#stock_brand" value="stock_brand">Stock Brand</a></li>
                    <li><a href="#type" value="type">Type</a></li>
                    <li><a href="#stock_count" value="stock_count">Stock Count</a></li>
                    <li><a href="#price" value="price">Price</a></li>
                    <li><a href="#description" value="description">Description</a></li>
                    <li><a href="#supplier_id" value="supplier_id">Supplier ID</a></li>
                    <li class="divider"></li>
                    <li><a href="#all" value="all">Anything</a></li>
                </ul>
            </div>
            <input type="hidden" name="search_param" value="all" id="search_param">
            <input type="text" class="form-control" name="x" placeholder="Search stock here..." id="search_text">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 result-table" id="result">
            <?php
                // create an object from StockItem class
                $stock_item= new StockItem();
                $stock_list = $stock_item->viewStockDetails("*","");
                echo $stock_list;
            ?>
        </div>
    </div>
</div>

