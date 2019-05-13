<?php

$studentID = "";

$score1 = $score2 = $score3 = $score4 = $score5 = $score6 = 0;
if (isset($_POST['Submit'])) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if (isset($_POST["StudentID"]) && isset($_POST["score1"]) && isset($_POST["score2"]) && isset($_POST["score3"]) && isset($_POST["score4"]) && isset($_POST["score5"]) && isset($_POST["score6"])) {
			$studentID = $_POST['StudentID'];
			$score1  = $_POST['score1'];
			$score2  = $_POST['score2'];
			$score3  = $_POST['score3'];
			$score4  = $_POST['score4'];
			$score5  = $_POST['score5'];
			$score6  = $_POST['score6'];
			$scores  = [$score1, $score2, $score3, $score4, $score5, $score6];
			$avg = calculateAverage($scores);
			$grade = checkGrade(
				calculateAverage($scores)
			);
			echo "You have entered " . count($scores) . " scores for $studentID.";
			echo "<br>";
			echo "Average score for [" . implode(", ", $scores) . "] is ";
			printf("%.1f", (calculateAverage($scores)));
			echo "<br>";
			echo "Average grade is " . checkGrade(calculateAverage($scores));
			echo "<br>";
			echo "<br>";

			include_once("config.php");
			try {
				$pdo->beginTransaction();
				$sql = "INSERT INTO scores( StudentID, Score1, Score2, 	Score3, Score4, Score5, Score6, Average, Grade) VALUES('$studentID','$score1','$score2','$score3','$score4','$score5','$score6','$avg','$grade')";
				$pdo->query($sql);
				$last_id = $pdo->lastInsertId();
				echo "New record created successfully. Last inserted ID is: " . $last_id;
				$pdo->commit();
			} catch (Exception $e) {
				$pdo->rollback();
			}
		}
	} else {
		// do get
		$score1 = $_GET['score1'] ?? 'error';
		$score2 = $_GET['score2'];
		$score3 = $_GET['score3'];
		$score4 = $_GET['score4'];
		$score5 = $_GET['score5'];
		$score6 = $_GET['score6'];


		$scores  = [$score1, $score2, $score3, $score4, $score5, $score6];
	}
}
// echo "Average score for [" . implode(", ", $scores) . "] is ";
// printf("%.1f", (calculateAverage($scores)));
// echo "<br>";
// echo "Average grade is " . checkGrade(calculateAverage($scores));

$pdo = null;

function printArray($array)
{
	$arrayLength = count($array);
	for ($x = 0; $x < $arrayLength; $x++) {
		echo "$array[$x] ";
	}
	echo "<br>";
}

function calculateAverage($array)
{
	$arrayLength = count($array);
	$sum = 0;
	for ($x = 0; $x < $arrayLength; $x++) {
		$sum = $sum + $array[$x];
	}
	return $sum / $arrayLength;
}

function checkGrade($number)
{
	if ($number <= 100 && $number >= 80)
		return 'A';
	else if ($number < 80 && $number >= 60)
		return 'B';
	else if ($number < 60 && $number >= 40)
		return 'C';
	else if ($number < 40 && $number >= 20)
		return 'D';
	else if ($number < 20 && $number >= 1)
		return 'E';
	else
		return 'F';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>

<body>
	<br>
	<br>
	<br>

	<?php echo "<a href=\"viewScores.php?id=$last_id\">View Scores</a>";
	echo "<br>";
	echo "<a href='addScores.php'>Add New Scores</a>"
	?>
</body>

</html>