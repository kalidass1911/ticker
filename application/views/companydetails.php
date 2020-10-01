<?php include_once('header.php'); ?>

<div class="container">
  <h2>Company Details</h2>
 <?php
    $attributes = ['class'=>'form-horizontal','id'=>'subscribe-form'];
    $actionMethod='';
    echo form_open_multipart($actionMethod, $attributes);
   ?>

   <div style="float: right;">
  <a href="<?php echo base_url('home/index'); ?>" class="btn btn-success" >Home</a>
  <?php if($this->session->userdata('staff_user_id')){ ?>
  <button type="submit" class="btn btn-success" >Subscribe</button>
  <a href="<?php echo base_url('home/portfolio'); ?>" class="btn btn-success">Portfolio</a>
  <a href="<?php echo base_url('home/logout'); ?>" class="btn btn-danger">Logout</a>
  <?php }
  else { ?>
<a href="<?php echo base_url('home/login'); ?>" class="btn btn-danger" >Login</a>
  <?php } ?>  
 </div>
  <div class="clear" style="clear:both;height: 20px;"> </div>
 <?php 
  $Profit = $company[27];
  $total_purchase = $company[26];
  $current_value = $company[17];
  $market = $company[13];
  $exchange = $company[4];
  $companyname = $company[2];
  $Description = $company[3]; 
  $Country = $company[6];
  $Industry = $company[8];
  $Address = $company[9];
  $WeekHigh = $company[39];
  $WeekLow = $company[40];
  $open = $price_details[1];
  $high = $price_details[2];
  $low = $price_details[3];
  $price = $price_details[4];
  $volume = $price_details[5];
  $lasttradingday = $price_details[6];
  $previousclose = $price_details[7];
  $change = $price_details[8];
  $percent = $price_details[9];
  	?>
    <input type="hidden" name="ticker" value="<?php echo $company[0]; ?>">
    <input type="hidden" name="company" value="<?php echo $companyname; ?>">
    <input type="hidden" name="marketcap" value="<?php echo $market; ?>">
    <input type="hidden" name="exchange" value="<?php echo $exchange; ?>">
    <input type="hidden" name="day_high" value="<?php echo $high; ?>">
    <input type="hidden" name="day_low" value="<?php echo $low; ?>">
    <input type="hidden" name="week_high" value="<?php echo $WeekHigh; ?>">
    <input type="hidden" name="week_low" value="<?php echo $WeekLow; ?>">
    <input type="hidden" name="open" value="<?php echo $open; ?>">
    <input type="hidden" name="close" value="<?php echo $previousclose; ?>">
    <input type="hidden" name="price" value="<?php echo $price; ?>">
    <input type="hidden" name="total_stock" value="<?php echo $total_purchase; ?>">
    <input type="hidden" name="total_purchase" value="<?php echo $total_purchase; ?>">
    <input type="hidden" name="current_value" value="<?php echo $current_value; ?>">
    <input type="hidden" name="Profit" value="<?php echo $Profit; ?>">
    <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s');?>">
    <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('staff_user_id');?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Company Name: </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $companyname; ?></label>
      </div>
    </div>


     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Company Country: </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $Country; ?></label>
      </div>
    </div>


     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Company Industry: </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $Industry; ?></label>
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Current Address: </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $Address; ?></label>
      </div>
    </div>


      <div class="form-group">
      <label class="control-label col-sm-2" for="email">Current Price (USD): </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $price; ?></label>
        <?php echo date('m/d/Y h:i:s'); ?>
      </div>
    </div>


     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Day High (USD): </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $high; ?></label>
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Day Low (USD): </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $low; ?></label>
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="email">52 Week High (USD): </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $WeekHigh; ?></label>
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="email">52 Week Low (USD): </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $WeekLow; ?></label>
      </div>
    </div>


     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Day open (USD): </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $open; ?></label>
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Volume (USD): </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $volume; ?></label>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Last trading Day </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $lasttradingday; ?></label>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Preious Close (USD): </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $previousclose; ?></label>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Percent Change(%): </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $percent; ?></label>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="email">change (USD): </label>
      <div class="col-sm-10">
        <label class="form-control"><?php echo $change; ?></label>
      </div>
    </div>


     <div class="form-group">
      <label class="control-label col-sm-2" for="email">Company Description: </label>
      <div class="col-sm-10">
        <label><?php echo $Description; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email"></label>
      <div class="col-sm-10">
         
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
    $("#subscribe-form").submit(function(){
         event.preventDefault();
                var $form = $(this).closest('form');
                var submiturl = '<?php echo base_url("home/subscribe"); ?>';
                $.ajax({
                    type: 'post',
                    url: submiturl,
                    data:$("#subscribe-form").serialize(), 
                    success: function (data) {
                       if(data=='success')
                        window.location.href="<?php echo base_url('home/portfolio'); ?>";
                        else
                        alert('Ticker already subscribed..');  
                      }
                  });
});
</script>

</body>
</html>
