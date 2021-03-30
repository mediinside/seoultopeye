<?php
include_once("../../../_init.php");
include_once($GP -> CLS."/class.multi.php");
$C_multi 	= new multi;

//error_reporting(E_ALL);
//@ini_set("display_errors", 1);


switch($_POST['mode']){	
    
    case 'TO_AUTO_CH':
        if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;
        
        $args = "";		
        $args['tmp_id'] = $tmp_id;
        $args['max_desc'] = $max_desc;
        $rst = $C_multi->TO_AUTO_CHAGE($args);
        
        echo "true";
        exit();
    break;	
	
	
	case 'MULTI_MODI':
		if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;
		
		include_once($GP->CLS."class.fileup.php");
			
		//메인페이지 이미지 업로드
		$file_orName			= "tm_img";
		$is_fileName			= $_FILES[$file_orName]['name'];
		$insertFileCheck	= false;
		if ($is_fileName) {
			$args_f = "";
			$args_f['forder'] 					= $GP -> UP_multi;
			$args_f['files'] 						= $_FILES[$file_orName];
			$args_f['max_file_size'] 		= 1024 * 5000;// 500kb 이하
			$args_f['able_file'] 				= array();

			$C_Fileup = new Fileup($args_f);
			$updata		= $C_Fileup -> fileUpload();

			if ($updata['error']) 
				$insertFileCheck = true;
			$image_main = $updata['new_file_name'];	//변경된 파일명
		}else{
			$image_main = $before_image_main;
		}
		
		if($insertFileCheck) {
			$C_Func->put_msg_and_modalclose($updata['error']);
		}

		//메인페이지 이미지 업로드
		$file_orName			= "tm_m_img";
		$is_fileName			= $_FILES[$file_orName]['name'];
		$insertFileCheck	= false;
		if ($is_fileName) {
			$args_f = "";
			$args_f['forder'] 					= $GP -> UP_multi;
			$args_f['files'] 						= $_FILES[$file_orName];
			$args_f['max_file_size'] 		= 1024 * 5000;// 500kb 이하
			$args_f['able_file'] 				= array();

			$C_Fileup = new Fileup($args_f);
			$updata		= $C_Fileup -> fileUpload();

			if ($updata['error']) 
				$insertFileCheck = true;
			$image_main_m = $updata['new_file_name'];	//변경된 파일명
		}else{
			$image_main_m = $before_image_main_m;
		}
		
		if($insertFileCheck) {
			$C_Func->put_msg_and_modalclose($updata['error']);
		}

		
		

		$args = "";		
		$args['tm_idx'] 					= $tm_idx;
		$args['tm_title'] 				= addslashes($tm_title);	
		$args['tm_type'] 				= $tm_type;	
		$args['tm_content1'] 			= $C_Func->enc_contents($tm_content1);
		$args['tm_content2'] 			= $C_Func->enc_contents($tm_content2);
		$args['tm_content3'] 			= $C_Func->enc_contents($tm_content3);
		$args['tm_content4'] 			= $C_Func->enc_contents($tm_content4);
		$args['tm_content5'] 			= $C_Func->enc_contents($tm_content5);
		$args['tm_content6'] 			= $C_Func->enc_contents($tm_content6);
		$args['tm_content7'] 			= $C_Func->enc_contents($tm_content7);
		$args['tm_content8'] 			= $C_Func->enc_contents($tm_content8);
		$args['tm_content9'] 			= $C_Func->enc_contents($tm_content9);
		$args['tm_content10'] 			= $C_Func->enc_contents($tm_content10);
		$args['tm_content11'] 			= $C_Func->enc_contents($tm_content11);
		$args['tm_content12'] 			= $C_Func->enc_contents($tm_content12);
		$args['tm_show'] 				= $tm_show;
		$args['tm_img'] 				= $image_main;
		$args['tm_m_img'] 				= $image_main_m;
		$args['tm_link'] 				= $tm_link;
		
		$rst = $C_multi -> multi_Modi($args);

		$C_Func->put_msg_and_modalclose("수정 되었습니다");		
		exit();
	break;


	case "MULTI_IMGDEL":
			if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;
			
			$args = "";
			$args['tm_idx'] = $tm_idx;
			$args['type'] = $type;
			$rst = $C_multi -> multi_ImgUpdate($args);
	
			@unlink($GP -> UP_multi . $file);
	
			echo "true";
			exit();
		break;


	case 'MULTI_DEL' :
		if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;		
		
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

	
	case 'MULTI_REG':
		if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;
		
		include_once($GP->CLS."class.fileup.php");
			
		//메인페이지 이미지 업로드
		$file_orName			= "tm_img";
		$is_fileName			= $_FILES[$file_orName]['name'];
		$insertFileCheck	= false;
		if ($is_fileName) {
			$args_f = "";
			$args_f['forder'] 					= $GP -> UP_multi;
			$args_f['files'] 						= $_FILES[$file_orName];
			$args_f['max_file_size'] 		= 1024 * 5000;// 500kb 이하
			$args_f['able_file'] 				= array();

			$C_Fileup = new Fileup($args_f);
			$updata		= $C_Fileup -> fileUpload();

			if ($updata['error']) 
				$insertFileCheck = true;
			$image_main = $updata['new_file_name'];	//변경된 파일명
		}else{
			$image_main = $before_image_main;
		}
		
		if($insertFileCheck) {
			$C_Func->put_msg_and_modalclose($updata['error']);
		}

		//메인페이지 이미지 업로드
		$file_orName			= "tm_m_img";
		$is_fileName			= $_FILES[$file_orName]['name'];
		$insertFileCheck	= false;
		if ($is_fileName) {
			$args_f = "";
			$args_f['forder'] 					= $GP -> UP_multi;
			$args_f['files'] 						= $_FILES[$file_orName];
			$args_f['max_file_size'] 		= 1024 * 5000;// 500kb 이하
			$args_f['able_file'] 				= array();

			$C_Fileup = new Fileup($args_f);
			$updata		= $C_Fileup -> fileUpload();

			if ($updata['error']) 
				$insertFileCheck = true;
			$image_main_m = $updata['new_file_name'];	//변경된 파일명
		}else{
			$image_main_m = $before_image_main_m;
		}
		
		if($insertFileCheck) {
			$C_Func->put_msg_and_modalclose($updata['error']);
		}

		
		$args = "";
		$args['tm_menu'] 				= $tm_menu;
		$args['tm_type'] 				= $tm_type;
		$args['tm_title'] 				= addslashes($tm_title);		
		$args['tm_content1'] 			= $C_Func->enc_contents($tm_content1);
		$args['tm_content2'] 			= $C_Func->enc_contents($tm_content2);
		$args['tm_content3'] 			= $C_Func->enc_contents($tm_content3);
		$args['tm_content4'] 			= $C_Func->enc_contents($tm_content4);
		$args['tm_content5'] 			= $C_Func->enc_contents($tm_content5);
		$args['tm_content6'] 			= $C_Func->enc_contents($tm_content6);
		$args['tm_content7'] 			= $C_Func->enc_contents($tm_content7);
		$args['tm_content8'] 			= $C_Func->enc_contents($tm_content8);
		$args['tm_content9'] 			= $C_Func->enc_contents($tm_content9);
		$args['tm_content10'] 			= $C_Func->enc_contents($tm_content10);
		$args['tm_content11'] 			= $C_Func->enc_contents($tm_content11);
		$args['tm_content12'] 			= $C_Func->enc_contents($tm_content12);
		$args['tm_img'] 				= $image_main;
		$args['tm_m_img'] 				= $image_main_m;
		$args['tm_link'] 				= $tm_link;
		$args['tm_show'] 				= $tm_show;
		

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