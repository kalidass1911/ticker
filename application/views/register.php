<?php include_once('header.php'); ?>

<div class="container">
  <h2>Register</h2>
  <a href="<?php echo base_url('home/index'); ?>" class="btn btn-danger" style="float:right;">Home</a>
  <div class="clear" style="clear:both;height: 20px;"> </div>
<?php
		$attributes = ['class'=>'form-horizontal','id'=>'register-form'];
		$actionMethod='home/saveUsers';
		echo form_open_multipart($actionMethod, $attributes);
?>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
     <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required="required">
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-2" for="email">Name:</label>
    <div class="col-sm-10">
     <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required="required">
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Phone:</label>
    <div class="col-sm-10">
     <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter phone" required="required" maxlength="13">
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10">
      <input type="password"  name="password" class="form-control" id="password" placeholder="Enter password" required="required">
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10">
      <input type="password"  name="confirm" class="form-control" id="confirm" placeholder="Enter confirm password" required="required">
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10 right">
      <button type="submit" class="btn btn-success">Submit</button>
      <a href="<?php echo base_url('home/login'); ?>" class="btn btn-danger">Login</a>
    </div>
  </div>
 <?php echo form_close();?>
</div>


<script type="text/javascript">
$(document).ready(function () {

  var token =  $('input[name="csrf_token_name"]').attr('value'); 

    $('#register-form').validate({ 
    errorLabelContainer: "#cs-error-note",
    rules: {
			name: "required",
			password: "required",
			phone: "required",
			confirm: {
			required: true,
			equalTo: "#password"
            },
        email: {
            required: true,
            email: true,
            remote: {
                    url: "<?php echo base_url('home/checkemilexist') ?>",
                    type: "post",
                    data: {csrf_token_name:token,email: function(){ return $("#email").val();}},
                 },
        },
    },
    messages: {
        email: {
            required: "Please enter your email address.",
            email: "Please enter a valid email address.",
            remote: "Email already Exists! Please use diffrent email."
        },
        name:'Please enter your name',
        password:'Please enter your password',
        address:'Please enter your address',
        confirm: {
			required: 'Please enter confirm password',
			equalTo: "password and confirm password should be same"
            },
    },
    submitHandler: function(form) {
                        form.submit();
                   }
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
