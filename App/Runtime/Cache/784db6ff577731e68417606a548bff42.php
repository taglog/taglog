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
			<a href="<?php echo U('member/register');?>" class="fr">还没有帐号？立即注册</a>
			<a href="<?php echo U('index/index');?>">&lt;&lt;返回首页</a>
		</div>
		<div class="form_header">
		</div>
		<div class="form_main">
			<form id="login_form" method="post" action="<?php echo U('member/login');?>">
				<div class="form_box">
					<input type="text" name="email" id="email" value="<?php echo ((cookie('trueemail'))?(cookie('trueemail')):"请输入您的注册邮箱"); ?>"/>
					<div class="tip"><div class="tip_l"></div><div id="emailTip"></div></div>
				</div>
				<div class="form_box">
					<input type="text" name="password" id="passtip" value="请输入登录密码"/>
					<div class="tip"><div class="tip_l"></div><div id="passwordTip"></div></div>
				</div>
				<div class="form_box">
					<a style="float: right;" href="<?php echo U('member/lostpw');?>">忘记密码?</a>
				</div>
				<input type="submit" value="登录" />
			</form>
			<script type="text/javascript">
				$(function(){
					var email_check = false;
					var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
					if(!$('#email').val() || $('#email').val() == '请输入您的注册邮箱'){
					}else if(!myreg.test($('#email').val())) {
						$('#email').parent().addClass('error');
						$('#email').siblings('.tip').show().children('#emailTip').html('登录邮箱格式不正确');
					}else{
						$('#email').siblings('.tip').show().children('#emailTip').html('等待邮箱验证……');
						$.post("<?php echo U('member/register');?>",'email='+$("#email").val(),function(data){
							if(data.status == 1){
								$('#email').parent().addClass('success');
								$('#email').siblings('.tip').show().children('#emailTip').html('&nbsp;');
								email_check = true;
							}else{
								$('#email').parent().addClass('error');
								$('#email').siblings('.tip').show().children('#emailTip').html('该邮箱尚未注册');
								email_check = false;
							}
						});
					}
					$('#email').focus(function(){
						if($(this).val() == '请输入您的注册邮箱'){
							$(this).val('');
						}
						$(this).parent().removeClass('error');
						$(this).parent().removeClass('success');
						$(this).siblings('.tip').show().children('#emailTip').html('请填写您注册时用的Email');
					}).blur(function(){
						var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
						if(!$('#email').val() || $('#email').val() == '请输入您的注册邮箱'){
							$(this).val('请输入您的注册邮箱');
							$('#email').parent().addClass('error');
							$('#email').siblings('.tip').show().children('#emailTip').html('请输入登录邮箱！');
						}else if(!myreg.test($('#email').val())) {
							$('#email').parent().addClass('error');
							$('#email').siblings('.tip').show().children('#emailTip').html('登录邮箱格式不正确');
						}else{
							$('#email').siblings('.tip').show().children('#emailTip').html('等待邮箱验证……');
							$.post("<?php echo U('member/register');?>",'email='+$("#email").val(),function(data){
								if(data.status == 1){
									$('#email').parent().addClass('success');
									$('#email').siblings('.tip').show().children('#emailTip').html('&nbsp;');
									email_check = true;
								}else{
									$('#email').parent().addClass('error');
									$('#email').siblings('.tip').show().children('#emailTip').html('该邮箱尚未注册');
									email_check = false;
								}
							});
							
						}
					});
					$('#passtip').focus(function(){
						$(this).parent().removeClass('error');
						$(this).parent().removeClass('success');
						$(this).after('<input type="password" name="password" id="password"/>');
						$(this).siblings('.tip').show().children('#passwordTip').html('请输入密码');
						$(this).remove();
						$("#password").focus();
						$('#password').focus(function(){
							if($(this).val() == '请输入登录密码'){
								$(this).val('');
							}
							$(this).parent().removeClass('error');
							$(this).parent().removeClass('success');
							$(this).siblings('.tip').show().children('#passwordTip').html('请填写密码');
							$(this).attr('type','password');
						}).blur(function(){
							if(!$('#password').val()){
								$(this).attr('type','text');
								$(this).val('请输入登录密码');
								$(this).parent().addClass('error');
								$(this).siblings('.tip').show().children('#passwordTip').html('请填写登录密码');
							}else{
								$(this).parent().addClass('success');
								$(this).siblings('.tip').hide();
							}
						});
					});

					$('#login_form').submit(function(){
						if(!$('#email').val() || $('#email').val() == '请输入您的注册邮箱'){
							$('#email').parent().addClass('error');
							$('#email').parent().removeClass('success');
							$('#email').siblings('.tip').show().children('#emailTip').html('注册邮箱不能为空');
							return false;
						}else if(!email_check){
							$('#email').parent().addClass('error');
							$('#email').parent().removeClass('success');
							$('#email').siblings('.tip').show().children('#emailTip').html('注册邮箱错误，不可以使用');
							return false;
						}else if(!$('#password').val() || $('#password').val() == '请输入登录密码'){
							$('#password').parent().addClass('error');
							$('#email').parent().removeClass('success');
							$('#password').siblings('.tip').show().children('#passwordTip').html('密码不能为空');
							return false;
						}
					});
				})
			
				
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