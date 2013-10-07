<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" >
	<head>
		<title>count down from 5</title>

			<script type="text/javascript">
				window.onload = function() {
				startCountDown(5, 1000, myFunction);
				}

				function startCountDown(i, p, f) {
				var pause = p;
				var fn = f;
				//	make reference to div
				var countDownObj = document.getElementById("countDown");
					if (countDownObj == null) {
					//	error
					alert("div not found, check your id");
					//	bail
					return;
					}
				countDownObj.count = function(i) {
				//	write out count
				countDownObj.innerHTML = i;
					if (i == 0) {
						fn();
						return;
					}
				setTimeout(function() {
					countDownObj.count(i - 1);
				},
					pause
				);
				}
				countDownObj.count(i);
				}

			function myFunction() {
				alert("Hola");
			}



			</script>
	</head>
	<body>
		<div id="countDown"></div>
		<div id="countDown"></div>
		<?php include 'pruebaRandom1.php';
		?>
	</body>
</html>
