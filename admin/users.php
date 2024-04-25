<?php 

?>

<div class="container-fluid">
<style>
        body, html {
            height: 100%;
            margin: 0;
            position: relative;
            background-color: #001f3d; /* Change to the desired background color */
            font-family: "Poppins", sans-serif;
            color: black;
			text-align: center;
        
        }
		td.contact-column {
        text-align: center;
    	}
        .container-fluid {
   			 position: absolute;
   			 top: 18%; /* Adjust this value to move the container up or down */
   			 left: 50%;
    		transform: translate(-50%, -50%);
			width: 1220px;
		}
        input[type=checkbox] {
            /* Double-sized Checkboxes */
            -ms-transform: scale(1.5); /* IE */
            -moz-transform: scale(1.5); /* FF */
            -webkit-transform: scale(1.5); /* Safari and Chrome */
            -o-transform: scale(1.5); /* Opera */
            transform: scale(1.5);
            padding: 10px;
        }

        /* Custom styles for the table */
        .table-condensed {
            font-size: 14px;

        }

        .card-header {
            background-color: #007bff;
            color: #fff;
        }

        .btn-outline-primary {
            color: #007bff;
            border-color: #007bff;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
        }
    </style>	
	
	<br>
	<div class="row">
		<div class="card col-lg-12">
			<div class="card-body">
				<table class="table-striped table-bordered col-md-12">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Name</th>
					<th class="text-center">Email</th>
					<th class="text-center">User Type</th>
					<th class="text-center">Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
 					include '../tracking_db.php';
 					$type = array("","Admin","Faculty","Student");
 					$users = $conn->query("SELECT * FROM users order by names asc");
 					$i = 1;
 					while($row= $users->fetch_assoc()):
				 ?>
				 <tr>
				 	<td class="text-center">
				 		<?php echo $i++ ?>
				 	<td>
				 		<?php echo ucwords($row['names']) ?>
				 	</td>
				 	<td>
				 		<?php echo $row['email'] ?>
				 	</td>
				 	<td>
				 		<?php echo $type[$row['user_type']] ?>
				 	</td>
					<td>
						<?php echo ($row['user_status'] == 'a') ? 'Active' : 'Inactive'; ?>
					</td>
				 </tr>
				<?php endwhile; ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>

</div>
