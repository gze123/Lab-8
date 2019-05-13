<?php
//Step 1. Connect to the database.
//Step 2. Handle connection errors
// including the database connection file
include_once("config.php");

if (isset($_POST['update'])) {
    //The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
    $id = $_POST['id'];
    $studentID = $_POST['studentID'];
    $score1 = $_POST['score1'];
    $score2 = $_POST['score2'];
    $score3 = $_POST['score3'];
    $score4 = $_POST['score4'];
    $score5 = $_POST['score5'];
    $score6 = $_POST['score6'];

    // checking empty fields
    // if (empty($score1) || empty($score2) || empty($score3) || empty($score4) || empty($score5) || empty($score6)) {

    //     if (empty($score1)) {
    //         echo "<font color='red'>Score1 field is empty.</font><br/>";
    //     }

    //     if (empty($score2)) {
    //         echo "<font color='red'>Score2 field is empty.</font><br/>";
    //     }
    //     if (empty($score3)) {
    //         echo "<font color='red'>Score3 field is empty.</font><br/>";
    //     }

    //     if (empty($score4)) {
    //         echo "<font color='red'>Score4 field is empty.</font><br/>";
    //     }
    //     if (empty($score5)) {
    //         echo "<font color='red'>Score5 field is empty.</font><br/>";
    //     }

    //     if (empty($score6)) {
    //         echo "<font color='red'>Score6 field is empty.</font><br/>";
    //     }
    // } else {

    //Step 3. Execute the SQL query.
    //updating the table
    try {
        // begin a transaction
        $pdo->beginTransaction();
        // a set of queries: if one fails, an exception will be thrown
        $sql = "UPDATE scores SET Score1='$score1',Score2='$score2',Score3='$score3',Score4='$score4',Score5='$score5',Score6='$score6' WHERE ScoreID=$id";
        $pdo->query($sql); //run the query & returns a PDOStatement object
        // if we arrive here, it means that no exception was thrown
        // which means no query has failed, so we can commit the
        // transaction
        $pdo->commit();
        echo "Record updated succeessfully for " . $studentID;
    } catch (Exception $e) {
        // we must rollback the transaction since an error occurred
        // with insert
        $pdo->rollback();


        //redirectig to the display page. In our case, it is index.php
        // header("Location: viewScores.php");

        //Step 5: Freeing Resources and Closing Connection using mysqli
        $pdo = null;
    }
} else if (isset($_POST['delete'])) {
    $id = $_POST['id'];


    //Step 3. Execute the SQL query.
    //updating the table
    try {
        // begin a transaction
        $pdo->beginTransaction();
        // a set of queries: if one fails, an exception will be thrown
        $sql = "DELETE FROM SCORES WHERE ScoreID=$id";
        $pdo->query($sql); //run the query & returns a PDOStatement object
        // if we arrive here, it means that no exception was thrown
        // which means no query has failed, so we can commit the
        // transaction
        $pdo->commit();
        echo "Record deleted succeessfully";
    } catch (Exception $e) {
        // we must rollback the transaction since an error occurred
        // with insert
        $pdo->rollback();
    }

    //redirectig to the display page. In our case, it is index.php
    // header("Location: addScores.php");

    //Step 5: Freeing Resources and Closing Connection using mysqli
    $pdo = null;
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
    <?php
    echo "<a href='addScores.php'>Add New Scores</a>";
    ?>
</body>

</html>