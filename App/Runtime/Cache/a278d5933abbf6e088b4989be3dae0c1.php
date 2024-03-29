<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>用户宝</title>
<meta name="keywords" content="视频说明书，电子说明书，二维码，二维码说明书，二维码链接，专业说明书平台，说明书，说明书引擎，免费视频">
<meta name="description" content="不只是电子化的产品说明书，而是动态的、全方位的产品描述平台。让消费者为您传播品牌，让口碑“转”起来。扫描即可浏览，让用户更直观地理解你的产品与品牌文化">
<link rel="shortcut icon" href="./favicon.png"/>
<link href="http://yhb360.qiniudn.com/css/bootstrap.min.css" rel="stylesheet">
<link href="http://yhb360.qiniudn.com/css/style.css" rel="stylesheet">
<script type="text/javascript">
	var browserInfo = {browser:"", version: ""};
	var ua = navigator.userAgent.toLowerCase();
	if (window.ActiveXObject) {
		browserInfo.browser = "IE";
		browserInfo.version = ua.match(/msie ([\d.]+)/)[1];
		if(browserInfo.version <= 7){
			if(confirm("您的浏览器版本过低，请使用IE8及以上浏览器，或者firefox、chrome、360等浏览器;")){}
			location.href = 'http://chrome.360.cn/';
		}
	}
</script>
<script src="http://yhb360.qiniudn.com/js/jquery-1.9.0.min.js"></script>
</head>
<body class="no_index">
    <div class="top">
        <div class="w980">
            <a href="<?php echo U('index/index');?>"><img src="http://yhb360.qiniudn.com/images/logo.png" class="logo"></a>
        </div>
    </div>
	<div class="w980 main_table">
		<div class="form_top">
			<a href="<?php echo U('member/login');?>" class="fr">我已有帐号，立即登录</a>
			<a href="<?php echo U('index/index');?>">&lt;&lt;返回首页</a>
		</div>
		<div class="form_header">立刻注册帐号，开始免费使用吧~~</div>
		<div class="form_main">
			<form method="post" id="register_form" action="<?php echo U('member/register');?>">
				<div class="form_box">
					<input type="text" name="email" id="email" value="请填写Email作为用户名" />
					<div class="tip"><div class="tip_l"></div><div id="emailTip"></div></div>
				</div>
				<div class="form_box">
					<input type="text" name="password" id="passtip" value="请输入密码" />
					<div class="tip"><div class="tip_l"></div><div id="passwordTip"></div></div>
				</div>
				<div class="form_box">
					<input type="text" name="repassword" id="repasstip" value="请再次输入密码" />
					<div class="tip"><div class="tip_l"></div><div id="repasswordTip">请填写Email作为用户名</div></div>
				</div>
				<div class="form_box">
					<input type="text" name="verify" id="verify" value="验证码" />
					<img id="verify_code" src="<?php echo U('member/getverify');?>"/><a class="rep_code" title="看不清，换一张" rel="<?php echo U('member/getverify');?>" href="javascript:void(0);"></a>
					<script>
						$(function(){
							$('.rep_code').click(function(){
								$('#verify_code').attr('src',this.rel + '&' + new Date().getTime());
							});
						});
					</script>
					<div class="tip"><div class="tip_l"></div><div id="verifyTip"></div></div>
				</div>
				<input type="submit" value="注册" />
			</form>
			<script>
				var email_chick = false;
				var verify_chick = false;
				var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
				if(!$('#email').val() || !$('#email').val()=='请填写Email作为用户名'){
					
				}else if(!myreg.test($('#email').val())) {
					email_chick = false;
				}else{
					$.post("<?php echo U('member/register');?>",'email='+$('#email').val(),function(data){
						if(data.status == 1){
							email_chick = false;
						}else{
							email_chick = true;
						}
					})
				}
				
				$('#email').focus(function(){
					if($(this).val() == '请填写Email作为用户名'){
						$(this).val('');
					}
					$(this).parent().removeClass('error');
					$(this).parent().removeClass('success');
					$(this).siblings('.tip').show().children('#emailTip').html('请填写Email作为用户名');
				}).blur(function(){
					var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
					if(!$('#email').val() || !$('#email').val()=='请填写Email作为用户名'){
						$(this).val('请填写Email作为用户名');
						$('#email').parent().addClass('error');
						$('#email').siblings('.tip').show().children('#emailTip').html('请先输入邮箱哦~');
					}else if(!myreg.test($('#email').val())) {
						$('#email').parent().addClass('error');
						$('#email').siblings('.tip').show().children('#emailTip').html('请用您的常用邮箱注册，这样万一丢失密码可以通过邮箱找回:-)');
					}else{
						$('#email').siblings('.tip').show().children('#emailTip').html('等待邮箱验证……');
						$.post("<?php echo U('member/register');?>",'email='+$(this).val(),function(data){
							if(data.status == 1){
								$('#email').parent().addClass('error');
								$('#email').siblings('.tip').show().children('#emailTip').html('您申请的用户名已被使用，请换一个试试吧~');
							}else{
								$('#email').parent().addClass('success');
								$('#email').siblings('.tip').show().children('#emailTip').html('&nbsp;');
								email_chick = true;
							}
						});
					}
				})
				$('#passtip').focus(function(){
					$(this).parent().removeClass('error');
					$(this).parent().removeClass('success');
					$(this).after('<input type="password" name="password" id="password"/>');
					$(this).siblings('.tip').show().children('#passwordTip').html('请输入密码');
					$(this).remove();
					$("#password").focus();
					$('#password').focus(function(){
						$(this).parent().removeClass('error');
						$(this).parent().removeClass('success');
						$(this).siblings('.tip').show().children('#passwordTip').html('请输入密码');
					}).blur(function(){
						if($(this).val().length >= 6){
							if($('#repassword').val() != ''){
								if($(this).val() != $('#repassword').val() && $('#repassword').val()){
									$('#repassword').parent().addClass('error');
									$('#repassword').parent().removeClass('success');
									$('#repassword').siblings('.tip').show().children('#repasswordTip').html('两次密码输入不一致哦，请重新输入一次~');
								}else{
									$('#repassword').parent().removeClass('error');
									$('#repassword').parent().addClass('success');
									$('#repassword').siblings('.tip').show().children('#repasswordTip').html('&nbsp;');
								}
							}
							$(this).parent().addClass('success');
							$(this).siblings('.tip').show().children('#passwordTip').html('&nbsp;');
						}else{
							if(!$(this).val()){
								$(this).parent().addClass('error');
								$(this).siblings('.tip').show().children('#passwordTip').html('请输入密码');
							}else{
								$(this).parent().addClass('error');
								$(this).siblings('.tip').show().children('#passwordTip').html('密码不能小于六位');
							}
						}
					})
				});
				$('#repasstip').focus(function(){
					$(this).parent().removeClass('error');
					$(this).parent().removeClass('success');
					$(this).after('<input type="password" name="repassword" id="repassword"/>');
					$(this).siblings('.tip').show().children('#passwordTip').html('请再次输入密码');
					$(this).remove();
					$("#repassword").focus();
					$('#repassword').focus(function(){
						$(this).parent().removeClass('error');
						$(this).parent().removeClass('success');
						$(this).siblings('.tip').show().children('#repasswordTip').html('请再次输入密码');
					}).blur(function(){
						if($(this).val() != '' && $(this).val() == $('#password').val()){
							$(this).parent().addClass('success');
							$(this).siblings('.tip').show().children('#repasswordTip').html('&nbsp;');
						}else{
							$(this).parent().addClass('error');
							if($(this).val().length >= 6){
								if(!$(this).val()){
									$(this).siblings('.tip').show().children('#passwordTip').html('请再次输入密码');
								}else{
									$(this).siblings('.tip').show().children('#repasswordTip').html('两次密码输入不一致哦，请重新输入一次~');
								}
							}else{
								$(this).siblings('.tip').show().children('#repasswordTip').html('密码不能小于六位~');
							}
						}
					})
				});
				$('#verify').focus(function(){
					if($(this).val() == '验证码'){
						$(this).val('');
					}
					$(this).parent().removeClass('error');
					$(this).parent().removeClass('success');
					$(this).siblings('.tip').show().children('#verifyTip').html('请输入验证码');
				}).blur(function(){
					
					$.get("<?php echo U('member/checkverify','verify=');?>"+$(this).val(),function(data){
						if(data.status == 1){
							$('#verify').parent().addClass('success');
							$('#verify').siblings('.tip').show().children('#verifyTip').html('&nbsp;');
							verify_chick = true;
						}else{
							$('#verify').parent().addClass('error');
							$('#verify').siblings('.tip').show().children('#verifyTip').html(data.info);
						}
					})
					if(!$(this).val()){
						$(this).val('验证码');
					}
				})
				$('#register_form').submit(function(){
					var form_check = true;
					if($('#password').length > 0){
						if($('#password').val().length >= 6 ){
							$('#password').parent().removeClass('error');
							$('#password').siblings('.tip').show().children('#passwordTip').html('密码可用');
							form_check = true && form_check
						}else{
							$('#password').parent().addClass('error');
							$('#password').siblings('.tip').show().children('#passwordTip').html('密码不能小于六位');
							form_check = false;
						}
					}else{
						$('#passtip').parent().addClass('error');
						$('#passtip').siblings('.tip').show().children('#passwordTip').html('请输入密码');
					}
					if($('#repassword').length > 0){
						if($('#repassword').val() != '' && $('#repassword').val() == $('#password').val()){
							$('#repassword').parent().removeClass('error');
							$('#repassword').siblings('.tip').show().children('#repasswordTip').html('两次输入密码一致');
							form_check = true && form_check
						}else{
							$('#repassword').parent().addClass('error');
							$('#repassword').siblings('.tip').show().children('#repasswordTip').html('两次密码输入不一致哦，请重新输入一次~');
							form_check = false;
						}
					}else{
						$('#repasstip').parent().addClass('error');
						$('#repasstip').siblings('.tip').show().children('#repasswordTip').html('请再次输入密码');
					}
					if(form_check && email_chick && verify_chick){
						return true;
					}else{
						if(!email_chick){
							$('#email').parent().addClass('error');
							$('#email').siblings('.tip').show().children('#emailTip').html('注册邮箱不可以使用哦');
						}
						if(!verify_chick){
							$('#verify').parent().addClass('error');
							$('#verify').siblings('.tip').show().children('#verifyTip').html('您输入的验证码不正确哦~');
						}
						return false;
					}
				});
				//百度统计
	var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F287083f19481e4a2a0e7db232e8085cc' type='text/javascript'%3E%3C/script%3E"));
			</script>
		</div>
	</div>
    <div class="bottom">
        沪ICP备11046618号-1　Copyright©2014
    </div>
</body>
</html>