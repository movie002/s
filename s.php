<?php
function putsearchresult($sql,$DH_search_url_nopage)
{
	$DH_html_url="http://x2y4.com/html/";
    $movietype=array('未','影','视','综','动','记');
    $movietype2=array('','电影','电视','综艺','动画');
    $linkquality=array('未','抢','修','普','高','超','三','三');
    $linkquality2=array('未知','抢先','修正','普清','高清','超清','三维','三维');
    $linkway=array('未','讯','评','预','活','票','下','线');
    $linkway2=array('未知','影讯','影评','预告','活动','购票','下载','在线');
    $linktype=array('未','迅','FT','BT','磁','驴','盘','页','百','快','综');
    $linktype2=array('未知资源','迅雷资源','FTP 资源','B T 资源','磁力链接','电驴资源','网盘资源','网页观看','百度影音','快播资源','综合资源');
	$results=dh_mysql_query($sql);
    //echo $sql;
	if($results)
	{	
		$liout='';
		while($row = mysql_fetch_array($results))
		{	
			$page_path = output_page_path($DH_html_url,$row['pageid']);
			$updatef = date("m-d",strtotime($row['updatetime']));
			$lieach = '<li><span style="width: 90%;display:inline-block">[<a href="'.$DH_search_url_nopage.'&ca&a'.$row['cattype'].'" title="只显示 '.$movietype2[$row['cattype']].' 类别">'.$movietype[$row['cattype']].'</a>][<a href="'.$DH_search_url_nopage.'&cb&b'.$row['linkway'].'" title="只显示 '.$linkway2[$row['linkway']].' 类别">'.$linkway[$row['linkway']].'</a>][<a href="'.$DH_search_url_nopage.'&cc&c'.$row['linktype'].'" title="只显示 '.$linktype2[$row['linktype']].' 类别">'.$linktype[$row['linktype']].'</a>][<a href="'.$DH_search_url_nopage.'&d'.$row['linkquality'].'" title="只显示 '.$linkquality2[$row['linkquality']].' 类别">'.$linkquality[$row['linkquality']].'</a>] &nbsp;<a href="'.$row['link'].'" target="_blank" rel="nofollow" >'.$row['title'].'['.$row['author'].']</a></span><span class="rt45v2"><a href="'.$page_path.'">汇</a> </span> <span class="rt5v2" > '.$updatef.'</span></li>';
			echo $lieach;
		}
	}                               
}
function putpageresult($sql)
{
    $movietype=array('未知','电影','电视','综艺','动漫','记录片');
	$DH_html_url="http://x2y4.com/html/";
	$results=dh_mysql_query($sql);
	if($results)
	{	
		$liout='';
		while($row = mysql_fetch_array($results))
		{	
            $pageurl = output_page_path($DH_html_url,$row['id']);
            $pubyear =date("Y",strtotime($row['pubdate']));
			$lieach = '<li>['.$movietype[$row['cattype']].'] <a href="'.$pageurl.'" target="_blank">'.$row['title'].'('.$pubyear.')</a></li>';
			echo $lieach;
		}
	}                               
}

function dh_pagenum_link($link,$page)
{
	return $link.$page;
}
//require_once('360safe/360webscan.php'); // 注意文件路径
//if(is_file('360safe/360webscan.php'))
//{
//	require_once('360safe/360webscan.php');
//}

$active='';
$count='';
$errorsearch=0;
$errormsg='';
$q='';
$aid='';
$p=1;
//print_r($_REQUEST);
//print_r($_GET);
//print_r($_COOKIE);
//print_r($_SERVER);

$GETPARAA=$_REQUEST;
$GETPARAB=$_REQUEST;
$GETPARAC=$_REQUEST;
$GETPARAD=$_REQUEST;

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
if( isset($_REQUEST['p']))
{
	$p = $_REQUEST['p'];
}	
if( isset($_GET['ca']) || isset($_GET['g']))
{
    $GETPARAA=$_GET;
}	
if( isset($_GET['cb']) || isset($_GET['g']))
{
    $GETPARAB=$_GET;
}	
if( isset($_GET['cc']) || isset($_GET['g']))
{
    $GETPARAC=$_GET;
}	
if( isset($_GET['cd']) || isset($_GET['g']))
{
    $GETPARAD=$_GET;
}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>搜索结果-影粉搜搜</title>
    <link rel='canonical' href='http://s.yfsoso.com/s.php'/>
	<meta name="keywords" content="影粉搜搜网中包含 <?php echo $active ?> 搜索结果" />
	<meta name="description" content="影粉搜搜网中包含 <?php echo $active ?> 的搜索结果的展示" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="Content-Language" content="zh-CN"/>
	<link rel="stylesheet" type="text/css" media="all" href="css/style.css"/>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <script type="text/javascript">
	function SetCookie(name,value)//两个参数，一个是cookie的名子，一个是值
	{
		var Days = 30; //此 cookie 将被保存 30 天
		var exp = new Date();    //new Date("December 31, 9998");
		exp.setTime(exp.getTime() + Days*86400000);
		document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+ "; path=/";
	};
	function DelCookie(name)

	{
		var exp = new Date();
		exp.setTime(exp.getTime()-10000);
        var cval=getCookie(name);
        if(cval!=null)
    		document.cookie = name + "="+ cval + ";expires=" + exp.toGMTString()+"; path=/";
	};
	function getCookie(name)//取cookies函数        
	{
		var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
		 if(arr != null) return unescape(arr[2]); return null;
	};
	var movie002_day =  getCookie("movie002_day");
	if(movie002_day==null)
	{
		var now = new Date();
		var hour = now.getHours();
		if(hour>=21||hour<=5)
			movie002_day='night';
		else
			movie002_day='day';
	}
	var style_need="";
	if(movie002_day=='night')
	{
		style_need +='#wrapper{background:#383838;border:1px solid #B6AA7B}';
		style_need +='body{background:#383838;color:#B6AA7B}';
		style_need +='a{color:#B6AA7B;background:transparent}';
		style_need +='a:visited {color:#447FA8;}';
	//	style_need +='.order{background:url(%home%images/logonight_8.gif) no-repeat;}';
		style_need +='#service_list{background:#383838;}';
		style_need +='#global_nav{background:#383838;}';
		style_need +='#topics-wrapper{border:none;}';
		style_need +='.moviemeta,.celeimg_name,.colormeta{color:#999}';
		style_need +='.post-topic-area{color:#999}.post-topic-area:hover{color:#bbb}';
		style_need +='.moviedate{color:#D04230}';
		style_need +='.titlecontent,.entry a {color:#bbb}';
		style_need +='.entry h4,.entry li{color:#B6AA7B;background:none}';
		style_need +='#movie002_day_2{font-weight:700}';
		style_need +='#movie002_day_1{font-weight:normal}';
		style_need +='#article_index{background:none}';
		style_need +='.searchinput,.searchinput:focus{background:#383838;color:#B6AA7B;}';
		style_need +='.topnav li a, .topnav li a:link, .topnav li a:visited{color:#B6AA7B;}';
		style_need +='.topnav li li a, .topnav li li a:link, .topnav li li a:visited,.topnav li a:hover,.topnav li a:active{background:#383838;}';
		style_need +='.topnav li a:hover,.topnav li li a:hover{background:#52686F;color:#fff}';
		style_need +='.listall,.sidebar_content ul li,.topic_list ol li,.col2,.col3,.col4,.col5,.col6,.bb{border-bottom:1px solid #888}';
		style_need +='.br{border-right:1px solid #888}';
		style_need +='#content,#comment,#sidebar,.topics-wrapper{border: 1px solid #888;}';	
	}

	var movie002_width =  getCookie("movie002_width");
	if(movie002_width==null)
	{
		if(window.screen.width >=1280)
			movie002_width='1280';
		else
			movie002_width= '1024';
	}
	if(movie002_width=='1280')
	{
		style_need += ' .width_1{width: 1080px;}';
		style_need += ' .width_2{width: 1050px;}';
		style_need += ' .width_3{width: 830px;}';
		style_need +=' #movie002_width_2{font-weight:700}';
		style_need +=' #movie002_width_1{font-weight:normal}';
		style_need +=' a.gotop_btn{margin-left:540px';	
	}
	if(style_need!=null)
	{
		style_need = '<style type="text/css">'+style_need+'</style>';
		//alert(style_need);
		document.write(style_need);
	}

<?php

$redcolor="#a01200";
$sred="color:#a01200;border:1px solid #a01200";
$redborder="1px solid #a01200";

$sqlmovietype='';
$acount=0;
$a=$sred;
$a1=""; $a2=""; $a3=""; $a4=""; $a5="";
$requesttmp='';
if(isset($GETPARAA['a1']))
{
    $acount++;
    $a1=$sred;
	$requesttmp .= '1,';
    echo "        SetCookie('a1','');";
}
if(isset($GETPARAA['a2']))
{
    $acount++;
    $a2=$sred;
	$requesttmp .="2,";
    echo "        SetCookie('a2','');";
}
if(isset($GETPARAA['a3']))
{
    $acount++;
    $a3=$sred;
	$requesttmp .="3,";
    echo "        SetCookie('a3','');";
}
if(isset($GETPARAA['a4']))
{
    $acount++;
    $a4=$sred;
	$requesttmp .="4,";
    echo "        SetCookie('a4','');";
}
if(isset($GETPARAA['a5']))
{
    $acount++;
    $a5=$sred;
	$requesttmp .="5,";
    echo "        SetCookie('a5','');";
}
if($acount>0)
{
    $sqlmovietype="p.cattype in (".rtrim($requesttmp, ',').")";
    $a="";
}

$sqllinkway='';
$bcount=0;
$b=$sred;
$b1=""; $b2=""; $b3=""; $b4=""; $b5=""; $b6="";$b7="";
$requesttmp="";
if(isset($GETPARAB['b1']))
{
    $bcount++;
    $b1=$sred;
	$requesttmp .= '1,';
    echo "        SetCookie('b1','');";
}
if(isset($GETPARAB['b2']))
{
    $bcount++;
    $b2=$sred;
	$requesttmp .="2,";
    echo "        SetCookie('b2','');";
}
if(isset($GETPARAB['b3']))
{
    $bcount++;
    $b3=$sred;
	$requesttmp .="3,";
    echo "        SetCookie('b3','');";
}
if(isset($GETPARAB['b4']))
{
    $bcount++;
    $b4=$sred;
	$requesttmp .="4,";
    echo "        SetCookie('b4','');";
}
if(isset($GETPARAB['b5']))
{
    $bcount++;
    $b5=$sred;
	$requesttmp .="5,";
    echo "        SetCookie('b5','');";
}
if(isset($GETPARAB['b6']))
{
    $bcount++;
    $b6=$sred;
	$requesttmp .="6,";
    echo "        SetCookie('b6','');";
}
if(isset($GETPARAB['b7']))
{
    $bcount++;
    $b7=$sred;
	$requesttmp .="7,";
    echo "        SetCookie('b7','');";
}
if($bcount>0)
{
    $sqllinkway="l.linkway in (".rtrim($requesttmp, ',').")";
    $b="";
}

$sqllinktype='';
$ccount=0;
$c=$sred;
$c1=""; $c2=""; $c3=""; $c4=""; $c5=""; $c6="";$c7="";$c8="";
$requesttmp="";
if(isset($GETPARAC['c1']))
{
    $ccount++;
    $c1=$sred;
	$requesttmp .= '1,';
    echo "        SetCookie('c1','');";
}
if(isset($GETPARAC['c2']))
{
    $ccount++;
    $c2=$sred;
	$requesttmp .="2,";
    echo "        SetCookie('c2','');";
}
if(isset($GETPARAC['c3']))
{
    $ccount++;
    $c3=$sred;
	$requesttmp .="3,";
    echo "        SetCookie('c3','');";
}
if(isset($GETPARAC['c4']))
{
    $ccount++;
    $c4=$sred;
	$requesttmp .="4,";
    echo "        SetCookie('c4','');";
}
if(isset($GETPARAC['c5']))
{
    $ccount++;
    $c5=$sred;
	$requesttmp .="5,";
    echo "        SetCookie('c5','');";
}
if(isset($GETPARAC['c6']))
{
    $ccount++;
    $c6=$sred;
	$requesttmp .="6,";
    echo "        SetCookie('c6','');";
}
if(isset($GETPARAC['c7']))
{
    $ccount++;
    $c7=$sred;
	$requesttmp .="7,";
    echo "        SetCookie('c7','');";
}
if(isset($GETPARAC['c8']))
{
    $ccount++;
    $c8=$sred;
	$requesttmp .="8,";
    echo "        SetCookie('c8','');";
}
if($ccount>0)
{
    $sqllinktype="l.linktype in (".rtrim($requesttmp, ',').")";
    $c="";
}

$sqllinkquality='';
$dcount=0;
$d=$sred;
$d1=""; $d2=""; $d3=""; $d4=""; $d5=""; $d6="";
$requesttmp="";
if(isset($GETPARAD['d1']))
{
    $dcount++;
    $d1=$sred;
	$requesttmp .= '1,';
    echo "        SetCookie('d1','');";
}
if(isset($GETPARAD['d2']))
{
    $dcount++;
    $d2=$sred;
	$requesttmp .="2,";
    echo "        SetCookie('d2','');";
}
if(isset($GETPARAD['d3']))
{
    $dcount++;
    $d3=$sred;
	$requesttmp .="3,";
    echo "        SetCookie('d3','');";
}
if(isset($GETPARAD['d4']))
{
    $dcount++;
    $d4=$sred;
	$requesttmp .="4,";
    echo "        SetCookie('d4','');";
}
if(isset($GETPARAD['d5']))
{
    $dcount++;
    $d5=$sred;
	$requesttmp .="5,";
    echo "        SetCookie('d5','');";
}
if(isset($GETPARAD['d6']))
{
    $dcount++;
    $d6=$sred;
	$requesttmp .="6,";
    echo "        SetCookie('d6','');";
}
if($dcount>0)
{
    $sqllinkquality="l.linkquality in (".rtrim($requesttmp, ',').")";
    $d="";
}
?>

	</script>
</head>
<body>
	<div id="wrapper" class="width_1">
		<div id="header">
			<div id="service_list">
				<div id="service_list_inner" class="width_1">
					<div style="position:absolute;top:6px;left:15px;font-size:18px;font-weight:700"><a href="http://s.yfsoso.com">影粉搜搜(YFSOSO)</a></div>
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
						<li><a href="#" id="movie002_width_1" onclick="SetCookie('movie002_width','1024'); window.location.reload();">标屏</a>｜<a href="#" id="movie002_width_2" onclick="SetCookie('movie002_width','1280');window.location.reload();">宽频</a></li>
						<li><a href="http://s.x2y4.com/siteindex.html" target="_blank">索引</a>｜<a href="http://s.x2y4.com/siteindex.html" target="_blank">地图</a></li>
					</ul>
				</div>
			</div>
			<div id="global_nav">
				<div id="global_nav_inner" class="width_1">
					<span id = "searchmiddle" style="left:30px;width:350px">
						<form name="f1" action="s.php" method="get">
								<input id="submittext" class="searchinput"  name="q" type="text" value="<?php echo $q ?>"/>
								<input type="submit" class="searchsubmit" value="搜索" />
						</form>			
					</span>	
					<span style="height:20px;float:right;margin:15px 0 0 0;width:800px" id="iframe_say_span"></span>
				</div>					
			</div>
	<!-- header-inner -->			
	</div>
        <?php
                        //echo $q."ddddd:".strlen($q).";sizeof q:".sizeof($q);
						if($q=='')
						{
                            $errorsearch=1;
							$errormsg =  "</br>".'  <div style="text-align:center">关键词不可以没有哦！请更换关键词重新搜索，谢谢！</div>'."</br>";
						}
						else if(strlen($q) > 50)
                        {
                            $errorsearch=1;
							$errormsg =  "</br>".'  <div style="text-align:center">关键词不可以太长哦！请更换关键词重新搜索，谢谢！</div>'."</br>";
                        }
                        else
						{
							require("../php/genv/common.php");
							require("../php/common/base.php");
							require("../php/common/dbaction.php");
							require("../php/config.php");
							require("../php/common/page_navi.php");
							$conn=mysql_connect ($dbip, $dbuser, $dbpasswd) or die('数据库服务器连接失败：'.mysql_error());
							mysql_select_db($dbname, $conn) or die('选择数据库失败');
							mysql_query("set names utf8;");
                            
                            $pagenum=30;
                            $DH_search_url="http://".$_SERVER['HTTP_HOST'].'/'.trim($_SERVER['REQUEST_URI'],"/");
                            $DH_search_url_nopage = preg_replace('/\&p\=[0-9]+/', '', $DH_search_url);
                            $DH_search_url =$DH_search_url_nopage."&p=";
                            $DH_search_url_only="http://".$_SERVER['HTTP_HOST'].'/s.php?q='.$_REQUEST['q'];
                            //echo $DH_search_url; 
                            //$DH_search_url_nopage = "http://127.0.0.1/s/s.php?q=".$_REQUEST['q'];
                            //$DH_search_url = $DH_search_url_nopage."&p=";
							
							//if($aid!='')
							//	$sql="select l.link,l.title,l.updatetime,l.author,l.pageid,l.linkquality ,l.linkway,p.hot,p.catcountry,p.cattype from link l,page p where l.pageid=p.id and l.author like '$aid' order by l.updatetime desc limit 0,60";
							//if($q!='')
							//	$sql="select * from page where title like '%$q%' or aka like '%$q%' order by updatetime desc limit 0,5";
							$sql=" from link l,page p where l.pageid=p.id";
							
							if($q!='')
							{
                                //处理空格
                                $qs=preg_split("/[\s]+/s",$q);	
                                //print_r($qs);
                                $sql.=" and ( true ";
                                foreach ($qs as $key=>$eachq)
                                {
								    $sql .=" and l.title like '%$eachq%' ";				
                                }
                                $sql.=" )";
							}
							if($aid!='')
							{
								$sql .=" and l.author like '$aid'";
							}
							if($acount>0)
							{
								$sql .=" and ".$sqlmovietype;
							}
							if($bcount>0)
							{
								$sql .=" and ".$sqllinkway;
							}
							if($ccount>0)
							{
								$sql .=" and ".$sqllinktype;
							}
							if($dcount>0)
							{
								$sql .=" and ".$sqllinkquality;
							}
                            $beginnum=($p-1)*$pagenum;
							$sqldetail="select l.link,l.title,l.updatetime,l.author,l.pageid,l.linkquality,l.linktype,l.linkway,p.hot,p.catcountry,p.cattype ".$sql." order by l.updatetime desc limit ".$beginnum.",".$pagenum;
                            //echo $sqldetail;
							$sqlcount ="select count(*) ".$sql;
						    $count=dh_mysql_get_count($sqlcount);
                            if($count==0)
                            {
                                $errorsearch=1;
								$errormsg =  "</br>".'  <div style="text-align:center">好像没有相关资源哦！请更换关键词重新搜索，或者耐心等待，只要不断关注影粉搜搜网，就会第一时间得到资源，您不会失望哦！</div>'."</br>";
                            }
						}
            
        ?>
		<!-- header -->
		<div id="middle" class="width_2" style="min-height:600px;_height:600px;">
			<div id="title">
				<div style="border-bottom:1px solid #ccc;padding:0 0 10px 5px;font-weight:500">以下是 <span class="cred">"<?php echo $active ?>"</span> 的搜索结果：一共 <?php echo $count ?> 条记录</div>
			</div>
			<div id="sidebar">
				<div>
					<div style="margin-top:10px">
						<script type="text/javascript">
							function a()  
							{   
								var n = new Date();
								var h = n.getHours();
								var m='';
								if(h>=23||h<=6)
								{
									m='<div style="color:#000;border:1px solid #FF3300;font-size:12px;background:#FFFFDF;padding:2px;">友情提醒：</br>&nbsp;&nbsp; 亲，现在已经是晚上'+h+'点多了，为了您和您家人的健康，请注意及时休息，减少熬夜!</div>';
								}
								return m;
							}
							document.write(a());
						</script>
					</div>
				</div>
                <div style="border: 1px solid #bbb;padding:5px 5px 5px 0;font-size:12px;margin-top:10px">
					<div style="border-bottom:1px solid #bbb;text-align:center"><b>相关影视</b></div>
                        <div style="padding: 5px;line-height: 25px;"> 
                        <?php 
                            if($errorsearch==0)
                            {
					    		$sqlpage="select * from page where title like '%$q%' or aka like '%$q%' order by hot desc limit 0,10";
                                putpageresult($sqlpage);
                            }
                        ?> 
                    </div>
                </div>
                <div style="border: 1px solid #bbb;padding:5px;font-size:12px;margin-top:10px">
					<div style="border-bottom:1px solid #bbb;text-align:center"><b>搜索过滤</b></div>
				    点击选择，再点取消，重新搜索</br> 	
                    <div class="searchfilter"><span class="searchsubmit" style="padding:5px;cursor:pointer" onclick="changeall()">取消过滤</span> <a class="searchsubmit" style="padding:5px" href="<?php echo $DH_search_url_only?>">过滤结果</a></div>
                    <b>影视类型：</b></br>
					    <div class="lifloat">
                         <a id="a" class="tc" style="<?= $a ?>" onclick="changealltype('a',5)">全部</a>
                         <a id="a1" class="tc" style="<?= $a1 ?>" onclick="changetype('a1','a')">电影</a>
                         <a id="a2" class="tc" style="<?= $a2 ?>" onclick="changetype('a2','a')">电视</a>
                         <a id="a3" class="tc" style="<?= $a3 ?>" onclick="changetype('a3','a')">综艺</a>
                         <a id="a4" class="tc" style="<?= $a4 ?>" onclick="changetype('a4','a')">动画</a>
                         <a id="a5" class="tc" style="<?= $a5 ?>" onclick="changetype('a5','a')">纪录</a>
                        </div>
                    <b>资源种类：</b></br>
					    <div class="lifloat">
                         <a id="b" class="tc" style="<?= $b ?>" onclick="changealltype('b',7)">全部</a>
                         <a id="b1" class="tc" style="<?= $b1 ?>" onclick="changetype('b1','b')">影讯</a>
                         <a id="b2" class="tc" style="<?= $b2 ?>" onclick="changetype('b2','b')">影评</a>
                         <a id="b3" class="tc" style="<?= $b3 ?>" onclick="changetype('b3','b')">预告</a>
                         <a id="b4" class="tc" style="<?= $b4 ?>" onclick="changetype('b4','b')">活动</a>
                         <a id="b5" class="tc" style="<?= $b5 ?>" onclick="changetype('b5','b')">购票</a>
                         <a id="b6" class="tc" style="<?= $b6 ?>" onclick="changetype('b6','b')">下载</a>
                         <a id="b7" class="tc" style="<?= $b7 ?>" onclick="changetype('b7','b')">在线</a>
                        </div>
                    <b>获取方式：</b></br>
					    <div class="lifloat">
				         <a id="c"  class="tc"style="<?= $c ?>" onclick="changealltype('c',8)">全部资源</a> 
				         <a id="c1" class="tc" style="<?= $c1 ?>" onclick="changetype('c1','c')">迅雷资源</a> 
				         <a id="c2" class="tc" style="<?= $c2 ?>" onclick="changetype('c2','c')">FTP 资源</a>
				         <a id="c3" class="tc" style="<?= $c3 ?>" onclick="changetype('c3','c')">B T 资源</a>
			             <a id="c4" class="tc" style="<?= $c4 ?>" onclick="changetype('c4','c')">磁力链接</a>
				         <a id="c5" class="tc" style="<?= $c5 ?>" onclick="changetype('c5','c')">电驴资源</a>
			             <a id="c6" class="tc" style="<?= $c6 ?>" onclick="changetype('c6','c')">网盘资源</a>
				         <a id="c7" class="tc" style="<?= $c7 ?>" onclick="changetype('c7','c')">网页在线</a>
				         <a id="c8" class="tc" style="<?= $c8 ?>" onclick="changetype('c8','c')">综合资源</a>
                        </div>
                    <b>清晰度：</b></br>
					    <div class="lifloat">
					     <a id="d" class="tc" style="<?= $d ?>" onclick="changealltype('d',5)">全部</a>
					     <a id="d1" class="tc" style="<?= $d1 ?>" onclick="changetype('d1','d')">抢先</a>
					     <a id="d2" class="tc" style="<?= $d2 ?>" onclick="changetype('d2','d')">修正</a>
					     <a id="d3" class="tc" style="<?= $d3 ?>" onclick="changetype('d3','d')">普清</a>
					     <a id="d4" class="tc" style="<?= $d4 ?>" onclick="changetype('d4','d')">高清</a>
					     <a id="d5" class="tc" style="<?= $d5 ?>" onclick="changetype('d5','d')">超清</a>
                        </div>
                </div>
			</div>			
			<div id="content"  class="width_3 listcontent">
				<ul class="f12px">
					<?php
							if($errorsearch==1)
							{
                                echo $errormsg;
                                //echo $sqldetail;
							}
                            else
                            {		
                                $pages=ceil($count/$pagenum);
								putsearchresult($sqldetail,$DH_search_url_nopage);
                                $pagenavi = dh_pagenavi(5,$pages,$DH_search_url,$p);
                                echo '<div class="page_navi">'.$pagenavi.'</div>';
							    mysql_close($conn);
                            }
					?>
				</ul>
			</div>
		<!-- middle -->
		<div id="footer" style="bottom:0;width:100%;">
			<a href="#top" title="顶部" class="gotop_btn gotop_btn_up" id="goTopButton">∧</br>顶部</a>
			<div id="footer-nav">
				<a href="/about/aboutus.html">关于我们</a> | 	
				<a href="/about/talk.html">留言反馈</a> | 
				<a href="/about/mianze.html">免责声明</a> | 
				<a href="javascript:void(0);" onclick="AddFavorite('影粉搜搜','http://yfsoso.com')">收藏本站</a>
			</div>
			<div class="cpright colorlittle">
			© 2015 - 2018 &nbsp;<a href="http://s.yfsoso.com" title="电影大全,电视剧大全">影粉搜搜网</a> &nbsp;All Rights Reserved <a href="http://www.miibeian.gov.cn" target="_blank">免备案</a>
			</div>
			<div style="margin:7px;color:#777">
			本站旨在影视宣传和学习交流,所有内容程序自动收集发布,仅提供资源页面的搜索链接，如侵犯了您的权益,请联系我们删除:a#yfsoso.com,欢迎举报违法问题！
			</div>
		</div>
	</div>
	<!-- wrapper -->
	<script type="text/javascript">
    function changeall()
    {
        changealltype('a',5);
        changealltype('b',7);
        changealltype('c',8);
        changealltype('d',5);
    };
    function changealltype(id,num)
    {
        for(var i=1;i<=num;i++)
        {
            var changenoneid = id+i;     
            changetypenone(changenoneid);
        }
        var idvar =  document.getElementById(id);
        idvar.style.color='<?php echo $redcolor; ?>';
        idvar.style.border='<?php echo $redborder; ?>';
    };
    function changetypenone(id)
    {
        var idvar =  document.getElementById(id);
        DelCookie(id);
        idvar.style.color='';
        idvar.style.border='';
    };
    function changetype(id,id2)
    {
        var idvar =  document.getElementById(id);
        var idcookie = getCookie(id);
        if(idcookie!=null)
        {
            DelCookie(id);
            idvar.style.color='';
            idvar.style.border='';
        }
        else
        {
            SetCookie(id,'');
            idvar.style.color='<?php echo $redcolor; ?>';
            idvar.style.border='<?php echo $redborder; ?>';
            var idvar =  document.getElementById(id2);
            idvar.style.color='';
            idvar.style.border='';
        }
    };
	function startTime()
	{
		var today=new Date();
		var h=today.getHours();
		var m=today.getMinutes();
		var s=today.getSeconds();
		// add a zero in front of numbers<10
		m=checkTime(m);
		s=checkTime(s);
		document.getElementById('txt').innerHTML=h+":"+m+":"+s;
		t=setTimeout('startTime()',500);
	};
	function checkTime(i)
	{
		if (i<10) 
		  {i="0" + i;}
		  return i;
	};
			                     
	//收藏本站
	function AddFavorite(title, url) {
	    try {
	        window.external.addFavorite(url, title);
	    }
	    catch (e) {
	        try {
	            window.sidebar.addPanel(title, url, "");
	        }
	        catch (e) {
	            alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
	        }
	    }
	};

	function cnzz()
	{
		(function() {
			var cnzz = document.createElement('script');
			cnzz.type = 'text/javascript';
			cnzz.src = 'http://s22.cnzz.com/z_stat.php?id=1253404551&web_id=1253404551';
			(document.getElementsByTagName('body')[0]
			||document.getElementsByTagName('head')[0]).appendChild(cnzz);
		})();
	};

	window.onscroll = function()
	{
		var h =document.body.scrollTop;
		if(!h)
			h=document.documentElement.scrollTop;
		var top = document.getElementById('goTopButton');
		if(h>0)
		{
			top.style.display = 'block';
		}
		else
		{
			top.style.display = 'none';
		}
	};
    function dhsay()
    {
    	//延时调用 dh_say.php 节省时间
    	var iframe_say = document.getElementById('iframe_say_span');
    	iframe_say.innerHTML = '<iframe id="iframe_say" allowtransparency="true" width="90%" height="16px" style="float:right" src="http://yfsoso.com/dh_say.php" frameBorder="0" scrolling="no" ></iframe>';
    };
	window.onload = function ()
	{
		// 公共的函数
		document.getElementById('submittext').focus();
		startTime();
		// cnzz();
		dhsay();
	};
	</script>	
</body>
</html>
