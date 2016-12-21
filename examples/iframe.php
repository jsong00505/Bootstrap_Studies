<?php
/**
 * Created by PhpStorm.
 * User: jsong
 * Date: 12/21/16
 * Time: 3:19 PM
 */
 
header("Content-Type:text/html; charset=utf-8;"); 

$userId = $_POST['inputEmail'];
$userPwd = $_POST['inputPassword'];

$domain = "https://staging.nicepay.co.kr";
$path = "/v2/api/id_user_check.jsp";

$post_fields = "userId=".$userId."&userPwd=".$userPwd;
$full_uri = $domain.$path;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$full_uri);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);

// Get server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec ($ch);

curl_close ($ch);
$result = iconv("euc-kr","utf-8",$result);

$result_obj = json_decode($result);

$result_code = $result_obj->{'resultCode'}; // 0000: succeed
$result_msg = $result_obj->{'resultMsg'}; 
?>

<!DOCTYPE html>
<html>
<head>
<title>NICE DEVELOPERS</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
var result_code = <? echo($result_code);?>;
var result_msg = "<? echo($result_msg); ?>";
if(result_code!=0000 || result_code!="0000") {
	alert("["+result_code+"]" + result_msg);
	window.location.href = "./sign_in.html"; 
}
</script>
</head>
<style type="text/css">
	body, html
	{
		margin: 0; padding: 0; height: 100%; overflow: hidden;
	}
</style>
<body>

<iframe src="http://14.49.38.250/nicedoc/start.php" width="100%" height="100%" seamless></iframe>

</body>
</html>
