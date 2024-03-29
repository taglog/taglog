<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>用户宝</title>
<meta name="keywords" content="视频说明书，电子说明书，二维码，二维码说明书，二维码链接，专业说明书平台，说明书，说明书引擎，免费视频">
<meta name="description" content="不只是电子化的产品说明书，而是动态的、全方位的产品描述平台。让消费者为您传播品牌，让口碑“转”起来。扫描即可浏览，让用户更直观地理解你的产品与品牌文化">
<link rel="shortcut icon" href="http://yhb360.qiniudn.com/favicon.png"/>
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
<script src="http://yhb360.qiniudn.com/js/jquery.sgallery.js"></script>
<script src="http://yhb360.qiniudn.com/js/layer/layer.min.js"></script>
<?php if(isMobile()): ?><style>
	.question_content{text-align:center;}
</style><?php endif; ?>
</head>
<body>
    <div class="top">
	<div class="w980">
		<div class="login">
			<?php if(session('?email')): ?><a title="个人中心" href="<?php echo U('member/home');?>"><?php echo session('email');?>&nbsp;<font id="message_tips" color="#1DB1AB">(0)</font></a>
			<span><a href="<?php echo U('member/index');?>">我的说明书</a></span>
			<a href="<?php echo U('member/logout');?>">退出</a>
			<?php else: ?>
			<span><a href="<?php echo U('member/login');?>">登录</a></span>
			<a href="<?php echo U('member/register');?>">注册</a><?php endif; ?>
		</div>
		<a href="<?php echo U('index/index');?>" style="float:left"><img src="http://yhb360.qiniudn.com/images/logo.png" class="logo"></a>
	</div>
</div>
<?php if(session('?member_id')): ?><script>

	var a = 1;
	function fn(){
		if(a == 1){
			$('#message_tips').css({color:'white'});
			a = 0;
		}else{
			$('#message_tips').css({color:'#FF0000'});
			a = 1;
		}
	}
	var myInterval;

	function message_tips(){
		$.get("<?php echo U('member/tips');?>", function(data){
			if(data.data > 0){
				$("#message_tips").html('('+data.data+')');
				$('#message_tips').css({color:'white'});
				if(!myInterval)	myInterval = setInterval(fn,1000);
			} else {
				$("#message_tips").html('(0)');
				if(data.data == 0){
					$('#message_tips').css({color:'#1DB1AB'});
					clearInterval(myInterval);
				}
			}
		});
		setTimeout('message_tips()',5000);
	}
	$(function(){
		message_tips();
	});
</script><?php endif; ?>
	<div class="banner_bg_color">
		<div class="banner">
			<div class="w980">
				<div class="banner_inner" style="width:420px;">
					<div class="banner_content">
						<p style="margin-top: 26px;font-size: 40px;">10分钟创建动态说明书<br/ >扫一扫即可浏览</p>
					</div>
				<a href="javascript:void(0)" class="add_botton botton">立即免费使用</a>
				<script>
					$(function(){
						 $("a[href='javascript:void(0)']").on("click",function (e){
							 e.preventDefault();
						 });

						$('.add_botton').click(function(){
							$.get('<?php echo U("member/islogin");?>',function(data){
								if(data.data == 1){
									window.location.href="<?php echo U('product/add');?>";
								}else{
									$.layer({
										shade: [0],
										area: ['auto','auto'],
										dialog: {
											msg: '检测到您还没有注册，现在就去注册么？',
											btns: 2,                    
											type: 4,
											btn: ['创建帐户','试用一下'],
											yes: function(){
												window.location.href="<?php echo U('member/register');?>";
											}, no: function(){
												window.location.href="<?php echo U('product/add');?>";
											}
										}
									});
								}
							});
						});
					});
				</script>
				</div>
				<div class="banner_img">
					<div class="changeDiv">
						<img src="http://yhb360.qiniudn.com/images/baner01.png" />
						<img src="http://yhb360.qiniudn.com/images/baner02.png" />
						<img src="http://yhb360.qiniudn.com/images/baner03.png" />
					</div>
				</div>
				<script>
				$(function(){
					new slide('.banner_img','.banner_content a','cur',196);
				});
				</script>
			</div>
		</div>
    </div>
    <div class="main">
        <div class="w980">
            <div class="main_inner">清晰、动态、全方位地描述您的商品</div>
            <div class="row main_question">
                <div class="col-xs-12 col-md-6">
					<div class="col-xs-6 col-md-6">
						<div class="question_img">
							<img src="http://yhb360.qiniudn.com/images/q1.png">
						</div>
						<p class="question_title">传统的说明书说不清楚</p>
						<p class="question_content">拗口的描述、晦涩的图片，再也不想让消费者在其中一头雾水？是时候改变这一切了！</p>
					</div>
					<div class="col-xs-6 col-md-6">
						<div class="question_img">
							<img src="http://yhb360.qiniudn.com/images/q2.png">
						</div>
						<p class="question_title">动态、直观的展示方式</p>
						<p class="question_content">您可以把文字和视频、图片方便地结合起来。用动态、直观的方式向消费者展示。把产品的安装、使用、维护等一切描述清楚。而且编辑起来超级简单！</p>
					</div>
                </div>
                <div class="col-xs-12 col-md-6">
					<div class="col-xs-6 col-md-6">
						<div class="question_img">
							<img src="http://yhb360.qiniudn.com/images/q3.png">
						</div>
						<p class="question_title">讲述产品与品牌的故事</p>
						<p class="question_content">在这里，您可以随时更新产品的新鲜、有创意的玩法。也可以呈现于您品牌、产品相关的文化与故事。</p>
					</div>
					<div class="col-xs-6 col-md-6">
						<div class="question_img">
							<img src="http://yhb360.qiniudn.com/images/q4.png">
						</div>
						<p class="question_title">免费营销，帮您卖更多产品</p>
						<p class="question_content">精美的说明书是绝好营销素材。我们将有专门的网站帮您展示你的产品。让更多的用户看到您。而这一切，目前都是免费的！</p>
					</div>
                </div>
            </div>
            <div class="main_inner">消费者只要扫一扫，即可浏览</div>
            <div class="row main_question">
                <div class="col-xs-12 col-md-6">
					<div class="col-xs-6 col-md-6">
						<div class="question_img">
							<img src="http://yhb360.qiniudn.com/images/q5.png">
						</div>
						<p class="question_title">手机和电脑都可以浏览</p>
						<p class="question_content">消费者只要扫描商品、包装或者纸质说明书上的二维码，即可浏览。或者直接通过说明书所在链接，亦可浏览。无论是通过智能手机、pad亦或是PC，都可以方便地访问。</p>
					</div>
					<div class="col-xs-6 col-md-6">
						<div class="question_img">
							<img src="http://yhb360.qiniudn.com/images/q6.png">
						</div>
						<p class="question_title">精美的消费者体验</p>
						<p class="question_content">精致的质感、清晰的结构、动态化的直观描述，从此颠覆传统的商品说明书模式。消费者会发现阅读产品说明书也是一种享受！</p>
					</div>
                </div>
                <div class="col-xs-12 col-md-6">
					<div class="col-xs-6 col-md-6">
						<div class="question_img">
							<img src="http://yhb360.qiniudn.com/images/q7.png">
						</div>
						<p class="question_title">永远都不用担心丢失</p>
						<p class="question_content">消费者阅读过的商品说明，都与其帐户一一对应，并且保存下来。所以各种说明、凭证与联系方式永远都不会丢失。您对产品描述的任何修改、更新,都可以瞬间与消费者同步。</p>
					</div>
					<div class="col-xs-6 col-md-6">
						<div class="question_img">
							<img src="http://yhb360.qiniudn.com/images/q8.png">
						</div>
						<p class="question_title">永远都与消费者保持联系</p>
						<p class="question_content">这是一个帮您与老客户保持连接的平台，您的消费者从此在您的视界范围内。您可以保持跟他们的沟通，甚至把最新的动态和商品推荐给他们。</p>
					</div>
                </div>
            </div>
        </div>
    </div>
    <div class="index_case">
        <div class="w980">
            <div class="case_title">谁可以用</div>
            <div class="row">
                <div class="col-xs-4 col-md-2">
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case1.png"></div>
                        <div class="case_content">电器</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case2.png"></div>
                        <div class="case_content">书籍</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case3.png"></div>
                        <div class="case_content">乐器</div>
                    </div>
					<div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case4.png"></div>
                        <div class="case_content">酒</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case5.png"></div>
                        <div class="case_content">童车</div>
                    </div>
                </div>
                <div class="col-xs-4 col-md-2">
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case6.png"></div>
                        <div class="case_content">汽车</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case7.png"></div>
                        <div class="case_content">机械</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case8.png"></div>
                        <div class="case_content">家具</div>
                    </div>
					<div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case9.png"></div>
                        <div class="case_content">装潢</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case10.png"></div>
                        <div class="case_content">灯饰</div>
                    </div>
                </div>
                <div class="col-xs-4 col-md-2">
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case11.png"></div>
                        <div class="case_content">五金配件</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case12.png"></div>
                        <div class="case_content">安全座椅</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case13.png"></div>
                        <div class="case_content">化妆品</div>
                    </div>
					<div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case14.png"></div>
                        <div class="case_content">家居</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case15.png"></div>
                        <div class="case_content">园艺</div>
                    </div>
                </div>
                <div class="col-xs-4 col-md-2">
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case16.png"></div>
                        <div class="case_content">母婴用品</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case17.png"></div>
                        <div class="case_content">涂料</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case18.png"></div>
                        <div class="case_content">发烧友用品</div>
                    </div>
					<div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case19.png"></div>
                        <div class="case_content">小家电</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case20.png"></div>
                        <div class="case_content">精密仪器</div>
                    </div>
                </div>
                <div class="col-xs-4 col-md-2">
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case21.png"></div>
                        <div class="case_content">可佩戴设备</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case22.png"></div>
                        <div class="case_content">卫浴</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case23.png"></div>
                        <div class="case_content">建材</div>
                    </div>
					<div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case24.png"></div>
                        <div class="case_content">航模</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case25.png"></div>
                        <div class="case_content">宠物</div>
                    </div>
                </div>
                <div class="col-xs-4 col-md-2">
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case26.png"></div>
                        <div class="case_content">清洁用具</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case27.png"></div>
                        <div class="case_content">玩具</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case28.png"></div>
                        <div class="case_content">茶叶</div>
                    </div>
					<div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case29.png"></div>
                        <div class="case_content">奢侈品</div>
                    </div>
                    <div class="case_list">
                        <div class="case_img"><img src="http://yhb360.qiniudn.com/images/case30.png"></div>
                        <div class="case_content">户外用品</div>
                    </div>
                </div>
            </div>
            <div class="case_title">无论您身处什么行业，只要有描述产品的需求，就可以适用！</div>
        </div>
    </div>
    <div class="footer">
        <div class="w980">
            <img src="http://yhb360.qiniudn.com/images/footer_logo.png" class="footer_logo">
            <a href="javascript:void(0);" class="add_botton botton">立即免费使用</a>
        </div>
    </div>
    <div class="bottom">
        沪ICP备11046618号-1　Copyright©2014
    </div>
	<div class="feedback">
	<div class="feedback_content" style="padding:10px;height:auto">
		<div class="feedback_title">在线客服</div>
		<div class="feedback_content_box" style="display:none">
			<textarea id="feedback_content">在这里留下您的意见</textarea>
			<div class="feedback_email_box">
				<input type="submit" id="sub_feedback" value="提交反馈"/>
				<input type="text" id="feedback_email" value="请输入您的邮箱"/>
			</div>
		</div>
		<a href="http://kefu6.kuaishang.cn/bs/im.htm?cas=13003___383498&fi=13063" style="display:block;margin:10px 0 15px;" target=_blank><img src="__PUBLIC__/img/kefu1.jpg" border='0' /></a>
		<a href="http://kefu6.kuaishang.cn/bs/im.htm?cas=13001___254766&fi=13061" style="display:block;margin:10px 0;" target=_blank><img src="__PUBLIC__/img/kefu2.jpg" border='0' /></a>
	</div>
	<div class="feedback_button"></div>
</div>
<script type="text/javascript" src="http://kefu6.kuaishang.cn/bs/ks.j?cI=383498&fI=13063" charset="utf-8"></script>
<script>
	$(function(){
		$('#feedback_email').focus(function(){
			if($(this).val() == '请输入您的邮箱')	$(this).val('');
		}).blur(function(){
			if(!$(this).val())	$(this).val('请输入您的邮箱');
		});
		$('#feedback_content').focus(function(){
			if($(this).val() == '在这里留下您的意见')	$(this).val('');
		}).blur(function(){
			if(!$(this).val())	$(this).val('在这里留下您的意见');
		});
		var menuYloc = $(".feedback").offset().top; 
		$(window).scroll(function (){ 
			var offsetTop = menuYloc + $(window).scrollTop() +"px"; 
			$(".feedback").animate({top : offsetTop },{ duration:600 , queue:false }); 
		}); 
		$(".feedback_button").mouseenter(function(){
			$(this).hide();
			$(".feedback").width(120);
			$(".feedback_content").show();
		});
		$('#feedback_close').click(function(){
			$(".feedback").width(46);
			$(".feedback_content").hide();
			$(".feedback_button").show();
		});
		$(".feedback").mouseleave(function(){
			if(($("#feedback_content").val() == '' || $("#feedback_content").val() == '在这里留下您的意见') && ($("#feedback_email").val() == '' || $("#feedback_email").val() == '请输入您的邮箱')){
				$(".feedback").width(46);
				$(".feedback_content").hide();
				$(".feedback_button").show();
			}
		});
		$("*[class!=feedback]").click(function(){
			if(($("#feedback_content").val() == '' || $("#feedback_content").val() == '在这里留下您的意见') && ($("#feedback_email").val() == '' || $("#feedback_email").val() == '请输入您的邮箱')){
				$(".feedback").width(46);
				$(".feedback_content").hide();
				$(".feedback_button").show();
			}
		});
		$('#sub_feedback').click(function(){
			var content = $('#feedback_content').val();
			var email = $('#feedback_email').val();
			if(content != '在这里留下您的意见'){
				$.post('<?php echo U("member/feedback");?>',{content : content, email : email},function(data){
					if(data.status == '1'){
						layer.alert(data.info,-1);
						$("#feedback_content").val('');
						$("#feedback_email").val('');
						$(".feedback").width(46);
						$(".feedback_content").hide();
						$(".feedback_button").show();
					}else{
						layer.alert(data.info,-1);
					}
				});
			} else {
				layer.alert('您忘记写反馈的内容了！',-1);
			}
		});
	});
	
	//百度统计
	var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F287083f19481e4a2a0e7db232e8085cc' type='text/javascript'%3E%3C/script%3E"));
	
</script>
</body>
</html>