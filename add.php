<?php

require_once "config.php";
if($_POST){
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $sql ="INSERT INTO doto(title,description) VALUES (:title,:description)";
    $pdostatment = $pdo->prepare($sql);
    $result = $pdostatment->execute(
    array(
        ':title'=>$title,
        ':description'=>$desc
    )
    );
    if($result){
        echo "<script>alert('New todo is added');window.location.href='index.php';</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="card">
    <div class="card-body">
    <h2>Create New TODO</h2>
    <form class="" action="add.php" method="post">
    <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" name="title" value="" required>
    </div>
    <div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control" name="description" rows="8" cols="80"></textarea>
    </div>
    <div class="form-group">

    <input type="submit" class="btn btn-primary" name="" value="SUBMIT" required>
    <a href="index.php" class="btn btn-warning">Back</a>
    </div>
    
    </form>
    </div>
    </div>
</body>
</html>