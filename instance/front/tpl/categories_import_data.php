<?php

            $cr = 1;
           ?>
                <?php foreach ($Categories as $Categorie): ?>
                    <div class="hover col-xs-12 col-sm-6 col-md-4 col-lg-3" style="height:90px;width:180px;background-color:#f4f4f4;margin-bottom: 30px;margin-left:40px">

                        <div style="margin-top:35px">
                            <input type="checkbox" class="chk" value="<?php print $Categorie ?>"/>&nbsp;&nbsp;
                            <span style="font-size: 17px;"><?php echo $Categorie ?></span>
                        </div>
                        <?php
                                 
                        ?>
                    </div>
                   
                    <?php $cr++; ?> 
            <div class="clearfix visible-xs" style="height:10px"></div>
                <?php endforeach; ?>