<?php
//第一次写PHP
$filename = "updatecheck.txt";
$nowver = $_POST["ver"];
if(!$nowver)
{
	$nowver = $_GET["ver"];
}
$file = base64_decode(getSubstr(file_get_contents($filename),"<base64>","</base64>"));
$newver = getSubstr($file,"<ver>","</ver>");
$txtecho = $txtecho.=getSubstr($file,"<head>","</head>");
$fromip = $_SERVER['HTTP_X_FORWARDED_FOR'];
header("content-type: text/XML"); //防止</>被cloudflare防XSS吞掉
for ($yicishu=$nowver+1; $yicishu<=$newver; $yicishu++) {
	if (strstr($file,"<$yicishu>") != false) {
		$txtecho = $txtecho.="\r\n<$yicishu>".getSubstr($file,"<$yicishu>","</$yicishu>")."</$yicishu>";
	}
} 
$moreinfo = getSubstr($file,"<serverinfo>","</serverinfo>");
//$txtecho = $txtecho.="<serverinfo>".$moreinfo."<nowip>".$fromip."</nowip>"."</serverinfo>";
// 似乎由于分布式部署各服务器间延迟大于用户刚加入房间后第一次发送网络信息的时间，可能导致发不出去用户的网络信息，服务器暂时不再提供IP，降低网络信息获取速度来临时解决此问题
$txtecho = $txtecho.="<serverinfo>".$moreinfo."</serverinfo>";
echo("<base64>".base64_encode($txtecho)."</base64>");

function getSubstr($str, $leftStr, $rightStr)
{
	$left = strpos($str, $leftStr);
	$right = strpos($str, $rightStr,$left);
	if($left < 0 or $right < $left) return '';
	return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}
?>