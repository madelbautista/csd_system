<?php include('../tracking_db.php');?>

<div class="container-fluid">
<style>
        body, html {
            height: 100%;
            margin: 0;
            position: relative;
            background-color: #001f3d; /* Change to the desired background color */
            font-family: "Poppins", sans-serif;
            color: #f8dcbf;
			text-align: center;
        
        }
		td.contact-column {
        text-align: center;
    	}
        .container-fluid {
   			 position: absolute;
   			 top: 25%; /* Adjust this value to move the container up or down */
   			 left: 50%;
    		transform: translate(-50%, -50%);
			width: 1280px;
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
</head>
<body>
    <div class="container-fluid">
        <?php include('../tracking_db.php');?>
        <div class="col-lg-12">
            <div class="row mb-4 mt-4">
                <div class="col-md-12">

                </div>
            </div>
            <div class="row">
                <!-- FORM Panel -->

                <!-- Table Panel -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <table class="table table-bordered table-condensed table-hover">
                                <colgroup>
                                    <col width="5%">
                                    <col width="20%">
                                    <col width="25%">
                                    <col width="10%">
                                    <col width="20%">
                                    <col width="20%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="">Name</th>
                                        <th class="">Email</th>
                                        <th class="">Contact</th>
                                        <th class="">Address</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    $faculty =  $conn->query("SELECT *,concat('names') as name from faculties order by concat('names') asc");
                                    while($row=$faculty->fetch_assoc()):
                                    ?>
                                    <tr>

                                        <td class="text-center"><?php echo $i++ ?></td>

                                        <td class="">
                                            <p><b><?php echo ucwords($row['names']) ?></b></p>

                                        </td>
                                        <td class="">
                                            <p><b><?php echo $row['email'] ?></b></p>
                                        </td>
                                        <td class="contact-column">
    										<p><b><?php echo $row['contact_no'] ?></b></p>
										</td>
                                        <td class="">
    										<p><b><?php echo $row['address'] ?></b></p>
										</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-primary edit_faculty" type="button" data-id="<?php echo $row['faculty_id'] ?>" >Edit</button>
                                            <button class="btn btn-sm btn-outline-danger delete_faculty" type="button" data-id="<?php echo $row['faculty_id'] ?>">Delete</button>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Table Panel -->
            </div>
        </div>  

    </div>
    <script>
        $(document).ready(function(){
            $('table').dataTable()
        })
        $('.edit_faculty').click(function(){
    uni_modal("Edit Information","manage_faculty.php?id="+$(this).attr('data-id'),'mid-large');
    $('.modal-content').css('color', 'black');
})

        $('.delete_faculty').click(function(){
            _conf("Are you sure you want to delete this?","delete_faculty",[$(this).attr('data-id')],'mid-large')
        })

        function delete_faculty($id){
            start_load()
            $.ajax({
                url:'ajax.php?action=delete_faculty',
                method:'POST',
                data:{id:$id},
                success:function(resp){
                    if(resp==1){
                        alert_toast("Data successfully deleted",'success')
                        setTimeout(function(){
                            location.reload()
                        },1500)

                    }
                }
            })
        }
    </script>
</body>
</html>