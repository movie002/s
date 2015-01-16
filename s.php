<?php
	//require_once('360safe/360webscan.php'); // 注意文件路径
	if(is_file('360safe/360webscan.php'))
	{
		require_once('360safe/360webscan.php');
	}
	
	$active='';
	$q='';
	$aid='';
	if( isset($_REQUEST['q']))
	{
		$q = htmlspecialchars($_REQUEST['q']);
		$active=$q;
	}
	if( isset($_REQUEST['aid']))
	{
		$aid = htmlspecialchars($_REQUEST['aid']);
		$active='资源网站 '.$aid.' 的最新资源列表';
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>搜索结果-小二影视网</title>
	<meta name="keywords" content="小二影视网中包含 <?php echo $active ?> 搜索结果" />
	<meta name="description" content="小二影视网中包含 <?php echo $active ?> 的搜索结果的展示" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="Content-Language" content="zh-CN"/>
	<link rel="stylesheet" type="text/css" media="all" href="css/style.css"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<script type="text/javascript">
	eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('6.1C("1D");j 1E(z,U){3 1a=1F;3 x=J 11();x.1B(x.1A()+1a*1w);6.1c=z+"="+1x(U)+";1y="+x.1z()+"; 1G=/"};j H(z){3 M=6.1c.1H(J 1O("(^| )"+z+"=([^;]*)(;|$)"));7(M!=o)X 1v(M[2]);X o};3 1=\'.c 12 4 ,.1m{1j:1k(1b=1Q);}\';3 1=\'.1m{1j:1k(1b=1R);}\';3 n=H("n");7(n==o){3 10=J 11();3 L=10.1N();7(L>=21||L<=5)n=\'17\';E n=\'1M\'}7(n==\'17\'){1+=\'#S{e:#m;q:v C #k}\';1+=\'1I{e:#m;8:#k}\';1+=\'a{8:#k;e:1J}\';1+=\'a:V {8:#1K;}\';1+=\'#1L{e:#m;}\';1+=\'#1S{e:#m;}\';1+=\'#18-S{q:h;}\';1+=\'.1q,.1p,.1o{8:#15}\';1+=\'.14-16-13{8:#15}.14-16-13:w{8:#19}\';1+=\'.1r{8:#1s}\';1+=\'.1t,.Q a {8:#19}\';1+=\'.Q 1u,.Q 4{8:#k;e:h}\';1+=\'#1P{B-y:1l}\';1+=\'#22{B-y:T}\';1+=\'#2t{e:h}\';1+=\'.1n,.1n:2s{e:#m;8:#k;}\';1+=\'.c 4 a, .c 4 a:1g, .c 4 a:V{8:#k;}\';1+=\'.c 4 4 a, .c 4 4 a:1g, .c 4 4 a:V,.c 4 a:w,.c 4 a:W{e:#m;}\';1+=\'.c 4 a:w,.c 4 4 a:w{e:#2u;8:#2v}\';1+=\'.2w,.2r 12 4,.2q 2m 4,.2l,.2n,.2o,.2p,.2y,.2z{q-2H:v C #I}\';1+=\'.2G{q-2F:v C #I}\';1+=\'#2D,#1T,#2A,.18-S{q: v C #I;}\'}3 l=H("l");7(l==o){7(2B.2C.u>=N)l=\'N\';E l=\'2x\'}7(l==\'N\'){1+=\' .2j{u: 2k;}\';1+=\' .23{u: 24;}\';1+=\' .25{u: 20;}\';1+=\' #1Z{B-y:1l}\';1+=\' #1V{B-y:T}\';1+=\' a.1U{1W-1X:1Y\'}7(1!=o){1=\'<b 26="27/2f">\'+1+\'</b>\';6.2g(1)}j 2h(A,1d){7(A.K=="W")X;3 G=A.2i.f;3 Y=6.9(G).2e("4");2d(i=0;i<Y.29;i++){7(i==1d){A.K="W";6.9(G+"1e"+i).b.d="s"}E{Y[i].K="T";6.9(G+"1e"+i).b.d="h"}}};j 28(D,F,t,1f){3 p=6.9(D);3 g=6.9(F);7(g.b.d==\'s\'){g.b.d=\'h\';p.r=t}E 7(g.b.d==\'h\'){g.b.d=\'s\';p.r=1f}};j 2a(D,F,t){3 p=6.9(D);3 g=6.9(F);7(g.b.d==\'s\'){g.b.d=\'h\';p.r=t}};j 1h(f){3 f=6.9(f);f.b.d=\'s\'};j 2b(f){3 f=6.9(f);f.b.d=\'h\'};j 2c(1i,Z){3 R=6.9(\'R\');R.r=1i;3 O=6.9(\'O\');O.r=Z;3 P=6.9(\'P\');P.U=Z;1h(\'2E\')};',62,168,'|style_need||var|li||document|if|color|getElementById||style|topnav|display|background|id|id2div|none||function|B6AA7B|movie002_width|383838|movie002_day|null|id1div|border|innerHTML|block|tx1|width|1px|hover|exp|weight|name|thisObj|font|solid|id1|else|id2|tabObj|getCookie|888|new|className|hour|arr|1280|delurl|delurlinput|entry|deltitle|wrapper|normal|value|visited|active|return|tabList|url|now|Date|ul|area|post|999|topic|night|topics|bbb|Days|opacity|cookie|Num|_Content|tx2|link|showmiddle|title|filter|alpha|700|celeimg_title|searchinput|colormeta|celeimg_name|moviemeta|moviedate|D04230|titlecontent|h4|unescape|86400000|escape|expires|toGMTString|getTime|setTime|createElement|imgdao|SetCookie|30|path|match|body|transparent|447FA8|service_list|day|getHours|RegExp|movie002_day_2|90|50|global_nav|comment|gotop_btn|movie002_width_1|margin|left|540px|movie002_width_2|775px||movie002_day_1|width_2|1050px|width_3|type|text|showhide|length|hide|hidemiddle|deleteurl|for|getElementsByTagName|css|write|nTabs|parentNode|width_1|1080px|col2|ol|col3|col4|col5|topic_list|sidebar_content|focus|article_index|52686F|fff|listall|1024|col6|bb|sidebar|window|screen|content|del|right|br|bottom'.split('|'),0,{}))

	</script>		
</head>
<body>
	<div id="wrapper" class="width_1">
		<div id="header">
			<div id="service_list">
				<div id="service_list_inner" class="width_1">
					<div style="position:absolute;top:6px;left:15px;font-size:18px;font-weight:700">爱影搜(iyingsou)</div>
					<div id="sub_date">
						<script type="text/javascript">			
							function s()  
							{   
								var a = new Date();
								var b = a.getFullYear();
								var c = a.getMonth()+1; 
								var d = a.getDate();
								var	e = a.getDay();
								var f = new Array("天","一","二","三","四","五","六");					
								return b+"年"+c+"月"+d+"日 星期"+f[e];   
							}
							document.write(s());				
						</script>
						<span id="txt"></span>
					</div>
					<ul>
						<li><a href="#" id="movie002_day_1" onclick="SetCookie('movie002_day','day');window.location.reload();">日间模式</a>｜<a href="#" id="movie002_day_2" onclick="SetCookie('movie002_day','night'); window.location.reload();">夜间模式</a></li>
						<li><a href="#" id="movie002_width_1" onclick="SetCookie('movie002_width','1024'); window.location.reload();">标准屏</a>｜<a href="#" id="movie002_width_2" onclick="SetCookie('movie002_width','1280');window.location.reload();">宽频</a></li>
						<li><a href="http://s.x2y4.com/siteindex.html" target="_blank">索引</a>｜<a href="http://s.x2y4.com/siteindex.html" target="_blank">地图</a></li>
					</ul>
				</div>
			</div>
			<div id="global_nav">
				<div id="global_nav_inner" class="width_1">
					<div id = "searchmiddle" style="left:30px;">
						<form name="f1" action="s.php" method="get">
							<div id="search">				
								<input id="submittext" class="searchinput"  name="q" type="text" value="<?php echo $q ?>" onclick="this.value='';"  onblur="if (this.value == &#39;&#39;) {this.value = &#39;<?php echo $q ?>&#39;;}"/>
								<input type="submit" class="searchsubmit" value="搜索" />
							</div>
						</form>			
					</div>	
				</div>					
			</div>
	<!-- header-inner -->			
	</div>
		<!-- header -->
		<div id="middle" class="width_2" style="min-height:600px;_height:600px;">
			<div id="title">
				<div style="border-bottom:1px solid #ccc;padding:0 0 10px 5px;font-weight:500">以下是 <span class="cred">"<?php echo $active ?>"</span> 的搜索结果</div>				
			</div>		
			<div id="content"  class="width_3 listcontent">
				<ul class="f12px">
					<?php
						if($active=='')
						{
							echo "</br>".'  <div style="text-align:center">关键词不可以没有哦！请更换关键词重新搜索，谢谢！</div>'."</br>";
						}
						else
						{
							require("../php/genv/common.php");
							require("../php/common/base.php");
							require("../php/common/dbaction.php");
							require("../php/config.php");
							$conn=mysql_connect ($dbip, $dbuser, $dbpasswd) or die('数据库服务器连接失败：'.mysql_error());
							mysql_select_db($dbname, $conn) or die('选择数据库失败');
							mysql_query("set names utf8;");
							
							$DH_input_html  = $DH_html_path . 'list_each.html';
							$DH_output_content = dh_file_get_contents("$DH_input_html");
							
							//if($aid!='')
							//	$sql="select l.link,l.title,l.updatetime,l.author,l.pageid,l.linkquality ,l.linkway,p.hot,p.catcountry,p.cattype from link l,page p where l.pageid=p.id and l.author like '$aid' order by l.updatetime desc limit 0,60";
							//if($q!='')
							//	$sql="select * from page where title like '%$q%' or aka like '%$q%' order by updatetime desc limit 0,5";
							
							$sql="select l.link,l.title,l.updatetime,l.author,l.pageid,l.linkquality ,l.linkway,p.hot,p.catcountry,p.cattype from link l,page p where l.pageid=p.id";
							
							if($q!='')
							{
								$sql .=" and l.title like '%$q%'";
								
							}
							if($aid!='')
							{
								$sql .=" and l.author like '$aid'";
							}
							$sql .=" order by l.updatetime desc limit 0,30";
							
							$results=dh_mysql_query($sql);
							$count=0;
							if($results)
							{	
								$liout='';
								while($row = mysql_fetch_array($results))
								{	
									$count ++;
									$page_path = output_page_path($DH_html_url,$row['pageid']);
									//if($q!='')
									//{
									//	$DH_output_content_page = dh_replace_snapshot('list',$row,$DH_output_content,true);
									//	//$page_path = output_page_path($DH_html_url,$row['id']);
									//	$DH_output_content_page = str_replace("%title_link%",$page_path,$DH_output_content_page);	
									//	echo $DH_output_content_page;
									//}
									//else
									//{
										$updatef = date("m-d",strtotime($row['updatetime']));
										$lieach = '<li><span>'.$countrymeta.'</span> <span class="width90pre">【'.$linkway[$row['linkway']].'】<a href="'.$row['link'].'" target="_blank">'.$row['title'].'['.$row['author'].']</a></span> <span class="rt100v2"><a href="'.$page_path.'" target="_blank" rel="nofollow">汇总页面</a></span><span class="rt60v2">'.$row['hot'].' </span> <span class="rt5v2" > '.$updatef.'</span></li>';
										echo $lieach;
									//}
								}
							}
							mysql_close($conn);
							if($count==0)
								echo "</br>".'  <div style="text-align:center">好像没有相关资源哦！请更换关键词重新搜索，或者耐心等待，只要不断关注小二影视网，就会第一时间得到资源，您不会失望哦！</div>'."</br>";

								echo '';
						}
					?>
				</ul>
			</div>
			<!-- content -->
			<div id="sidebar" class="clearfix">
				<div>
					<div >
						<script type="text/javascript">
							function a()  
							{   
								var n = new Date();
								var h = n.getHours();
								var m='';
								if(h>=22||h<=6)
								{
									m='<div style="color:#000;border:1px solid #FF3300;font-size:12px;background:#FFFFDF;padding:2px;">友情提醒： 亲，已经是晚上'+h+'点多了，</br>为了您和家人的健康，请注意减少熬夜!</div>';
								}
								return m;
							}
							document.write(a());
						</script>
					</div>
				</div>
			</div>
		</div>
		<!-- middle -->
		<div id="footer" style="bottom:0;width:100%;">
			<a href="#top" title="顶部" class="gotop_btn gotop_btn_up" id="goTopButton">∧</br>顶部</a>
			<div id="footer-nav">
				<a href="html/aboutus.html">关于我们</a> | 	
				<a href="html/opinion.html">留言反馈</a> | 
				<a href="html/mianze.html">免责声明</a> | 
				<a href="javascript:void(0);" onclick="AddFavorite('小二影视网','http://movie002.com')">收藏本站</a>
			</div>
			<div class="cpright colorlittle">
			© 2013 - 2015 &nbsp;<a href="http://movie002.com" title="电影大全,电视剧大全">小二影视网</a> &nbsp;All Rights Reserved <a href="http://www.miibeian.gov.cn" target="_blank">免备案</a>
			</div>
			<div style="margin:7px;color:#777">
			本站旨在影视宣传和学习交流,所有内容程序自动收集发布,仅提供<b>资源页面的链接</b>，如侵犯了您的权益,请联系我们删除:a#x2y4.com,欢迎举报违法问题！
			</div>
		</div>
	</div>
	<!-- wrapper -->
	<script type="text/javascript">
	eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('4 T(){1 z=1w 1y();1 h=z.1x();1 m=z.1s();1 s=z.1z();m=N(m);s=N(s);3.M(\'1O\').I=h+":"+m+":"+s;t=1J(\'T()\',1D)};4 N(i){k(i<10){i="0"+i}1F i};4 1G(){1 2=3.b(\'d\');S(1 i=0;i<2.R;i++){1 K=2[i].5(\'1E-6\');k(K!=V)2[i].1B(\'6\',K)}};3.F("U");4 1C(){1 2=3.b(\'U\');S(1 i=0;i<2.R;i++){1 p=2[i].5(\'p\');1 w=2[i].5(\'w\');1 l=2[i].5(\'l\');1 g=2[i].5(\'g\');1 u=g;1 f=2[i].5(\'f\');1 B=2[i].5(\'B\');k(B!=V){u=2[i].5(\'u\');j[\'d\'+i]=\'<L><x><1L J-1A="1r-1p" 1o="E/L; 1n=1q-8"></x><7 16="0" 12="0" 9="1v-1t:1u"><a X="\'+p+\'" Z="11"><d 9="14:G;y:\'+l+\';r:\'+g+\';" 6="\'+w+\'" f="\'+f+\'的图片" 13="15"/></a><W 9="1I-1S:28;E-1P:26;">\'+B+\'</W></7></L>\'}1m{j[\'d\'+i]=\'<7 16="0" 12="0"><a X="\'+p+\'" Z="11"><d 9="14:G;y:\'+l+\';r:\'+g+\';" 6="\'+w+\'" f="\'+f+\'的图片" 13="15"/></a></7>\'}1 17=2[i].2b;17.I=\'<A 1d="1e" 6="1c:22[\\\'d\'+i+\'\\\'];" 1h="0" 1g="1f" y="\'+l+\'" r="\'+u+\'"></A>\'}};                     4 1R(H,C){    18{        j.1V.21(C,H);    }    Q(e){        18{            j.20.1Z(H,C,"");        }        Q(e){            1U("抱歉，您所使用的浏览器无法完成此操作。\\n\\n加入收藏失败，请使用29+D进行添加");        }    }};4 27(){1 Y=Y||[];(4(){1 o=3.F("1j");o.6="//o.1W.O/o.1Y?1X";(3.b(\'7\')[0]||3.b(\'x\')[0]).1a(o)})()}4 c(){(4(){1 c=3.F(\'1j\');c.1Q=\'E/1c\';c.6=\'J://1T.c.O/23.1i?19=1b&2c=1b\';(3.b(\'7\')[0]||3.b(\'x\')[0]).1a(c)})()}4 2d(){1 q=3.M(\'q\');q.I=\'<A 19="q" 1d="1e" y="2e%" r="2a" 6="J://v.25.O/24.1i" 1h="0" 1g="1f" ></A>\'}j.1M=4(){1 h=3.7.1k;k(!h)h=3.1N.1k;1 P=3.M(\'1H\');k(h>0){P.9.1l=\'1K\'}1m{P.9.1l=\'G\'}};',62,139,'|var|imgTags|document|function|getAttribute|src|body||style||getElementsByTagName|cnzz|img||alt|src_height|||window|if|src_width|||hm|link_src|iframe_say|height|||frm_height||img_src|head|width|today|iframe|name|url||text|createElement|none|title|innerHTML|http|imgSrc|html|getElementById|checkTime|com|top|catch|length|for|startTime|imgdao|null|div|href|_hmt|target||_blank|topmargin|rel|border|nofollow|leftmargin|clilddiv|try|id|appendChild|1253404551|javascript|allowtransparency|true|no|scrolling|frameBorder|php|script|scrollTop|display|else|charset|content|Type|UTF|Content|getMinutes|color|transparent|background|new|getHours|Date|getSeconds|equiv|setAttribute|showImgs|500|data|return|loadimg|goTopButton|font|setTimeout|block|meta|onscroll|documentElement|txt|align|type|AddFavorite|size|s22|alert|external|baidu|b3e266da506226dbaa921d5d4e1e69b2|js|addPanel|sidebar|addFavorite|parent|z_stat|dh_say|movie002|center|baidutongji|12px|Ctrl|16px|firstChild|web_id|dhsay|90'.split('|'),0,{}))

	window.onload = function ()
	{
		// 公共的函数
		document.getElementById('submittext').focus();
		startTime();
		loadimg();
		showImgs();
		cnzz();
	};
	</script>	
</body>
</html>
