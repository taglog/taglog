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
<link rel="stylesheet" type="text/css" href="http://yhb360.qiniudn.com/css/uploadify.css">
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
<script src="http://yhb360.qiniudn.com/js/jquery-ui-1.10.0.custom.min.js"></script>
<script src="http://yhb360.qiniudn.com/js/bootstrap.js"></script>
<script src="http://yhb360.qiniudn.com/js/layer/layer.min.js"></script>
<script src="http://yhb360.qiniudn.com/js/jquery.uploadify.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" src="http://yhb360.qiniudn.com/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="http://yhb360.qiniudn.com/js/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="http://yhb360.qiniudn.com/js/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body class="no_index">
    <div class="top">
		<div class="w980">
			<div class="login">
				<?php if(session('?email')): ?><a title="个人中心" href="javascript:void(0)" class="return_other" rel="<?php echo U('member/home');?>"><?php echo session('email');?>&nbsp;<font id="message_tips" color="#1DB1AB">(0)</font></a>
				<span><a href="javascript:void(0)" class="return_other" rel="<?php echo U('member/index');?>">我的说明书</a></span>
				<a class="return_other" rel="<?php echo U('member/logout');?>" href="javascript:void(0)">退出</a>
				<?php else: ?>
				<span><a  class="return_other" rel="<?php echo U('member/login');?>" href="javascript:void(0)">登录</a></span>
				<a class="return_other" rel="<?php echo U('member/register');?>" href="javascript:void(0)">注册</a><?php endif; ?>
			</div>
			<a class="return_other" href="javascript:void(0);" rel="<?php echo U('index/index');?>" style="float:left"><img src="http://yhb360.qiniudn.com/images/logo.png" class="logo"></a>
		</div>
	</div>
    <div class="naver">
         <div class="w980">
			<button class="input_botton fr" id="product_submit"><img src="http://yhb360.qiniudn.com/images/view2_ico.png"><span>查看结果</span></button>
			<button class="input_botton fr" id="product_save"><span>保存</span></button>
			 <a href="http://www.yhb360.com/prd/23" class="fr" style="margin-right:15px;margin-top: 5px;text-decoration: underline;font-size:13px;" target="_blank">视频太大怎么办？</a>
            <a href="javascript:void(0)" class="return_other" rel="<?php echo U('index/index');?>">返回首页</a> &gt;
            <a href="javascript:void(0)" class="return_other" rel="<?php echo U('member/index');?>">返回根目录</a>
        </div>
    </div>
    <div class="w980 main_table">
		<form method="post" id="product_form" action="">
        <div class="product_left tips_p">
			<textarea name="name" placeholder="请输入说明书标题" id="name" class="product_title"></textarea>
			<textarea name="description" placeholder="请输入关键字，以便用户检索。多个关键字请用空格分隔" class="product_description" id="description"></textarea>
			<div id="mousetips"></div>
        </div>
		<script>
		$(function(){
			var b=30;
			var c=$("#mousetips").offset();
			var a=$(window).scrollTop();
			if(a>c.top-b){
				$("#mousetips").css({position:'fixed',top:b})
			}else{
				$("#mousetips").css({position:'relative',top:''})
			};
			$(window).scroll(function(){
				var a=$(window).scrollTop();
				if(a>c.top-b){
					$("#mousetips").css({position:'fixed',top:b})
				}else{
					$("#mousetips").css({position:'relative',top:''})
				}
			});
		});
		</script>
		<div class="product_right">
			<div class="product_info">
			<?php if(false): ?><div class="pruduct_images">
					<div id="pruduct_images" >点击上传图片</div>
				</div><?php endif; ?>
				<div id="page0" class="product_page_count">
					<input name="pages[0][subject]" class="product_page_title" placeholder="请输入本页标题，比如“安装方法”，“售后服务”等。" rel="0" />
					<div class="pruduct_box" rel="0">
						<a class="content_hide" href="javascript:void(0)"></a>
						<a class="content_show" href="javascript:void(0)"></a>
						<a class="content_delete" href="javascript:void(0)"></a>
						<div class="pruduct_content_box">
							<textarea id="product_0_content_0_description" name="pages[0][content][0][description]"></textarea>
						</div>
						<div class="pruduct_flie_box">
							<input id="product_0_content_0_file" type="file" multiple="true">
						</div>
					</div>
				</div>
				<a href="javascript:void(0)" id="add_page_content">点此新增一段描述</a>
			</div>
			<div class="product_right_right">
				<div class="right_box product_page active" id="product_page0" rel="0">
					<p class="page_code">第1页</p>
					<p class="page_title"></p>
					<div class="edit_box" style="display: none;"><a class="edit" rel="0" href="javascript:void(0)"></a><a class="delete" rel="0" href="javascript:void(0)"></a></div>
					<input type="hidden" class="page_sort" value="1" name="pages[0][sort_id]">
				</div>
				<div class="right_box add_product_page"><a class="add" id="add_product_page" href="javascript:void(0)">新增一页</a></div>
			</div>
			<div class="clear"></div>
        </div>
		</form>
        <div class="clear"></div>
    </div>
	<?php $timestamp = time(); ?>
	<script type="text/javascript">
		var now_page = 0;
		var count_page = 1;
		var ue_array = new Array();
		var product_page = new Array(new Array());
		product_page[now_page]['content_num'] = 0;
		product_page[now_page]['file_num'] = new Array('0');
		$(function() {
			/*
			$('#product_save').click(function(){
				if($('#product_id').length > 0){
					post_url = '<?php echo U('product/edit','product_id=');?>' + $('#product_id').val();
				}else{
					post_url = '<?php echo U('product/add');?>';
				}
				$.post(post_url,$("#product_form").serialize(),function(data){
					if($('#product_id').length <= 0 && data.status == 1){
						$("#product_form").prepend('<input name="product_id" id="product_id" value="'+data.data.product_id+'" type="hidden"/><input type="hidden" name="verify" value="'+data.data.verify+'">');
					}
					layer.msg(data.info,1,1);
				},'json');
			});
			$('.return_index').click(function(){
				$.get('<?php echo U("member/islogin");?>',function(data){
					if(data.data == 1){
						window.location.href="<?php echo U('member/index');?>";
					}else{
						<?php if($islogin == 1): ?>var title = '时光流逝，您已登录超时,请重新登录:-)';
							var url = "<?php echo U('member/login','','','',true);?>";
						<?php else: ?>
							var title = '您需要先注册一个帐号，才能为您创建根目录，现在就去注册么？';
							var url = "<?php echo U('member/register','','','',true);?>";<?php endif; ?>
						layer.confirm(title,function(){
							var w=window.open();
							setTimeout(function(){ 
								w.location=url; 
							}, 500)
							
							return false;
						})
						
					}
				});
			});*/
			$('#description').bind('keyup', function(){
				var myReg = /^[^@\/\'\\\",\.，。、;；……【】\[\]{}\(\)\+\-“”'‘’\?\|#$%&\^\*]+$/;
				if($(this).val() && !myReg.test($(this).val())){
					$('#mousetips').html('你输入的分隔符有误，多个关键字请用空格分隔').css({background:'#C86490'});
				}else{
					$('#mousetips').html('请输入关键词。用于您对您的产品进行准确分类，方便消费者检索，多个关键字请用空格分隔。').css({background:'#4bbeba'});
				}
			});
			$('#product_save').click(function(){
				if($('#product_id').length > 0){
					post_url = '<?php echo U('product/edit','product_id=');?>' + $('#product_id').val();
				}else{
					post_url = '<?php echo U('product/add');?>';
				}
				$.post(post_url,$("#product_form").serialize(),function(data){
					if($('#product_id').length <= 0 && data.status){
						$("#product_form").prepend('<input name="product_id" id="product_id" value="'+data.data.product_id+'" type="hidden"/><input type="hidden" name="verify" value="'+data.data.verify+'">');
						$('.return_login').attr('href', "<?php echo U('member/login');?>&product_id="+data.data.product_id);
						$('.return_register').attr('href', "<?php echo U('member/register');?>&product_id="+data.data.product_id);
						var url = 'http://www.yhb360.com/recall/'+data.data.product_id+'/'+data.data.verify;
						$('#usertips').html('由于您尚未注册，请保存此文档的编辑链接，以便下次访问<a  class="copy_button" target="_blank" href="'+url+'">'+url+'</a>。否则关闭浏览器您将无法找回已创建说明书。我们建议您注册一个帐户，这样您已创建和编辑的文档将会保存到您的帐号内。');
						<?php if(!session('?member_id')): ?>no_register_tips();<?php endif; ?>
					}
					if(data.status == 1) {
						if($('.uploadify-queue-item').length > 0){
							layer.alert(data.info + ',检测到您正在上传图片或视频，为防止您的数据丢失，请上传完成后再次保存。',1);
						}else{
							layer.alert(data.info,1);
							window.onbeforeunload = null;
						}
					}else if(data.status == 2){
						if($('.uploadify-queue-item').length > 0){
							layer.alert(data.info + ',检测到您正在上传图片或视频，为防止您的数据丢失，请上传完成后再次保存。',1);
						}else{
							layer.alert(data.info,1);
							window.onbeforeunload = null;
						}
					}else{
						layer.alert(data.info,-1);
					}
					<?php if(!session('?member_id')): ?>var unloadPageTip = function(){
							return "您尚未注册，将会丢失已编辑的内容。强烈建议您先“取消”，到屏幕下方的提示框内，注册或者复制链接，然后再离开。现在点击“确认”将强行离开。";
						};
						window.onbeforeunload = unloadPageTip;<?php endif; ?>
				},'json');
			});
			/*$('.return_index').click(function(){
				$.get('<?php echo U("member/islogin");?>',function(data){
					if(data.data == 1){
						window.location.href="<?php echo U('member/index');?>";
					}else{
						var product_id = $('#product_id').val() ? $('#product_id').val() : '';
						if(product_id){
							var title = '您需要先注册一个帐号，才能为您创建根目录，现在就去注册么？';
							var url = "<?php echo U('member/register','','','',true);?>&product_id="+product_id;
							
							layer.confirm(title,function(){
								window.onbeforeunload = null;
								setTimeout(function(){
									location.href="<?php echo U('member/register');?>";
								}, 500)
								
								return false;
							});
						}else{
							location.href="<?php echo U('member/register');?>";
						}
					}
				});
			});*/
			$('.return_other').click(function(){
				if($('.uploadify-queue-item').length > 0){
					layer.alert('检测到您正在上传图片或视频，为防止您的数据丢失，请上传完成后再操作。',1);
				}else if($('#product_id').length > 0){
					window.onbeforeunload = null;
					post_url = '<?php echo U('product/edit','product_id=');?>' + $('#product_id').val();
					var obj = $(this);
					if(obj.attr('rel') != '<?php echo U('member/index');?>'){
						window.onbeforeunload = null;
						layer.msg('正在为您保存数据，稍后自动跳转。', 1, 0);
						$.post(post_url,$("#product_form").serialize(),function(data){
							
							if(data.status == 1 || data.status == 2){
								layer.msg('保存成功', 1, 1);
								window.location.href=obj.attr('rel');
							}else{
								if(data.data == 100){
									$.layer({
										shade: [0],
										area: ['auto','auto'],
										dialog: {
											msg: '保存失败，您有可能已经处于离线状态了，点击确认在新窗口重新登录后，再来此页面保存修改。',
											btns: 2,                    
											type: 4,
											btn: ['重新登录','直接离开'],
											yes: function(){
												var w=window.open();
												w.location='<?php echo U('member/login');?>'; 
												layer.closeAll();
											}, no: function(){
												window.location.href=obj.attr('rel');
											}
										}
									});
								}else{
									layer.confirm('保存失败，'+data.info+'，点击确认将放弃编辑内容直接离开，取消继续编辑',function(){
										var w=window.open();
										setTimeout(function(){ 
											w.location='<?php echo U('member/login');?>'; 
										}, 500)
										return false;
									});
									$.layer({
										shade: [0],
										area: ['auto','auto'],
										dialog: {
											msg: '保存失败，'+data.info+'，点击继续编辑将留在页面继续编辑，确认将放弃当前内容直接离开',
											btns: 2,                    
											type: 4,
											btn: ['继续编辑','直接离开'],
											yes: function(){
												layer.closeAll();
											}, no: function(){
												window.location.href=obj.attr('rel');
											}
										}
									});
								}
								
							}
						},'json');
						
					}else{
						window.onbeforeunload = null;
						<?php if(session('member_id')): ?>layer.msg('正在为您保存数据，稍后自动跳转。', 1, 0);
							post_url = '<?php echo U('product/edit','product_id='.$product['product_id']);?>';
							$.post(post_url,$("#product_form").serialize(),function(data){
								if(data.status == 1){
									layer.msg('保存成功', 1, 1);
									window.location.href=obj.attr('rel');
								}else{
									if(data.data == 100){
										$.layer({
											shade: [0],
											area: ['auto','auto'],
											dialog: {
												msg: '保存失败，您有可能已经处于离线状态了，点击确认在新窗口重新登录后，再来此页面保存修改。',
												btns: 2,                    
												type: 4,
												btn: ['重新登录','直接离开'],
												yes: function(){
													var w=window.open();
													w.location='<?php echo U('member/login');?>'; 
													layer.closeAll();
												}, no: function(){
													window.location.href=obj.attr('rel');
												}
											}
										});
									}else{
										layer.confirm('保存失败，'+data.info+'，点击确认将放弃编辑内容直接离开，取消继续编辑',function(){
											var w=window.open();
											setTimeout(function(){ 
												w.location='<?php echo U('member/login');?>'; 
											}, 500)
											return false;
										});
										$.layer({
											shade: [0],
											area: ['auto','auto'],
											dialog: {
												msg: '保存失败，'+data.info+'，点击继续编辑将留在页面继续编辑，确认将放弃当前内容直接离开',
												btns: 2,                    
												type: 4,
												btn: ['继续编辑','直接离开'],
												yes: function(){
													layer.closeAll();
												}, no: function(){
													window.location.href=obj.attr('rel');
												}
											}
										});
									}
								}
							},'json');
						<?php else: ?>
							var title = '您需要先注册一个帐号，才能为您创建根目录，现在就去注册么？';
							var url = "<?php echo U('member/register','','','',true);?>";
							layer.confirm(title,function(){
								window.location.href=url;
								return false;
							});<?php endif; ?>
					}
				}else{
					window.location.href=$(this).attr('rel');
				}
			});
			
			//表单提交按钮
			$('#product_submit').click(function(){
				if($('.uploadify-queue-item').length > 0){
					if($('#product_id').length > 0){
						post_url = '<?php echo U('product/edit','product_id=');?>' + $('#product_id').val();
					}else{
						post_url = '<?php echo U('product/add');?>';
					}
					$.post(post_url,$("#product_form").serialize(),function(data){
						if($('#product_id').length <= 0 && data.status){
							$("#product_form").prepend('<input name="product_id" id="product_id" value="'+data.data.product_id+'" type="hidden"/><input type="hidden" name="verify" value="'+data.data.verify+'">');
							$('.return_login').attr('href', "<?php echo U('member/login');?>&product_id="+data.data.product_id);
							$('.return_register').attr('href', "<?php echo U('member/register');?>&product_id="+data.data.product_id);
							var url = 'http://www.yhb360.com/recall/'+data.data.product_id+'/'+data.data.verify;
							$('#usertips').html('由于您尚未注册，请保存此文档的编辑链接，以便下次访问<a  class="copy_button" target="_blank" href="'+url+'">'+url+'</a>。否则关闭浏览器您将无法找回已创建说明书。我们建议您注册一个帐户，这样您已创建和编辑的文档将会保存到您的帐号内。');
							<?php if(!session('?member_id')): ?>no_register_tips();<?php endif; ?>
						}
						if(data.status == 1) {
							if($('.uploadify-queue-item').length > 0){
								layer.alert('检测到您正在上传图片或视频，为防止您数据丢失，请上传完成后再查看结果。',-1);
							}else{
								layer.alert(data.info,1);
								window.onbeforeunload = null;
							}
						}else if(data.status == 2){
							if($('.uploadify-queue-item').length > 0){
								layer.alert('检测到您正在上传图片或视频，为防止您数据丢失，请上传完成后再查看结果。',-1);
							}else{
								layer.alert(data.info,1);
								window.onbeforeunload = null;
							}
						}else{
							layer.alert(data.info,-1);
						}
						<?php if(!session('?member_id')): ?>var unloadPageTip = function(){
								return "直接离开可能会已编辑的内容。强烈建议您先“取消”，到屏幕下方的提示框内，注册或者复制链接，然后再离开。现在点击“确认”将强行离开。";
							};
							window.onbeforeunload = unloadPageTip;<?php endif; ?>
					},'json');
					return false;
				}else{
					if($('#name').val() == ''){
						layer.alert('请填写说明书标题',-1);
						return false;
					}
					if($('#product_id').length > 0){
						$('#product_form').attr('action','<?php echo U('product/edit');?>');
					}
					window.onbeforeunload = null;
					$('#product_form').submit();
				}
			});
			//选择页面
			$('.product_right_right').on('click','.product_page .edit',function(){
				now_page = $(this).attr('rel');
				$('.product_page').removeClass('active');
				$(this).parent().parent().addClass('active');
				$('.product_page_count').css({height:0});
				$('#page'+now_page).css({height:''});
			});
			//删除页面
			$('.product_right_right').on('click','.product_page .delete',function(event){
				var title_id = $(this).attr('rel');
				var obj = $(this);
				if($('.product_right_right').children().length > 2){
					layer.confirm('本页面内的所有文字、视频、图片都会被删除，确定要删除吗？',function(){
						ue_array[title_id] = new Array();
						if(!$('#page'+title_id).is(":hidden")){
							if(obj.parent().parent().prev().length > 0){
								$('#page'+title_id).prev().css({'height':''});
								obj.parent().parent().prev().addClass('active');
								now_page = obj.parent().parent().prev().attr('rel');
							}else{
								$('#page'+title_id).next().css({'height':''});
								obj.parent().parent().next().addClass('active');
								now_page = obj.parent().parent().next().attr('rel');
							}
						}
						var page_obj = $('#page'+title_id);
						page_obj[0].innerHTML = '';
						page_obj.remove();
						obj.parent().parent().remove();
						$.each($(".product_right_right .product_page"), function(i, item){
							var sort = i+1;
							$(item).find('.page_code').html('第'+sort+'页');
							$(item).find('.page_sort').val(sort);
						});
						layer.msg('删除成功',1,1);
					});
				}
			});
			//隐藏编辑删除按钮
			$('.product_right_right').on('mouseleave','.product_page',function(){
				$(this).find('.edit_box').hide();
				$('#mousetips').html('').css({background:'#4bbeba'});
			});
			//显示编辑删除按钮
			$('.product_right_right').on('mouseenter','.product_page',function(){
				$(this).find('.edit_box').show();
				$('#mousetips').html('1）点击此处编辑按钮可以在中间编辑区域显示该页的详细信息。<br />2）点击此处删除按钮可以删除该页，请小心操作。<br />3）直接拖拽可以改变页面的顺序哦~').css({background:'#4bbeba'});
			});
			//同步页面标题
			$('.product_info').on('change','.product_page_title',function(){
				var title_id = $(this).attr('rel');
				$('#product_page'+title_id).find('.page_title').html($(this).val());
			});
			//删除描述块
			$('.product_info').on('click','.pruduct_box .content_delete',function(){
				var obj = this;
				layer.confirm('本描述单元内的所有文字、视频、图片都会被删除，确定要删除吗？',function(){
					var ue_id = $(obj).parent().attr('rel');
					ue_array[now_page][ue_id] = null;
					var parent = $(obj).parent();
					parent[0].innerHTML='';
					parent.remove();
					layer.msg('删除成功',1,1);
				});
			});
			//收起描述块
			$('.product_info').on('click','.pruduct_box .content_hide',function(){
				var content_box_id = $(this).parent().attr('rel');
				var str = '';
				if(ue_array[now_page][content_box_id].hasContents()){
					str = ue_array[now_page][content_box_id].getContentTxt().substring(0,35);
				}
				$(this).parent().prepend('<div class="content_box_title">'+str+'</div>').css({height:42,overflow:'hidden'});
				$(this).hide();
				$(this).siblings('.content_show').show();
			});
			//展开描述块
			$('.product_info').on('click','.pruduct_box .content_show',function(){
				$(this).siblings('.content_box_title').remove();
				$(this).parent().css({height:''});
				$(this).hide();
				$(this).siblings('.content_hide').show();
			});
			//增加页面
			$('#add_product_page').click(function(){
				now_page = count_page++;
				product_page[now_page] = new Array();
				product_page[now_page]['content_num'] = 0;
				product_page[now_page]['file_num'] = new Array('0');
				var sort_id = 1 + $(this).parent().siblings().length;
				var html = '<div class="right_box product_page" id="product_page'+now_page+'" rel="'+now_page+'"><p class="page_code">第'+sort_id+'页</p><p class="page_title"></p><div class="edit_box" style="display: none;"><a class="edit" rel="'+now_page+'" href="javascript:void(0)"></a><a class="delete" rel="'+now_page+'" href="javascript:void(0)"></a></div><input type="hidden" class="page_sort" value="'+sort_id+'" name="pages['+now_page+'][sort_id]"></div>';
				$(this).parent().before(html);
				var content_html = '<div id="page'+now_page+'" class="product_page_count"><input name="pages['+now_page+'][subject]" class="product_page_title" placeholder="请输入本页标题，比如“安装方法”，“售后服务”等。" rel="'+now_page+'" /><div class="pruduct_box" rel="0"><a class="content_hide" href="javascript:void(0)"></a><a class="content_show" href="javascript:void(0)"></a><a class="content_delete" href="javascript:void(0)"></a><div class="pruduct_content_box"><textarea id="product_'+now_page+'_content_0_description" name="pages['+now_page+'][content][0][description]"></textarea></div><div class="pruduct_flie_box"><input id="product_'+now_page+'_content_0_file" type="file" multiple="true"></div></div></div>';
				$('#add_page_content').before(content_html);
				page_init();
				$('.product_page').removeClass('active');
				$('#product_page'+now_page).addClass('active');
				$('.product_page_count').css({height:0});
				$('#page'+now_page).css({height:''});
			});
			$('#add_product_page').mouseenter(function(){
				$('#mousetips').html('点击此处可以在说明书中新增一页。届时消费者向右滑动手机可以看到。').css({background:'#4bbeba'});
			}).mouseleave(function(){
				$('#mousetips').html('').css({background:'#4bbeba'});
			});
			<?php if(false): ?>$('.pruduct_images').mouseenter(function(){
				$('#mousetips').html('1）说明书的首页大图，将会显示在您的说明书的第一页的最上面。点击直接上传。<br />2）如果图片已将上传，点击删除按钮可以删除已上传的图片。<br /> 3）您也可以不上传图片，此时说明书将没有头图，而会显示您用文字编辑的说明书标题。').css({background:'#4bbeba'});
			}).mouseleave(function(){
				$('#mousetips').html('').css({background:'#4bbeba'});
			});<?php endif; ?>
			$('.product_info').on('mouseenter','.pruduct_box .product_page_img',function(e){
				$('#mousetips').html('这里是您已经上传的视频（图片）。点击删除按钮可以直接删除。').css({background:'#4bbeba'});
				e.preventDefault();
			}).on('mouseleave','.pruduct_box .product_page_img',function(e){
				$('#mousetips').html('').css({background:'#4bbeba'});
				e.preventDefault();
			});
			$('.product_info').on('mouseenter','.pruduct_box .uploadify',function(e){
				$('#mousetips').html('1）点击此处可以上传说明书的图片，尤其可以上传视频哦！<br/>2）建议视频不要过长，因为太长的视频消费者拖拽查找不方便。较长的视频建议可以分段，配合不同步骤的文字上传。这样比较方便消费者检索查找。').css({background:'#4bbeba'});
				e.preventDefault();
			}).on('mouseleave','.pruduct_box .uploadify',function(e){
				$('#mousetips').html('1）点击右上角的叉叉可以删除本段描述<br />2）请注意：本段内的文字和视频（图片）都会被删除哦，所以请小心操作。<br />3）点击左上角的"^"可以收起本段。').css({background:'#4bbeba'});
				e.preventDefault();
			});
			$('#add_page_content').mouseenter(function(){
				$('#mousetips').html('点击这里可以展开一个新的描述区域，方便您描述下一步骤。').css({background:'#4bbeba'});
			}).mouseleave(function(){
				$('#mousetips').html('').css({background:'#4bbeba'});
			});
			$('.product_page_title').mouseenter(function(){
				$('#mousetips').html('请输入本页标题，比如“安装方法”，“售后服务”等。').css({background:'#4bbeba'});
			}).mouseleave(function(){
				$('#mousetips').html('').css({background:'#4bbeba'});
			});
			$('#description').mouseenter(function(){
				if($('#mousetips').html() != '你输入的分隔符有误，多个关键字请用空格分隔'){
					$('#mousetips').html('请输入关键词。用于您对您的产品进行准确分类，方便消费者检索，多个关键字请用空格分隔。').css({background:'#4bbeba'});
				}
			}).mouseleave(function(){
				if($('#mousetips').html() != '你输入的分隔符有误，多个关键字请用空格分隔'){
					$('#mousetips').html('').css({background:'#4bbeba'});
				}
			});
			$('.product_info').on('mouseenter','.pruduct_box',function(e){
				$('#mousetips').html('1）点击右上角的叉叉可以删除本段描述<br />2）请注意：本段内的文字和视频（图片）都会被删除哦，所以请小心操作。<br />3）点击左上角的"^"可以收起本段。').css({background:'#4bbeba'});
				e.preventDefault();
			}).on('mouseleave','.pruduct_box',function(e){
				$('#mousetips').html('').css({background:'#4bbeba'});
				e.preventDefault();
			});
			$('.product_info').on('mouseenter','.pruduct_box .pruduct_content_box',function(e){
				$('#mousetips').html('1）请在此添加一段文字，比如一个步骤、一点注意事项等。<br />2）在文本框内点击右键，可以高级编辑哦~').css({background:'#64C864'});
				e.preventDefault();
			}).on('mouseleave','.pruduct_box .pruduct_content_box',function(e){
				$('#mousetips').html('1）点击右上角的叉叉可以删除本段描述<br />2）请注意：本段内的文字和视频（图片）都会被删除哦，所以请小心操作。<br />3）点击左上角的"^"可以收起本段。').css({background:'#4bbeba'});
				e.preventDefault();
			});
			$('#product_submit').mouseenter(function(){
				$('#mousetips').html('点击此处，立即在云端生成您的说明书与二维码，去看看效果吧~<br />编辑过程中也可以去看看，随时可以返回编辑。').css({background:'#4bbeba'});
			}).mouseleave(function(){
				$('#mousetips').html('').css({background:'#4bbeba'});
			});
			<?php if(false): ?>//删除图片
			$('.pruduct_images').on('click','#image_delete',function(){
				$(this).siblings('.uploadify-queue').children().remove().show();
				$(this).siblings('.uploadify-queue').show();
				$(this).siblings('.uploadify').show();
				$(this).siblings('input').remove();
				$(this).siblings('img').remove();
				$(this).remove();
			});<?php endif; ?>
			$('.product_info').on('click','.pruduct_box .img_delete',function(){
				$(this).parent().siblings('.uploadify_img_status').remove();
				$(this).parent().remove();
			});
			<?php if(false): ?>//初始化说明书图片
			$('#pruduct_images').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo ($timestamp); ?>',
					'token'     : '<?php echo md5("instructions" . $timestamp);?>'
				},
				'swf'      : './js/uploadify.swf',
				'uploader' : '<?php echo U("file/uploadify");?>',
				'multi' : false,
				'fileTypeExts': '*.jpg;*.jpeg;*.gif;*.png;*.bmp;',
				'removeTimeout' : 0,
				'buttonClass' : 'file_button_bg',
				'fileSizeLimit':'8MB',
				'onUploadSuccess':function(file, data, response){
					var info = eval("("+data+")")
					if(info.status == '0'){
						layer.alert(info.info,-1);
					}else{
						$('.pruduct_images').children().hide(),
						$('.pruduct_images').append('<input type="hidden" id="image" name="image" value="'+info.data.path+'"><img class="uploadify_img" width="100%" src="'+info.data.path+'" /><a href="javascript:void(0)" id="image_delete"></a>');
						$('#pruduct_images-queue').css({'margin-top':50});
					}
					$('#pruduct_images').uploadify('disable',false);
				},
				'onSelect' : function(file) {
				　　$('#pruduct_images-queue').css({'margin-top':20});
					$('#pruduct_images').uploadify('disable',true);
				},
				'buttonText':'&nbsp;',
				'height':44,
				'width':186
			});<?php endif; ?>
			//新加描述按钮
			$('#add_page_content').click(function(){
				var num = ++product_page[now_page]['content_num'];
				product_page[now_page]['file_num'][num] = 0;
				$('#page'+now_page).append('<div class="pruduct_box" rel="'+num+'"><a class="content_hide" href="javascript:void(0)"></a><a class="content_show" href="javascript:void(0)"></a><a class="content_delete" href="javascript:void(0)"></a><div class="pruduct_content_box" rel="'+num+'"><textarea id="product_'+now_page+'_content_'+num+'_description" name="pages['+now_page+'][content]['+num+'][description]"></textarea></div><div class="pruduct_flie_box"><input id="product_'+now_page+'_content_'+num+'_file" type="file" multiple="true"></div></div>');
				ue_array[now_page][num] = UE.getEditor('product_'+now_page+'_content_'+num+'_description');
				$('#product_'+now_page+'_content_'+num+'_file').uploadify({
					'buttonText': '&nbsp;',
					'fileTypeDesc' : '图片或视频文件',
					'fileTypeExts' : '*.jpg;*.jpeg;*.gif;*.png;*.bmp;*.avi;*.mp4;*.mpg;*.flv;*.wmv;*.mov;*.3gp;*.rmvb;*.mp3;*.wav;*.f4v;*.mkv;*.asf;*.264;*.ts;*.mts;*.dat;*.vob;',//文件类型过滤
					'swf': './js/uploadify.swf',
					'multi' : false,
					'removeTimeout' : 0,
					'buttonClass' : 'file_button_bg',
					'height':44,
					'width':186,
					'overrideEvents': ["onSelectError","onDialogClose","onUploadError","onCancel"],
					'fileSizeLimit':'1GB',
					'onSelect': function(file){
						var now_page_num = now_page;
						file.type = file.type.toLowerCase();
						if(file.type == '.mp4' ||file.type == '.avi' ||file.type == '.mov' ||file.type == '.f4v' ||file.type == '.mpg' ||file.type == '.wav' ||file.type == '.flv' ||file.type == '.wmv' ||file.type == '.3gp' ||file.type == '.rmvb' ||file.type == '.mkv' ||file.type == '.asf' ||file.type == '.264' ||file.type == '.ts' ||file.type == '.mts' ||file.type == '.dat' ||file.type == '.vob' ||file.type == '.mp3'){
							if(file.size > <?php echo C('limit_video_size');?>){
								layer.alert('选择视频超过100M，请重新选择小于100M的视频！',-1);
								$('#product_'+now_page+'_content_'+num+'_file').uploadify('cancel','*');
							}
							$('#product_'+now_page+'_content_'+num+'_file').uploadify("settings","uploader",'http://v.polyv.net/uc/services/rest?method=uploadfile');
							$('#product_'+now_page+'_content_'+num+'_file').uploadify("settings",'formData',{
								'writetoken':'ql0zuWS75mvbgAy-w1NvhywuXqnj1vTL',
								'JSONRPC':'{"Filedata.filename":"'+file.name+'","tag":"标签", "description":"视频文档描述"}'
							});
							$('#product_'+now_page+'_content_'+num+'_file').uploadify("settings","onUploadSuccess",function(file, data, response){
								var file_num = product_page[now_page_num]['file_num'][num]++;
								var jsonobj=eval('('+data+')');
								if(jsonobj.error == 0){
									if(jsonobj.data[0].first_image.indexOf('processing.png') == -1){
										var first_image = jsonobj.data[0].first_image.replace(/.jpg/, "_b.jpg");
									}else{
										var first_image = '/images/processing.png';
									}
									var original_definition = jsonobj.data[0].original_definition.split('x');
									var html = '<div class="product_page_img"><div class="uploadify_img_box"><img class="uploadify_img" width="100%" src="'+first_image+'" /><a href="javascript:void(0);" class="img_delete"></a><input type="hidden" name="pages['+now_page_num+'][content]['+num+'][file]['+file_num+'][type]" value="video"><input type="hidden" name="pages['+now_page_num+'][content]['+num+'][file]['+file_num+'][first_image]" value="'+first_image+'"><input type="hidden" name="pages['+now_page_num+'][content]['+num+'][file]['+file_num+'][vid]" value="'+jsonobj.data[0].vid+'"><input type="hidden" name="pages['+now_page_num+'][content]['+num+'][file]['+file_num+'][width]" value="'+original_definition[0]+'"><input type="hidden" name="pages['+now_page_num+'][content]['+num+'][file]['+file_num+'][height]" value="'+original_definition[1]+'"><input type="hidden" name="pages['+now_page_num+'][content]['+num+'][file]['+file_num+'][mp4]" value="'+jsonobj.data[0].mp4+'"></div><div rel="'+jsonobj.data[0].vid+'" class="uploadify_img_status"><span>根据国家政策规定，您的视频正在被审核。建议您先进行其他编辑。20分钟左右后再查看结果将会自动生效。</span></div></div>';
									$('#product_'+now_page_num+'_content_'+num+'_file-queue').append(html);
								}else{
									switch(jsonobj.error){
									case 1:
										layer.alert('找不到writetoken关联的user',-1);
										break;
									case 2:
										layer.alert('文件为空或者writetoken为空',-1);
										break;
									case 3:
										layer.alert('提交的json名字JSONRPC为null',-1);
										break;
									case 4:
										layer.alert('提交文件格式不正确',-1);
										break;
									case 5:
										layer.alert('readtoken为空',-1);
										break;
									case 6:
										layer.alert('分页输入出错',-1);
										break;
									case 7:
										layer.alert('vid不能为空',-1);
										break;
									case 8:
										layer.alert('找不到方法名',-1);
										break;
									case 10:
										layer.alert('userid不能为空',-1);
										break;
									case 11:
										layer.alert('上传目录为空',-1);
										break;
									case 12:
										layer.alert('远程URL文件不能访问',-1);
										break;
									case 13:
										layer.alert('远程视频文件自定义名称不能为空',-1);
										break;
									case 15:
										layer.alert('其他异常',-1);
										break;
									case 16:
										layer.alert('空间已满',-1);
										break;
									case 17:
										layer.alert('用户无是用接口权限',-1);
										break;
									case 18:
										layer.alert('标题重复',-1);
										break;
									case 19:
										layer.alert('标题为空',-1);
										break;
									case 20:
										layer.alert('播放列表不存在',-1);
										break;
									case 21:
										layer.alert('参数错误',-1);
										break;
									default:
										layer.alert('未知错误',-1);
										break;
									}
								}
								$('#product_'+now_page_num+'_content_'+num+'_file').uploadify('disable',false);
							});
						}else if(file.type == '.jpg' ||file.type == '.jpeg' ||file.type == '.gif' ||file.type == '.png'){
							if(file.size > 20000000){
								layer.alert('选择图片超过2M，请重新选择小于2M的图片！',-1);
								$('#product_'+now_page_num+'_content_'+num+'_file').uploadify('cancel','*');
							}
							$('#product_'+now_page_num+'_content_'+num+'_file').uploadify("settings","uploader",'<?php echo U("file/uploadify");?>');
							$('#product_'+now_page_num+'_content_'+num+'_file').uploadify("settings",'formData',{
								'timestamp':'<?php echo ($timestamp); ?>',
								'token':'<?php echo md5("instructions" . $timestamp);?>'
							});
							$('#product_'+now_page_num+'_content_'+num+'_file').uploadify("settings","onUploadSuccess",function(file, data, response){
								var file_num = product_page[now_page_num]['file_num'][num]++;
								var info = eval("("+data+")")
								if(info.status == '0'){
									layer.alert(info.info,-1);
								}else{
									var html = '<div class="product_page_img"><img class="uploadify_img" width="100%" src="'+info.data.path+'" /><a href="javascript:void(0);" class="img_delete"></a><input type="hidden" name="pages['+now_page_num+'][content]['+num+'][file]['+file_num+'][type]" value="image"><input type="hidden" name="pages['+now_page_num+'][content]['+num+'][file]['+file_num+'][width]" value="'+info.data.width+'"><input type="hidden" name="pages['+now_page_num+'][content]['+num+'][file]['+file_num+'][height]" value="'+info.data.height+'"><input type="hidden" name="pages['+now_page_num+'][content]['+num+'][file]['+file_num+'][path]" value="'+info.data.path+'"></div>';
									$('#product_'+now_page_num+'_content_'+num+'_file-queue').append(html);
								}
								$('#product_'+now_page_num+'_content_'+num+'_file').uploadify('disable',false);
							});
						}else{
							layer.alert('未知的文件类型',-1);
							$('#product_'+now_page_num+'_content_'+num+'_file').uploadify('cancel','*');
						}
						$('#product_'+now_page_num+'_content_'+num+'_file').uploadify('disable',true);
					},
					'onSelectError':function(file){
						file.type = file.type.toLowerCase();
						if(file.type == '.mp4' ||file.type == '.avi' ||file.type == '.mov' ||file.type == '.f4v' ||file.type == '.mpg' ||file.type == '.wav' ||file.type == '.flv' ||file.type == '.wmv' ||file.type == '.3gp' ||file.type == '.rmvb' ||file.type == '.mkv' ||file.type == '.asf' ||file.type == '.264' ||file.type == '.ts' ||file.type == '.mts' ||file.type == '.dat' ||file.type == '.vob' ||file.type == '.mp3'){
							layer.alert('选择视频超过100M，请重新选择小于100M的视频！',-1);
						}else if(file.type == '.jpg' ||file.type == '.jpeg' ||file.type == '.gif' ||file.type == '.png'){
							layer.alert('选择图片过大，请重新选择图片！',-1);
						}
					},'onFallback':function(){
						layer.alert('当前浏览器不支持FLASH，无法正常使用视频（图片）上传功能',-1);
						return false;
					},
					'onCancel':function(){
						$('#product_'+now_page+'_content_'+num+'_file').uploadify('disable',false);
						$('#product_'+now_page+'_content_'+num+'_file').uploadify('cancel','*');
					},
					'onUploadError':function(file, errorcode, errormsg){
						if(errorcode != -280 ){
							layer.alert(errormsg,-1);
						}
						$('#product_'+now_page+'_content_'+num+'_file').uploadify('disable',false);
						$('#product_'+now_page+'_content_'+num+'_file').uploadify('cancel','*');
					}
				});
			});
			// 右侧拖拽效果
			$(".product_right_right").sortable({
				cursor: 'move',
				items: '.product_page',
				stop:function(event,ui){
					now_page = ui.item.attr('rel');
					$('.product_page').removeClass('active');
					ui.item.addClass('active');
					$('.product_page_count').css({height:0});
					$('#page'+now_page).css({height:''});
					var i = 1;
					$.each($(".product_right_right .product_page"), function(i, item){
						var sort = i+1;
						$(item).find('.page_code').html('第'+sort+'页');
						$(item).find('.page_sort').val(sort);
					});
					return true;
				}
			});
			// 右侧点击效果
			$(".product_right_right").on('click','.product_page',function(){
				now_page = $(this).attr('rel');
				$('.product_page').removeClass('active');
				$(this).addClass('active');
				$('.product_page_count').css({height:0});
				$('#page'+now_page).css({height:''});
			});
			
			page_init();
			
		});
		//初始化
		function page_init(){
			//初始化编辑器
			ue_array[now_page] = new Array();
			ue_array[now_page][0] = UE.getEditor('product_'+now_page+'_content_0_description');
			//初始化图片上传
			$('#product_'+now_page+'_content_0_file').uploadify({
				'buttonText': '&nbsp;',
				'fileTypeDesc' : '图片或视频文件',
				'fileTypeExts' : '*.jpg;*.jpeg;*.gif;*.png;*.bmp;*.avi;*.mp4;*.mpg;*.flv;*.wmv;*.mov;*.3gp;*.rmvb;*.mp3;*.wav;*.f4v;*.mkv;*.asf;*.264;*.ts;*.mts;*.dat;*.vob;',//文件类型过滤
				'swf': './js/uploadify.swf',
				'multi' : false,
				'removeTimeout' : 0,
				'buttonClass' : 'file_button_bg',
				'height':44,
				'width':186,
				'overrideEvents': ["onSelectError","onDialogClose","onUploadError","onCancel"],
				'fileSizeLimit':'1GB',
				'onSelect': function(file){
					var now_page_num = now_page;
					file.type = file.type.toLowerCase();
					if(file.type == '.mp4' ||file.type == '.avi' ||file.type == '.mov' ||file.type == '.f4v' ||file.type == '.mpg' ||file.type == '.wav' ||file.type == '.flv' ||file.type == '.wmv' ||file.type == '.3gp' ||file.type == '.rmvb' ||file.type == '.mkv' ||file.type == '.asf' ||file.type == '.264' ||file.type == '.ts' ||file.type == '.mts' ||file.type == '.dat' ||file.type == '.vob' ||file.type == '.mp3'){
						if(file.size > <?php echo C('limit_video_size');?>){
							layer.alert('选择视频超过100M，请重新选择小于100M的视频！',-1);
							$('#product_'+now_page_num+'_content_0_file').uploadify('cancel','*');
						}
						$('#product_'+now_page_num+'_content_0_file').uploadify("settings","uploader",'http://v.polyv.net/uc/services/rest?method=uploadfile');
						$('#product_'+now_page_num+'_content_0_file').uploadify("settings",'formData',{
							'writetoken':'ql0zuWS75mvbgAy-w1NvhywuXqnj1vTL',
							'JSONRPC':'{"Filedata.filename": "'+file.name+'","tag": "标签", "description": "视频文档描述"}'
						});
						$('#product_'+now_page_num+'_content_0_file').uploadify("settings","onUploadSuccess",function(file, data, response){
							var num = product_page[now_page_num]['file_num'][0]++;
							var jsonobj=eval('('+data+')');
							if(jsonobj.error == 0){
								if(jsonobj.data[0].first_image.indexOf('processing.png') == -1){
									var first_image = jsonobj.data[0].first_image.replace(/.jpg/, "_b.jpg");
								}else{
									var first_image = '/images/processing.png';
								}
								var original_definition = jsonobj.data[0].original_definition.split('x');
								var html = '<div class="product_page_img"><div class="uploadify_img_box"><img class="uploadify_img" width="100%" src="'+first_image+'" /><a href="javascript:void(0);" class="img_delete"></a><input type="hidden" name="pages['+now_page_num+'][content][0][file]['+num+'][type]" value="video"><input type="hidden" name="pages['+now_page_num+'][content][0][file]['+num+'][first_image]" value="'+first_image+'"><input type="hidden" name="pages['+now_page_num+'][content][0][file]['+num+'][vid]" value="'+jsonobj.data[0].vid+'"><input type="hidden" name="pages['+now_page_num+'][content][0][file]['+num+'][width]" value="'+original_definition[0]+'"><input type="hidden" name="pages['+now_page_num+'][content][0][file]['+num+'][height]" value="'+original_definition[1]+'"><input type="hidden" name="pages['+now_page_num+'][content][0][file]['+num+'][mp4]" value="'+jsonobj.data[0].mp4+'"></div><div rel="'+jsonobj.data[0].vid+'" class="uploadify_img_status"><span>根据国家政策规定，您的视频正在被审核。建议您先进行其他编辑。20分钟左右后再查看结果将会自动生效。</span></div></div>';
								$('#product_'+now_page_num+'_content_0_file-queue').append(html);
							}else{
								switch(jsonobj.error){
								case 1:
									layer.alert('找不到writetoken关联的user',-1);
									break;
								case 2:
									layer.alert('文件为空或者writetoken为空',-1);
									break;
								case 3:
									layer.alert('提交的json名字JSONRPC为null',-1);
									break;
								case 4:
									layer.alert('提交文件格式不正确',-1);
									break;
								case 5:
									layer.alert('readtoken为空',-1);
									break;
								case 6:
									layer.alert('分页输入出错',-1);
									break;
								case 7:
									layer.alert('vid不能为空',-1);
									break;
								case 8:
									layer.alert('找不到方法名',-1);
									break;
								case 10:
									layer.alert('userid不能为空',-1);
									break;
								case 11:
									layer.alert('上传目录为空',-1);
									break;
								case 12:
									layer.alert('远程URL文件不能访问',-1);
									break;
								case 13:
									layer.alert('远程视频文件自定义名称不能为空',-1);
									break;
								case 15:
									layer.alert('其他异常',-1);
									break;
								case 16:
									layer.alert('空间已满',-1);
									break;
								case 17:
									layer.alert('用户无是用接口权限',-1);
									break;
								case 18:
									layer.alert('标题重复',-1);
									break;
								case 19:
									layer.alert('标题为空',-1);
									break;
								case 20:
									layer.alert('播放列表不存在',-1);
									break;
								case 21:
									layer.alert('参数错误',-1);
									break;
								default:
									layer.alert('未知错误',-1);
									break;
								}
							}
							$('#product_'+now_page_num+'_content_0_file').uploadify('disable',false);
						});
						$('#product_'+now_page_num+'_content_0_file').uploadify('disable',true);
					}else if(file.type == '.jpg' ||file.type == '.jpeg' ||file.type == '.gif' ||file.type == '.png'){
						if(file.size > 20000000){
							layer.alert('选择图片超过2M，请重新选择小于2M的图片！',-1);
							$('#product_'+now_page_num+'_content_0_file').uploadify('cancel','*');
						}
						$('#product_'+now_page_num+'_content_0_file').uploadify("settings","uploader",'<?php echo U("file/uploadify");?>');
						$('#product_'+now_page_num+'_content_0_file').uploadify("settings",'formData',{
							'timestamp':'<?php echo ($timestamp); ?>',
							'token':'<?php echo md5("instructions" . $timestamp);?>'
						});
						$('#product_'+now_page_num+'_content_0_file').uploadify("settings","onUploadSuccess",function(file, data, response){
							var num = product_page[now_page_num]['file_num'][0]++;
							var info = eval("("+data+")");
							if(info.status == '0'){
								layer.alert(info.info,-1);
							}else{
								var html = '<div class="product_page_img"><img class="uploadify_img" width="100%" src="'+info.data.path+'" /><a href="javascript:void(0);" class="img_delete"></a><input type="hidden" name="pages['+now_page_num+'][content][0][file]['+num+'][type]" value="image"><input type="hidden" name="pages['+now_page_num+'][content][0][file]['+num+'][width]" value="'+info.data.width+'"><input type="hidden" name="pages['+now_page_num+'][content][0][file]['+num+'][height]" value="'+info.data.height+'"><input type="hidden" name="pages['+now_page_num+'][content][0][file]['+num+'][path]" value="'+info.data.path+'"></div>';
								$('#product_'+now_page_num+'_content_0_file-queue').append(html);
							}
							$('#product_'+now_page_num+'_content_0_file').uploadify('disable',false);
						});
					}else{
						layer.alert('未知的文件类型',-1);
						$('#product_'+now_page_num+'_content_0_file').uploadify('cancel','*');
					}
					$('#product_'+now_page_num+'_content_0_file').uploadify('disable',true);
				},
				'onSelectError':function(file){
					file.type = file.type.toLowerCase();
					if(file.type == '.mp4' ||file.type == '.avi' ||file.type == '.mov' ||file.type == '.f4v' ||file.type == '.mpg' ||file.type == '.wav' ||file.type == '.flv' ||file.type == '.wmv' ||file.type == '.3gp' ||file.type == '.rmvb' ||file.type == '.mkv' ||file.type == '.asf' ||file.type == '.264' ||file.type == '.ts' ||file.type == '.mts' ||file.type == '.dat' ||file.type == '.vob' ||file.type == '.mp3'){
						layer.alert('选择视频过大，请重新选择视频！',-1);
					}else if(file.type == '.jpg' ||file.type == '.jpeg' ||file.type == '.gif' ||file.type == '.png'){
						layer.alert('选择图片过大，请重新选择图片！',-1);
					}
				},'onFallback':function(){
					layer.alert('当前浏览器不支持FLASH，无法正常使用视频（图片）上传功能',-1);
					return false;
				},
				'onCancel':function(){
					$('#product_'+now_page+'_content_0_file').uploadify('disable',false);
					$('#product_'+now_page+'_content_0_file').uploadify('cancel','*');
				},
				'onUploadError':function(file, errorcode, errormsg){
					if(errorcode != -280 ){
						layer.alert(errormsg,-1);
					}
					$('#product_'+now_page+'_content_0_file').uploadify('disable',false);
					$('#product_'+now_page+'_content_0_file').uploadify('cancel','*');
				}
			});
		}
	</script>
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
	<script type="text/javascript">
		<?php if(!session('?member_id')): ?>$(function() {
				var unloadPageTip = function(){
					return "您尚未注册，将丢失已编辑内容；建议您先“取消”，然后点击右上角“保存”按钮。如您已保存，请点击“确认”直接离开。";
				};
				window.onbeforeunload = unloadPageTip;
			});
		<?php else: ?>
			$(function() {
				var unloadPageTip = function(){
					return "直接离开将丢失已编辑内容；建议您先“取消”，然后点击右上角“保存”按钮。如您已保存，请点击“确认”直接离开。";
				};
				window.onbeforeunload = unloadPageTip;
			});<?php endif; ?>
	</script>
	
	<?php if(session('member_id')): ?><script type="text/javascript">
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
			
		</script>
	<?php else: ?>
		<div class="tips">
			<div class="w980">
			<div class="tips_button">
				<a class="down" href="javascript:void(0)"></a>
				<a class="up" href="javascript:void(0)"></a>
			</div>
			<div id="usertips" class="tips_massage">	您正在使用试用版，请不要关闭浏览器，以免正在编辑的内容丢失。建议注册一个帐户，这样我们就能在帐户内帮您保存管理所有文档。注册过程中您不会丢失正在编辑的内容。
			</div>
			<div class="tips_botton"><a class="return_other" rel="<?php echo U('member/register');?>" href="javascript:void(0)">立即注册</a></div>
			</div>
		</div>
		<script type="text/javascript">
			$(function(){
				setTimeout('no_register_tips()',2000);
				$('.tips_button .up').click(function(){
					$('.tips').css({height:25});
					$('.tips_button .up').css({display:'none'});
					$('.tips_button .down').css({display:'inline-block'});
				});
				$('.tips_button .down').click(function(){
					$('.tips').css({height:''});
					$('.tips_button .down').css({display:'none'});
					$('.tips_button .up').css({display:'inline-block'});
				});
			});
			function no_register_tips(){
				$('.tips').slideDown(1500);
			}
		</script><?php endif; ?>
	<script>
		$(function(){
			$(document).on("click","a[href='javascript:void(0)']",function (e){
				e.preventDefault();
			});
			$(document).on("click","a[href='javascript:;']",function (e){
				e.preventDefault();
			});
			$(document).on("click","a[href='javascript:']",function (e){
				e.preventDefault();
			});
			$(document).on("click","a[href='javascript:void(0);']",function (e){
				e.preventDefault();
			});
		});
	</script>
</body>
</html>