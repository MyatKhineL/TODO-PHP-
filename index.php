<?php
require_once "config.php";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
     <?php
    
    $pdostatement = $pdo->prepare("SELECT * FROM doto ORDER BY id DESC");
    $pdostatement->execute();
    $result =$pdostatement->fetchALL();
    
     ?>  
     <div class="card">
     <div class="card-body">
     <h2 class="text-info">TO DO HOME PAGE</h2>
     <a href="add.php" class="btn btn-success mb-3">Create New</a>
     <table class="table table-striped">
     <thead>
     <tr>
     <th>ID</th>
     <th>Title</th>
     <th>Description</th>
     <th>Created</th>
     <th>Actions</th>
     </tr>
     </thead>
     <tbody>
     <?php 
     $i =1;
     if($result){
         foreach ($result as $value){
      ?>
     <tr>
     <td><?php echo $i ?></td>
     <td><?php echo $value['title']?></td>
     <td><?php echo $value['description']?></td>
     <td><?php echo date('Y-m-d',strtotime($value['category_at']))?></td>
     <td>
     <a href="edit.php?id=<?php echo $value['id']?>" class="btn btn-warning">Edit</a>
     <a href="delete.php?id=<?php echo $value['id']?>"class="btn btn-danger">Delete</a>
     </td>
     </tr>
     <?php
     $i++;
         }
     }
     ?>
 
     </tbody>
     
     </table>
     </div>
     </div>
</body>
</html>