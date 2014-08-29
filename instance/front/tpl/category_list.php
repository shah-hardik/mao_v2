<div class="listAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div style="float:left;padding-top:8px"><b>List of Category</b></div> 
            <div style="float:right">
            </div> 
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
	    <?php
	    $cr = 1;
	    if (!empty($category)):
		?>
    	    <table class="table table-hover" id="table" >
    		<thead>
    		    <tr>
    			<th></th>
    			<th>#</th>
    			<th>Category Name</th>
                       
    			<th>Action</th>
   
    		    </tr>
    		</thead>
    		<tbody>
			<?php foreach ($category as $each_category): ?>
			    <tr id="<?php print $each_category['id']; ?>">
				<td></td>
				<td><?php print $cr; ?></td>
				
				<td><?php print $each_category['name']; ?> </td>
				<td>
				    <a href="<?php print _U ?>category/edit/<?php print $each_category['id']; ?>"><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
				    <a href="javascript:void(0);" onclick="return Deletecategory('category/delete/<?php print $each_category['id']; ?>')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>
				    
				</td>
		
			    </tr>
			    <?php $cr++; ?>    
			<?php endforeach; ?>
    		</tbody>
    	    </table>
	    <?php else: ?>
    	    <div>No Category available</div>
	    <?php endif; ?>
        </div>
    </div>
</div>