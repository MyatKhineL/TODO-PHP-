<?php

require_once "config.php";

if($_POST){
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $id = $_POST['id'];
    $pdostatement = $pdo->prepare("UPDATE doto SET title='$title',description='$desc'WHERE id='$id'");
    $result =$pdostatement->execute();

    if($result){
        echo "<script>alert('New todo is updated');window.location.href='index.php';</script>";
    }
}else{
    $pdostatement = $pdo->prepare("SELECT * FROM doto WHERE id=".$_GET['id']);
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit New</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="card">
    <div class="card-body">
    <h2>Edit New TODO</h2>
    <form class="" action="" method="post">
    <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
    <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>" required>
    </div>
    <div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control" name="description" rows="8" cols="80">
    <?php echo $result[0]['description']?>
    </textarea>
    </div>
    <div class="form-group">

    <input type="submit" class="btn btn-primary" name="" value="UPDATE" required>
    <a href="index.php" class="btn btn-warning">Back</a>
    </div>
    
    </form>
    </div>
    </div>
</body>
</html>