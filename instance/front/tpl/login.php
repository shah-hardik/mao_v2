<form action="<?php l('login'); ?>" method="post">
    <div class="login " style="box-shadow:0 2px 7px rgba(0, 0, 0, 0.4)" >
        <?php if ($error != '') : ?>
            <div class="error">
                <img src="<?php print _MEDIA_URL ?>img/login-erroe.png" width="28" height="26" alt=" " />
                <strong>ERROR:</strong> The password and username you entered 
                is incorrect. 
            </div>
        <?php endif; ?>
        <div class="logo" style="color:white;font-weight:bold;padding: 15px;">
            <img src="<?php print _MEDIA_URL ?>img/logo.png" />
        </div>
        <div class="fields" id="new_login" >
            <input type="text" name="username" id="username" placeholder="Customer Emaill" />
            <input type="password" name="password" id="password" placeholder="Password" />
            <div>
                <input type="submit" name="submit" value="Customer Login" class="login" style="width: 130px" />
            </div>
            <div style="clear:both">&nbsp;</div>
        </div>

    </div>
</form>
<div style="background-color: #86B414;height:18px;position:fixed;bottom:0px;width:100%">

</div>
<!--<style type="text/css">
    body{
        background:url(<?php print _MEDIA_URL ?>img/bg.jpg);
    }
</style>
-->