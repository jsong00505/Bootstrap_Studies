<%@ page contentType="text/html; charset=euc-kr"%>

<%
	String email			= request.getParameter("inputEmail");
	String password			= request.getParameter("inputPassword");
	boolean validPassword	= false;
	
	// DB SELECTION HERE FOR PASSWORD
	if("pgadmin".equals(password)) {
		validPassword = true;
	}
	
	session.setAttribute("valid_connection", validPassword);
%>

<!DOCTYPE html>
<html>
<head>
<title>NICE DEVELOPERS</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
if(!<%=validPassword%>) {
	alert("Invalid Information!");
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
