<?php include '../tracking_db.php'; ?>

<style>
        body {
            background-color: #001f3d; /* Change to the desired background color */
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            color: #f8dcbf;
        }
        .container-fluid {
            position: relative;
        }
        .welcome-text {
            font-size: 5rem;
            position: absolute;
            top: 100%;
            left: 45%;
            transform: translate(-80%, 50%);
            font-weight: bold;
        }
        
        .torch-img {
    position: fixed;
    right:280px; /* Adjust right position as needed */
    top: 134px; /* Adjust top position as needed */
    z-index: 9999; /* Ensure the image stays on top of other elements */
    width: 250px; /* Adjust size as needed */
    height: 640px; /* Adjust size as needed */
}
</style>

<div class="container-fluid">
    <div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <span class="welcome-text"><?php echo "Welcome back " . $_SESSION['user_name'] . "!" ?></span>
            <img src="torch.png" alt="Torch" class="torch-img">
        </div>
    </div>
</div>

<script>
	$('#manage-records').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'ajax.php?action=save_track',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                resp=JSON.parse(resp)
                if(resp.status==1){
                    alert_toast("Data successfully saved",'success')
                    setTimeout(function(){
                        location.reload()
                    },800)

                }
                
            }
        })
    })
    $('#tracking_id').on('keypress',function(e){
        if(e.which == 13){
            get_person()
        }
    })
    $('#check').on('click',function(e){
            get_person()
    })
    function get_person(){
            start_load()
        $.ajax({
                url:'ajax.php?action=get_pdetails',
                method:"POST",
                data:{tracking_id : $('#tracking_id').val()},
                success:function(resp){
                    if(resp){
                        resp = JSON.parse(resp)
                        if(resp.status == 1){
                            $('#name').html(resp.name)
                            $('#address').html(resp.address)
                            $('[name="person_id"]').val(resp.id)
                            $('#details').show()
                            end_load()

                        }else if(resp.status == 2){
                            alert_toast("Unknow tracking id.",'danger');
                            end_load();
                        }
                    }
                }
            })
    }
</script>
