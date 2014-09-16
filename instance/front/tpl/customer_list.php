<div class="listAffiliates actionItem">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div style="float:left;padding-top:8px"><b>List of Customers</b></div> 
            <div style="float:right">
            </div> 
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
	    <?php
	    $cr = 1;
	    if (!empty($customer)):
		?>
    	    <table class="table table-hover" id="table" >
    		<thead>
    		    <tr>
    			<th></th>
    			<th>#</th>
    			<th>Customer Name</th>
                        <th>Customer Email</th>
    			<th>Customer Phone</th>
    			
    			<th>Action</th>
   
    		    </tr>
    		</thead>
    		<tbody>
			<?php foreach ($customer as $each_customer): ?>
			    <tr id="<?php print $each_customer['id']; ?>">
				<td></td>
				<td><?php print $cr; ?></td>
				
				<td><?php print $each_customer['username']; ?> </td>
				<td><?php print $each_customer['email']; ?> </td>
				<td><?php print $each_customer['phone']; ?> </td>
				<td>
				    <a href="<?php print _U ?>customer/edit/<?php print $each_customer['id']; ?>"><i class="glyphicon glyphicon-edit" title="Edit"></i></a>
				    <a href="javascript:void(0);" onclick="return Deletecustomer('customer/delete/<?php print $each_customer['id']; ?>')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>
				    
				</td>
		
			    </tr>
			    <?php $cr++; ?>    
			<?php endforeach; ?>
    		</tbody>
    	    </table>
	    <?php else: ?>
    	    <div>No Customer available</div>
	    <?php endif; ?>
        </div>
    </div>
</div>