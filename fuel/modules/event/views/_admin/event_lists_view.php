<?php echo css($this->config->item('event_css'), 'event')?>
<style>
	.DateStart{color: #4679bd;}
	.DateEnd{color: #d9534f;}
	.EventTitle
	{
		overflow : hidden;
		text-overflow : ellipsis;
		white-space : nowrap;
		width: 340px;
	}
</style>

<section class="main-content">
<section class="wrapper" style="margin:0px">
	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：列表</li>
			</ul>
		</div>
	</div>
	<div class="row notify" style="display:none">
		<div class="alert alert-success" role="alert">
			<span>刪除成功</span>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="form-horizontal tasi-form">
				<div class="form-group">
					<div class="col-sm-2">
						<select class="form-control" name="search_type">
							<option value="0" <?php echo $search_type=="0"?"selected":"" ?>>課程名稱</option>
							<option value="1" <?php echo $search_type=="1"?"selected":"" ?>>費用</option>
							<option value="2" <?php echo $search_type=="2"?"selected":"" ?>>地點</option>
						</select>
					</div>
					<div class="col-sm-4">
						<div class="input-group date event_start_date">
						  <input type="text" class="form-control" size="16" name="search_txt" id="search_txt" placeholder="Search..." value="<?php echo $search_txt ?>">
						    <span class="input-group-btn">
						    <button type="button" class="btn btn-warning date-set isearch" style="height:34px;"><i class="glyphicon glyphicon-search"></i></button>
						    </span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
	    <div class="col-md-12 sheader"> 
			<div class="form-inline" style="margin-top:10px" >
				<div class="form-group">
					<button class="btn btn-info" type="button" onClick="aHover('<?php echo $create_url;?>')">新增訓練</button>
					<button type="button" class="btn btn-danger del-all" style="height:34px;"><i class="glyphicon glyphicon-trash"></i></button>
				</div>
			</div>
	    </div>
	</div> 

	<div class="row">
		<section class="panel">
			<div class="alert alert-success" role="alert">
				<strong>共 <?php echo $total_rows;?> 筆</strong>
			</div>
			<table class="table table-striped table-advance table-hover">
				<thead>
					<tr>
						<th style="width:5%">
							<label class="label_check c_on" for="checkbox-01">
								<input type="checkbox" id="select-all"/>
							</label>
						</th>
						<th style="width:380px">課程名稱</th>
						<th style="width:80px">費用</th>
						<th style="width:150px">時間</th>
						<th style="width:50px">天數</th>
						<th style="width:50px">時數</th>
						<th style="width:80px">合作單位</th>
						<th style="width:50px">開課日期</th>
						<th style="width:100px">上課地點</th>
		<!-- 				
						<th style="width:10%">合作單位</th> -->
						<th style="width:80px">報名人數</th>
						<th style="width:50px">報名列表</th>
						<th>前台</th>
						<th style="width:50px">刪除</th>
					</tr>
				</thead>
				<tbody>
				<?php
					if(isset($results))
					{
						foreach($results as $row)
						{
				?>
					<tr>
						<td>
							<label class="label_check c_on" for="checkbox-01">
								<input type="checkbox" name="event_id[]" eventid="<?php echo $row->id?>"/>
							</label>
						</td>
						<td style="width:10%"><p class="EventTitle"><a href="<?php echo $edit_url.$row->id?>" title="<?php echo $row->train_title?>"><?php echo $row->train_title?></a></p></td>
						<td>
							<?php echo $row->train_price ?>
						</td>
						<td>
							<?php echo $row->train_time_s;?>~<?php echo $row->train_time_e?>
						</td>
						<td>
							<?php echo $row->train_days ?>
						</td>
						<td>
							<?php echo $row->train_hours ?>
						</td>
						<td>
							<?php echo $row->coll_unit;?>
						</td>
						<td>
							<?php echo $row->train_date;?>
						</td>
						<td>
							<?php echo $row->train_price;?>(<?php echo $row->train_place_s ?>)
						</td>
					<!-- 	<td>
							<?php echo $row->host_unit;?>
						</td>
						<td>
							<?php echo $row->coll_unit;?>
						</td>  -->
						<td><a href="<?php echo $detail_url.$row->id.'/0'?>" title="<?php echo $row->reg_count?>"><?php echo $row->reg_count?></a></td>
						<td>
							<button class="btn btn-xs btn-info" type="button" onclick="aHover('<?php echo $detail_url.$row->id.'/0' ?>')">報名列表</button>
						</td>
						<td>
							<a target="_BLANK" href="<?php echo site_url().'iso-training-courses/detail/'.$row->id ?>">前台</a>
						</td>
						<td>
							<button class="btn btn-xs btn-danger del" type="button" EventID="<?php echo $row->id ?>">刪除</button>
						</td>
					</tr>
				<?php
						}
					}
					else
					{
				?>
					<tr>
						<td colspan="12">No results.</td>
					</tr>
				<?php
					}
				?>

				</tobdy>
			</table>
		</section>
	</div>
	<div style="text-align:center">
	  <ul class="pagination">
		<?php echo $page_jump?>
	  </ul>
	</div>
</section>
</section>
<!-- Button trigger modal -->
<div class="modal fade bs-example-modal-sm" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">刪除確認</h4>
			</div>
			<div class="modal-body">
				<p>您確定要刪除嗎？</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary do-del">Yes</button>
				<button type="button" class="btn btn-primary do-del-all">Yes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php echo js($this->config->item('event_javascript'), 'event')?>
<script>
	var $j = jQuery.noConflict(true);
	function aHover(url)
	{
		location.href = url;
	}
	function aHoverBlank(url)
	{
		window.open(url);
	}

	$j("document").ready(function($) {

		$j("#event_start_date").datetimepicker({
		    format: "yyyy-m-d hh:ii",
		    autoclose: true
		});

		$j("#event_end_date").datetimepicker({
		    format: "yyyy-m-d hh:ii",
		    autoclose: true
		});

		$j(".isearch").on("click", function(){
			var search_type = $("select[name='search_type']").val();
			var search_txt = $("input[name='search_txt']").val();
			var url = '<?php echo $search_url ?>?search_type=' + search_type + '&search_txt=' + search_txt;

			aHover(url);
		});

		$j(".del").on("click", function(){
			$j(".do-del").show();
			$j(".do-del-all").hide();
			$j(".do-del").attr("EventID", $(this).attr("EventID"));
			$j('#myModal').modal('toggle');
		});

		$j(".do-del").on("click", function(){
			var	 api_url = '<?php echo $del_url ?>' + $(this).attr("EventID");
		   
			$j.ajax({
				url: api_url,
				type: 'POST',
				async: true,
				crossDomain: false,
				cache: false,
				success: function(data, textStatus, jqXHR){
					var data_json=jQuery.parseJSON(data);

					$j('#myModal').modal('hide');
					if(data_json.status == 1)
					{
						$j(".notify .alert span").text('刪除成功');
						$j(".notify .alert").removeClass('alert-danger');
						$j(".notify .alert").addClass('alert-success');
						$j(".notify").fadeIn(100).fadeOut(1000);
						setTimeout("update_page()", 500);
					}
					else
					{
						$j(".notify .alert span").text('刪除失敗');
						$j(".notify .alert").removeClass('alert-success');
						$j(".notify .alert").addClass('alert-danger');
						$j(".notify").fadeIn(100).fadeOut(1000);
					}

				},
			});
		});
		

		$j("#select-all").click(function() {

		   if($j("#select-all").prop("checked"))
		   {
				$j("input[name='event_id[]']").each(function() {
					$j(this).prop("checked", true);
				});
		   }
		   else
		   {
				$j("input[name='event_id[]']").each(function() {
					$j(this).prop("checked", false);
				});     
		   }
		});

		$j("button.del-all").click(function(){
			$j(".do-del").hide();
			$j(".do-del-all").show();
			$j('#myModal').modal('toggle');
		});

		$j(".do-del-all").on("click", function(){

			var eventid = [];
			var j = 0;
			var postData = {};
			var api_url = '<?php echo $multi_del_url?>';
			$j("input[name='event_id[]']").each(function(i){
				if($j(this).prop("checked"))
				{
					eventid[j] = $j(this).attr('eventid');
					j++;
				}
			});

			if(j == 0)
			{
				alert("請選擇您要刪除的項目");
				return false;
			}

			postData = {'eventids': eventid};
			$j.ajax({
				url: api_url,
				type: 'POST',
				async: true,
				crossDomain: false,
				cache: false,
				data: postData,
				success: function(data, textStatus, jqXHR){
					var data_json=jQuery.parseJSON(data);
					$j('#myModal').modal('hide');

					if(data_json.status == 1)
					{
						$j(".notify .alert span").text('刪除成功');
						$j(".notify .alert").removeClass('alert-danger');
						$j(".notify .alert").addClass('alert-success');
						$j(".notify").fadeIn(100).fadeOut(1000);
						setTimeout("update_page()", 500);
					}
					else
					{
						$j(".notify .alert span").text('刪除失敗');
						$j(".notify .alert").removeClass('alert-success');
						$j(".notify .alert").addClass('alert-danger');
						$j(".notify").fadeIn(100).fadeOut(1000);
					}

				},
			});
		});
	});

	function del(account)
	{
		var	 api_url = '' + account;

		console.log(api_url);
	   
		$j.ajax({
			url: api_url,
			type: 'POST',
			async: true,
			crossDomain: false,
			cache: false,
			success: function(data, textStatus, jqXHR){
				var data_json=jQuery.parseJSON(data);
				console.log(data_json);
				$j( "#dialog-confirm" ).dialog( "close" );
				if(data_json.status == 1)
				{
					$j("#notification span").text('刪除成功');
					$j("#notify").fadeIn(100).fadeOut(1000);
					setTimeout("update_page()", 500);
				}

			},
		});
	}
	function dialog_chk(account)
	{
		$j( "#dialog-confirm p" ).text('您確定要刪除嗎？');
		$j( "#dialog-confirm" ).dialog({
		  resizable: false,
		  height:150,
		  modal: true,
		  buttons: {
		    "Delete": function() {
				del(account);
		    },
		    Cancel: function() {
		      $j( this ).dialog( "close" );
		    }
		  }
		});
	}
	function update_page()
	{
		location.reload();
	}
</script>