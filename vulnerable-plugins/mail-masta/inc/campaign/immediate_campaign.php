<?php















 //global $wpdb;















 //$masta_campaign = $wpdb->prefix . "masta_campaign";















 //$send_campaign_id = $_GET["send_id"];















$masta_settings = $wpdb->prefix."masta_settings";















$masta_subscribers = $wpdb->prefix . "masta_subscribers";















$masta_report = $wpdb->prefix . "masta_reports";















 















 echo "test";































$rows_data = $wpdb->get_results( "SELECT * FROM $masta_campaign WHERE camp_id = $send_campaign_id");































$extract_data = $rows_data[0];















$listid = $extract_data->to_list;















$listdata = $wpdb->get_results("SELECT * FROM $masta_subscribers WHERE list_id = $extract_data->to_list");















//print_r($listdata);















$sub_count = count($listdata);















if($sub_count > 0) {















	















  foreach($listdata as $subdata) :















  















  















    $subscriber_id = $subdata->id;















    $status = '2';















    $sub_status = $subdata->status;















    $sub_email = $subdata->email;















    $sub_ip = $subdata->sub_ip;







	















    $details = json_decode(file_get_contents("http://ipinfo.io/{$sub_ip}"));















	if(!empty($details->country)){















		$country_code = $details->country;	















	} else {















		$country_code = "IN";	















	}















	$country_code=$subdata->sub_country;















	$country_name = mmasta_country_code_to_country($country_code);















	















    $insert_data  = array('camp_id' => $send_campaign_id,'list_id'=>$listid,'subscriber_id'=>$subscriber_id,'status' => '2','request_id'=>'','message_id'=>'','sub_status'=>$sub_status,'subscriber_email'=>$sub_email,'country_code'=>$country_name);















   //print_r($insert_data);















	$rows_affected_one = $wpdb->insert($masta_report, $insert_data);















  















  endforeach;	















	















 	header("location:".admin_url()."/admin.php?page=masta-campaign&action=immediatesend&send_id=".$send_campaign_id);















exit();















	















	















}















else{







	







		header("location:".admin_url()."/admin.php?page=masta-campaign");







	







	}















//echo "test";















































?>















<br>































<input type="hidden" name="campid" id="campid" value="<?php if(!empty($send_campaign_id)){ echo $send_campaign_id;}else{ echo '';}?>">















<input type="hidden" name="listid" id="listid" value="<?php if(!empty($listid)){ echo $listid;}else { echo '';}?>">















<input type="hidden" name="subcount" id="subcount" value="<?php if(!empty($sub_count)){ echo $sub_count;} else { echo '0';}?>">















<input type="hidden" name="ttl_sent" id="ttl_sent" value="0">















<input type="hidden" name="is_send" id="is_send" value="">































<div class="progress">















	  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%" id="send_progress">















		<span class="sr-only">40% Complete (success)</span>















	  </div>















 </div>















 <div class="clearfix">















		<div class="mm_float_left"><span id="ttlsent">0</span> / <span id="ttlsub"><?php if(!empty($sub_count)){ echo $sub_count;}else{ echo '0';}?></span> sent</div>















		<div class="mm_float_right">















        <div id="show_progress_avg">















        0% Complete















        </div>















		    <a title="Stop Campaign" class="btn btn-default" href="#" id="stop" onclick="camp_action(this.id)"><i class="fa fa-pause"></i></a>















		</div>















 </div>















 















 <div id="msg_div" style="color:green;font-size:20px;display:none">















     All recepeints got the email..if you are one of them please check your email. 















 </div>















<script type="text/javascript">















    jQuery(window).load(function() {















      setTimeout(sendmail,2000);















    });















    















    function sendmail(){















		   















		   var is_send   = jQuery("#is_send").val();















		   if(is_send == '') {































			   var campid   = jQuery("#campid").val();















			   var listid   = jQuery("#listid").val();















			   var counter  = jQuery("#ttl_sent").val();















			   















			   jQuery.post("<?php echo plugins_url(); ?>/mail-masta/inc/campaign/ajax_camp_send.php", {camp_id : campid,list_id:listid,offset:counter}, function (resp){















						//alert(resp);return false;















						if (resp.trim() != '') {















								 var new_counter = ++counter;















								 var ttl = jQuery("#subcount").val();















								 















								 var avg = (new_counter/ttl)*100;















								 var new_avg = parseFloat(Math.round(avg * 100) / 100).toFixed(2);















								 jQuery("#show_progress_avg").html(new_avg+"% complete");















								 jQuery("#send_progress").css("width",avg+"%");















								 jQuery("#ttl_sent").val(new_counter);















								 jQuery("#ttlsent").html(new_counter);















									















								 if( new_counter != ttl ) {















									















									setTimeout(sendmail,100);















								 } else {















									 















									 jQuery.post("<?php echo plugins_url(); ?>/mail-masta/inc/campaign_save.php", {camp_id : campid,change_status:'true',status:'1'},function(resp2){















										 if(resp2 != '' ){















										   window.location.href = "<?php echo admin_url();?>/admin.php?page=masta-campaign";		 















									 















										 }















									 });















									 jQuery("#msg_div").show();















								 }















						} else {















							  















							  alert("Something went wrong in code");















						}















					















				  });















                               















		   } else {















			    //alert("Campaign Paused.");















		   }















	















	}















	















	function camp_action(aid){















	 // alert(aid);	















	  var mainid = aid;















	   var campid   = jQuery("#campid").val();















	  if(aid == 'stop' ){















		   alert("Campaign Paused.");















		  //change status of campaign if paused















		  jQuery.post("<?php echo plugins_url(); ?>/mail-masta/inc/campaign_save.php", {camp_id : campid,change_status:'true',status:'2'},function(resp2){















			 if(resp2 != '' ){















				var newid = 'start';















				jQuery("#is_send").val("1");















				jQuery("#"+mainid).html("<i class='fa fa-play'></i>");















				jQuery("#"+mainid).attr("title","Start Campaign");















				jQuery("#"+mainid).attr("id",newid);















			  















			 }















		 });















		  















		  















			















	  } else {















		  alert("Campaign Start");















		  















		  jQuery.post("<?php echo plugins_url(); ?>/mail-masta/inc/campaign_save.php", {camp_id : campid,change_status:'true',status:'4'},function(resp2){















			 if(resp2 != '' ){















				 var newid = 'stop';















			jQuery("#is_send").val("");















		    jQuery("#"+mainid).html("<i class='fa fa-pause'></i>");















		    jQuery("#"+mainid).attr("title","Stop Campaign");















		    jQuery("#"+mainid).attr("id",newid);















		    sendmail();















			  















			 }















		 });















		  















		  















		   















			















	  }















	}















</script>














