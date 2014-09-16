<div class="addAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">Add New Price</div>
        <div class="panel-body">
            <form method="post" action="" class="form-horizontal" role="form">
                
                
                <div class="form-group">
                    <label for="user_login" class="col-lg-2 control-label">Mini Price</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[min_price]" id="min_price" value="<?php print $min_price; ?>" placeholder="Price" required>
                    </div>
                </div>
               
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="hidden" name="fields[price_id]" id="price_id" value="<?php print $id_val; ?>">
                        <button type="submit" class="btn btn-primary" onclick="return FormSubmit();">Save</button>
                    </div>
                </div>
                
                
            </form>

        </div>
    </div>

</div>