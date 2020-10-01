<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Tracker Details</h4>
</div>
<?php
    $attributes = ['class'=>'form-horizontal','id'=>'login-form'];
    $actionMethod='home/login';
    echo form_open_multipart($actionMethod, $attributes);
?>


 <?php 


  $tickername = $ticker->ticker;
  $company = $ticker->company;
  $marketcap = $ticker->marketcap;
  $exchange = $ticker->exchange;
  $day_high = $ticker->day_high;
  $day_low = $ticker->day_low;
  $week_high = $ticker->week_high;
  $week_low = $ticker->week_low;
  $open = $ticker->open;
  $close = $ticker->close;
  $price = $ticker->price;
  $total_stock = $ticker->total_stock;
  $total_purchase = $ticker->total_purchase;
  $current_value = $ticker->current_value;
  $Profit = $ticker->Profit;

  $newDate = date("m/d/Y", strtotime($ticker->date));
    ?>
    <div style="clear: both;height: 20px;"></div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Ticker: </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $tickername; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Company Name: </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $company; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Marketcap (USD): </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $marketcap; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Exchange : </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $exchange; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Day High (USD): </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $day_high; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Day Low (USD): </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $day_low; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">52 Week High (USD): </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $week_high; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">52 Week Low (USD): </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $week_low; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Open (USD): </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $open; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Close (USD): </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $close; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Price (USD): </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $price; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Total stock (USD): </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $total_stock; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Total Purchase (USD): </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $total_purchase; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Current value (USD): </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $current_value; ?></label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Profit (USD): </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $Profit; ?> </label>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Subscribe date: </label>
      <div class="col-sm-8">
        <label class="form-control"><?php echo $newDate; ?></label>
      </div>
    </div>
    
</form>

</div>
</div>
</div>
<div class="modal-footer custom-modalFooter">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>