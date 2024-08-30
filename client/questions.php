<?php
include("common/db.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Questions</title>
	<style>
		/* Add some basic styling to make the UI more attractive */
		body {
			font-family: Arial, sans-serif;
			background-color: #f9f9f9;
		}
		
		.container {
			max-width: 80%; /* Increased width to 80% of device width */
			margin: 40px auto;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ddd;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		
		.text-center {
			text-align: center;
		}
		
		h1 {
			color: #333;
			margin-bottom: 20px;
		}
		
		.question-link {
			display: block;
			margin: 20px 0;
			padding: 10px;
			background-color: #f7f7f7;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
			transition: background-color 0.2s ease-in-out;
		}
		
		.question-link:hover {
			background-color: #f2f2f2;
			text-decoration: none;
		}
		
		.question-link a {
			color: #337ab7;
			text-decoration: none;
		}
		
		.question-link a:hover {
			color: #23527c;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Questions</h1>
		<?php
		$sql="SELECT * FROM questions";
		$questions=$conn->query($sql);
		foreach ($questions as $question) {
			echo "<div class='question-link'>";
			echo "<a href='#'>" . $question['title'] .'?'. "</a>";
			echo "</div>";
		}
		?>
	</div>
</body>
</html>