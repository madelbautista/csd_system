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
            top: 21.5%; /* Adjust this value to move the container up or down */
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
                <div class="col-md-12"></div>
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
                                    <col width="30%">
                                    <col width="35%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="">Course Name</th>
                                        <th class="">Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    $courses =  $conn->query("SELECT * FROM courses ORDER BY course_name ASC");
                                    while($row = $courses->fetch_assoc()):
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++ ?></td>
                                        <td class="">
                                            <p><b><?php echo ucwords($row['course_name']) ?></b></p>
                                        </td>
                                        <td class="">
                                            <p><b><?php echo $row['department'] ?></b></p>
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
    </script>
</body>
</html>
