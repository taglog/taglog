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
<script src="http://yhb360.qiniudn.com/js/layer/layer.min.js"></script>
<script src="http://yhb360.qiniudn.com/js/bootstrap.js"></script>
</head>
<body class="no_index">
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
    <div class="naver">
         <div class="w980">
            <a href="javascript:void(0)" class="input_botton" style="padding:0px 10px;"><input type="checkbox" id="check_all" /><span>全选</span></a>
            <a href="javascript:void(0)" id="sele_del" class="input_botton" style="padding:0px 10px;"><img src="http://yhb360.qiniudn.com/images/delete_ico.png"><span>删除</span></a>
        </div>
    </div>
    <div class="w980 main_table">
        <div class="main_table_left">
            <a class="main_table_title" href="<?php echo U('product/add');?>"><img src="http://yhb360.qiniudn.com/images/add_ico.png"> 点击这里新建一份说明书</a>
            <table class="table table-striped">
			<?php if(is_array($productlist)): $i = 0; $__LIST__ = $productlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$product): $mod = ($i % 2 );++$i;?><tr id="product<?php echo ($product["product_id"]); ?>">
                    <td width="5%"><input type="checkbox" class="check_list" name="product_id[]" value="<?php echo ($product['product_id']); ?>"/></td>
                    <td width="45%"><a href="<?php echo U('product/view', 'product_id='.$product['product_id']);?>" title="<?php echo ($product["name"]); ?>"><?php echo (msubstr($product["name"],0,19)); ?></a></td>
					<td width="20%">
                        <div class="btn-group">
                            <button id="category_name<?php echo ($product['product_id']); ?>" class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" >
							<span><?php if(empty($product['category'])): ?>默认分类
							<?php else: ?>
								<?php echo ($product["category"]["name"]); endif; ?></span>
							<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
								<?php if(is_array($categorylist)): $i = 0; $__LIST__ = $categorylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?><li><a class="category" rel="<?php echo ($category["category_id"]); ?>" rev="<?php echo ($product['product_id']); ?>" href="#"><?php echo ($category["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                    </td>
                    <td width="30%">
						<a href="<?php echo U('product/edit', 'product_id='.$product['product_id']);?>" class="input_botton"><img src="http://yhb360.qiniudn.com/images/edit_ico.png"><span>编辑</span></a>
						<a href="<?php echo U('product/view', 'product_id='.$product['product_id']);?>" class="input_botton"><img src="http://yhb360.qiniudn.com/images/view_ico.png"><span>查看</span></a>
						<a href="javascript:void(0)" rel="<?php echo ($product["product_id"]); ?>" class="input_botton del_product"><img src="http://yhb360.qiniudn.com/images/delete_ico.png"><span>删除</span></a>
					</td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</table>
        </div>
        <div class="main_table_right">
			<div class="right_box">
                <a href="<?php echo U('member/index','categoryid=default');?>" title="默认分类">默认分类</a>
            </div>
			<?php if(is_array($categorylist)): $i = 0; $__LIST__ = $categorylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?><div class="right_box">
                <a href="<?php echo U('member/index','categoryid='.$category['category_id']);?>" title="<?php echo ($category["name"]); ?>"><?php echo ($category["name"]); ?></a>
                <div class="edit_box">
                <a href="javascript:void(0)" rel="<?php echo ($category["category_id"]); ?>" class="edit"></a><a href="javascript:void(0)" rel="<?php echo ($category["category_id"]); ?>" class="delete"></a>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="right_box"><a href="javascript:void(0)" id="add_product_category" class="add">新增分类</a></div>
        </div>
        <div class="clear"></div>
    </div>
	<script type="text/javascript">
		var add_temp = '';
		var temp = '';
		function ajax_add_category(obj){
			if($(obj).val() != temp && $(obj).val() != '' && $(obj).val() != '请输入名称'){
				temp = $(obj).val();
				$.post('<?php echo U("category/add");?>',{name:$(obj).val()},function(data){
					if(data.status == '1'){
						$(obj).parent().html('<a href="<?php echo U("member/index","categoryid=");?>' + data.data + '" title="'+$(obj).val()+'">'+ $(obj).val()+'</a><div class="edit_box"><a href="javascript:void(0)" rel="'+data.data+'" class="edit"></a><a href="javascript:void(0)" rel="'+data.data+'" class="delete"></a></div>');
						location.reload();
					}else{
						layer.alert(data.info,1);
						//alert(data.info);
						$(obj).parent().remove();
					}
				});
			}else if($(obj).val() == ''){
				$(obj).parent().remove();
			}else if($(obj).val() == '请输入名称'){
				$(obj).parent().remove();
			}
			return true;
		}
		function ajax_edit_category(obj){
			var cat_name = $.trim($(obj).val());
			if(cat_name != '' && cat_name != add_temp){
				$.post('<?php echo U("category/edit");?>',{id:$(obj).attr('rel'),name:cat_name},function(data){
					if(data.status == 1){
						$(obj).before('<a href="<?php echo U("member/index","categoryid=");?>' + data.data + '">'+ cat_name+'</a>');
						$(obj).remove();
						//alert(data.info);
						location.reload();
					}else{
						$(obj).before('<a href="<?php echo U("member/index","categoryid=");?>' + $(obj).attr('rel') + '">'+ add_temp+'</a>');
						$(obj).remove();
						layer.alert(data.info,-1);
					}
				});
			}else if(cat_name == ''){
				$(obj).before('<a href="<?php echo U("member/index","categoryid=");?>' + $(obj).attr('rel') + '">'+ add_temp+'</a>');
				$(obj).remove();
				layer.alert('分类名不能为空:-)',-1);
			}else{
				$(obj).before('<a href="<?php echo U("member/index","categoryid=");?>' + $(obj).attr('rel') + '">'+ add_temp+'</a>');
				$(obj).remove();
			}
			return true;
		}
		
		function pressEnter(obj,event){
			if(event.keyCode==13) {
				$(obj).blur();
				return false; 
			}  
		}
		
		function pressEditEnter(obj,event){
			if(event.keyCode==13) {
				$(obj).blur();
				return false; 
			}  
		}
		
		$(function(){
			if($('.main_table_left').height() < $('.main_table').height()){
				$('.main_table_left').height($('.main_table').height());
			}
			$("#check_all").click(function(){
				$("input[class='check_list']").prop('checked', $(this).prop("checked"));
			});
			$("#add_product_category").click(function(){
				if($('#add_category').length != 0){
					$('#add_category').focus();
				}else{
					$(this).parent().before('<div class="right_box"><input type="text" id="add_category" maxlength="12" value="请输入名称"  onkeypress="pressEnter(this,event)"   onblur="ajax_add_category(this)"></div>');
					$('#add_category').focus().select();
				}
			});
			$('.main_table_right').on('propertychange','#add_category', function(){
				var str = $('#add_category').val();
				var new_str = str.replace('请输入名称','');
				$('#add_category').val(new_str);
				$('#add_category').unbind('propertychange');
			});
			$('.main_table_right').on('mouseenter','.right_box',
				function(){
					$(this).find('.edit_box').show();
				});
			$('.main_table_right').on('mouseleave','.right_box',
				function(){
					$(this).find('.edit_box').hide();
				}
			);
			$('.main_table_right').on('click','.delete',function(){
				var obj = this;
				layer.confirm('确定要删除此分类？',
					function(){
						$.get('<?php echo U("category/delete","id=");?>' + $(obj).attr('rel'),function(data){
							if(data.status == '1'){
								$(obj).parent().parent().remove();
								//alert(data.info);
								location.reload();
							}else{
								layer.alert(data.info,-1);
								//alert(data.info);
							}
						});
						
					}
				);
			});
			
			$('.main_table_right').on('click','.edit',function(){
				add_temp = $(this).parent().prev().text();
				var $html = '<input type="text" style="text-align: center;" maxlength="12" rel="'+ $(this).attr('rel') +'" value="'+ add_temp +'" id="edit_category" onkeypress="pressEditEnter(this,event)" onblur="ajax_edit_category(this)">';
				$(this).parent().parent().children('a').remove();
				$(this).parent().before($html);
				$('#edit_category').focus();
			});
			
			$('.category').click(function(){
				var product_id = $(this).attr('rev');
				var category_id = $(this).attr('rel');
				var content = $(this).text()+' <span class="caret"></span>';
				$.get('<?php echo U("product/changecategory");?>' + '&category_id=' + category_id + '&product_id=' +product_id,function(data){
					if(data.status == '1'){
						var category_name = 'category_name'+product_id;
						$('#'+category_name).html(content);
					}else{
						layer.alert(data.info,-1);
					}
				});
			});
			
			$('.del_product').click(function(){
				var product_id = $(this).attr('rel');
				layer.confirm('该说明书将不可恢复，确认要删除吗？',function(){
					$.get('<?php echo U("product/delete");?>' + '&product_id=' +product_id,function(data){
						if(data.status == 1){
							var category_name = 'product'+product_id;
							$('#'+category_name).remove();
							layer.msg('删除成功',1,1);
						}else{
							layer.alert(data.info,-1);
						}
					});
				})
			});
			
			$('#sele_del').click(function(){
				var product_ids = '';
				var product_id_array = new Array();
				$('.check_list').each(function(){ 
					if($(this).prop("checked")){
						product_ids += $(this).val();
						product_ids += ',';
						product_id_array.push($(this).val());
					}
				}); 
				if(product_ids){
					layer.confirm('说明书将不可恢复，确认要删除吗？',function(){
						$.get('<?php echo U("product/delete");?>' + '&product_ids=' +product_ids,function(data){
							if(data.status == '1'){
								//var product_id_array = product_ids.split(',');  
								for(var temp in product_id_array){
									var category_name = 'product'+product_id_array[temp];
									$('#'+category_name).remove();
								}
								layer.msg('删除成功',1,1);
							}else{
								layer.alert(data.info,-1);
							}
						});
					})
					/*if(confirm('说明书将不可恢复，确认要删除吗？')){
						$.get('<?php echo U("product/delete");?>' + '&product_ids=' +product_ids,function(data){
							if(data.status == '1'){
								//var product_id_array = product_ids.split(',');  
								for(var temp in product_id_array){
									var category_name = 'product'+product_id_array[temp];
									$('#'+category_name).remove();
								}
							}else{
								layer.alert(data.info,-1);
							}
						});
					}*/
				}else{
					layer.alert('请选择要删除的项:-)',-1);
				}
				
			});
		});
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
</body>
</html>