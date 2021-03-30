<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
	include_once("../../_init.php");
	include_once($GP -> INC_ADM_PATH."/head.php");	
	
	include_once($GP -> CLS."/class.multi.php");
	$C_multi 	= new multi;
	
	$args = "";
	$args['tm_idx'] 	= $_GET['tm_idx'];
	$rst = $C_multi ->MULTI_Info($args);
	
	if($rst) {
		extract($rst);		
    }	

    $MULTI_select = $C_Func -> makeSelect_Normal('tm_select', $GP -> MULTI_TYPE, $tm_select, '', '::선택::');
    
?>
<body>
<div class="Wrap_layer"><!--// 전체를 감싸는 Wrap -->
	<div class="boxContent_layer">
		<div class="boxContentHeader">
			<span class="boxTopNav"><strong>조직운영안내 수정</strong></span>
		</div>
		<form name="base_form" id="base_form" method="POST" action="?" enctype="multipart/form-data">
		<input type="hidden" name="mode" id="mode" value="MULTI_MODI" />
		<input type="hidden" name="tm_idx" id="tm_idx" value="<?=$_GET['tm_idx']?>" />       		
		<input type="hidden" name="tm_type" id="tm_type" value="<?=$tm_type?>" /> 
		<input type="hidden" name="before_image_main" id="before_image_main" value="<?=$tm_img?>" />
        <input type="hidden" name="before_image_main_m" id="before_image_main_m" value="<?=$tm_m_img?>" />      
		<div class="boxContentBody">			
			<div class="boxMemberInfoTable_layer">				
				<div class="layerTable">
					<table class="table table-bordered">
						<tbody>                                        
                            
                            <tr>
								<th><span>*</span>사이트</th>
								<td>
									<input type="text" class="input_text" size="150" name="tm_content2" id="tm_content2" value="<?=$tm_content2?>"/>
								</td>
                            </tr>
                            <tr>
								<th><span>*</span>URL</th>
								<td>
									<input type="text" class="input_text" size="150" name="tm_content3" id="tm_content3" value="<?=$tm_content3?>"/>
								</td>
                            </tr>  
							<tr>
                                <th><span>*</span>이미지</th>
                                <td>
                                    <input type="file" name="tm_img" id="`tm_`img" size="30">
                                    <?
                                        if($tm_img != "") {
                                            echo  "<br>" . $tm_img;
                                    ?>
                                        <a href="#" onClick="img_del('<?=$tm_img;?>','<?=$_GET['tm_idx']?>','W')">(X)</a>
                                    <? } ?>
                                </td>
                            </tr>                                                                  
							<tr>
								<th><span>*</span>노출여부</th>
								<td>
									<input type="radio" name="tm_show" id="tm_show" value="Y" <? if($tm_show == "Y"){ echo "checked";}?> />노출
									<input type="radio" name="tm_show" id="tm_show" value="N" <? if($tm_show == "N"){ echo "checked";}?> />비노출
								</td>
							</tr>								
						</tbody>
					</table>
				</div>				
				<div class="btnWrap">
					<span class="btnRight">
						<button id="img_submit" class="btnSearch ">수정</button>
						<button id="img_cancel" class="btnSearch ">취소</button>
					</span>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
</body>
</html>
<script type="text/javascript">


	function img_del(image, idx, type)
	{
		if(!confirm("삭제하시겠습니까?")) return;

		$.ajax({
			type: "POST",
			url: "./proc/MULTI_proc.php",
			data: "mode=MULTI2_IMGDEL&tm_idx=" + idx + "&file=" + image + "&type=" + type,
			dataType: "text",
			success: function(msg) {

				if($.trim(msg) == "true") {
					alert("삭제되었습니다");
					window.location.reload();
					return false;
				}else{
					alert('삭제에 실패하였습니다.');
					return;
				}
			},
			error: function(xhr, status, error) { alert(error); }
		});
	}

	$(document).ready(function(){	
		size_guide();
		$('#img_cancel').click(function(){
				parent.modalclose();				
		});	
		
		$('#tm_type').change(function(){
			size_guide();
		});
		
		function size_guide(){
			var type = $("#tm_type option:selected").val();
			if (type == 'main') {
				$('#size_pc').text('(1398*600)');
				$('#size_m').text('(720*420)');
				$('#mobile_img').show();
			}else if (type == 'left') {
				$('#size_pc').text('(200*360)');
				$('#size_m').text('(720*180)');
				$('#mobile_img').show();
			}else{
				$('#size_pc').text('(360*200)');
				$('#mobile_img').hide();
			}
		}
		
		$('#img_submit').click(function(){
			/*
			if($('#tm_descrition').val() == '') {
				alert('소제목을 입력하세요');
				$('#tm_descrition').focus();
				return false;
			}		
			
			if($('#tm_title').val() == '') {
				alert('제목을 입력하세요');
				$('#tm_title').focus();
				return false;
			}	
			
			if($('#tm_content').val() == '') {
				alert('내용을 입력하세요');
				$('#tm_content').focus();
				return false;
			}
			*/
			
			$('#base_form').attr('action','./proc/multi_proc.php');
			$('#base_form').submit();
			return false;
		});					
	
	});
</script>