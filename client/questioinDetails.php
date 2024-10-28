<?php
include("common/db.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Questions</title>
	<style>
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
		}
		
		h1 {
			color: #333;
			margin-bottom: 20px;
			text-align: center;
		}
		
		.question-link {
			margin: 20px 0;
			padding: 15px;
			background-color: #f7f7f7;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
			transition: background-color 0.2s ease-in-out;
		}
		
		.question-link:hover {
			background-color: #f2f2f2;
		}
		
		.question-link a {
			color: #337ab7;
			text-decoration: none;
			font-weight: bold;
			font-size: 25px;
			transition: color 0.2s ease-in-out;
		}

		.question-link a:hover {
			color: #23527c;
		}

		.quelink {
			font-weight: bold;
			font-size: 25px;
			color: #333;
			margin-bottom: 10px;
		}

		.answer-container {
			margin-top: 30px;
		}

		.answer {
			padding: 15px;
			margin-bottom: 15px;
			background-color: #f1f1f1;
			border: 1px solid #ddd;
			border-radius: 5px;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
		}

		.answer-text {
			font-size: 18px;
			color: #555;
			line-height: 1.6;
		}
		
		.answer-meta {
			margin-top: 10px;
			font-size: 14px;
			color: #999;
		}

		form {
			margin-top: 40px;
		}

		textarea {
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ddd;
			box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
		}

		button {
			padding: 10px 20px;
			background-color: #337ab7;
			color: #fff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			transition: background-color 0.2s ease-in-out;
		}

		button:hover {
			background-color: #286090;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Questions</h1>
		<div class='question-link'>
			<?php 
				include("common/db.php");
				$id = $_GET['que-id'];
				$sql="select * from questions where id=:id";
				$quest=$conn->prepare($sql);
				$quest->bindParam(':id',$id);
				$quest->execute();
				$result=$quest->fetch();
				echo '<div class="quelink">Q '.$result['title'].'?</div>';
				echo "<br>";
				echo $result['description'];
			?>
		</div>
		<form action="server/request.php" method="post">
			<input type="hidden" name="questionId" value="<?=$result['id'] ?>">
			<textarea name="description" id="description" rows="4" placeholder="Write your answer..."></textarea>
			<button type="submit" name="answer">Post Answer</button>
		</form>
		<div class="answer-container">
			<?php
			$queId=$result['id'];
			$sql="select * from answers where questionId=:id";
			$ans=$conn->prepare($sql);
			$ans->bindParam(':id',$queId);
			$ans->execute();
			$result=$ans->fetchAll();
			$result= array_reverse($result);

			echo "<h2>Answers</h2>";
			foreach ($result as $key => $value) {
				echo '<div class="answer">';
				echo '<div class="answer-text">'.$value['answer'].'</div>';
				echo '</div>';
			}
			?>
		</div>
	</div>
</body>
</html>
