<?php
	include_once("../../../_init.php");
	include_once $GP -> CLS . 'class.online.php';
	$C_Online = new Online();

	switch($_POST['mode']){		
		
		//전화 상담 삭제
		case "Phone_DEL":
			if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;				
			
			$args = "";
			$args['tfc_idx'] = $tfc_idx;
			$rst = $C_Online -> Phone_Consel_Del($args);
			
			echo "true";
			exit();
		break;
		
		//전화 상담 처리
		case "Phone_MODI":
			if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;				
			
			include $GP -> INC_PATH . "/xssFilter/HTML/Safe.php"; // xss filter을 include
			
			$arg = "";
			$args['tfc_idx'] 				= $tfc_idx;
			$args['tfc_result'] 			= $tfc_result;
			$args['tfc_rt_date'] 		= $tfc_rt_date;		
			
			$safe = new HTML_Safe; // xss filter 객체 생성
			$input = base64_decode($tfc_result_con); 
			$output = $safe->parse($input); // html 태그를 필터링 하여 $output에 대입			
			$tfc_result_con = $C_Func->enc_contents($output);			
			$args['tfc_result_con'] = $tfc_result_con;
			$rst = $C_Online -> Phone_Consel_Result($args);		

			$C_Func->put_msg_and_modalclose("처리 되었습니다");		
			exit();
		break;

		case "PS_REG":
			if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;	
      
		//	include $GP -> INC_PATH .'/zmSpamFree/zmSpamFree.php';
			include $GP -> INC_PATH . "/xssFilter/HTML/Safe.php"; // xss filter을 include
			
			//스팸방지
		//	if ( !zsfCheck( $_POST['zsfCode'] ) ) {
		//		$C_Func->put_msg_and_back("스팸차단코드가 틀렸습니다.");
		//		die;	
		//	}    

			$now_date = date('Y-m-d H:i:s');
            // $tfc_mobile =  $mb_mobile1 . "-" . $mb_mobile2 . "-" . $mb_mobile3;

			$args = '';
			if ($tfc_type == '') {
				$tfc_type = 'A';
			}
			$args['tfc_type']		= $tfc_type;
			$args['mb_code']		= $_SESSION['susercode'];
			$args['tfc_name']		= $tfc_name;
			$args['tfc_con']		= $tfc_con;
			$args['tfc_mobile']		= $tfc_mobile;
			$rst1 = $C_Online -> Phone_Chk_List($args);

			if($rst1) {
				$check_date = $rst1['tfc_regdate'];
				$time_go =  $C_Func->datetimediff($check_date, null, "min");

				if($time_go < 30) {
				  $C_Func->put_msg_and_back("상담 요청을 하신지 30분이 지나지 않았습니다. 기다려주시거나 30분후에 재문의 해주세요");
				  exit();
				}
			}

			$rst = $C_Online -> Phone_Counsel_Reg($args); 

			if($rst) {?>
			
			<?

            $mobile_agent = "/(iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)/";

            if(preg_match($mobile_agent, $_SERVER['HTTP_USER_AGENT'])){
                echo "
                    <!-- WIDERPLANET PURCHASE SCRIPT START 2021.3.18 -->
                    <div id='wp_tg_cts' style='display:none;'></div>
                    <script type='text/javascript'>
                    var wptg_tagscript_vars = wptg_tagscript_vars || [];
                    wptg_tagscript_vars.push(
                    (function() {
                        return {
                            wp_hcuid:'',  		     /*고객넘버 등 Unique ID (ex. 로그인  ID, 고객넘버 등 )를 암호화하여 대입.
                                            *주의 : 로그인 하지 않은 사용자는 어떠한 값도 대입하지 않습니다.*/
                            ti:'51444',            	     /*광고주 코드 */
                            ty:'PurchaseComplete',       /*트래킹태그 타입 */
                            device:'mobile',             /*디바이스 종류  (web 또는  mobile)*/
                            items:[{i:'간편신청 ',         /*전환 식별 코드  (한글 , 영어 , 번호 , 공백 허용 )*/
                                t:'간편신청 ',         /*전환명  (한글 , 영어 , 번호 , 공백 허용 )*/
                                p:'1',		     /*전환가격  (전환 가격이 없을경우 1로 설정 )*/
                                q:'1'		     /*전환수량  (전환 수량이 고정적으로 1개 이하일 경우 1로 설정 )*/
                            }]
                        };
                    }));
                    </script>
                    <script type='text/javascript' src='//cdn-aitg.widerplanet.com/js/wp_astg_4.0.js'></script>
                    <!-- // WIDERPLANET PURCHASE SCRIPT END 2021.3.18 -->
                    <!-- 전환페이지 설정 -->
                    <script type='text/javascript' src='//wcs.naver.net/wcslog.js'></script> 
                    <script type='text/javascript'> 
                    var _nasa={};
                    if(window.wcs) _nasa['cnv'] = wcs.cnv('3','1'); 
                    </script> 
                    
                    <!-- AceCounter Mobile WebSite Gathering Script V.8.0.2019080601 -->
                    <script language='javascript'>
                        var _AceGID=(function(){var Inf=['gnmajor.com','m.gnmajor.com,www.gnmajor.com,gnmajor.com','AX2A85101','AM','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;if(_CI.join('.').indexOf(Inf[3])<0){ _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
                        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Mobile/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
                    </script>
                    <!-- AceCounter Mobile Gathering Script End -->


                ";
            }else{
                echo  "<!-- WIDERPLANET PURCHASE SCRIPT START 2021.3.18 -->
                        <div id='wp_tg_cts' style='display:none;'></div>
                                    <script type='text/javascript'>
                                    var wptg_tagscript_vars = wptg_tagscript_vars || [];
                                    wptg_tagscript_vars.push(
                                    (function() {
                                        return {
                                            wp_hcuid:'',  		     /*고객넘버 등 Unique ID (ex. 로그인  ID, 고객넘버 등 )를 암호화하여 대입.
                                                            *주의 : 로그인 하지 않은 사용자는 어떠한 값도 대입하지 않습니다.*/
                                            ti:'51444',            	     /*광고주 코드 */
                                            ty:'PurchaseComplete',       /*트래킹태그 타입 */
                                            device:'web',                /*디바이스 종류  (web 또는  mobile)*/
                                            items:[{i:'간편신청 ',	     /*전환 식별 코드  (한글 , 영어 , 번호 , 공백 허용 )*/
                                                t:'간편신청 ',         /*전환명  (한글 , 영어 , 번호 , 공백 허용 )*/
                                                p:'1',		     /*전환가격  (전환 가격이 없을경우 1로 설정 )*/
                                                q:'1'		     /*전환수량  (전환 수량이 고정적으로 1개 이하일 경우 1로 설정 )*/
                                            }]
                                        };
                                    }));
                                    </script>
                                    <script type='text/javascript' src='//cdn-aitg.widerplanet.com/js/wp_astg_4.0.js'></script>
                                    <!-- // WIDERPLANET PURCHASE SCRIPT END 2021.3.18 -->
                                    <!-- 전환페이지 설정 -->
                                    <script type='text/javascript' src='//wcs.naver.net/wcslog.js'></script> 
                                    <script type='text/javascript'> 
                                    var _nasa={};
                                    if(window.wcs) _nasa['cnv'] = wcs.cnv('3','1'); 

                                    
                                    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
                                    <script language='javascript'>
                                        var _AceGID=(function(){var Inf=['gtp1.acecounter.com','8080','BH2A44873385100','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ='https://'+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
                                        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
                                    </script>
                                    <!-- AceCounter Log Gathering Script End -->

                         </script> " ;
            }
            
                       
            	
                $msg = "[".$GP -> COUNSEL_TPYE[$tfc_type]."]".$mb_name."님(".$tfc_mobile.")이 등록 되었습니다.";
    			
    			// 담당자 문자 간편 예약 문자전송
                /*$send_mobile = ""; //010-1234-1234
                $send_num = "1";
                
                $args = '';
                $args['message'] 	= $msg;
                $args['rphone'] 	= $send_mobile;
               // $args['rphone'] 	= ""; //010-1234-1234
                $args['sphone1'] 	= "031";
                $args['sphone2'] 	= "240";
                $args['sphone3'] 	= "6000";
                $args['rdate'] = '';
                $args['rtime'] = '';
                $args['returnurl'] = '';
                $args['testflag'] = 'N';
                $args['destination'] = '';
                $args['repeatFlag'] = '';
                $args['repeatNum'] = '1';
                $args['repeatTime'] = '15';
                $args['send_num'] = 1;	
                
                $rst1 = $C_Api -> Api_Sms_Send($args);	
                        
                $args['result'] = $rst1;				
                $args['ssa_idx'] = '9999';			
                SMS_send_history($args);	//발송기록 데이터베이스에 기록	 */
                
                if ($tfc_type == 'A') {
					$C_Func->put_msg_and_go("상담 신청 되었습니다.", "/");
                }else{
					$C_Func->put_msg_and_go("상담 신청 되었습니다.", "/m/");
                }
				exit();
			}else{
				if ($tfc_type == 'A') {
					$C_Func->put_msg_and_go("상담 신청에 실패하였습니다", "/");
                }else{
					$C_Func->put_msg_and_go("상담 신청에 실패하였습니다", "/m/");
                }
				exit();
			} 
    	break;
	}
?>