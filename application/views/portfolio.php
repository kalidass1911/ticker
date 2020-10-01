<!DOCTYPE html>
<html lang="en">
<head>
  <title>PortFolio Tracking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
</head>
<body>

<div class="container">
  <h2>PortFolio Tracking</h2>

  <div style="float: right;">
  <a href="<?php echo base_url('home'); ?>" class="btn btn-success">Home</a>
   <a href="<?php echo base_url('home/logout'); ?>" class="btn btn-danger">Logout</a>
 </div>
  <div class="clear" style="clear:both;height: 20px;"> </div>
<?php if ($this->session->flashdata('msg')) { ?><?php echo $this->session->flashdata('msg'); } ?>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Ticker</th>
                <th>Company</th>
                <th>Marketcap</th>
                <th>Exchange</th>
                <th>Day High</th>
                <th>Day Low</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php if($ticker){
                 foreach ($ticker as $key => $value) { ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value->ticker; ?></td>
                <td><?php echo $value->company; ?></td>
                <td><?php echo $value->marketcap; ?> USD</td>
                <td><?php echo $value->exchange; ?></td>
                <td><?php echo $value->day_high; ?> USD</td>
                <td><?php echo $value->day_low; ?> USD</td>
                <td>
                  <a href="javascript:void(0);" onclick="showdetails('<?php echo $value->id; ?>');" class="btn btn-success">View</a>
                  <a href="<?php echo base_url('home/unsubscribe/'.$value->id) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to Unsubscribe?')" >Unsubscribe</a>
                </td>
            </tr>
          <?php } } ?>
          </tbody>
        </table>
</div>


<div class="modal fade ds-form replyTicket" id="showdetails" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="loadreply">
    </div>
  </div>
</div>

<script type="text/javascript">
 $(document).ready(function() {
    $('#example').DataTable();
} );

function showdetails(trackid)
{
    $.post("<?php echo base_url('home/viewdetails');?>",{trackid:trackid},function(data) 
    {
        $('#loadreply').html(data);
        $('#showdetails').modal({show:true});
    });
} 
</script>
</body>
</html>
