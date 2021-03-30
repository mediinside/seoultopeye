		<div class="cont-tit">
				<h3>자주하는 질문</h3>
			</div>
			<div class="s-inner">
				<div class="accordion">
					<?php include $GP -> INC_PATH . "/${skin_dir}/board_list_inc.php";	?>
				</div>
			</div>
			<!-- //end .s-inner -->
			</section>
		<!-- //end #container -->
				<!--div class="pagination">
                  <?=$page_link?>
				</div-->
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