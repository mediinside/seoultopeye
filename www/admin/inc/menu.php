<?php
// Dedc : admin 메뉴 Array
// Writer :
$GP -> MENU_ADMIN = array(
		array("tab"=>"1",			"folder"=>"main", 			"name"=>"관리자정보",			"link"=> "/admin/main/adm_info.php?m_tab=1"),
		array("tab"=>"2",			"folder"=>"bbs", 			"name"=>"게시판관리",			"link"=> "/admin/bbs/bbs_list.php?m_tab=2"),
		array("tab"=>"3",			"folder"=>"phone", 		"name"=>"간편예약관리",			"link"=> "/admin/phone/phone_list.php?m_tab=3"),
       // array("tab"=>"3",			"folder"=>"member", 		"name"=>"회원관리",			"link"=> "/admin/member/mem_list.php?m_tab=3"),	        
		array("tab"=>"4",			"folder"=>"slide", 			"name"=>"슬라이드관리",		"link"=> "/admin/slide/slide_list.php?m_tab=4"),
		//array("tab"=>"14",			"folder"=>"online", 			"name"=>"예약관리",			"link"=> "/admin/online/reserve_list.php?m_tab=14"),		
		array("tab"=>"14",			"folder"=>"popup", 		"name"=>"팝업관리",			"link"=> "/admin/popup/popup_list.php?m_tab=14"),
		//array("tab"=>"12",			"folder"=>"sms", 			"name"=>"SMS관리",			"link"=> "/admin/sms/sms_send.php?m_tab=12"),
		// array("tab"=>"15",			"folder"=>"analytics", 		"name"=>"통계관리",			"link"=> "/admin/analytics/day_visit.php?m_tab=15"),
		// array("tab"=>"14",			"folder"=>"mms", 			"name"=>"MMS관리",			"link"=> "/admin/mms/mms_send_list.php?m_tab=14"),
);


$GP -> MENU_SUB_ADMIN = array();

$GP -> MENU_SUB_ADMIN['main'] = array(
	"시스템관리"   => array(
		array("tab"=>"1",		"title"=>"main1",		"name"=>"관리자 정보",		"link"=>  "/admin/main/adm_info.php"),
		array("tab"=>"2",		"title"=>"main2",		"name"=>"권한 정보",			"link"=>  "/admin/main/adm_auth.php"),
	)
);

$GP -> MENU_SUB_ADMIN['bbs'] = array(
	"게시판관리"   => array(
		array("tab"=>"1",		"title"=>"bbs1",		"name"=>"게시판 리스트",				"link"=>  "/admin/bbs/bbs_list.php"),
		// array("tab"=>"2",		"title"=>"bbs2",		"name"=>"입사지원 리스트",			"link"=>  "/admin/bbs/recruit_list.php"),
		// array("tab"=>"3",		"title"=>"bbs3",		"name"=>"입사지원 마감 리스트",	"link"=>  "/admin/bbs/recruit_end_list.php"),
	)
);

$GP -> MENU_SUB_ADMIN['doctor'] = array(
	"의료진관리"   => array(
        array("tab"=>"1",	"title"=>"doctor1", "name"=>"의료진 정보",			"link"=>  "/admin/doctor/dr_list.php"),   
	)
);


$GP -> MENU_SUB_ADMIN['clinic'] = array(
	"진료과관리"   => array(
		array("tab"=>"1",	"title"=>"clinic1", "name"=>"진료과 정보",			"link"=>  "/admin/clinic/dr_menu_list.php"),
	)
);

$GP -> MENU_SUB_ADMIN['member'] = array(
	"회원관리"   => array(
		array("tab"=>"1",	"title"=>"member1",		"name"=>"회원 리스트",				"link"=>  "/admin/member/mem_list.php"),
		array("tab"=>"2",	"title"=>"member2",		"name"=>"탈퇴회원 리스트",				"link"=>  "/admin/member/mem_out_list.php"),
		//array("tab"=>"3",	"title"=>"member3",	"name"=>"휴먼계정 발송전 리스트",				"link"=>  "/admin/member/mem_hu_list.php"),
		//array("tab"=>"4",	"title"=>"member4",	"name"=>"휴먼계정 발송후 리스트",				"link"=>  "/admin/member/mem_hu_end_list.php"),

	)
);

$GP -> MENU_SUB_ADMIN['treat'] = array(
	"치료법관리"   => array(
		array("tab"=>"1",	"title"=>"treat1",		"name"=>"치료법 정보",			"link"=>  "/admin/treat/treat_list.php"),
		array("tab"=>"2",	"title"=>"trea2",		"name"=>"치료법 노출여부",	"link"=>  "/admin/treat/treat_show_list.php"),
	)
);

$GP -> MENU_SUB_ADMIN['nonpay'] = array(
	"비급여관리"   => array(
	  array("tab"=>"1",		"title"=>"nonpay1",		"name"=>"비급여 리스트",			"link"=>  "/admin/nonpay/nonpay_list.php"),		
	)
);

$GP -> MENU_SUB_ADMIN['tag'] = array(
	"태그관리"   => array(
		array("tab"=>"1",	"title"=>"tag1",		"name"=>"태그 정보",			"link"=>  "/admin/tag/tag_list.php"),
	)
);

$GP -> MENU_SUB_ADMIN['slide'] = array(
	"슬라이드관리"   => array(
        array("tab"=>"1",	"title"=>"slide1",		"name"=>"메인 슬라이드",			"link"=>  "/admin/slide/slide_list.php?ts_type=C"),     
        array("tab"=>"2",	"title"=>"slide2",		"name"=>"시설안내",			"link"=>  "/admin/slide/slide_list.php?ts_type=A"),
	)
);

$GP -> MENU_SUB_ADMIN['online'] = array(
	"예약관리"   => array(		
		array("tab"=>"1",	"title"=>"online1",		"name"=>"예약 리스트",				"link"=>  "/admin/online/reserve_list.php"),
		array("tab"=>"2",	"title"=>"online2",		"name"=>"기본 일정",				"link"=>  "/admin/online/m_sch_list.php"),
		array("tab"=>"3",	"title"=>"online3",		"name"=>"개인 일정",				"link"=>  "/admin/online/d_sch_list.php"),
		array("tab"=>"4",	"title"=>"online4",		"name"=>"공통휴무",			"link"=>  "/admin/online/holiday_list.php"),
		// array("tab"=>"5",	"title"=>"online5",		"name"=>"이전 예약 리스트",			"link"=>  "/admin/online/reserve_list_old.php"),
	)
);

$GP -> MENU_SUB_ADMIN['phone'] = array(
	"이용문의관리"   => array(
		array("tab"=>"1",	"title"=>"phone1",	"name"=>"간편예약신청정보",			"link"=>  "/admin/phone/phone_list.php"),
	)
);

$GP -> MENU_SUB_ADMIN['popup'] = array(
	"팝업관리"   => array(
		array("tab"=>"1",	"title"=>"popup1",		"name"=>"팝업 리스트",				"link"=>  "/admin/popup/popup_list.php"),
	)
);

$GP -> MENU_SUB_ADMIN['sms'] = array(
	"SMS관리"   => array(
		array("tab"=>"1",	"title"=>"sms1",	"name"=>"SMS 발송",					"link"=>  "/admin/sms/sms_send.php"),										 
		array("tab"=>"2",	"title"=>"sms2",	"name"=>"SMS 설정",					"link"=>  "/admin/sms/sms_setup.php"),		
		array("tab"=>"3",	"title"=>"sms3",	"name"=>"SMS 발송리스트",		"link"=>  "/admin/sms/sms_send_list.php"),
		array("tab"=>"4",	"title"=>"sms4",	"name"=>"SMS 그룹관리",			"link"=>  "/admin/sms/sms_grouplist.php"),
		array("tab"=>"5",	"title"=>"sms5",	"name"=>"SMS 회원관리",			"link"=>  "/admin/sms/sms_memlist.php"),
	)
);
$GP -> MENU_SUB_ADMIN['mms'] = array(
	"MMS관리"   => array(
		array("tab"=>"1",	"title"=>"mms1",	"name"=>"MMS 발송리스트",		"link"=>  "/admin/mms/mms_send_list.php"),
	)
);

$GP -> MENU_SUB_ADMIN['analytics'] = array(
	"통계관리"   => array(	
		array("tab"=>"1",	"title"=>"analytics1",	"name"=>"일별 통계",				"link"=>  "/admin/analytics/day_visit.php"),
		array("tab"=>"2",	"title"=>"analytics2",	"name"=>"월별 통계",				"link"=>  "/admin/analytics/month_visit.php"),
		array("tab"=>"3",	"title"=>"analytics3",	"name"=>"년별 통계",				"link"=>  "/admin/analytics/year_visit.php"),		
		array("tab"=>"4",	"title"=>"analytics4",	"name"=>"Agent 통계",				"link"=>  "/admin/analytics/Agent.php"),
		array("tab"=>"5",	"title"=>"analytics5",	"name"=>"기타 통계",				"link"=>  "/admin/analytics/OS.php"),
	)
);


?>