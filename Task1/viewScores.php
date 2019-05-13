<?php
include_once("config.php");

$id = $_GET['id'];

$sql2 = "SELECT * FROM scores WHERE ScoreID=$id";
$result2 = $pdo->query($sql2);

while ($res = $result2->fetch()) {
    $scoreID = $res['ScoreID'];
    $studentID = $res['StudentID'];
    $score1 = $res['Score1'];
    $score2 = $res['Score2'];
    $score3 = $res['Score3'];
    $score4 = $res['Score4'];
    $score5 = $res['Score5'];
    $score6 = $res['Score6'];
    $avg = $res['Average'];
    $grade = $res['Grade'];
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
    <form method="POST" action="editScores.php" name="form2">
        Score 1 <input type="text" name="score1" value="<?php echo $score1 ?>" /><br />
        Score 2 <input type="text" name="score2" value="<?php echo $score2 ?>" /><br />
        Score 3 <input type="text" name="score3" value="<?php echo $score3 ?>" /><br />
        Score 4 <input type="text" name="score4" value="<?php echo $score4 ?>" /><br />
        Score 5 <input type="text" name="score5" value="<?php echo $score5 ?>" /><br />
        Score 6 <input type="text" name="score6" value="<?php echo $score6 ?>" /><br /><br />
        <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
        <input type="hidden" name="studentID" value=<?php echo $studentID; ?>>
        <input type="submit" name="update" value="Update">
        <input type="submit" name="delete" value="Delete">

    </form>

</body>

</html>