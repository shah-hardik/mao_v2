
<div class="listAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div style="float:left;padding-top:8px"><b>List of Categories</b></div> 
            <div style="float:right">
            </div> 
            <div class="clearfix"></div>
        </div>
        <div class="panel-body" id="categorylist" style="margin-top: 20px;">
            <?php
            $cr = 1;
            if (!empty($Categories)):
                ?>
                <?php foreach ($Categories as $Categorie): ?>

                    <div class="hover col-xs-12 col-sm-6 col-md-4 col-lg-3" style="height:90px;width:180px;background-color:#f4f4f4;margin-bottom: 30px;margin-left:40px">

                        <div style="margin-top:35px">
                            <input type="checkbox" class="chk" value="<?php print $Categorie->name; ?>"/>&nbsp;&nbsp;
                            <span style="font-size: 17px;"><?php echo $Categorie->id; ?><?php echo $Categorie->name; ?></span>
                            </br>
                          </div>
                         
                    </div>

                    <?php $cr++; ?> 
                    
                <?php endforeach; ?>
                <div class="col-lg-12" style="float:left;margin-left: 1000px">
                    <input type="button" class="btn btn-info" onclick="ImportCategory()" name="btn" value="Proceed To Import" />
                </div>
            <?php else: ?>
                <div>No Category available</div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include_once('genericPopup.php') ?>
