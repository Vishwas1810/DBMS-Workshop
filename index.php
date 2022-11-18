<html>
	<head>	
		<title>Homepage</title>

		<style>
			.img1{
				min-height: 100%;
				width: 100%;
				height: 100%;
				position: relative;
				top: 0;
				left: 0;
			}

			.head1{
				position: absolute;
				top: 10%;
				left: 50%;
				transform: translate(-50%, -50%);
			}

			.btn1{
				position: fixed;
				top: 50%;
				left: 43%;
				border-width: 0;
				border-radius: 8px;
				color: #fff;
				font-size: 20px;
				width: 200px;
				height: 50px;
				background-color: green;
				box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
				cursor: pointer;
			}

			.container{
				position: relative;
				text-align: center;
				color: white;
			}
		</style>
	</head>

	<body>
		
		<center>
			<div class="container">
				<img src="./img1.jpg" class="img1">
				<h1 class="head1">Database Workshop</h1>

				<a href="home.php" >
                	<input type="submit" value="Display DB Content" class="btn1">
            	</a>

			</div>
		</center>	
	</body>
</html>
