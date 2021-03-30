
<script type="text/javascript" src="<?=$GP -> JS_SMART_PATH?>/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript" src="/resource/js/jquery.base64.js"></script>
<form name="frm_Board" id="frm_Board" action="<?=$get_par;?>" method="post" enctype="multipart/form-data">
<input type="hidden" class="chk" value="Y" id="jb_secret_check" name="jb_secret_check" />
<div class="contents sub-contents">
	<div class="board-list wd-1200">
		<!-- <div class="sub-tit">
			<h3>문의 게시판</h3>
		</div> -->

		<div class="tbl-type3">
			<!-- <div class="txtR"><span>*</span> 필수입력</div> -->
				<table>
					<colgroup>
						<col width="20%">
						<col width="">
					</colgroup>
					<caption>게시물 작성</caption>
					<tbody>
						<tr>
						<th scope="row" class="bg-gray">제목</th>
						<td><input type="text" class="i-input" title="제목 입력" placeholder="제목을 입력해 주세요." id="jb_title" name="jb_title" /></td>
						</tr>
						<tr>
						<th scope="row" class="bg-gray">작성자</th>
						<td><input type="text" class="i-input" title="작성자 입력" placeholder="작성자를 입력해 주세요."id="jb_name" name="jb_name" value="<?=$check_name?>" /></td>
						</tr>
						<!-- <tr>
						<th scope="row">이메일</th>
						<td><input type="text" class="i-input" title="이메일 입력" placeholder="이메일을 입력해 주세요." id="jb_email" name="jb_email" value="<?=$_SESSION['suseremail']?>" /></td>
						</tr> -->
						<?php
						//회원일 경우 비밀번호를 입력할 필요가 없다.
						if(empty($check_id)) {
						?>
						<tr>
						<th scope="row" class="bg-gray">비밀번호</th>
						<td><input type="text" class="i-input" title="비밀번호 입력" placeholder="비밀번호를 입력해 주세요." id="jb_password" name="jb_password" /></td>
						</tr>
						<?php
						} else {
						$password_key=md5($check_id);	
						$tm=explode(" ",microtime());
						$jb_password=$password_key . $tm[1];
						echo ("<input type=\"hidden\" name=\"jb_password\" value=\"${jb_password}\">");
						}
						?>
						<!-- <tr>
						<th scope="row">공개여부</th>
						<td>
							<label><input type="checkbox" class="chk" value="Y" id="jb_secret_check" name="jb_secret_check" /> 비밀글</label>
							<?
							if(isset($check_id) && $check_level>=9){
							echo "<label class='noti'><input type=\"checkbox\" value=\"Y\" id=\"jb_notice_check\" name=\"jb_notice_check\" class='chk'>공지</label>";
							}
							?>
						</td>
						</tr> -->
						<!-- <tr>
						<th scope="row">첨부파일</th>
						<td class="files">
						<?php
										//첨부파일의 숫자는 $i의 범위로 조정하면 된다.
										for($i=0; $i<1; $i++) {
										?>
										<span class="inputFile">
							<input type="text" class="txt" placeholder="첨부파일" readonly />
							<span class="fileBtn">
								<input type="file" title="파일선택" name="jb_file[]" />
								<span class="btnT btnFile">파일선택</span>
							</span>
							</span>
										<? } ?>
						</td>
						</tr> -->
						<tr>
						<th scope="row" class="bg-gray">본문</th>
						<td>
							<textarea name="jb_content" id="jb_content" style="display:none"></textarea>
							<textarea name="ir1" id="ir1" style="width:100%; height:300px; min-width:280px; display:none;"></textarea>
						</td>
						</tr>      
						<!--<tr>
						<th scope="row">링크</th>
						<td><input type="text" class="i-input" title="링크 입력" placeholder="링크" id="jb_homepage" name="jb_homepage" /></td>
						</tr>
						<tr>
						<th scope="row">자동입력방지</th>
						<td>
							<strong class="mobTh">자동입력방지</strong>
							<img src="<?=$GP -> IMG_PATH?>/zmSpamFree/zmSpamFree.php?zsfimg=<?php echo time();?>" id="zsfImg" alt="아래 새로고침을 클릭해 주세요." style="vertical-align:middle;" />
							<input type="text" class="txt" title="자동입력방지 숫자 입력" style="width:60px;" name="zsfCode" id="zsfCode" />
							<a href="#;" class="btnT btnReplace" onclick="document.getElementById('zsfImg').src='<?=$GP -> IMG_PATH?>/zmSpamFree/zmSpamFree.php?re&zsfimg=' + new Date().getTime(); return false;">새로고침</a>
						</td>
						</tr> -->
					</tbody>
				</table>  
			<div class="btn-box right m-top ">
				<a href="javascript:history.go(-1);" class="btn bg-blue"><span>취소/뒤로</span></a>
				<a href="#" id="img_submit" class="btn bg-green"><span>작성완료</span></a>
			</div>

		</div>
	</div>
</div>

  <!-- <div class="btnWrap">
    <a href="#;" id="img_submit" class="btnM btnConfirm">글쓰기</a>
    <a href="javascript:history.go(-1);" class="btnM btnCancel">취소</a>
  </div> -->
  <input type="hidden" name="jb_bruse_check" value="Y" checked>
  <input type="hidden" name="img_full_name" id="img_full_name" />
  <input type="hidden" name="upfolder" id="upfolder" value="jb_<?=$jb_code?>" />
</form>
<script type="text/javascript">
	var oEditors = [];
	nhn.husky.EZCreator.createInIFrame({
		oAppRef: oEditors,
		elPlaceHolder: "ir1",
		sSkinURI: "/bbs/smarteditor/SmartEditor2Skin.html",
		htParams : {
			bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
			bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
			bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
			//aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
			fOnBeforeUnload : function(){
				//alert("완료!");
			}
		}, //boolean
		fOnAppLoad : function(){
			//예제 코드
			//oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
		},
		fCreator: "createSEditor2"
	});

	$('#img_submit').click(function(){
		
		if($('#jb_title').val() == '')	{
			alert('제목을 입력하세요');
			$('#jb_title').focus();
			return false;
		}		
        
		
		if($('#jb_name').val() == '')	{
			alert('이름을 입력하세요');
			$('#jb_name').focus();
			return false;
		}        
		/*
		if($('#jb_password').val() == '')	{
			alert('비밀번호를 입력하세요');
			$('#jb_password').focus();
			return false;
		}
		
		if($('#jb_email').val() == '' || !CheckEmail($('#jb_email').val()))	{
			alert('이메일을 정확히 입력하세요');
			$('#jb_email').focus();
			return false;
		}*/
	
		oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
	
		var con	= $('#ir1').val();
		
		
		$('#jb_content').val(con);	       


		if($('#jb_content').val() == '' || $('#jb_content').val() == '<br> ')
		{
			alert('내용을 입력하세요');
			return false;
		}	
        
		var t = $.base64Encode($('#ir1').val());		
		$('#jb_content').val(t);
		
			
		if($('#zsfCode').val() == '')	{
			alert('자동방지 입력키를 입력하세요');
			$('#zsfCode').focus();
			return false;
		}		
		

		$('#frm_Board').submit();
		return false;
		
	});
	

	function CheckEmail(str)
	{
		 var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
		 if (filter.test(str)) { return true; }
		 else { return false; }
	}

	function insertIMG(filename){
		var tname = document.getElementById('img_full_name').value;

		if(tname != "")
		{
			document.getElementById('img_full_name').value = tname + "," + filename;
		}
		else
		{
			document.getElementById('img_full_name').value = filename;
		}
	}
</script>
