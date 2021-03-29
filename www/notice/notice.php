<?php include_once "../inc/head.php"?>
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
                    제목이 들어갑니다.(공지사항/온라인상담/수술후기)
                    <i></i>
                </h3>
            </div>
			<div class="contents">
				<div class="sub-inner">
					<!-- 게시판 영역 -->
				</div>
			</div>
        </div>
        <?php include_once "../inc/footer.php"?>
    </div>
</body>

</html>