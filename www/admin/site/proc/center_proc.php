<?php
include_once("../../../_init.php");
include_once($GP -> CLS."/class.multi.php");
$C_multi 	= new multi;

//error_reporting(E_ALL);
//@ini_set("display_errors", 1);


switch($_POST['mode']){	
	
	
	case 'multi_MODI':
		if (itm_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;
		
				
		$args = "";
        $args['tm_idx'] 					= $tm_idx;
        $args['tm_year'] 		        = addslashes($tm_year);
        $args['tm_content1'] 			= $C_Func->enc_contents($tm_content1);	
        $args['tm_content2'] 			= $C_Func->enc_contents($tm_content2);
        $args['tm_content3'] 			= $C_Func->enc_contents($tm_content3);
        $args['tm_content4'] 			= $C_Func->enc_contents($tm_content4);
        $args['tm_content5'] 			= $C_Func->enc_contents($tm_content5);
        $args['tm_content6'] 			= $C_Func->enc_contents($tm_content6);
        $args['tm_content7'] 			= $C_Func->enc_contents($tm_content7);
		$args['tm_show'] 				= $tm_show;
		$args['tm_type']					= $tm_type;

		$rst = $C_multi -> multi_Modi($args);

		$C_Func->put_msg_and_modalclose("수정 되었습니다");		
		exit();
	break;


	
	case 'multi_DEL' :
		if (itm_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;		
		
		$args = "";
		$args['tm_idx'] 	= $tm_idx;
		$result = $C_multi ->multi_Info($args);
		
		if($result) {			
			$tm_img = $result['tm_img'];
			$tm_m_img = $result['tm_m_img'];
			
			if($tm_img != '') {			
				@unlink($GP -> UP_multi.$tm_img);
			}					
			
			if($tm_m_img != '') {			
				@unlink($GP -> UP_multi.$tm_m_img);
			}
			$rst = $C_multi -> multi_Del($args);
		}		
		echo "true";
		exit();
	
	break;

	
	case 'multi_REG':
		if (itm_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;		

		
		$args = "";
        $args['tm_year'] 		= addslashes($tm_year);
        $args['tm_content1'] 		= $C_Func->enc_contents($tm_content1);
        $args['tm_content2'] 		= $C_Func->enc_contents($tm_content2);
        $args['tm_content3'] 		= $C_Func->enc_contents($tm_content3);
        $args['tm_content4'] 		= $C_Func->enc_contents($tm_content4);
        $args['tm_content5'] 		= $C_Func->enc_contents($tm_content5);
        $args['tm_content6'] 		= $C_Func->enc_contents($tm_content6);
        $args['tm_content7'] 		= $C_Func->enc_contents($tm_content7);
        $args['tm_show'] 		= addslashes($tm_show);		
		$args['tm_type']			= $tm_type;

		$rst = $C_multi -> multi_Reg($args);

		if($rst) {
			$C_Func->put_msg_and_modalclose("등록 되었습니다");
		}else{
			$C_Func->put_msg_and_modalclose("등록에 실패하였습니다");
		}
		exit();
	break;
	
}
?>