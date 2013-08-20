<?php
	require_once '../includes/config.php';
	require_once COMMON_PATH . 'mobile_detect.php';
	
	$detect = new Mobile_Detect();
	
	//See if this request is coming through a native facebook app.  We can't display the tab in that case
	$fb_app = stristr($_SERVER['HTTP_USER_AGENT'], 'FBAN');
	
	//See if this request is coming through the Facebook canvas.  We'll need to pop out of the iframe using javascript
	$facebook = isset($_REQUEST['fb']);
	
	if($fb_app && $detect->isTablet()){
		header('Location: ' . BASE_URL . '/index.php');
	}
	else if(!isset($_REQUEST['bitly']) && !stristr($_SERVER['HTTP_USER_AGENT'], 'facebook') && !$facebook){
		if($fb_app || ($detect->isMobile() && !$detect->isTablet())){
			header('Location: ' . BASE_URL);
		}
		else{
			header('Location: ' . FB_TAB_URL);
		}
	}
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xmlns:og="https://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"  />
		<meta property="og:title" content="Warren Miller: Flow State"/>
		<meta property="og:type" content="product"/>
		<meta property="og:image" content="<?=BASE_URL;?>img/<?=$img;?>"/>
		<meta property="og:url" content="<?=BASE_URL;?>canvas/index.php"/>
		<meta property="og:site_name" content="Warren Miller: Flow State"/>
		<meta property="og:description" content=""/>
		<meta property="fb:app_id" content="<?=FB_APP_ID;?>">
		
		<title>Warren Miller: Flow State</title>
	</head> 
	<body>
		<script>
			<?php 
				if(!isset($_REQUEST['bitly']) && !stristr($_SERVER['HTTP_USER_AGENT'], 'facebook') && $facebook){
					echo 'window.top.location.href = "' . FB_TAB_URL . '"';
				}
			?>
		</script>
		
	</body>
</html>	
	     