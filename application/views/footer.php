</div>
<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/jquery-2.1.4.min.js"></script>

		

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/bootstrap.min.js"></script>

		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/bootstrap-datepicker.min.js"></script>
		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/buttons.flash.min.js"></script>
		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/buttons.html5.min.js"></script>
		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/buttons.print.min.js"></script>
		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/buttons.colVis.min.js"></script>
		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/dataTables.select.min.js"></script>
		
		


		<!-- ace scripts -->
		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/ace.min.js"></script>

		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/chosen.jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>cosmatics/ace-master/assets/js/jquery.knob.min.js"></script>
	




		<!-- inline scripts related to this page -->
		<script type="text/javascript">


$(function () {
   $(".content-box-invoice").each(function () {
      $(this).after('<div class="watermark">MANGALAM ENTERPRISES</div>');
   });
});



	$(window).load(function(){
		$('#loader_div').css('display','block');
	});


		$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				});




var typingTimer;
var doneTypingInterval = 2000;

			$('#pro_search').on('keyup',function(){
				clearTimeout(typingTimer);

				typingTimer = setTimeout(function(){
					//$('#product-table').empty();
				var val = $('#pro_search').val();
				//console.log(val);
				$('#product-table').empty();
				if(val == ''){
					$('#result').attr('display','none');
				}
				var url = "<?php echo base_url('products/ajaxSearch/') ?>"+val;
			 		$.ajax({
					 			dataType:'json',
								type: "POST",								
					 			url: url,
					 			beforeSend: function(){
					 				$('#pro_search').css('background','#FFF');
					 			},
					 			
					 			success: function(data){
					 				console.log(data);
					 				// $('#result').show();
					 				// $('#result').html(data);

					 				if(data.dataArr.size == 0){
					 					$('#product-table').empty();
					 				}					 				

					 				$.each(data.dataArr, function(key,value) {

var html = "<tr>";

html +=  "<td>"+value.name+"</td><td>"+value.hsn+"</td><td>"+value.rate+"</td><td>"+value.unit+"</td><td>"+value.gst+"</td>";
html += "<td><a class='qty_add' href='#modal-form' data-target='#modal-form' data-id ='"+value.id+"#"+value.name+"#"+value.rate+"#"+value.hsn+"#"+value.gst+"' role='button' class='blue' data-toggle='modal'> Add to invoice #"+data.sess+"</a>";	
html += "</td></tr>";

			// $("#result").show();
			// $("#result").html(html);
			// $("#pro_search").css("background","#FFF");


							//var html = "<option value='"+value.id+"'>"+value.name+"</option>"

  									$('#product-table').append(html);

  									//$('#product-table').empty();


  									//$('#result_span').html(value.name);
  								//console.log(value.name+'   '+'Add');
});

					 				//$('#words').html(data);
				

					}
					 		});




				},2000);

				});

$('#pro_search').on('keydown',function(){

				clearTimeout(typingTimer);

			});





$('.item_delete').on('click',function(){

	//.

	var id = $.map($('.item_delete'),function(e){
		return e.getAttribute('ids');
	});

	var r = confirm('Delete this item ?');
	if(r==true){
		var url = '<?php echo base_url('invoice/delete_item/') ?>'+id;
		window.location.href = url;
	}

	

});




				$(document).ready(function(){
						var amount = $('#amount').val();
					//alert(amount);
						var url = "<?php echo base_url('invoice/amt_to_words/') ?>"+amount;
							 		$.ajax({
					 			dataType:'html',
								type: "POST",								
					 			url: url,
					 			
					 			success: function(data){
					 				console.log(data);

					 				$('#words').html(data);
					 				

					}
					 		});
						
					});



			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					"pageLength": 500,

					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
			
			})
					
					// 

					$('#add_new_customer').click(function(){

						var inv_no = $('#invoice_no').val();
						var date = $('#id-date-picker-1').val();

						

						if(parseInt(inv_no) >0){
							window.location.href = "<?php echo base_url('customer/add/') ?>"+inv_no+'/'+date;
						}else{
							alert('Please insert invoice no');
						}

						
					});
			

						$('.edit_pro').click(function(){
						$('#edit_pro_btn').prop('disabled',false);
						var name = 	$(this).attr('data-id').split("#");

						var id = name[0];

						url = '<?php echo base_url('products/getProductDetails/') ?>'+id;

				 			$.ajax({
					 			dataType:'JSON',
								type: "POST",								
					 			url: url,
					 			
					 			success: function(data){

					  			

		 				$("#form-field-name").val(data.name);
						$("#form-field-rate").val(data.rate);
						$("#form-field-hsn").val(data.hsn);
						$("#form-field-gst").val(data.gst);
						$("#form-field-id").val(data.id);
						$("#form-field-unit").val(data.unit);

						$("#edit_pro_span").html('Edit '+data.name+' ('+data.gst+'% GST)');
						$('#edit_pro_btn').prop('enabled',true);
					 				

					}
					 		});
						
						
						
					});










			$('.edit_cust').click(function(){
						$('#edit_cust_btn').prop('disabled',false);
						var dataArr = 	$(this).attr('data-id').split("#avy#");

						var id = dataArr[0];

						url = "<?php echo base_url('customer/getCustomerDetails/') ?>"+id;

				 			$.ajax({
					 			dataType:'JSON',
								type: "POST",								
					 			url: url,
					 			
					 			success: function(data){

					  			

		 				$("#form-field-cust-name").val(data.name);
						$("#form-field-cust-email").val(data.email);
						$("#form-field-cust-address").val(data.address);
						$("#form-field-cust-pin").val(data.pincode);
						$("#form-field-cust-pan").val(data.pan);
						$("#form-field-cust-gst").val(data.gst_no);
						$("#form-field-cust-contact").val(data.contact);

						$("#edit_cust_span").html('Edit '+data.name);
						$('#edit_cust_btn').prop('enabled',true);
					 				

					}
					 		});
						
						
						
					});		




$("#pro_add_reset").click(function() {
	//alert(111);
    $(this).closest('form').find("input[type=text], textarea").val("");
});



						

			 	$('#edit_pro_btn').click(function(){

			 							 		$('#edit_pro_btn').prop('disabled',true);
							
					 		//var p_data = $('#edit_pro_form').serialize();
					 		//console.log(p_data);
					 		//name=jeera+whole&rate=50&unit=&hsn=0125620&gst=5&id=1
	var p_data = ($('#form-field-id').val())+'_'+($('#form-field-rate').val())+'_'+($('#form-field-hsn').val())+'_'+($('#form-field-gst').val())+'_'+($('#form-field-unit').val());
	var url = "<?php echo base_url('products/editAjax')?>"+'/'+p_data+'/'+$('#form-field-id').val();

					 		$.ajax({
					 			dataType:'JSON',
								type: "POST",								
					 			url: url,
					 			data: {product_name: $('#form-field-name').val()} ,
					 			
					 			success: function(data){

					 				//console.log(data);

					 				$('#td_name_'+($('#form-field-id').val())).html(data.name);
					 				$('#td_rate_'+($('#form-field-id').val())).html(data.rate);
					 				$('#td_gst_'+($('#form-field-id').val())).html(data.gst+'%');
					 				$('#td_unit_'+($('#form-field-id').val())).html(data.unit);
					 				$('#td_hsn_'+($('#form-field-id').val())).html(data.hsn);

					 				$("#form-field-name").val();
									$("#form-field-rate").val();
									$("#form-field-hsn").val();
									$("#form-field-gst").val();
									$("#form-field-id").val();
									$("#form-field-unit").val();
									$('#edit_pro_btn').prop('enabled',true);
						 			$('#edit-pro-modal').modal('toggle');
						 			
					 				//alert('Edit successfully');					 				

					}
					 		});

					});



			 	$('#edit_cust_btn').click(function(){

			 							 		$('#edit_cust_btn').prop('disabled',true);
							
					 		var p_data = $('#edit_cust_form').serialize();
					 		console.log(p_data);
					 		//name=jeera+whole&rate=50&unit=&hsn=0125620&gst=5&id=1
	//var p_data = ($('#form-field-cust-id').val())+'_'+($('#form-field-cust-contact').val())+'_'+($('#form-field-cust-gst').val())+'_'+($('#form-field-cust-name').val())+'_'+($('#form-field-cust-email').val())+'_'+($('#form-field-cust-address').val())+'_'+($('#form-field-cust-pin').val());
	var url = "<?php echo base_url('customer/editAjax')?>";

					 		$.ajax({
					 			dataType:'JSON',
								type: "POST",								
					 			url: url,
					 			data: {form_data: p_data} ,
					 			
					 			success: function(data){

					 				console.log(data);

					 			// 	$('#td_name_'+($('#form-field-id').val())).html(data.name);
					 			// 	$('#td_rate_'+($('#form-field-id').val())).html(data.rate);
					 			// 	$('#td_gst_'+($('#form-field-id').val())).html(data.gst+'%');
					 			// 	$('#td_unit_'+($('#form-field-id').val())).html(data.unit);
					 			// 	$('#td_hsn_'+($('#form-field-id').val())).html(data.hsn);

					 			// 	$("#form-field-name").val();
									// $("#form-field-rate").val();
									// $("#form-field-hsn").val();
									// $("#form-field-gst").val();
									// $("#form-field-id").val();
									// $("#form-field-unit").val();
									// $('#edit_pro_btn').prop('enabled',true);
						 		// 	$('#edit-pro-modal').modal('toggle');
						 			
					 				//alert('Edit successfully');					 				

					}
					 		});
	



					});


$('.qty_add').click(function(){
						$('#save_btn').prop('disabled',false);
						var name = 	$(this).attr('data-id').split("#");

						<?php  if(!$this->session->userdata('inv_no') || !$this->session->userdata('inv_id')){ ?>

							alert('Something went wrong!');
							location.reload(true);
					
			<?php	} ?>

										var prod_id= name[0];
						var url = "<?php echo base_url('products/get_price')?>";					 		

								$.ajax({
					 			dataType:'JSON',
								type: "POST",								
					 			url: url,	
					 			data: {info:name},				 			
					 			success: function(data){
					 				//console.log($("#td_rate_"+data[0]));

					 				$("#prod_data").val(data[0]);
						$("#price").val(data[2]);
						$("#qty").val(data[6]);
						$("#per").html('per '+data[5]);
						$("#discount").val(data[7]);
						$("#head_span").html(data[1]+' ('+data[4]+'% GST)');					
	

					}
					 		});	
						
						
					});


											
											
					// $('.qty_add').click(function(){
					// 	$('#save_btn').prop('disabled',false);
					// 	var name = 	$(this).attr('data-id').split("#");
					// 	//console.log(name);

					// 	var prod_id= name[0];
					// 	var url = "<?php echo base_url('products/get_price')?>"+'/'+prod_id;					 		

					// 			$.ajax({
					//  			dataType:'JSON',
					// 			type: "POST",								
					//  			url: url,	
					//  			data: {info:name},				 			
					//  			success: function(data){

					//  				console.log(data);

					//  				$("#prod_data").val(data[0]);
					// 	$("#price").val(data[2]);
					// 	$("#head_span").html(data[1]+' ('+data[4]+'% GST)');						

					// }
					//  		});					
						
						
					// });

$('.up').on('blur',function(){
	var row_id = $(this).attr("data-value");
	var qty = $(this).attr("data-qty");
	var discount = $(this).attr("data-discount");
	var price = $(this).val();
	var inv_id = $('#inv_id').val();
	var record = {'qty':qty,'discount':discount};
	
	var url = "<?php echo base_url('invoice/edit_item_ajax/')?>"+row_id+'/'+$(this).val()+'/'+inv_id;
	if(isNaN(price) == true){
		alert('Invalid price!');
	} else{
		$.ajax({
					 			dataType:'JSON',
								type: "POST",								
					 			url: url,
					 			
					 			success: function(data){
					 				$('#final_'+row_id).html(data.net);
					 				$('td:nth-child(8),th:nth-child(8)').hide();
					 				//var total = (data/100).toFixed(2);
					 				//console.log(data);
					 				$('#it').html(data.total);
					 				//alert(data);
					 				//update total
					 				

					}
					 		});

	}
	
	

});

					 	$('#save_btn').click(function(){

					 		<?php  if(!$this->session->userdata('inv_no') || !$this->session->userdata('inv_id')){ ?>

							alert('Something went wrong!');
							location.reload(true);
					
			<?php	} ?>

					 		$('#save_btn').prop('disabled',true);
							
					 		var p_data = ($('#prod_data').val())+'_'+($('#qty').val())+'_'+($('#price').val())+'_'+($('#discount').val());
					 		var url = "<?php echo base_url('products/add_to_invoice')?>"+'/'+p_data;
					 		//console.log(url);
					 		$.ajax({
					 			dataType:'JSON',
								type: "POST",								
					 			url: url,
					 			
					 			success: function(data){
					 				
					 				$("#td_rate_"+data.id).html(data.price);
					 				$("#cart_total").html('Invoice Total: '+data.inv_total);
					 				$('#modal-form').find("input[type=text], textarea, input[type=hidden]").val("");
					 				$('#modal-form').modal('toggle');
					 				

					}
					 		});









					});


$('.item_del').click(function(){

	var abc = $(this).closest(".item_del").attr("id");
	
	var r = confirm("Confirm delete?");
if (r == true) {
	window.location = "<?php echo base_url('invoice/delete_invoice/')?>"+abc;
  
} 


});

$('.cust_del').click(function(){

	var abc = $(this).closest(".cust_del").attr("id");
	
	var r = confirm("Confirm delete?");
if (r == true) {
	window.location = "<?php echo base_url('customer/delete_item/')?>"+abc;
  
} 


});





				
							
		</script>


		
	</body>
</html>
