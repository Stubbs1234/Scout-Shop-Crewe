<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/header.php'); ?>
    <h1>New Invoice</h1>
    </div>
<script type="text/javascript">
    var qan = new Array();
    var product = new Array();
    var price = new Array();
    var total = new Array();
    //Submit button takes you to the sign page and uploads the data on that page
    function submit() {
        console.log("Working on submit");
        for (var i= 0; i < 15; i++) {
            qan.push(document.getElementsByName("q")[i].value);
        }
        for (var i= 0; i < 15; i++) {
            product.push(document.getElementsByName("pro")[i].value);
        }
        for (var i= 0; i < 15; i++) {
            price.push(document.getElementsByName("price")[i].value);
        }
        for (var i= 0; i < 15; i++) {
            total.push(document.getElementsByName("total")[i].value);
        }

        sessionStorage.setItem("qanutity", JSON.stringify(qan));
        sessionStorage.setItem("product", JSON.stringify(product));
        sessionStorage.setItem("price", JSON.stringify(price));
        sessionStorage.setItem("total", JSON.stringify(total));

        var endTotal = document.getElementById("endTotal").value;

        $("#urlForm").submit();
        // window.location.href = "sign?total="+endTotal;

    }
</script>
    <div class="jumbotron">
<form action="" method="post" role="form" class="form-inline" name="urlForm" id="urlForm">
    <!--Row 1-->
    <div class="form-group">
        <label for="pro0">Product &nbsp;</label>
        <select id="pro0"  name="pro" class="form-control">
            <option value="Please Select" selected>Please Select</option>
            <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
        </select>
        <label for="q0">&nbsp; Quantity &nbsp;</label>
            <input type="text" name="q" id="q0" class="form-control" size="3">
        &nbsp; X &nbsp;
        <label for="price0">Price &nbsp;</label>
        <div class="input-group">
            <div class="input-group-addon">£</div>
              <input type="text" name="price" id="price0" class="form-control" size="6" onblur="add0()">
        </div>
        &nbsp; = &nbsp;
        <label for="total0">&nbsp; Total &nbsp;</label>
        <div class="input-group">
            <div class="input-group-addon">£</div>
                <input type="text" name="total" id="total0" class="form-control" size="6" readonly>
        </div>
    </div>
    <br><br>

    <!--Row 2-->
    <div class="form-group">
        <label for="pro1">Product &nbsp;</label>
            <select id="pro1"  name="pro" class="form-control">
                <option value="Please Select" selected>Please Select</option>
                <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
            </select>
        <label for="q1">&nbsp; Quantity &nbsp;</label>
        <input type="text" name="q" id="q1" class="form-control" size="3">
        &nbsp; X &nbsp;
        <label for="price1">Price &nbsp;</label>
        <div class="input-group">
            <div class="input-group-addon">£</div>
                <input type="text" name="price" id="price1" class="form-control" size="6" onblur="add1()">
        </div>
        &nbsp; = &nbsp;
        <label for="total1">&nbsp; Total &nbsp;</label>
        <div class="input-group">
            <div class="input-group-addon">£</div>
                <input type="text" name="total" id="total1" class="form-control" size="6" readonly>
        </div>
    </div>
    <br><br>

    <!--Row 3-->
    <div class="form-group">
        <label for="pro2">Product &nbsp;</label>
        <select id="pro2"  name="pro" class="form-control">
            <option value="Please Select" selected>Please Select</option>
            <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
        </select>
        <label for="q2">&nbsp; Quantity &nbsp;</label>
        <input type="text" name="q" id="q2" class="form-control" size="3">
        &nbsp; X &nbsp;
        <label for="price2">Price &nbsp;</label>
        <div class="input-group">
            <div class="input-group-addon">£</div>
                <input type="text" name="price" id="price2" class="form-control" size="6" onblur="add2()">
        </div>
        &nbsp; = &nbsp;
        <label for="total2">&nbsp; Total &nbsp;</label>
        <div class="input-group">
            <div class="input-group-addon">£</div>
                <input type="text" name="total" id="total2" class="form-control" size="6" readonly>
        </div>
    </div>
    <br><br>

    <!--Row 4-->
    <div class="form-group">
        <label for="pro3">Product &nbsp;</label>
        <select id="pro3"  name="pro" class="form-control">
            <option value="Please Select" selected>Please Select</option>
            <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
        </select>
        <label for="q3">&nbsp; Quantity &nbsp;</label>
        <input type="text" name="q" id="q3" class="form-control" size="3">
        &nbsp; X &nbsp;
        <label for="price3">Price &nbsp;</label>
        <div class="input-group">
            <div class="input-group-addon">£</div>
            <input type="text" name="price" id="price3" class="form-control" size="6" onblur="add3()">
        </div>
        &nbsp; = &nbsp;
        <label for="total3">&nbsp; Total &nbsp;</label>
        <div class="input-group">
            <div class="input-group-addon">£</div>
                <input type="text" name="total" id="total3" class="form-control" size="6" readonly>
        </div>
    </div>
    <br><br>

    <!--Row 5-->
    <div class="form-group">
        <label for="pro4">Product &nbsp;</label>
        <select id="pro4"  name="pro" class="form-control">
            <option value="Please Select" selected>Please Select</option>
            <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
        </select>
        <label for="q4">&nbsp; Quantity &nbsp;</label>
        <input type="text" name="q" id="q4" class="form-control" size="3">
        &nbsp; X &nbsp;
        <label for="price4">Price &nbsp;</label>
        <div class="input-group">
            <div class="input-group-addon">£</div>
                <input type="text" name="price" id="price4" class="form-control" size="6" onblur="add4()">
        </div>
        &nbsp; = &nbsp;
        <label for="total4">&nbsp; Total &nbsp;</label>
        <div class="input-group">
            <div class="input-group-addon">£</div>
                <input type="text" name="total" id="total4" class="form-control" size="6" readonly>
        </div>
    </div>
    <br><br>

    <div id="addMore" style="display: none;">
        <!--Row 6-->
        <div class="form-group">
            <label for="pro5">Product &nbsp;</label>
            <select id="pro5"  name="pro" class="form-control">
                <option value="Please Select" selected>Please Select</option>
                <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
            </select>
            <label for="q5">&nbsp; Quantity &nbsp;</label>
            <input type="text" name="q" id="q5" class="form-control" size="3">
            &nbsp; X &nbsp;
            <label for="price5">Price &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="price" id="price5" class="form-control" size="6" onblur="add5()">
            </div>
            &nbsp; = &nbsp;
            <label for="total5">&nbsp; Total &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="total" id="total5" class="form-control" size="6" readonly>
            </div>
        </div>
        <br><br>

        <!--Row 7-->
        <div class="form-group">
            <label for="pro6">Product &nbsp;</label>
            <select id="pro6"  name="pro" class="form-control">
                <option value="Please Select" selected>Please Select</option>
                <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
            </select>
            <label for="q6">&nbsp; Quantity &nbsp;</label>
            <input type="text" name="q" id="q6" class="form-control" size="3">
            &nbsp; X &nbsp;
            <label for="price6">Price &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="price" id="price6" class="form-control" size="6" onblur="add6()">
            </div>
            &nbsp; = &nbsp;
            <label for="total6">&nbsp; Total &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="total" id="total6" class="form-control" size="6" readonly>
            </div>
        </div>
        <br><br>

        <!--Row 8-->
        <div class="form-group">
            <label for="pro7">Product &nbsp;</label>
            <select id="pro7"  name="pro" class="form-control">
                <option value="Please Select" selected>Please Select</option>
                <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
            </select>
            <label for="q7">&nbsp; Quantity &nbsp;</label>
            <input type="text" name="q" id="q7" class="form-control" size="3">
            &nbsp; X &nbsp;
            <label for="price7">Price &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="price" id="price7" class="form-control" size="6" onblur="add7()">
            </div>
            &nbsp; = &nbsp;
            <label for="total7">&nbsp; Total &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="total" id="total7" class="form-control" size="6" readonly>
            </div>
        </div>
        <br><br>

        <!--Row 9-->
        <div class="form-group">
            <label for="pro8">Product &nbsp;</label>
            <select id="pro8"  name="pro" class="form-control">
                <option value="Please Select" selected>Please Select</option>
                <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
            </select>
            <label for="q8">&nbsp; Quantity &nbsp;</label>
            <input type="text" name="q" id="q8" class="form-control" size="3">
            &nbsp; X &nbsp;
            <label for="price8">Price &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="price" id="price8" class="form-control" size="6" onblur="add8()">
            </div>
            &nbsp; = &nbsp;
            <label for="total8">&nbsp; Total &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="total" id="total8" class="form-control" size="6" readonly>
            </div>
        </div>
        <br><br>

        <!--Row 10-->
        <div class="form-group">
            <label for="pro9">Product &nbsp;</label>
            <select id="pro9"  name="pro" class="form-control">
                <option value="Please Select" selected>Please Select</option>
                <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
            </select>
            <label for="q9">&nbsp; Quantity &nbsp;</label>
            <input type="text" name="q" id="q9" class="form-control" size="3">
            &nbsp; X &nbsp;
            <label for="price9">Price &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="price" id="price9" class="form-control" size="6" onblur="add9()">
            </div>
            &nbsp; = &nbsp;
            <label for="total9">&nbsp; Total &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="total" id="total9" class="form-control" size="6" readonly>
            </div>
        </div>
        <br><br>

        <!--Row 11-->
        <div class="form-group">
            <label for="pro10">Product &nbsp;</label>
            <select id="pro10"  name="pro" class="form-control">
                <option value="Please Select" selected>Please Select</option>
                <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
            </select>
            <label for="q10">&nbsp; Quantity &nbsp;</label>
            <input type="text" name="q" id="q10" class="form-control" size="3">
            &nbsp; X &nbsp;
            <label for="price10">Price &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="price" id="price10" class="form-control" size="6" onblur="add10()">
            </div>
            &nbsp; = &nbsp;
            <label for="total10">&nbsp; Total &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="total" id="total10" class="form-control" size="6" readonly>
            </div>
        </div>
        <br><br>

        <!--Row 12-->
        <div class="form-group">
            <label for="pro11">Product &nbsp;</label>
            <select id="pro11"  name="pro" class="form-control">
                <option value="Please Select" selected>Please Select</option>
                <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
            </select>
            <label for="q11">&nbsp; Quantity &nbsp;</label>
            <input type="text" name="q" id="q11" class="form-control" size="3">
            &nbsp; X &nbsp;
            <label for="price11">Price &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="price" id="price11" class="form-control" size="6" onblur="add11()">
            </div>
            &nbsp; = &nbsp;
            <label for="total11">&nbsp; Total &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="total" id="total11" class="form-control" size="6" readonly>
            </div>
        </div>
        <br><br>

        <!--Row 13-->
        <div class="form-group">
            <label for="pro12">Product &nbsp;</label>
            <select id="pro12"  name="pro" class="form-control">
                <option value="Please Select" selected>Please Select</option>
                <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
            </select>
            <label for="q12">&nbsp; Quantity &nbsp;</label>
            <input type="text" name="q" id="q12" class="form-control" size="3">
            &nbsp; X &nbsp;
            <label for="price12">Price &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="price" id="price12" class="form-control" size="6" onblur="add12()">
                </div>
            &nbsp; = &nbsp;
            <label for="total12">&nbsp; Total &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="total" id="total12" class="form-control" size="6" readonly>
            </div>
        </div>
        <br><br>

        <!--Row 14-->
        <div class="form-group">
            <label for="pro13">Product &nbsp;</label>
            <select id="pro13"  name="pro" class="form-control">
                <option value="Please Select" selected>Please Select</option>
                <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
            </select>
            <label for="q13">&nbsp; Quantity &nbsp;</label>
            <input type="text" name="q" id="q13" class="form-control" size="3">
            &nbsp; X &nbsp;
            <label for="price13">Price &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="price" id="price13" class="form-control" size="6" onblur="add13()">
            </div>
            &nbsp; = &nbsp;
            <label for="total13">&nbsp; Total &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="total" id="total13" class="form-control" size="6" readonly>
            </div>
        </div>
        <br><br>

        <!--Row 15-->
        <div class="form-group">
            <label for="pro14">Product &nbsp;</label>
            <select id="pro14"  name="pro" class="form-control">
                <option value="Please Select" selected>Please Select</option>
                <?php echo $this->productsExtObj->renderProductsWithoutHTML(); ?>
            </select>
            <label for="q14">&nbsp; Quantity &nbsp;</label>
            <input type="text" name="q" id="q14" class="form-control" size="3">
            &nbsp; X &nbsp;
            <label for="price14">Price &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="price" id="price14" class="form-control" size="6" onblur="add14()">
            </div>
            &nbsp; = &nbsp;
            <label for="total14">&nbsp; Total &nbsp;</label>
            <div class="input-group">
                <div class="input-group-addon">£</div>
                    <input type="text" name="total" id="total14" class="form-control" size="6" readonly>
            </div>
        </div>
    </div>
    <br><br>
    <br><br>

    <!--Total-->
    <div class="form-group">
        <label for="endTotal">Total</label>
        &nbsp; = &nbsp;
        <div class="input-group">
            <div class="input-group-addon">£</div>
            <input id="endTotal" name="endTotal" type="text" class="form-control" readonly>
        </div>
    </div>
    <br><br>
    <input type="reset" value="Reset" class="btn btn-danger"/>
    <input type="hidden" name="url" id="url" value="" /><input type="hidden" name="urlForm" value="true"/>
</form><br />
<input type="button" value="Add" class="btn btn-primary" onclick="submit()"/>
<input type="button" onclick="addTextFields()" value="Add More Rows" class="btn btn-primary"/>
<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/footer.php'); ?>