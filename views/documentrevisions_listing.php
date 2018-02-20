<?php $this->view('partials/head'); ?>
<?php //Initialize models needed for the table
new Machine_model;
new Reportdata_model;
new documentrevisions_model;
?>

<div class="container">

  <div class="row">
    <div class="col-lg-12">
    
    
    <h3>Documentrevisions   <span id="total-count" class='label label-primary'>…</span></h3>

      <table class="table table-striped table-condensed table-bordered">
        <thead>
          <tr>
              <th data-i18n="listing.computername" data-colname='machine.computer_name'></th>
              <th data-i18n="serial" data-colname='reportdata.serial_number'></th>
              <th data-i18n="reportdata.long_username" data-colname='reportdata.long_username'>Username</th>
               <th data-i18n="documentrevisions.size" data-colname='documentrevisions.size'>Documentrevisions Size</th>
               <th data-i18n="munkireport.manifest.manifest" data-colname='munkireport.manifestname'></th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <td colspan="5" class="dataTables_empty">Loading data from server</td>
        </tr>
        </tbody>
      </table>
    </div> <!-- /span 12 -->
  </div> <!-- /row -->
</div>  <!-- /container -->
    
    
    
    
  
<script type="text/javascript">

	$(document).on('appUpdate', function(e){

		var oTable = $('.table').DataTable();
		oTable.ajax.reload();
		return;

	});

	$(document).on('appReady', function(e, lang) {
		// Get column names from data attribute
		var columnDefs = [],
            col = 0; // Column counter
		$('.table th').map(function(){
              columnDefs.push({name: $(this).data('colname'), targets: col});
              col++;
		});
	    oTable = $('.table').dataTable( {
	        columnDefs: columnDefs,
	        ajax: {
                url: "<?php echo url('datatables/data'); ?>",
                type: "POST"
            },
            dom: mr.dt.buttonDom,
            buttons: mr.dt.buttons,
	        createdRow: function( nRow, aData, iDataIndex ) {
	        	// Update name in first column to link
	        	var name=$('td:eq(0)', nRow).html();
	        	if(name == ''){name = "No Name"};
	        	var sn=$('td:eq(1)', nRow).html();
	        	var link = mr.getClientDetailLink(name, sn);
	        	$('td:eq(0)', nRow).html(link);

	        }
	    });
	});
</script>

<?php $this->view('partials/foot'); ?>
