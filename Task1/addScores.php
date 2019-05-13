<?php
include_once("config.php");
$sql = "SELECT StudentID From students ORDER BY StudentID";

$result = $pdo->query($sql);
$res = $result->fetchAll();
?>

<!DOCTYPE html>
<html>

<body>
    <h1>Enter Scores:</h1>

    <form method="POST" action="grader.php" name="form1">
        <label for="list">Student</label>
        <input list="students" name="StudentID">
        <datalist id="students" name="StudentID">
            <?php
            foreach ($res as $output) : ?>
                <option value=<?php echo $output["StudentID"]; ?> name=<?php echo $output["StudentID"]; ?>></option>
            <?php endforeach ?>


            <br />

        </datalist>
        <br />
        <br />
        Score 1 <input type="text" name="score1" /><br />
        Score 2 <input type="text" name="score2" /><br />
        Score 3 <input type="text" name="score3" /><br />
        Score 4 <input type="text" name="score4" /><br />
        Score 5 <input type="text" name="score5" /><br />
        Score 6 <input type="text" name="score6" /><br /><br />
        <input type="submit" name="Submit">
    </form>
</body>

</html>