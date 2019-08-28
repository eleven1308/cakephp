<div class="container card">
 <div class="row" style="color: #333; text-align: center;" >
 	<div class="form-group">
 		<label >Full Name</label>
 		<p><?= $customer_id->full_name ?></p>
 	</div>
 		<div class="form-group">
 		<label >Group Name</label>
 		<p>
 			<?php 
 				foreach ($group_id as $value) {
 					echo "[" . $value['group_id'] . "]";
 				}
 			 ?>
 		</p>
 	</div>
 	<div class="form-group" >
 		<label >Email</label>
 		<p><?= $customer_id->email ?></p>
 	</div>
 		<div class="form-group">
 		<label >Phone</label>
 		<p><?= $customer_id->phone ?></p>
 	</div>
 		<div class="form-group">
 		<label >Full Name</label>
 		<p><?= $customer_id->full_name ?></p>
 	</div>
	
 </div>
<a href="/customers">Back</a>
</div>