<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>

	<p>Welcome {{ $name }},</p>
	<p>Your account has been created, please click on the link below to activate your account</p>
	<p> <a href='https://tender.solecube.tech/public/user/login?token={{$token}}' class="btn btn-primary" title="" style="  font: bold 11px Arial;
  text-decoration: none;
  background-color: #04AA6D;
  color: #fff;
  padding: 2px 6px 2px 6px;
  border-top: 1px solid #CCCCCC;
  border-right: 1px solid #333333;
  border-bottom: 1px solid #333333;
  border-left: 1px solid #CCCCCC;
  font-size:20px;
  border-radius:5px" target="_blank" > Activation Link </a></p>

<body>
	
</body>
</html>