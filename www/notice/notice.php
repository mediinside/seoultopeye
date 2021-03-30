<?php
include_once  '../_init.php';
include_once $GP -> INC_WWW . '/count_inc.php';


include_once "../inc/head.php";

$index_page = "notice.php";
$query_page = "query.php";

$jb_code = $_GET["jb_code"];

if($jb_code == "10"){$title = "공지사항";}
elseif ($jb_code == "20") {$title = "온라인상담";}
elseif ($jb_code == "30") {$title = "수술후기";}


?>
<style>
	@media screen and (max-width:600px){
		.s-inner {padding:0;}
		.list colgroup {display:none;}
		.list thead {display:none;}
		.list tr {display:flex;flex-wrap:wrap;}
		.list td:first-of-type {display:none;}
		.list td:nth-of-type(2) {display:block;flex-shrink: 0;width:100%;padding-bottom:0 !important;text-align:left !important;box-sizing:border-box;}
		.list td:nth-of-type(2) a {overflow: hidden;display:block;font-size:16px !important;font-weight:500;text-overflow: ellipsis;}
		.list td:nth-of-type(3) {max-width:50%;margin-right:auto;padding-top:5px;text-align:left !important;box-sizing:border-box;}
		.list td:nth-of-type(3):before {content:'작성자: ';}
		.list td:last-of-type {max-width:50%;padding-top:5px;text-align:left !important;box-sizing:border-box;}
		/* td:last-of-type:before {content:'날짜: ';} */
	}
</style>
<body>
    <div id="wrap">
        <?php include_once "../inc/header.php"?>
        <div id="container">
            <div id="sub-bnnr" data-index="1">
                <?php include_once "location.php"?>
            </div>
            <div class="contents" style="padding-bottom:0;">
                <h3 class="page-tit">
                   <?=$title?>
                    <i></i>
                </h3>
            </div>
			<div class="contents">
				<div class="sub-inner">
					<!-- 게시판 영역 -->
					<?php include $GP -> INC_PATH ."/board_inc.php"; ?>   
				</div>
			</div>
        </div>
        <?php include_once "../inc/footer.php"?>
    </div>
</body>

</html>