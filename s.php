<?php
///////////////////////////和x2y4的配置保持一致///////////////////////////////////
//页面存储的深度
$DH_page_store_deep = 3;
//每个深度的页面个数
$DH_page_store_count = 100;
function output_page_path($basepath,$id) 
{	
	global $DH_page_store_deep,$DH_page_store_count;
	$result=$basepath;
	$useid = $id;
	for($i= $DH_page_store_deep-1;$i>0;$i--)
	{
		$cut = pow($DH_page_store_count,$i);
		$mod = floor($useid/$cut);
		$result .= $mod .'/';
		if (!file_exists($result))  
		{   
			mkdir($result,0777);
		}
		$useid = $useid%$cut;
	}
	$result .=$useid.'.html';
	return $result;	
}
///////////////////////////和x2y4的配置保持一致///////////////////////////////////
function dh_mysql_query($sql)
{
	$rs = mysql_query($sql);
	$mysql_error = mysql_error();
	if($mysql_error)
	{
		echo 'dh_mysql_query error info:'.$mysql_error.'</br>';
		echo $sql;
		return null;
	}
	return $rs;
}
////////////////////////////////////////////////////////////////

function putsearchresult($sql,$DH_search_url_nopage)
{
	$DH_html_url="http://v.x2y4.com/html/";
    $movietype=array('未','影','视','综','动','记');
    $movietype2=array('','电影','电视','综艺','动画');
    $linkquality=array('未','抢','修','普','高','超','三','三');
    $linkquality2=array('未知','抢先','修正','普清','高清','超清','三维','三维');
    $linkway=array('未','讯','评','预','活','票','下','线','幕');
    $linkway2=array('未知','影讯','影评','预告','活动','购票','下载','在线','字幕');
    $linktype=array('未','迅','FT','BT','磁','驴','盘','页','百','快','综');
    $linktype2=array('未知资源','迅雷资源','FTP 资源','B T 资源','磁力链接','电驴资源','网盘资源','网页观看','百度影音','快播资源','综合资源');
	$results=dh_mysql_query($sql);
    //echo $sql;
	if($results)
	{	
		echo '<li style="color:#a01200"><span style="width: 90%;display:inline-block">影视类型形式质量&nbsp;&nbsp;原链接</span><span class="rt5v2">日期&nbsp;</span></li>';
		while($row = mysql_fetch_array($results))
		{	
			$page_path = output_page_path($DH_html_url,$row['pageid']);
			$updatef = date("m-d",strtotime($row['updatetime']));
			$lieach = '<li><span style="width: 90%;display:inline-block">[<a href="#" onclick="cookiegoto(\'a\',\'a'.$row['cattype'].'\',\''.$DH_search_url_nopage.'\')" title="点击只显示 '.$movietype2[$row['cattype']].' 类别">'.$movietype[$row['cattype']].'</a>][<a href="#" onclick="cookiegoto(\'b\',\'b'.$row['linkway'].'\',\''.$DH_search_url_nopage.'\')" title="只显示 '.$linkway2[$row['linkway']].' 类别">'.$linkway[$row['linkway']].'</a>][<a href="#" onclick="cookiegoto(\'c\',\'c'.$row['linktype'].'\',\''.$DH_search_url_nopage.'\')" title="只显示 '.$linktype2[$row['linktype']].' 类别">'.$linktype[$row['linktype']].'</a>][<a href="#" onclick="cookiegoto(\'c\',\'c'.$row['linkquality'].'\',\''.$DH_search_url_nopage.'\')" title="只显示 '.$linkquality2[$row['linkquality']].' 类别">'.$linkquality[$row['linkquality']].'</a>] &nbsp;<a href="'.$row['link'].'" target="_blank" rel="nofollow" >'.$row['title'].'['.$row['author'].']</a> <a href="'.$page_path.'" target="_blank">资源汇总>></a></span> <span class="rt5v2" > '.$updatef.'</span></li>';
			echo $lieach;
		}
	}                               
}
function putpageresult($sql)
{
    $movietype=array('未知','电影','电视','综艺','动漫','记录片');
	$DH_html_url="http://v.x2y4.com/html/";
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

#$dbip='movie002.com';
$dbip='127.0.0.1';
$dbuser='root';
$dbpasswd='qazxsw';
$dbname='movie002';

date_default_timezone_set ('Asia/Shanghai');

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

$GETPARAA=$_COOKIE;
$GETPARAB=$_COOKIE;
$GETPARAC=$_COOKIE;
$GETPARAD=$_COOKIE;

if( isset($_GET['q']))
{
	$q = htmlspecialchars($_GET['q']);
	$active=$q;
}
if( isset($_GET['aid']))
{
	$aid = htmlspecialchars($_GET['aid']);
	$active='资源网站 '.$aid.' 的最新资源列表';
}	
if( isset($_GET['p']))
{
	$p = $_GET['p'];
}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>"<?php echo $active ?>"的搜索结果-影粉搜搜</title>
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

$sqlmovietype='';
$acount=0;
$requesttmp='';
if(isset($GETPARAA['a1']))
{
    $acount++;
	$requesttmp .= '1,';
}
if(isset($GETPARAA['a2']))
{
    $acount++;
  	$requesttmp .="2,";
}
if(isset($GETPARAA['a3']))
{
    $acount++;
	$requesttmp .="3,";
}
if(isset($GETPARAA['a4']))
{
    $acount++;
	$requesttmp .="4,";
}
if(isset($GETPARAA['a5']))
{
    $acount++;
	$requesttmp .="5,";
}
if($acount>0)
{
    $sqlmovietype="p.cattype in (".rtrim($requesttmp, ',').")";
    $a="";
}

$sqllinkway='';
$bcount=0;
$requesttmp="";
if(isset($GETPARAB['b1']))
{
    $bcount++;
	$requesttmp .= '1,';
}
if(isset($GETPARAB['b2']))
{
    $bcount++;
	$requesttmp .="2,";
}
if(isset($GETPARAB['b3']))
{
    $bcount++;
	$requesttmp .="3,";
}
if(isset($GETPARAB['b4']))
{
    $bcount++;
	$requesttmp .="4,";
}
if(isset($GETPARAB['b5']))
{
    $bcount++;
	$requesttmp .="5,";
}
if(isset($GETPARAB['b6']))
{
    $bcount++;
	$requesttmp .="6,";
}
if(isset($GETPARAB['b7']))
{
    $bcount++;
  	$requesttmp .="7,";
}
if(isset($GETPARAB['b8']))
{
    $bcount++;
  	$requesttmp .="8,";
}
if($bcount>0)
{
    $sqllinkway="l.linkway in (".rtrim($requesttmp, ',').")";
    $b="";
}

$sqllinktype='';
$ccount=0;
$requesttmp="";
if(isset($GETPARAC['c1']))
{
    $ccount++;
  	$requesttmp .= '1,';
}
if(isset($GETPARAC['c2']))
{
    $ccount++;
	$requesttmp .="2,";
}
if(isset($GETPARAC['c3']))
{
    $ccount++;
	$requesttmp .="3,";
}
if(isset($GETPARAC['c4']))
{
    $ccount++;
	$requesttmp .="4,";
}
if(isset($GETPARAC['c5']))
{
    $ccount++;
	$requesttmp .="5,";
}
if(isset($GETPARAC['c6']))
{
    $ccount++;
	$requesttmp .="6,";
}
if(isset($GETPARAC['c7']))
{
    $ccount++;
	$requesttmp .="7,";
}
if(isset($GETPARAC['c8']))
{
    $ccount++;
	$requesttmp .="8,";
}
if($ccount>0)
{
    $sqllinktype="l.linktype in (".rtrim($requesttmp, ',').")";
}

$sqllinkquality='';
$dcount=0;
$requesttmp="";
if(isset($GETPARAD['d1']))
{
    $dcount++;
  	$requesttmp .= '1,';
}
if(isset($GETPARAD['d2']))
{
    $dcount++;
  	$requesttmp .="2,";
}
if(isset($GETPARAD['d3']))
{
    $dcount++;
	$requesttmp .="3,";
}
if(isset($GETPARAD['d4']))
{
    $dcount++;
  	$requesttmp .="4,";
}
if(isset($GETPARAD['d5']))
{
    $dcount++;
	$requesttmp .="5,";
}
if(isset($GETPARAD['d6']))
{
    $dcount++;
	$requesttmp .="6,";
}
if($dcount>0)
{
    $sqllinkquality="l.linkquality in (".rtrim($requesttmp, ',').")";
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
          <span style="position:absolute;right:15px;top:10px">&nbsp;
				    <div class="bdsharebuttonbox" style="position:relative;left:10px;top:-28px"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_mshare" data-cmd="mshare" title="分享到一键分享"></a></div>
					</span>
				</div>					
			</div>
	<!-- header-inner -->			
	</div>
        <?php
            //echo $q."ddddd:".strlen($q).";sizeof q:".sizeof($q);
            if($q==''&&$aid=='')
            {
                $errorsearch=1;
            	$errormsg =  "</br>".'  <div style="text-align:center">关键词不可以没有哦！请更换关键词重新搜索，谢谢！</div>'."</br>";
            }
	    	else if(strlen($q) > 32)
            {
                $errorsearch=1;
				$errormsg =  "</br>".'  <div style="text-align:center">关键词不可以太长哦！请更换关键词重新搜索，谢谢！</div>'."</br>";
            }
            else
			{
			    require("page_navi.php");
			    $conn=mysql_connect ($dbip, $dbuser, $dbpasswd) or die('数据库服务器连接失败：'.mysql_error());
			    mysql_select_db($dbname, $conn) or die('选择数据库失败');
			    mysql_query("set names utf8;");
                            
                $pagenum=30;
                $DH_search_url="http://".$_SERVER['HTTP_HOST'].'/'.trim($_SERVER['REQUEST_URI'],"/");
                $DH_search_url_nopage = preg_replace('/\&p\=[0-9]+/', '', $DH_search_url);
                $DH_search_url =$DH_search_url_nopage."&p=";
                $DH_search_url_only="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?q='.$q.'&aid='.$aid;
                //echo $DH_search_url; 
                //$DH_search_url_nopage = "http://127.0.0.1/s/s.php?q=".$_REQUEST['q'];
                //$DH_search_url = $DH_search_url_nopage."&p=";
							
			    //if($aid!='')
			    //	$sql="select l.link,l.title,l.updatetime,l.author,l.pageid,l.linkquality ,l.linkway,p.hot,p.catcountry,p.cattype from link l,page p where l.pageid=p.id and l.author like '$aid' order by l.updatetime desc limit 0,60";
			    //if($q!='')
			    //	$sql="select * from page where title like '%$q%' or aka like '%$q%' order by updatetime desc limit 0,5";
			    $sql=" from link l,page p where l.pageid=p.id ";
			
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
			    	$sql .=" and l.author like '%$aid%'";
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
			    $results=dh_mysql_query($sqlcount);
			    $counts = mysql_fetch_array($results);
			    $count = $counts[0];
                if($count==0)
                {
                  $errorsearch=1;
			      $errormsg =  "</br>".'  <div style="text-align:center">好像没有相关资源哦！请更换关键词重新搜索，或者耐心等待，只要不断关注影粉搜搜网，就会第一时间得到资源，您不会失望哦！</div>'."</br>";
                }
			}
        ?>
		<!-- header -->
		<div id="middle" class="width_2" style="min-height:600px;_height:600px;">
			<div class="top_content" style="position:relative;margin:0 5px 10px 0px">
				<img width="24px" height="24px" style="border:none" src="./images/audio.png"/>&nbsp;
				<span id="iframe_say"></span>
			</div>			
			<div id="title">
				<div style="border-bottom:1px solid #ccc;padding:0 0 5px 5px;font-weight:500">以下是 <span class="cred">"<?php echo $active ?>"</span> 的搜索结果：一共 <?php echo $count ?> 条记录</div>
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
                            if($errorsearch!=1)
                            {
					    		$sqlpage="select * from page where title like '%$q%' or aka like '%$q%' order by hot desc limit 0,10";
                                putpageresult($sqlpage);
                                echo '<a href="sx.php?q='.$q.'">更多影视(镜像1)</a>';
                                echo '<a href="sm.php?q='.$q.'">更多影视(镜像2)</a>';
                            }
                        ?> 
                    </div>
                </div>
                <div style="border: 1px solid #bbb;padding:5px;font-size:12px;margin-top:10px">
					<div style="border-bottom:1px solid #bbb;text-align:center"><b>搜索过滤</b></div>
				    点击选择，再点取消，重新搜索</br> 	
                    <div class="searchfilter"><span class="searchsubmit" style="padding:5px;cursor:pointer" onclick="changeall()">取消过滤</span> <a class="searchsubmit" style="padding:5px" href="<?php echo $DH_search_url_only?>">过滤结果</a></div>
                    <b>影视类型：</b></br>
					    <div class="lifloat tc">
                            <a id="a"  onclick="changealltype('a',5)">全部</a>
                            <a id="a1" onclick="changetype('a1','a')">电影</a>
                            <a id="a2" onclick="changetype('a2','a')">电视</a>
                            <a id="a3" onclick="changetype('a3','a')">综艺</a>
                            <a id="a4" onclick="changetype('a4','a')">动画</a>
                            <a id="a5" onclick="changetype('a5','a')">纪录</a>
                        </div>
                    <b>资源类型：</b></br>
					    <div class="lifloat tc">
                            <a id="b"  onclick="changealltype('b',8)">全部</a>
                            <a id="b1" onclick="changetype('b1','b')">影讯</a>
                            <a id="b2" onclick="changetype('b2','b')">影评</a>
                            <a id="b3" onclick="changetype('b3','b')">预告</a>
                            <a id="b4" onclick="changetype('b4','b')">活动</a>
                            <a id="b5" onclick="changetype('b5','b')">购票</a>
                            <a id="b6" onclick="changetype('b6','b')">下载</a>
                            <a id="b7" onclick="changetype('b7','b')">在线</a>
                            <a id="b8" onclick="changetype('b8','b')">字幕</a>
                        </div>
                    <b>资源形式：</b></br>
					    <div class="lifloat tc">
				            <a id="c"  onclick="changealltype('c',8)">全部</a> 
				            <a id="c1" onclick="changetype('c1','c')">迅雷</a> 
			                <a id="c4" onclick="changetype('c4','c')">磁力</a>
				            <a id="c5" onclick="changetype('c5','c')">电驴</a>
			                <a id="c6" onclick="changetype('c6','c')">网盘</a>
				            <a id="c7" onclick="changetype('c7','c')">在线</a>
				            <a id="c8" onclick="changetype('c8','c')">综合</a>
				            <a id="c2" onclick="changetype('c2','c')">FTP </a>
				            <a id="c3" onclick="changetype('c3','c')">B T </a>
                        </div>
                    <b>资源质量：</b></br>
					    <div class="lifloat tc">
					        <a id="d"  onclick="changealltype('d',5)">全部</a>
					        <a id="d1" onclick="changetype('d1','d')">抢先</a>
					        <a id="d2" onclick="changetype('d2','d')">修正</a>
					        <a id="d3" onclick="changetype('d3','d')">普清</a>
					        <a id="d4" onclick="changetype('d4','d')">高清</a>
					        <a id="d5" onclick="changetype('d5','d')">超清</a>
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
				<a href="javascript:void(0);" onclick="AddFavorite('影粉搜搜','http://yfsoso.com')">收藏本站</a> |
        <span id="cnzz_stat_icon_1254506275"></span>
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
    function cookiegoto(id,id1,href)
    {
        if(id=='a')
            changealltype('a',5);
        if(id=='b')
            changealltype('b',7);
        if(id=='c')
            changealltype('c',8);
        if(id=='d')
            changealltype('d',5);
        
        SetCookie(id1,'');
        location.href=href;
    }
    function setTypeStyle(id)
    {
        id.style.color="#a01200";
        id.style.border="1px solid #a01200";
    }
    function cancleTypeStyle(id)
    {
        id.style.color="";
        id.style.border="";
    }
    function gettypeall()
    {
        getalltype('a',5);
        getalltype('b',8);
        getalltype('c',8);
        getalltype('d',5);
    };
    function getalltype(id,num)
    {
        var count=0;
        for(var i=1;i<=num;i++)
        {
            var eachid = id+i;     
            var idvar =  document.getElementById(eachid);
            var idcookie = getCookie(eachid);
            if(idcookie!=null)
            {
              count++;
              setTypeStyle(idvar);
            }
            else
            {
              cancleTypeStyle(idvar);
            }
        }
        var mainid =  document.getElementById(id);
        if(count==0)
          setTypeStyle(mainid);
    };
    function changeall()
    {
        changealltype('a',5);
        changealltype('b',8);
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
        setTypeStyle(idvar);
    };
    function changetypenone(id)
    {
        var idvar =  document.getElementById(id);
        DelCookie(id);
        cancleTypeStyle(idvar);
    };
    function changetype(id,id2)
    {
        var idvar =  document.getElementById(id);
        var idcookie = getCookie(id);
        if(idcookie!=null)
        {
            DelCookie(id);
            cancleTypeStyle(idvar);
        }
        else
        {
            SetCookie(id,'');
            setTypeStyle(idvar);
            var idvar2 =  document.getElementById(id2);
            cancleTypeStyle(idvar2);
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
		{
      		i="0" + i;
    	}
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
    	var iframe_say = document.getElementById('iframe_say');
    	iframe_say.innerHTML = '<iframe id="iframe_say" allowtransparency="true" width="95%" height="16px" src="http://yfsoso.com/dh_say.php" frameBorder="0" scrolling="no" ></iframe>';
    };
	window.onload = function ()
	{
		// 公共的函数
		document.getElementById('submittext').focus();
        gettypeall();
		startTime();
		dhsay();
        //百度分享
	    window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
	};
	</script>	
  <script src="http://s95.cnzz.com/z_stat.php?id=1254506275" language="JavaScript"></script> 
</body>
</html>
