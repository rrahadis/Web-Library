<!DOCTYPE html>
<html>
<head>
	<title>login</title>
<style type="text/css">
	body{
		font-family: arial;
		font-size: 14px;
		background-color: #222;

	}
#utama{
	width: 300px;
	margin: 0px auto;
	margin-top: 12%;
}

#judul{
	padding: 15px;
	text-align: center;
	color: #fff;
	font-size: 20px;
	background-color: Red;
	border-top-right-radius: 10px;
	border-top-left-radius: 10px;
	border-bottom: 3px solid Red;
}
#isi{
	background-color: #eaeaec;
	padding: 20px;
	border-bottom-right-radius: 10px;
	border-bottom-left-radius: 10px;

}
input{
	padding: 10px;
}
.as{
	width: 230px;
}
.ase{
	background-color: Red;
	border-radius: 10px;
	color: #fff;

}
.ase:hover{
	background-color: #339966;
	cursor: pointer; 
}
</style>
	

</head>
<body>
	<div id="utama">
		<div id="judul">
			Halaman login
		</div>
		<div id="isi">
			<form action="" method="post">
				<div>
					<input type="text" name="user" placeholder="Username" class="as">
				</div>
				<div style="margin-top: 10px;">
					<input type="password" name="pass" placeholder="Password" class="as">
				</div>
				<div style="margin-top: 10px;">
					<input type="submit" name="login" value="login" class="ase">
				</div>
			</form>
			<?php
			$user = @$_POST['user'];
			$pass = @$_POST['pass'];
			$login = @$_POST['login'];

		if ($login) {
			
			if($user == "" || $pass ==""){
				?> <script type="text/javascript">alert("username / password tidak boleh kosong" );</script> <?php
			} else {
				$link = new mysqli("localhost", "root", "", "db_webelkom");
				$result = $link->query("SELECT * FROM tb_login where username ='$user' and password = md5('$pass')");
				while ($row= $result->fetch_row())
				{
   				if ($row >= 1){
   					
   					header("location: admin/admin.php");
   					
   					}else{
   					
   					echo "login gagal";
   				}
                }
			}
		}

			?>
			
		</div>
		
	</div>

</body>
</html>