<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Waterlog.css">
	</head>

	<body>
		<h1 id="welcome">Welcome to WaterLogging</h1>

		<div id="searchArea">
			<form method="POST" id="form">
				<input type="text" name="search" placeholder="Search..." id="searchtab"></input><br><br>
                <ul>
                	<li id="firstLi">
                		<label id="fromLabel" for="firstLi">From</label>
                		<select class="from" name="fromYear" placeholder="Year">
                			<option value="" disabled selected>Year</option>
  							<script>
  								var myDate = new Date();
  								var year = myDate.getFullYear();
  								for(var i = 2013; i < year+1; i++){
	  								document.write('<option value="'+i+'">'+i+'</option>');
  								}
  							</script>
						</select>
						<select class="from" name="fromMonth">
							<option value="" disabled selected>Month</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
                	</li>
                	<li id="secondLi">
                		<label id="toLabel" for="secondLi">To</label>
                		<select class="to" name="toYear" placeholder="Year">
                			<option value="" disabled selected>Year</option>
  							<script>
  								var myDate = new Date();
  								var year = myDate.getFullYear();
  								for(var i = 2013; i < year+1; i++){
	  								document.write('<option value="'+i+'">'+i+'</option>');
  								}
  							</script>
						</select>
						<select class="to" name="toYear">
							<option value="" disabled selected>Month</option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
                	</li><br><br>
                	<li>
                		<label for="outputType">Output</label>
                		<input type="checkbox" name="outputType1" value="Sum" class="outputType">Sum</input>
                		<input type="checkbox" name="outputType2" value="Average" class="outputType">Average</input>
                	</li>
                </ul><br><br>
			</form>
		</div>

		<script type="text/javascript">
			
		</script>

		<?php
			$servername = "localhost";
			$username = "username";
			$password = "password";
			$dbname = "myDB";

			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
    			die("Connection failed: " . mysqli_connect_error());
			}

			//$sql = "SELECT kid, FROM Year2013";
			//$result = mysqli_query($conn, $sql);

			mysqli_close($conn);
		?>
	</body>
</html>
