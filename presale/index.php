<?php 
	require_once 'includes/config.php';
	require_once COMMON_PATH . 'signed_request.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" xmlns:og="https://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"  />

		<title>App Developed by Movement Strategy</title>

		<!--[if lt IE 9]>
		    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<style type="text/css">

			body {
				overflow: hidden;
				margin: 0 !important;
			}

			#app_wrapper {
				background-image: url('img/app_bg.png');
				background-repeat: no-repeat;
				height: 1225px;
				width: 810px;
			}
			
			.clear { clear: both; }
			.btn { cursor: pointer; }
			ul { list-style: none; padding-left: 0; margin: 0; }
			input { background: none; border: none; outline: none !important; }
			textarea { border: none; resize: none; }
			textarea:focus { outline: none; border: none; }

			#fan {
				height: 1225px;
				width: 810px;
			}
			
			/*---------------------------------------
			----------------FAN GATE---------------
			-------------------------------------*/
			
			.fangate_txt {
				position: absolute;
				width: 300px;
				top: 210px;
				left: 250px;
				font-family: sans-serif;
				color: #003;
				font-size: 14px;
				text-align: center;
			}
			
			.like_btn {
				position: absolute;
				overflow: hidden;
				height: 22px;
				width: 110px;
				top: 250px;
				left: 355px;
			}
			
			/*-------------------------------------
			-----------------FAN-------------------
			-------------------------------------*/
			
			.fan_header_txt {
				position: absolute;
				background-image: url('img/fan_header_txt.png');
				background-repeat: no-repeat;
				height: 46px;
				width: 595px;
				top: 210px;
				left: 106px;
			}
			
			#promo {
				position: absolute;
				width: 128px;
				height: 80px;
				background-image: url('img/promo.png');
				top: 110px;
				left: 682px;
			}
			
			#sort_container {
				position: absolute;
				height: 50px;
				width: 580px;
				top: 260px;
				left: 119px;
				font-family: sans-serif;
				color: #003;
				font-size: 15px;
				font-weight: bold;
			}
			
			#zip_label {
				position: absolute;
				top: 6px;
			}
			
			#region_label {
				position: absolute;
				top: 6px;
				left: 250px;
			}
			
			#sort_container input[type=text], #sort_container select {
				background: #f47c20;
				background: -webkit-gradient(linear, left top, left bottom, from(#525274), to(#000033));
				background: -moz-linear-gradient(top,  #525274,  #000033);
				filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#525274', endColorstr='#000033');
				color: #ffffff;
				-webkit-border-radius: 4px; 
				-moz-border-radius: 4px;
				border-radius: 4px;
			}
				#sort_container select option {
					background: #525274;
				}
			
			#sort_zip {
				position: absolute;
				height: 26px;
				width: 90px;
				top: 0px;
				left: 144px;
				text-align: center;
			}
			
			#sort_region {
				position: absolute;
				height: 27px;
				width: 137px;
				top: 0px;
				left: 320px;
				border: none;
				text-align: center;
			}
			
			#find_btn {
				position: absolute;
				height: 22px;
				width: 77px;
				top: 0px;
				left: 490px;
				font-weight: 400;
				font-size: 14px;
				padding-top: 5px;
				text-align: center;
				background: #000033;
				background: -webkit-gradient(linear, left top, left bottom, from(#525274), to(#000033));
				background: -moz-linear-gradient(top,  #525274,  #000033);
				filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#525274', endColorstr='#000033');
				color: #ffffff;
				-webkit-border-radius: 4px; 
				-moz-border-radius: 4px;
				border-radius: 4px;
				cursor: pointer;
			}
			
			#find_btn:hover {
				background: #525274;
				background: -webkit-gradient(linear, left top, left bottom, from(#1e1e5f), to(#525274));
				background: -moz-linear-gradient(top,  #1e1e5f,  #525274);
				filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#1e1e5f', endColorstr='#525274');
			}
			
			#content_container {
				position: absolute;
				background-image: url('img/content_container.png');
				background-repeat: no-repeat;
				height: 835px;
				width: 780px;
				top: 303px;
				left: 15px;
			}
			
			#list_container {
				position: absolute;
				height: 792px;
				width: 763px;
				top: 42px;
				left: 7px;
				height: 785px;
				overflow-y: auto;
			}
			
			#list_container li {
				position: relative;
				float: left;
				height: 130px;
				width: 100%;
				border-bottom: solid 1px #cccccc;
			}
			
			.show_txt {
				position: absolute;
				width: 480px;
				top: 12px;
				left: 7px;
				font-family: sans-serif;
				font-size: 15px;
				line-height: 23px;
			}
			
			.buy_btn {
				position: absolute;
				top: 93px;
				left: 5px;
				padding: 3px 13px;
				background: #f47c20;
				background: -webkit-gradient(linear, left top, left bottom, from(#f88e11), to(#f06015));
				background: -moz-linear-gradient(top,  #f88e11,  #f06015);
				filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f88e11', endColorstr='#f06015');
				-webkit-border-radius: 4px; 
				-moz-border-radius: 4px;
				border-radius: 4px;
				font-size: 13px;
				color: #ffffff;
				font-family: sans-serif;
				cursor: pointer;
				text-decoration: none;
			}
			
			.buy_btn:hover {
				background: #f06015;
				background: -webkit-gradient(linear, left top, left bottom, from(#f06015), to(#f88e11));
				background: -moz-linear-gradient(top,  #f06015,  #f88e11);
				filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f06015', endColorstr='#f88e11');
				-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.4);
				-moz-box-shadow: 0 1px 3px rgba(0,0,0,.4);
				box-shadow: 0 1px 3px rgba(0,0,0,.4);
			}
			
			.blue_btn {
				padding: 3px 7px;
				background: #000033;
				background: -webkit-gradient(linear, left top, left bottom, from(#525274), to(#000033));
				background: -moz-linear-gradient(top,  #525274,  #000033);
				filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#525274', endColorstr='#000033');
				-webkit-border-radius: 4px; 
				-moz-border-radius: 4px;
				border-radius: 4px;
				font-size: 13px;
				color: #ffffff;
				font-family: sans-serif;
				cursor: pointer;
				text-decoration: none;
			}
			
			.blue_btn:hover {
				background: #f06015;
				background: -webkit-gradient(linear, left top, left bottom, from(#f06015), to(#f88e11));
				background: -moz-linear-gradient(top,  #f06015,  #f88e11);
				filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#f06015', endColorstr='#f88e11');
				-webkit-box-shadow: 0 1px 3px rgba(0,0,0,.4);
				-moz-box-shadow: 0 1px 3px rgba(0,0,0,.4);
				box-shadow: 0 1px 3px rgba(0,0,0,.4);
			}
			
			.info_btn {
				position: absolute;
				top: 93px;
				left: 563px;
				text-decoration: none;
			}
			
			.deals_btn {
				position: absolute;
				top: 93px;
				left: 645px;
				text-decoration: none;
			}
			
			.share_btn {
				position: absolute;
				top: 93px;
				left: 700px;
				text-decoration: none;
			}
			
			/*--------------deals popup---------------*/
			
			#deal_popup {
				position: relative;
				width: 480px;
				top: 70px;
				left: 70px;
				padding-bottom: 70px;
				background-color: #FFF;
				border: solid 5px #000033;
			}
			
			#popup_close {
				position: absolute;
				height: 20px;
				width: 20px;
				top: -13px;
				right: -13px;
				background-color: #cccccc;
				border: solid 2px #000033;
				color: #000033;
				font-family: sans-serif;
				-webkit-border-radius: 12px; 
				-moz-border-radius: 12px;
				border-radius: 12px;
				text-align: center;
				cursor: pointer;
			}
			
			#popup_close:hover {
				background-color: #ededed;
			}
			
			#deal_popup header {
				width: 100%;
				height: 40px;
				border-bottom: solid 4px #f06015;
			}
			
			.deal_location {
				position: absolute;
				height: 20px;
				width: 320px;
				top: 12px;
				left: 10px;
				font-family: sans-serif;
				font-size: 14px;
				color: #000033;
			}
			
			.deal_value {
				position: absolute;
				height: 20px;
				width: 320px;
				top: 13px;
				right: 10px;
				text-align: right;
				font-family: sans-serif;
				font-size: 12px;
				color: #000033;
			}
			
			.deal_popup_txt {
				position: relative;
				width: 415px;
				top: 20px;
				left: 30px;
				text-align: center;
				font-family: sans-serif;
				font-size: 12px;
				color: #000033;
			}
			
			.deals_container {
				position: relative;
				width: 430px;
				top: 30px;
				left: 20px;
			}
			
			.deals_container li {
				position: relative;
				float: left;
				height: 40px;
				width: 100%;
				margin-bottom: 5px;
			}
			
			.deal_info {
				position: absolute;
				width: 321px;
				top: 14px;
				left: 3px;
				text-align: right;
				font-family: sans-serif;
				font-size: 11px;
				color: #000033;
			}
			
			.deal_pic {
				position: absolute;
				height: 40px;
				width: 100px;
				top: 0px;
				right: 0px;
				background-color: rgba(200,20,250,0.4);
			}
			
			.deal_popup_bottom {
				position: relative;
				width: 100%;
				height: 40px;
				top: 47px;
				border-top: solid 4px #f06015;
			}
			
			.deal_footer_txt {
				position: relative;
				width: 415px;
				top: 12px;
				left: 30px;
				text-align: center;
				font-family: sans-serif;
				font-size: 12px;
				color: #000033;
			}
			
			#deal_share {
				position: absolute;
				top: 33px;
				left: 180px;
			}
			
			#deal_tweet {
				position: absolute;
				top: 33px;
				left: 240px;
			}
			
			/*-------------------------------------------------------
			-------------------------FOOTER--------------------------
			-------------------------------------------------------*/

			footer {
				position: absolute;
				height: 75px;
				width: 810px;
				top: 1150px;
				left: 0px;
			}
			
			#footer_form {
				position: absolute;
				height: 45px;
				width: 810px;
			}
			
			#email {
				position: absolute;
				height: 20px;
				width: 157px;
				top: 8px;
				left: 329px;
				font-size: 16px;
			}
			
			#zip {
				position: absolute;
				height: 20px;
				width: 110px;
				top: 8px;
				left: 588px;
				font-size: 16px;
			}
			
			#submit {
				position: absolute;
				background-image: url('img/submit_sprite.png');
				background-repeat: no-repeat;
				background-position: -2px -1px;
				height: 32px;
				width: 85px;
				top: 3px;
				left: 714px;
				cursor: pointer;
			}
						
			#submit:hover {
				background-position: -2px -38px;
			}
			
			#footer_thanks {
				position: absolute;
				height: 38px;
				width: 543px;
				top: 3px;
				left: 260px;
				background-color: #000033;
				padding-top: 12px;
				font-size: 13px;
				text-align: center;
				color: #eeeeee;
				font-family: sans-serif;
				display: none;
			}
			
			.connect_fb {
				position: absolute;
				background-image: url('img/facebook_logo.png');
				background-repeat: no-repeat;
				height: 21px;
				width: 22px;
				top: 47px;
				left: 108px;
				cursor: pointer;
			}
			
			.connect_fb:hover {
				-webkit-box-shadow: 0 0px 7px rgba(250,250,250,.7);
				-moz-box-shadow: 0 0px 7px rgba(250,250,250,.7);
				box-shadow: 0 0px 7px rgba(250,250,250,.7);
			}
			
			.connect_twitter {
				position: absolute;
				background-image: url('img/twitter_logo.png');
				background-repeat: no-repeat;
				height: 21px;
				width: 22px;
				top: 47px;
				left: 138px;
				cursor: pointer;
			}
			
			.connect_twitter:hover {
				-webkit-box-shadow: 0 0px 7px rgba(250,250,250,.7);
				-moz-box-shadow: 0 0px 7px rgba(250,250,250,.7);
				box-shadow: 0 0px 7px rgba(250,250,250,.7);
			}
			
			.connect_youtube {
				position: absolute;
				background-image: url('img/youtube_logo.png');
				background-repeat: no-repeat;
				height: 21px;
				width: 22px;
				top: 47px;
				left: 168px;
				cursor: pointer;
			}
			
			.connect_youtube:hover {
				-webkit-box-shadow: 0 0px 7px rgba(250,250,250,.7);
				-moz-box-shadow: 0 0px 7px rgba(250,250,250,.7);
				box-shadow: 0 0px 7px rgba(250,250,250,.7);
			}
			
			.info_txt {
				position: absolute;
				width: 230px;
				top: 52px;
				left: 565px;
				font-family: sans-serif;
				font-size: 9px;
				color: #ffffff;
				text-align: right;
			}
			
			.link {
				text-decoration: underline;
				color: #ffffff;
			}
			
			.link:hover {
				color: #ee613d;
			}

		</style>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.maskedinput-1.3.min.js"></script>
		<script src="js/jquery.lightbox_me.js"></script>
		<script src="js/date.js"></script>

		<script type="text/javascript">
			$(function() {
			
				//$('#non_fan').hide();
				
				$('#deal_popup').hide();
				
				//------mask-------
				$("#zip").mask("99999");
				$("#sort_zip").mask("99999");
								
				
				//-----WHEN THE USER HITS SUBMIT-----
				$('#submit').click(function(e) {
									
					e.preventDefault();
								
					//get the values of input boxes
					var email = $('#email').val();
					var zip = $('#zip').val();
									
					//check to see if they have entered a valid email
					var emailreg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
					if(emailreg.test(email) === false) {
						alert('Please enter a valid email address!');
						$('#email').focus();
						return false; //break out of the function
					}
									
					//check to see if they have entered in a sip code
					if(zip === '') {
						alert('Please enter in your zip code!');
						$('#zip').focus();
						return false; //break out of the function
					}
									
					//they have entered in all the required information
									
					//to send the information to the database
					$.post("post.php", {
						email: email,
						zip: zip,
					}, function(data) {
																			
						//once the information has been sent to the database, show the thankyou div
						$('#footer_thanks').show();
										
					});
								
				});
				
				
				//-----LOAD IN THE SHOWS-----
				$.get('../dashboard/api/shows', function(data) {
					for (var i = 0; i < data.length; i++) {
						$('ul#list_container').append(showDom(data[i]));
					}
				},'json');
				
				// generates the dom for a show given the object
				showDom = function(show) {
					var dom = '<li rel="' + show.id + '">';
					dom += '<div class="show_txt">';
					dom += show.venue + ', ' + show.city + ', ' + show.state;
					dom += '<br />';
					dom += Date.parse(show.date).toString('dddd, MMMM d, yyyy');
					dom += '<br />';
					dom += show.time;
					dom += '</div>';
					dom += '<a class="buy_btn" href="' + show.link_ticket + '" target="_blank">buy pre-sale tickets</a>';
					dom += '<a class="info_btn blue_btn" href="' + show.link_info + '" target="_blank">event info</a>';
					dom += '<div class="deals_btn blue_btn">deals</div>';
					dom += '<div class="share_btn blue_btn">share</div>';
					dom += '</li>';
					return dom;
				}
				
				
				//----ZIP CODE SORTING-----
				$('#find_btn').live('click', function() {
					
					// validate the fields
					var zip = $('#sort_zip').val();
					var radius = $('#sort_region').val();
					
					if ((zip == '') || (zip.length < 5)) {
						alert('Please enter in a valid zip code.');
						return false;
					}
					
					// make the right endpoint
					var url = '../dashboard/api/shows';
					if (radius != 'all') {
						url += '/zip/' + zip + '/radius/' + radius;
					}
					
					// send the information to the server
					$.get(url, function(data) {
					
						// clear out the list
						$('ul#list_container').html('');
						
						// populate the list with the information
						
						if (data.status == 'fail') {
							$('ul#list_container').html('There are no shows for the supplied zip code and/or radius');
						} else {
							for (var i = 0; i < data.length; i++) {
								$('ul#list_container').append(showDom(data[i]));
							}
						}
						
					},'json');
					
				});
				
				
				//-----DEALS LIGHTBOX-----
				
				$('.deals_btn').live('click', function() {
					
					var popup = $('#deal_popup');
					var show_id = $(this).parent().attr('rel');
					
					// get the information about the show
					$.get('../dashboard/api/shows/' + show_id, function(show) {
					
						popup.attr('rel', show.id);
						
						popup.find('.deal_location').html(show.city + ', ' + show.state + ' Deals');
						
						var deals = (show.deals) ? show.deals : 'Sorry, there are no deals for this show.';
						popup.find('.deals_container').html(deals);
						
						FB.Canvas.scrollTo(0,0);
						
						// show the popup
						popup.lightbox_me();
						
					}, 'json');
					
				});
				
				$('#popup_close').live('click', function() {
					$('#deal_popup').trigger('close');
				});
				
				
				//-------SOCIAL--------
				
				
				// share
				$('.share_btn').live('click', function() {
							
					// calling the API ...
					var obj = {
						method: 'feed',
						link: '<?=FB_TAB_URL?>',
						picture: 'https://dev.fbdev.me/apps/warren_miller/presale/img/75x75.png',
						name: 'Flow State PreSale',
						description: 'LIKE to unlock the presale discount code for $3 OFF Warren Miller\'s Flow State.'
						};
								
						FB.ui(obj);
							        
					});
				
				
				// share
				$('#deal_share').click(function() {
							
					var show_id = $(this).parent().parent().attr('rel');
					
					// get the information about the show
					$.get('../dashboard/api/shows/' + show_id, function(show) {
					
						// calling the API ...
						var obj = {
							method: 'feed',
							link: '<?=FB_TAB_URL?>',
							picture: 'http://dev.fbdev.me/apps/warren_miller/presale/img/75x75.png',
							name: 'Warren Miller: Flow State',
							description: 'Check out the deals you get access to when buying a ticket to see Flow State at ' +
								show.venue + ' in ' + show.city + ', ' + show.state + '!'
						};
						
						FB.ui(obj);
						
					}, 'json');
							        
				});
				
				$('#deal_tweet').live('click', function() {
				
					var show_id = $(this).parent().parent().attr('rel');
					
					// get the information about the show
					$.get('../dashboard/api/shows/' + show_id, function(show) {
					
						var text = 'Check out the deals you get when buying a Flow State ticket at ' +
								show.venue + ' in ' + show.city + ', ' + show.state + '!'
							    					
						// trigger twitter 'tweet' dialogue
						window.open(encodeURI('https://twitter.com/share?url=http://bit.ly/Flow_State&text=' + text + ''), 'mywindow', 'menubar=1, resizable=1, width=500, height=400');
						
					}, 'json');
								
				});
				
				FB.Event.subscribe('edge.create', function(response) {
				    window.top.location.href='<?= FB_TAB_URL; ?>';
				});
			
			});
		</script>

	</head>

	<body>
		
		<?php MVMT::facebook_js_sdk(); ?>

		<!--APP WRAPPER-->
		<div id="app_wrapper">
		
			<?php if(!$response['page']['liked'] && isset($response['page']['liked'] )) { ?>
			
			<!--NON FAN-->
			
			<div id="non_fan">
				<div class="fangate_txt">Click 'Like' to become a fan and redeem your Flow State Pre-Sale Promo Code</div>
				<div class="like_btn">
					<div class="fb-like" data-href="https://www.facebook.com/WarrenMillerEntertainment" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
				</div>
			</div><!-- END NON FAN -->
			
			<?php } else { ?>
			
			<!--FAN-->
			
			<div id="fan">
			
				<div id="promo"></div>
			
				<div class="fan_header_txt"></div>
				
				<div id="sort_container">
					<label id="zip_label">Zip or Postal Code:</label>
					<input type="text" id="sort_zip" value="" />
					<label id="region_label">Radius:</label>
					<select id="sort_region">
						<option value="5">5 miles</option>
						<option value="10">10 miles</option>
						<option value="25">25 miles</option>
						<option value="50">50 miles</option>
						<option value="100">100 miles</option>
						<option value="all">all shows</option>
					</select>
					<div id="find_btn">FIND</div>
				</div>
				
				<div id="content_container">
					<ul id="list_container">
						<!--
						<li>
							<div class="show_txt">
								Boulder Theater, Boulder, CO<br />
								Tuesday, August 28, 2012<br />
								7:30PM
							</div>
							<div class="buy_btn">buy pre-sale tickets</div>
							<div class="info_btn blue_btn">event info</div>
							<div class="deals_btn blue_btn">deals</div>
							<div class="share_btn blue_btn">share</div>
						</li>
						-->
					</ul>
				</div>
				
				<div id="deal_popup">
					<div id="popup_close">x</div>
					<header>
						<div class="deal_location">Yakima, Washington Deals</div>
						<!-- <div class="deal_value">($XXX Value)</div> -->
					</header>
					<div class="deal_popup_txt">With the purchase of your Flow State ticket, you'll also receive:</div>
					<ul class="deals_container">
						<li>
							<div class="deal_info">2-FOR-1 LIFT TICKET TO WHISTLER BLACKCOMB</div>
							<div class="deal_pic"></div>
						</li>
						<li>
							<div class="deal_info">2-FOR-1 LIFT TICKET TO WHISTLER BLACKCOMB</div>
							<div class="deal_pic"></div>
						</li>
						<li>
							<div class="deal_info">2-FOR-1 LIFT TICKET TO WHISTLER BLACKCOMB</div>
							<div class="deal_pic"></div>
						</li>
						<div class="clear"></div>
					</ul>
					<div class="deal_popup_bottom">
						<div class="deal_footer_txt">Love these deals? Share or Tweet them!</div>
						<div id="deal_share" class="blue_btn">Share</div>
						<div id="deal_tweet" class="blue_btn">Tweet</div>
					</div>
				</div>
								
			</div><!-- END FAN -->
			
			<?php } ?>
			
			<footer>
				
				<form action="#" method="POST" id="footer_form">
									
					<input type="text" id="email" value="" />
					<input type="text" id="zip" value="" />
					<input type="submit" id="submit" class="btn" value="" />
								
				</form>
				
				<div id="footer_thanks">THANKS! Your Information Has Been Submitted.</div>
				
				<a href="https://www.facebook.com/WarrenMillerEntertainment" target="_blank"><div class="connect_fb"></div></a>
				<a href="https://twitter.com/WarrenMillerEnt" target="_blank"><div class="connect_twitter"></div></a>
				<a href="http://www.youtube.com/user/WarrenMillerEnt" target="_blank"><div class="connect_youtube"></div></a>
				
				<div class="info_txt">Get More Information at <a href="http://www.skinet.com/warrenmiller/" class="link" target="_blank">warrenmiller.com</a></div>
				
			</footer><!-- END FOOTER -->
		
		</div>

		<?php MVMT::footer('Warren Miller Entertainment'); ?>

		<?php MVMT::google_analytics(); ?>

	</body>

</html>