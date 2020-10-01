<?php include_once('header.php'); ?>

<div class="container">
  <h2>Search Company</h2>
   <div style="float: right;">
  <?php if($this->session->userdata('staff_user_id')) { ?>
      <a href="<?php echo base_url('home/portfolio'); ?>" class="btn btn-danger">Portfolio</a>
  <a href="<?php echo base_url('home/logout'); ?>" class="btn btn-danger">Logout</a>
  <?php } else { ?>
     <a href="<?php echo base_url('home/register'); ?>" class="btn btn-success">Register</a>
   <a href="<?php echo base_url('home/login'); ?>" class="btn btn-success">Login</a>
 <?php } ?>
</div>

     <div class="clear" style="clear:both;height: 20px;"> </div>
    <?php if ($this->session->flashdata('msg')) { ?><?php echo $this->session->flashdata('msg'); } ?>
  <form class="form-horizontal" >
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Company:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="company" placeholder="Search company" name="company"  autocomplete="off">
        <input type='hidden' id='selectuser_id' />
      </div>
    </div>
  </form>
</div>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {

 // Single Select
 $( "#company" ).autocomplete({
  source: function( request, response ) {
   // Fetch data
   $.ajax({
    url: "<?php echo base_url('home/getcompanies'); ?>",
    type: 'post',
    dataType: "json",
    data: {
     company: request.term
    },
    success: function( data ) {
     response( data );
    }
   });
  },
  select: function (event, ui) {
   // Set selection
   $('#company').val(ui.item.label); // display the selected text
   window.location.href="<?php echo base_url('home/companydetails/'); ?>"+ui.item.value;
   //$('#selectuser_id').val(ui.item.value); // save selected id to input
   return false;
  }
 })
  });
</script>
<style type="text/css">
 .ui-autocomplete-loading { margin-top: 20px; background:url('<?php echo base_url('assets/loading.gif'); ?>') no-repeat center }

</style>
</body>
</html>
