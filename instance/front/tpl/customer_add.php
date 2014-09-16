<div class="addAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">Add New Cusctomer</div>
        <div class="panel-body">
            <form method="post" action="" class="form-horizontal" role="form">
                
                
                <div class="form-group">
                    <label for="user_login" class="col-lg-2 control-label">UserName</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[username]" id="username" value="<?php print $username; ?>" placeholder="User Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_login" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-5">
                        <input type="password" class="form-control" name="fields[password]" id="password" value="<?php print $password; ?>" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_login" class="col-lg-2 control-label">Store Url</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[store_url]" id="store_url" value="<?php print $store_url; ?>" placeholder="Store Url" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_login" class="col-lg-2 control-label">Api Token</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[api_token]" id="api_token" value="<?php print $api_token; ?>" placeholder="Api Token" required>
                    </div>
                </div>
           
                <div class="form-group">
                    <label for="customer_name" class="col-lg-2 control-label">Customer Email</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[email]" id="email" value="<?php print $email; ?>" placeholder="Customer Email" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="address" class="col-lg-2 control-label"> Customer Phone</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="fields[phone]" id="phone" value="<?php print $phone; ?>" placeholder="Customer Phone" required>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="hidden" name="fields[customer_id]" id="customer_id" value="<?php print $id_val; ?>">
                        <button type="submit" class="btn btn-primary" onclick="return FormSubmit();">Save</button>
                    </div>
                </div>
                
                
            </form>

        </div>
    </div>

</div>