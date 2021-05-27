<!DOCTYPE html>
<html lang="en">

<head>
<title>City</title>
<!-- Bootstrap core CSS-->
<?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
<!-- Custom fonts for this template-->
<?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
<!-- Page level plugin CSS-->
<?php echo link_tag('assests/vendor/datatables/dataTables.bootstrap4.css'); ?>
<!-- Custom styles for this template-->
<?php echo link_tag('assests/css/sb-admin.css'); ?>

  </head>

  <body id="page-top">

   <?php include APPPATH.'views/user/includes/header.php';?>

    <div id="wrapper">

      <!-- Sidebar -->
  <?php include APPPATH.'views/user/includes/sidebar.php';?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/Dashboard'); ?>">Dashboard</a>
            </li>

            <li class="breadcrumb-item">
              <a href="<?php echo site_url('user/City'); ?>">City</a>
            </li>
            <li class="breadcrumb-item active">Add New City</li>
          </ol>
  <div class="container" style="padding-top: 10px;">
          <!-- Page Content -->
          <form method="post" name="createCities" action="<?php echo base_url().'user/City/create';?>">

            <div class="row">
            <div class="col-md-6"> 

            <div class="form-group">

                <strong>Name:</strong>

                <input type="text" name="name" value="<?php echo set_value('name');?>" class="form-control">
                <?php echo form_error('name');?>

            </div>      
              
              <div class="form-group">
          <strong>Country Name:</strong>
                    <select class="form-control" name="category" id="category" required>
                        <option value="">No Selected</option>
                        <?php foreach($category as $row):?>
                        <option value="<?php echo $row->category_id;?>"><?php echo $row->category_name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
 
                <div class="form-group">
                    <strong>State Name:</strong>
                    <select class="form-control" id="sub_category" name="sub_category" required>
                        <option value="">No Selected</option>
 
                    </select>
                </div>

        <!-- <div class="col-xs-12 col-sm-12 col-md-12"> -->

            <div class="form-group">

                <strong>Status:</strong>
        <!-- <div class="col-md-4"> -->
          <select name="status" class="form-control">
            <option value="1">Active</option>
            <option value="0">InActive</option>
          </select>
        </div>

            <!-- </div> -->

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

       <div class="form-group">

                <button type="submit" class="btn btn-primary">Submit</button>

                <a class="btn btn-primary" href="<?php echo base_url('user/City');?>"> Back</a>

        </div>


    </div>

</form>
</div>

<script>

  $(document).ready(function(){
 
            $('#countries').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('state/get_countries');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].country_id+'>'+data[i].country_name+'</option>';
                        }
                        $('#countries').html(html);
 
                    }
                });
                return false;
            }); 
             
        });
</script>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
     <?php include APPPATH.'views/user/includes/footer.php';?>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assests/js/sb-admin.min.js '); ?>"></script>

  </body>

</html>