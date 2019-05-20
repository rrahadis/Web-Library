<!DOCTYPE html>
<html lang="en">
<head>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<title>Laboratorium Elektronika dan Komputer</title>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Questrial');

		body{
			font-family: 'Questrial', sans-serif;
			font-size: 14px;
			vertical-align: middle;
		}
		
		#header{
			font-size: 40px;
			padding: 25px;
			background-color: #0e3463;
			color : #fff;
			font-family: 'Questrial', sans-serif;
		}
		#menu{
			background-color: #0e3463;

			}
			#menu ul{				/*untuk tulisan dimenu semua*/
				list-style: none;
				margin: 0px;		
				padding: 0px;
				text-align-last: center;
				font-size: 16px;

			}
			#menu ul li.utama{
				display: inline-table;

			}
			#menu ul li:hover{
				background: #0033cc;
			}
			#menu ul li a{
				display: block;
				text-decoration: none;
				line-height: 40px;
				padding:0 10px;
				color: #fff;

			}
			.utama ul{
				display: none;
				position: absolute;
				z-index: 2;
			}
			.utama:hover ul{
				display: block;
			}
			.utama ul li{
				display: block;
				background-color: #0e3463;  /*untuk tulisan dihover*/
				width: 140px;
				font-size: 14px;
			}
		#isi{
			min-height: 600px;
			padding: 20px;
			width: 720px;
			border: 100px solid white;
			
		}
		#footer{
			text-align: center;
			padding: 20px;
			background-color: #ccc; 
		}
	</style>
</head>
<body>
	
		<div id = "menu">
			<ul>
			   <li class="utama"><a href="index.php">Home</a></li>
			   <li class="utama"><a href="">Lab Elektronika</a>
			   	<ul>
			   		<li><a href="jadwaleldas.php">Jadwal Praktikum</a></li>
			   		<li><a href="pengeldas.php">Pengulangan</a></li>
			   	</ul>
			   </li>
			   <li class="utama"><a href="">Lab Sistem Digital</a>
			   	 	<ul>
			   		<li><a href="jadwalsisdig.php">Jadwal Praktikum</a></li>
			   		<li><a href="pengsisdig.php">Pengulangan</a></li>
			   	</ul>
			   </li>
			   <li class="utama"><a href="">Lab Mikroprosessor</a>
			    	<ul>
			   		<li><a href="jadwalmp.php">Jadwal Praktikum</a></li>
			   		<li><a href="pengmp.php">Pengulangan</a></li>
			   	</ul></li>
			   <li class="utama"><a href="">Lab Interface</a>
			    	<ul>
			   		<li><a href="jadwalinterface.php">Jadwal Praktikum</a></li>
			   		<li><a href="penginterface.php">Pengulangan</a></li>
			   	</ul></li>
			   <li class="utama"><a href="">Lab Sistem Tertanam</a>
			    	<ul>
			   		<li><a href="jadwalsister.php">Jadwal Praktikum</a></li>
			   		<li><a href="pengsister.php">Pengulangan</a></li>
			   	</ul></li>
			</ul>
		
		</div>

		<div id ="header">
				Laboratorium<br>
				Elektronika dan Komputer
		</div>
	
		<div id ="isi">
		Berita lab terbaru
		</div>
		<div id ="footer">
		Copyright 2018 - Raden Rahadi S
		</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
  </body>

</body>
</html>