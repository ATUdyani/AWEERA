<?php session_start(); ?>
<?php require_once('../model/database.php') ?>
<?php require_once('../model/stockItem.php') ?>

<script>
    // load suitable results on keyup
    $(document).ready(function(){

        $('#product_Id').keyup(function () {

            var dataArray =[];
            var filter = "stock_id";
            var txt = $(this).val().trim();
            dataArray.push(filter);
            dataArray.push(txt);
            var jsonString = JSON.stringify(dataArray);
            if (txt != ''){
                $.ajax({
                    url: "../controller/search-product-handler.php",
                    method: "post",
                    data: {data: jsonString},
                    success: function (data) {
                        $('#productTable').html(data);
                    }
                });
            }else {
            $('#result').html('');
            /*$.ajax({
                url: "../controller/search-product-handler.php",
                method: "post",
                data: {data: jsonString},
                success: function (data){
                    $('#productTable').html(data);
                }
            });*/
        }
    });
    });
</script>


<div class="row custom-background">
    <div class="col-md-6 custom-border">
        <div class="row">
            <div class="col-md-12 custom-space my-border">
                APPOINMENT
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 custom-space">
                <input type="text" name="appoinment-search" class="form-control" placeholder="Appoinment ID">
            </div> <!-- search -->
            <div class="col-md-2">
                <button type="submit" class="my-btn btn-mrgin" name="appoinmentadd">Add</button>
                </div> <!-- button -->

        </div><!-- appoinment-search -->
        <div class="row">
            <div class="col-md-11.5 space custom-border">
                
                <form id="appoinment_total" method="post">
                    <div class="form-group row custom-padding">
                        <label for="appoinment" class="col-md-3 custom-lable lableline">Total :</label>
                        <div class="appoinmentTotal col-md-8">
                            <input type="text" name="appoinment-total" class="form-control" placeholder="Total">
                        </div>
                    </div><!--appoinmentTotal -->
                </form>
            </div>
        </div> <!-- appoinment-details -->

    </div> <!-- appoinment -->

    <div class="col-md-6 custom-border">
        <div class="row">
            <div class="col-md-12 custom-space my-border">
                PRODUCTS
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 custom-space">
                <input type="text" name="products-search" class="form-control" id="product_Id" placeholder="Product ID">
            </div> <!-- search -->
            <div class="col-md-2">
                <button type="submit" class="my-btn btn-mrgin" name="productadd">Add</button>
            </div> <!-- button -->
        </div><!-- product-search -->
        <div class="row">
            <div class="col-md-11.5 space custom-border">
                <form method="get" name="paymentform">
                    <table class="table table-borderedr table-hover" id="productTable">
                        <thead>
                        <tr class="clickable-row">

                            <th>Item</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody >

                        </tbody>
                    </table><!-- productTable -->
                </form><!-- paymentTableForm -->
                <form method="post" id="product_total">
                    <div class="form-group row">
                        <label for="productTable" class="col-md-3 custom-lable lableline">Total  :</label>
                        <div class="ptoductTotal col-md-8">
                            <input type="text" name="products-total" class="form-control" placeholder="Total">
                        </div>
                    </div><!-- productTotal -->
                </form>
            </div>
        </div> <!-- product-details -->
    </div> <!-- product -->
</div> <!--appoinment & product row -->


<div class="row custom-background">
    <div class="col-md-12 custom-border custom-padding custom-space">
        <div class="col-md-2">
            <label for="total" class="custom-lable lablelinea">Total  :</label>
        </div>
        <form method="post" name="totalAmount" class="col-md-8">
            <input type="text" name="toatl" class="form-control" placeholder="Total">
        </form>
        <div class="col-md-2">
            <button type="submit" class="my-btn" name="pay">Pay</button>
        </div>
    </div>
</div> <!-- total amount -->

