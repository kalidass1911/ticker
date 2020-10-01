<?php include_once('header.php'); ?>
<div class="container">
  <h2>Login</h2>
  <a href="<?php echo base_url('home/index'); ?>" class="btn btn-danger" style="float:right;">Home</a>
  <div class="clear" style="clear:both;height: 20px;"> </div>
      <?php if ($this->session->flashdata('msg')) { ?><?php echo $this->session->flashdata('msg'); } ?>
<?php
    $attributes = ['class'=>'form-horizontal','id'=>'login-form'];
    $actionMethod='home/login';
    echo form_open_multipart($actionMethod, $attributes);
?>


  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10">
      <input type="password"  name="password" class="form-control" id="pwd" placeholder="Enter password" required="required">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10 right">
      <button type="submit" class="btn btn-success">Submit</button>
      <a href="<?php echo base_url('home/register'); ?>" class="btn btn-danger">Register</a>
    </div>
  </div>
 <?php echo form_close();?>
</div>

<script type="text/javascript">

$(document).ready(function () {

    $('#login-form').validate({ // initialize the plugin
               emaillogin: 
               {
               required: true,
               email: true
               },
               passwordlogin:"required",
    });

});
</script>

<style type="text/css">
  .error
  {
    color: red;
    margin:0px;
    float: left !important; 
  }
  
</style>
</body>
</html>
