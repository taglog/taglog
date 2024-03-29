<?php if (!defined('THINK_PATH')) exit();?><script src="__PUBLIC__/js/chart/highcharts.js"></script>
<script src="__PUBLIC__/js/chart/modules/exporting.js"></script>
<script src="__PUBLIC__/js/chart/modules/funnel.js"></script>
<div class="span6">
	<h4>用户数</h4>
	<div id="user_chart">
		<div id="canvas_moon_member" style="width:500px;height:400px; margin: 0 auto">暂无数据!</div>
	</div>
</div>
<div class="span6">
	<h4>说明书数</h4>
	<div id="product_chart">
		<div id="canvas_moon_product" style="width:500px;height:400px; margin: 0 auto">暂无数据!</div>
	</div>
</div>
<div class="span12">
	<h4>最近30天数据增长曲线</h4>
	<div id="user_chart">
		<div id="canvas_day" style="width:800px;height:400px; margin: 0 auto">暂无数据!</div>
	</div>
</div>
<div class="span12" style="height:40px;"></div>
<script type="text/javascript">

	$(function(){
		$('#canvas_moon_member').highcharts({
			chart: {
				type: 'column'
			},
			title: {
				text: '用户数统计图'
			},
			xAxis: {
				categories: [
					<?php echo ($month_member_count); ?>
				]
			},
			yAxis: {
				min: 0,
				title: {
					text: '用户数'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b>{point.y} 位</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [{
				name: '用户数',
				data: [<?php echo ($month_member_create_count); ?>]

			}]
		});
		
		$('#canvas_moon_product').highcharts({
			chart: {
				type: 'column'
			},
			title: {
				text: '说明数统计图'
			},
			xAxis: {
				categories: [
					<?php echo ($month_member_count); ?>
				]
			},
			yAxis: {
				min: 0,
				title: {
					text: '说明书数量'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b>{point.y} </b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [{
				name: '说明书数量',
				data: [<?php echo ($month_product_create_count); ?>]

			}]
		});
	
		$('#canvas_day').highcharts({
			title: {
				text: '数据增长统计',
				x: -20 //center
			},
			subtitle: {
				text: '',
				x: -20
			},
			xAxis: {
				categories: [<?php echo ($day_count); ?>],
				labels: { 
				  step:5,	
				}
			},
			yAxis: {
				title: {
					text: ''
				},
				min: 0,
				plotLines: [{
					value: 0,
					width: 1,
					color: '#808080'
				}],
				labels: { 
				  step:2,	
				}
			},
			tooltip: {
				valueSuffix: ''
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'middle',
				borderWidth: 0
			},
			series: [{
				name: '产品说明书',
				data: [<?php echo ($day_product_count); ?>],
			}, {
				name: '用户数',
				data: [<?php echo ($day_member_count); ?>],
			}]
		});
	});
</script>