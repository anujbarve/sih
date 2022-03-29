<?php
// Include database connection file
require_once "../includes/dbh.inc.php";

if (count($_POST) > 0) {

    $sql = "UPDATE complaints SET name='" . $_POST['name'] . "' ,email='" . $_POST['email'] . "' ,class='" . $_POST['class'] . "' ,completed='" . $_POST["completed"] . "' WHERE id='" . $_POST['id'] . "'";
    mysqli_query($conn, $sql);

    header("location: index.php");
    exit();
}
$result = mysqli_query($conn, "SELECT * FROM complaints WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <?php include "head.php"; ?>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h2>Update Record</h2>
                </div>
                <p>Please edit the input values and submit to update the record.</p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="" maxlength="50" required="">
                    </div>
                    <div class="form-group ">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="" maxlength="30" required="">
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                        <input type="text" name="class" class="form-control" value="" required="">
                    </div>
                    <div class="form-group">
                        <label>Completed</label>
                        <input type="text" name="completed" class="form-control" value="" required="">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>