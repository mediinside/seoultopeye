
<div class="sub-visual-wrap">
					<img src="/resource/images/notice-bnnr1.png" alt="">
				</div>
				<!-- //end .sub-visual-wrap -->
			</section>
			<!-- main section 01 end -->
			<!-- main section 02 start -->
			<section class="contents sub-contents">
				<div class="board-list view wd-1200">
					<h3 class="sub-tit"></h3>
					<table>
						<thead>
							<tr>
								<th class="text-left">
									<span class="view-tit"><?=$jb_title?></span>
									<span class="date">작성일 <?=$jb_reg_date?></span>
									<span class="view">조회수 <?=$jb_see?></span>
									</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="view-box">
									<?=$content?>
									</div>
								</td>
							</tr>											
								<?php								
									if($file_cnt > 0) {
										for($i=0; $i<$file_cnt; $i++)	{
											if($ex_jb_file_name[$i]) {
												//파일의 확장자
												$file_ext = substr( strrchr($ex_jb_file_name[$i], "."),1); 
												$file_ext = strtolower($file_ext);	//확장자를 소문자로...
												
												/*if ($file_ext=="gif" || $file_ext=="jpg" || $file_ext=="png" || $file_ext=="bmp") {	
																			
												echo "<a  class='file'  href='" . $GP->UP_IMG_SMARTEDITOR_URL ."jb_${jb_code}/${ex_jb_file_code[$i]}' target='_blank'>";
												echo "<img src=\"" . $GP->UP_IMG_SMARTEDITOR_URL ."jb_" . $jb_code . "/" . $ex_jb_file_code[$i] ."\" class='imgResponsive'>";
												echo "</a>";
											}
                                            else{*/
                                                // echo "<tr><td><a  class='file'  href='" . $GP->UP_IMG_SMARTEDITOR_URL ."jb_${jb_code}/${ex_jb_file_code[$i]}' target='_blank'>";
                                                // echo "<img src=\"" . $GP->UP_IMG_SMARTEDITOR_URL ."jb_" . $jb_code . "/" . $ex_jb_file_code[$i] ."\" class='imgResponsive'>";
                                                // echo "</a></td></tr>";
                                                if($jb_idx > "1675"){
                                                    $code_file = $GP->UP_IMG_SMARTEDITOR. "jb_${jb_code}/${ex_jb_file_code[$i]}";
                                                }
                                                else{
                                                    $code_file = $GP->UP_IMG_SMARTEDITOR. "board/${ex_jb_file_code[$i]}";
                                                }
                                               
												
												echo "<tr><td><p><img src='/resource/images/down-02.png' alt=''>&nbsp;<a class='file' href=\"/bbs/download.php?downview=1&file=" . $code_file . "&name=" . $ex_jb_file_name[$i] . " \">$ex_jb_file_name[$i]</a></p></td></tr>";

											//}
											}	 
										}
									}
								?>
									<!--a class="file" href="#">첨부파일.pdf</a-->
								
						</tbody>
					</table>
                    <table class="bottom-list">
						<style>
							.bottom-list tbody th,
							.bottom-list tbody td {padding:15px !important;}
							.bottom-list tbody a.link {overflow:hidden;display:block !important;text-overflow: ellipsis;white-space: nowrap;}
							.bottom-list tbody a.link:hover {color:#65bb00;text-decoration:underline;}
						</style>
						<colgroup>
							<col style="width:160px;">
							<col>
						</colgroup>
						<tbody>
							<tr>
								<? if($be_idx != '') { ?>
								<th class="bg-gray text-center">
									<span class="prev">이전 게시물</span>			
								</th>
								<td>
									<a class="link" href="<?=$get_par1?>"><?=$be_content?></a>
								</td>
								<? } ?>	
							</tr>
							<tr>
								<? if($af_idx != '') { ?>	
								<th class="bg-gray text-center">
									<span class="prev">다음 게시물</span>		
								</th>
								<td>
									<a class="link" href="<?=$get_par2?>"><?=$af_content?></a>
								</td>
								<? } ?>	
							</tr>
						</tbody>
					</table>
					<div class="btn-box right m-top">
                    <?                    
						//답변권한                            
						if($check_level >= $db_config_data['jba_reply_level']){                       
                        	$onclick4 = "onclick=\"javascript:location.href='${get_par}&jb_mode=treply'\"";
                        ?>
                            <a href='#none' <?=$onclick4?> class='btn bg-red'>답글</a>
                        <?
						}	
						?>
                    <?     
                      
                    // if($check_level >= 9 )
                    echo "<a style=\"float:left; margin-left:10px;\" href=\"#\" class=\"btn bg-blue\"  onclick=\"javascript:location.href='${get_par}&jb_mode=tdelete&jb_mode=tmodify'\"class=\"btntype modify\" title='수정'>수정</a>"; 
                    //삭제권한(쓰기권한이 있어야 삭제 가능)
                    // if($check_level >= 9 )
                    echo "<a style=\"float:left; margin-left:10px;\" href=\"#\"  class=\"btn bg-red\" onclick=\"javascript:location.href='${get_par}&jb_mode=tdelete'\" class=\"btntype modify\" title='삭제'>삭제</a>"; 
                  
					//글목록버튼
					echo "<a href=\"#\" onclick=\"javascript:location.href='${index_page}?jb_code=${jb_code}&${search_key}&search_keyword=${search_keyword}&page=${page}'\" class=\"btn bg-green\" title='목록'>목록</a>";	
					?>
					</div>				
                    
                    
							
							
 