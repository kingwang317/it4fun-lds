<?php echo css($this->config->item('chapter_css'), 'chapter')?> 

<section class="main-content">
<section class="wrapper" style="margin:0px">
	<div id="dialog-confirm" title="刪除確認?">
	  <p></p>
	</div>

	<div class="row">
		<div class="span12">
			<ul class="breadcrumb">
			  <li>位置：章節管理</li>
			</ul>
		</div>
	</div> 
	<div class="row" style="">
 
	    <div class="col-md-12 sheader"> 
			<div class="form-inline" style="margin-top:10px">
				<div class="form-group">
					<label class="col-sm-4 control-label" >
						章節分類
					</label>
				    <div class="col-sm-8">
				       <select name="search_cp_kind">
				       		<option value="ALL">不拘</option>
							<?php
							//print_r($chapter);
								if(isset($chapter)):
							?>	
							<?php   foreach($chapter as $key=>$rows):?>
								<option value="<?php echo $rows->code_id ?>" <?php if (isset($search_cp_kind) && $search_cp_kind == $rows->code_id): ?>
									selected
								<?php endif ?>><?php echo $rows->code_name ?></option>
							<?php endforeach;?>
							<?php endif;?>
						</select>
				    </div>
				    <label class="col-sm-4 control-label" >
						章節代號
					</label>
				    <div class="col-sm-8">
				       <input type="text" name="search_cp_key" <?php if (isset($search_cp_key)): ?>
				       		value="<?php echo $search_cp_key ?>"
				       <?php endif ?> />
				    </div>
				</div>
			</div>  
			<div class="form-inline" style="margin-top:10px" >
				<div class="form-group">
					<button type="submit" class="btn btn-warning">搜尋</button>
					<button class="btn btn-info" type="button" onClick="aHover('<?php echo $create_url;?>')">新增</button>
					<button type="button" id="donebatch" class="btn btn-info">批次刪除</button>
				</div>
			</div>
	    </div>
	</div> 

	<div class="row notify" style="margin:10px 10px; font-size: 12px; display:none">
		<div class="bs-docs-example">
		  <div class="alert fade in">
		    <button type="button" class="close" data-dismiss="alert">×</button>
		    <span>刪除失敗</span>
		  </div>
		</div>
	</div>

	<div class="row">
		<section class="panel">
			<header class="panel-heading"> 
			</header>
			<div class="alert alert-success" role="alert">
				<strong>共<?php echo $total_rows;?>筆</strong>
			</div>
			<table class="table table-striped table-advance table-hover">
				<thead>
					<tr>
						<th>
							<label class="label_check c_on" for="checkbox-01">
								<input type="checkbox" id="select-all"/>
							</label>
						</th>
						<th>編號</th>
						<th style="width:5%">章節代號</th>
						<th>主旨</th> 
						<th>編輯</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if(isset($results))
					{
						foreach($results as $key=>$rows)
						{

					?>
					<tr>
						<td>
							<label class="label_check c_on" for="checkbox-01">
								<input type="checkbox" name="id[]" newsid="<?php echo $rows->id?>"/>
							</label>
						</td> 
					    <td><?php echo $rows->id?></td>
						<td><?php echo $rows->cp_key?></td>
						<td><?php echo $rows->title?></td> 
						<td>
							<?php if ($super_admin): ?>								
								<button class="btn btn-xs btn-primary" type="button" onclick="aHover('<?php echo $edit_url.$rows->id?>')" >原文</button> 
							<?php endif ?>
							<!-- <button class="btn btn-xs btn-warning" type="button" onclick="aHover('<?php echo $sample_url."?cp_id=-1&cp_key=".$rows->cp_key; ?>')" >解析</button>
							<button class="btn btn-xs btn-info" type="button" onclick="aHover('<?php echo $parse_url."&cp_key=".$rows->cp_key; ?>')" >範例</button> -->
							<button class="btn btn-xs btn-warning" type="button" onclick="aHover('<?php echo $parse_url."?cp_id=".$rows->id."&cps_kind=-1&cp_key=".$rows->cp_key; ?>')" >解析</button>
							<button class="btn btn-xs btn-info" type="button" onclick="aHover('<?php echo $sample_url."?cp_id=".$rows->id."&cp_key=".$rows->cp_key; ?>')" >範例</button>
							<button class="btn btn-xs btn-default" type="button" onclick="aHover('<?php echo $cpinput_url."?cp_id=".$rows->id."&cp_key=".$rows->cp_key; ?>')" >撰寫</button>
							<button class="btn btn-xs btn-danger del" type="button" onclick="dialog_chk('<?php echo $rows->id?>')">刪除</button>
						</td>
					</tr>
					<?php
						}
					}
					else
					{
					?>
						<tr>
							<td colspan="6">No results.</td>
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
<?php echo js($this->config->item('chapter_javascript'), 'chapter')?>
<script>
	var $j = jQuery.noConflict(true);

	function aHover(url)
	{
		location.href = url;
	}

	$j("document").ready(function($) {
 
		$j("#select-all").click(function() {

		   if($j("#select-all").prop("checked"))
		   {
				$j("input[name='id[]']").each(function() {
					$j(this).prop("checked", true);
				});
		   }
		   else
		   {
				$j("input[name='id[]']").each(function() {
					$j(this).prop("checked", false);
				});     
		   }
		});

		$j("#donebatch").click(function(){
			var ids = [];
			var j = 0;
			var postData = {};
			var api_url = '<?php echo $multi_del_url?>';
			$j("input[name='id[]']").each(function(i){
				if($j(this).prop("checked"))
				{
					ids[j] = $j(this).attr('newsid');
					j++;
				}
			});
			console.log(ids);
			postData = {'ids': ids};
			$j( "#dialog-confirm p" ).text('您確定要刪除嗎？');
			$j( "#dialog-confirm" ).dialog({
			  resizable: false,
			  height:150,
			  modal: true,
			  buttons: {
			    "Delete": function() {
					$j.ajax({
						url: api_url,
						type: 'POST',
						async: true,
						crossDomain: false,
						cache: false,
						data: postData,
						success: function(data, textStatus, jqXHR){
							var data_json=jQuery.parseJSON(data);
							console.log(data_json);
							$j( "#dialog-confirm" ).dialog( "close" );
							if(data_json.status == 1)
							{
								$j(".notify").find("span").text('刪除成功');
								$j(".notify").fadeIn(100).fadeOut(1000);
								setTimeout("update_page()", 500);
							}
							else
							{
								$j(".notify").find(".alert").addClass('alert-error');
								$j(".notify").find(".alert").addClass('alert-block');
								$j(".notify").find("span").text('刪除失敗');
								$j(".notify").slideDown(500).delay(1000).fadeOut(200);
							}

						},
					});
			    },
			    Cancel: function() {
			      $j( this ).dialog( "close" );
			    }
			  }
			});
		});
	});

	function del(id)
	{
		var	 api_url = '<?php echo $del_url ?>' + id;

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
	function dialog_chk(id)
	{
		$j( "#dialog-confirm p" ).text('您確定要刪除嗎？');
		$j( "#dialog-confirm" ).dialog({
		  resizable: false,
		  height:150,
		  modal: true,
		  buttons: {
		    "Delete": function() {
				del(id);
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
 