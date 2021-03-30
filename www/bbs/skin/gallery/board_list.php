            
            <?
            if($jb_code == "20" ){$title = "센터 소식";}              
            elseif($jb_code == "50" || $jb_code == "60"){$title = "자료실";}      
            ?>
            <div class="cont-tit">
                <h3><?=$title?></h3>
            </div>	
            <?
                if($jb_code == "50"){$class2 = "class='active'";
                    
            ?> 
			<div class="tabMenu s-inner">
				<p class="mo-show"><a href="#none"></a></p>
				<ul>
					<li><a href="/notice/notice.php?jb_code=40">문서자료</a></li>
					<li class="active"><a href="/notice/notice.php?jb_code=50">영상자료</a></li>
                    <li><a href="/notice/notice.php?jb_code=60">서식자료</a></li>
				</ul>
			</div>
            <?}?>	

			<div id="sub-notice" style="margin-top: 60px;">
                <div class="search">
                    <form id="search_form" name="search_form" method="get" action="?">
                        <input type="hidden" name="jb_code" id="jb_code" value="<?=$jb_code?>" />
                        <input type="hidden" name="search_key" id="search_key" value="jb_all" /> 					
                        <input type="text" placeholder="검색어를 입력하세요." name="search_keyword" id="search_keyword" value="<?=$_GET['search_keyword']?>">
                        <button><img src="/resource/images/search-gray.png" alt="검색" id="search_submit" ></button>
                    </form>
                </div>

                <div class="s-inner" style="margin-top: -60px;">
					<div id="main-center-list">
						<ul>
							<?php include $GP -> INC_PATH . "/${skin_dir}/board_list_inc.php";	?>
                         </ul>
					</div>
					<!-- //end #main-center-list -->
                    <div id="btn-box" class="right">
					<?php
                        if($_GET['search_key'] && $_GET['search_keyword']) {
                            echo "<a href=\"javascript:;\" class=\"btn0\" onclick=\"javascript:location.href='${index_page}?jb_code=${jb_code}'\" title='목록'><span>목록</span></a>";
                        }       
                        //쓰기권한
                        if($check_level >= $db_config_data['jba_write_level']) {
                            echo "<a class='btn bg-green' href=\"#\" onclick=\"javascript:location.href='${index_page}?jb_code=${jb_code}&jb_mode=twrite'\" title='글쓰기'><span>글쓰기</span></a>";
                        } else {
                        //	echo "<a class='btn btn_middle' id='twrite_btn' title='글쓰기'><strong>글쓰기</strong></a>";
                        }
                    ?>     
                                </div>
                    <div class="pagination">
                      <?=$page_link?>
                    </div>
                </div>
            </section>
        </div>
					<script type="text/javascript">
					$(document).ready(function(){
						$('#search_submit').click(function(){
							$('#search_form').submit();
							return false;
						});

						$('#page_row').change(function(){
							var val = $(this).val();
							location.href="?dep1=<?=$_GET['dep1']?>&dep2=<?=$_GET['dep2']?>&search_key=<?=$_GET['search_key']?>&search_keyword=<?=$_GET['search_keyword']?>&page=<?=$_GET['page']?>&page_row=" + val;
						});

						$('#twrite_btn').click(function(){
							alert("로그인 후 이용가능 합니다.");
							location.href ='/member/login.html?reurl=/community/page03.html';
						});
					});
					</script>