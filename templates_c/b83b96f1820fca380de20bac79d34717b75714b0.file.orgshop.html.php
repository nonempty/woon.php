<?php /* Smarty version Smarty-3.0.6, created on 2016-01-24 17:35:30
         compiled from ".\templates\orgshop.html" */ ?>
<?php /*%%SmartyHeaderCode:1388156a49ae2b2f445-31829363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b83b96f1820fca380de20bac79d34717b75714b0' => 
    array (
      0 => '.\\templates\\orgshop.html',
      1 => 1453628126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1388156a49ae2b2f445-31829363',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>机构店铺</title>
	<meta name="description" content="" />
	<meta name="author" content="gary" />
	<meta name="viewport" content="width=device-width; initial-scale=1.0" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
	<link type="text/css" href="./common/css/common.css" rel="stylesheet">
	<link type="text/css" href="./common/css/organizationShop.css" rel="stylesheet">
	<link type="text/css" href="./common/css/pagination.css" rel="stylesheet">
	<script type="text/javascript" src="./common/js/jquery-1.10.2.min.js" ></script> 
	<script type="text/javascript" src="./common/js/organizationShop.js"></script>
	<script type="text/javascript" src="./common/js/jquery.pagination.js"></script>
</head>
<body>

	<div class="outer" style="margin-top:0px;">
		<div class="topNav" style="height:90px;background:#000000;color:#fff;opacity:0.7;">
			<?php $_template = new Smarty_Internal_Template("head.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
		</div>
		<div class="mainContent">
			<div class="intro">
				<div class="introDetail">
					<div class="logo" >
						<img src="./common/img/organLogo.png"/>
						<span class="organName">清华大学研究中心</span>
					</div>
					<div class="introArticl">
						<p class="text introText">简介：</p>
						<span class="text">技能：</span>
						<span class="text">等级：</span>
						<span class="text">认证：</span>
						<span class="text">收入：</span>
					</div>
					<div class="introControl">
						<div class="relate">
							<a href="javascript:;" id="contact">联系我</a>
							<a href="javascript:;" id="concern">+关注</a>
							<a href="javascript:;" class="active" id="employ">雇佣他</a>
						</div>
						<ul class="comment">
							<li class="clearfix"><span>工作速度:</span><span class="score">5.0分</span><span class="evaluate"><span class="starPosi" style="width:100%;"> </span></span></li>
							<li class="clearfix"><span>工作质量:</span><span class="score">3.0分</span><span class="evaluate"><span class="starPosi" style="width:60%;"> </span></span></li>
							<li class="clearfix"><span>工作态度:</span><span class="score">4.0分</span><span class="evaluate"><span class="starPosi" style="width:40%;"> </span></span></li>
						</ul>
				  </div>
				</div>
				 <div class="keyRecommend">
				  
				 </div>
			</div>
			<div class="organBanner" id="000">
				<img src="./common/img/organBanner.png"/>
			</div>
			<div class="productList">
				<div class="productInner">
					<ul class="tab clearfix"> 
					
						<li><a href="?shop=abc&tab=service#000" class="<?php if ($_smarty_tpl->getVariable('action')->value=='service'){?>active<?php }?>" tab="service">服务<span>88</span></a></li>
						<li><a href="?shop=abc&tab=demand#000" class="<?php if ($_smarty_tpl->getVariable('action')->value=='demand'){?>active<?php }?>" tab="demand">需求</a></li>
						<li><a href="?shop=abc&tab=case#000" class="<?php if ($_smarty_tpl->getVariable('action')->value=='case'){?>active<?php }?>" tab="case">案例</a></li>
						<li><a href="?shop=abc&tab=evaluation#000" class="<?php if ($_smarty_tpl->getVariable('action')->value=='evaluation'){?>active num<?php }?>" tab="evaluation">评价详情<span>88</span></a></li>
					</ul>
					<div class="tabContent">
						<div class="item item0">
							<ul class="product clearfix" id="list">
								<!--<li>
									<a href="###">
										<span class="title">紫外线可见分光度机紫外线可见分光度机</span>
										<div class="productImg"><img src="./common/img/product.png"></div>
										<span class="bottom clearfix">
											<em class="saleNum">售出：0次</em>
											<em class="price">￥ 300元</em>
										</span>
									</a>
								</li>-->
								
							</ul>
							
								<div class="pager">
									<div class="pre_text">显示 <span id="range"></span>项 共 <<?php ?>?=$count?<?php ?>> 个服务</div>
									<div id="pagination" class="pagination" ></div>
								</div>
								

							</div>
							
						</div>
					</div>
				</div>
				<div class="contactMe">
					<a href="javascript:;">
						联系我
					</a>
				</div>
			</div>
			<div>
				<img style="width:100%;" height="100px" src="./images/news/wrap_major_img_bottom.jpg" />
			</div>
			
		</div>
	</div>
<div id="body_end_line" name="body_end_line" style="position:relative; top:20px;height:100px; background-color:white; display:block;">

</div>   
<script type="text/javascript">

$(function(){
 var pageindex=<?php echo $_smarty_tpl->getVariable('pageindex')->value;?>
;
 var pagesize=<?php echo $_smarty_tpl->getVariable('pagesize')->value;?>
;
 var total=<?php echo $_smarty_tpl->getVariable('total_page')->value;?>
;
 var totalCount=<?php echo $_smarty_tpl->getVariable('total_count')->value;?>
;
 $("#pagination").pagination(totalCount, {
		prev_text: '<<', 
		next_text: '>>',
		items_per_page: pagesize,
		num_display_entries: 6,
		current_page: pageindex,
		num_edge_entries: 0,
		link_to: "javascript:void(0);",
		callback:function(pageindex){
			pageindex++;
			var postData={"shop":"abc","cmd":'<?php echo $_smarty_tpl->getVariable('action')->value;?>
',"page":pageindex};
			$.post("./orgshop_sm.php",postData,function(data){
			   $("#list").html("");
				var json=$.parseJSON(data);		
				if(json.length==0){
					return false;
				}
				var html="<dl id='demand_l'>";
				var list=json["list"];
				$.each(list,function(i){
					html+="<dd>"+list[i]["title"]+"</dd>";						
				});
				html+="</dl>";
				$("#range").html(json["range"]);
				$("#list").append(html);
			});
		}
	});
});

</script>
</body>
</html>