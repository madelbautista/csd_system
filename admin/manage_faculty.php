<?php include '../tracking_db.php' ?>
<?php
if(isset($_GET['faculty_id'])){
	$qry = $conn->query("SELECT * FROM faculties where faculty_id=".$_GET['faculty_id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
}
?>

<style>
    .container{
        height:100%;
        width:100%;
        font-family: Arial, sans-serif;
        color: #333;
    }
    .form-control {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .control-label {
        font-weight: bold;
    }
    .row {
        display: flex;
    }
    .col-md-6 {
        flex: 1;
        padding: 0 10px; /* Add some padding between columns */
    }
</style>
<div class="container">
    <form action="" id="manage-faculty">
        <div id="msg"></div>
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id']:'' ?>" class="form-control">
        <div class="row form-group">
            <div class="col-md-6">
                <label class="control-label">Name</label>
                <input type="text" name="names" class="form-control" value="<?php echo isset($names) ? $names:'' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="control-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo isset($email) ? $email:'' ?>" required>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-6">
                <label class="control-label">Contact No.</label>
                <input type="text" name="contact_no" class="form-control" value="<?php echo isset($contact_no) ? $contact_no:'' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="control-label">Address</label>
                <textarea name="address" class="form-control"><?php echo isset($address) ? $address : '' ?></textarea>
            </div>
        </div>
    </form>
</div>

<script>
	$('#manage-faculty').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_faculty',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert_toast("Data successfully saved.",'success')
					setTimeout(function(){
						location.reload()
					},1000)
				}else if(resp == 2){
					$('#msg').html('<div class="alert alert-danger">ID No already existed.</div>')
					end_load();
				}
			}
		})
	})
</script>