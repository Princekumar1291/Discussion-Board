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
			max-width: 80%;
			margin: 40px auto;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ddd;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			display: flex;
			flex-wrap: wrap; /* Ensures responsiveness */
		}

		.questions-container {
			flex: 3; /* This will take up 75% of the container width */
			margin-right: 20px;
		}

		.categories-container {
			flex: 1; /* This will take up 25% of the container width */
			max-width: 250px; /* Optional: you can limit the max width of the category section */
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
			font-weight: bold;
			transition: color 0.2s ease-in-out;
			font-size: 20px;
		}

		.question-link a:hover {
			color: #23527c;
		}

		.categories-container h1 {
			text-align: center;
		}

		/* Responsive Design */
		@media (max-width: 768px) {
			.container {
				flex-direction: column-reverse;
			}

			.questions-container, 
			.categories-container {
				flex: 1;
				margin-right: 0;
				max-width: 100%;
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="questions-container">
			<h1>Questions</h1>
			<?php
			if(isset($_GET['category_id'])){
				$sql="SELECT * FROM questions WHERE categoryId={$_GET['category_id']}";
			}
			else if(isset($_GET['my-question'])){
				$sql="SELECT * FROM questions WHERE userId={$_GET['my-question']}";
			}
			else if(isset($_GET['latest-question'])){
				$sql="SELECT * FROM questions ORDER BY id DESC";
			}
			else{
				$sql="SELECT * FROM questions";
			}
			$questions=$conn->query($sql);
			foreach ($questions as $question) {
				echo "<div class='question-link'>";
				echo "<a href='?que-id={$question['id']}'>" . $question['title'] .'?'. "</a>";
				echo "</div>";
			}
			?>
		</div>
		<div class="categories-container">
			<h1>Categories</h1>
			<?php
			include("categorylist.php");
			?>
		</div>
	</div>
</body>
</html>
