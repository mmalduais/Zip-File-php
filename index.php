<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    
    <title>php CRUD</title>
</head>
<body>

<?php require_once 'process.php';?>


<?php
if (isset($_SESSION['message'])):?>
<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php
echo $_SESSION['message'];
unset($_SESSION['message']);
?>

</div>
<?php endif  ?>

<div class="container">

<?php 

$mysqli= new mysqli('localhost','root','','crud')or die(mysqli_error($mysqli));
$result= $mysqli->query("select * from data") or die($mysqli->error);
// pre_r($result);

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Category-Page</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Category</a>
        <a class="nav-link" href="product.php">Product</a>
     
      
      </div>
    </div>
  </div>
</nav>


<div class="row justify-content-center">
<table class="table">
<thead>

<tr>
<th> Category_Name </th>
<th> Description </th>
<th colspan="2">  Action </th>
</tr>

</thead>
<?php 
while ($row=$result->fetch_assoc()): ?>
<tr>

<td> <?php echo $row['name'];?> </td>
<td> <?php echo $row['location'];?> </td>
<td>

<a href="index.php?edit=<?php echo $row['id']; ?>"
   class="btn btn-info">Edit</a>
   <a href="process.php?delete=<?php echo $row['id'];?>"



   class="btn btn-danger">Delete</a>
</td>

</tr>

<?php endwhile; ?>

</table>


</div>

  <?php
    function pre_r($array){
        echo'<pre>';
        print_r($array);
        echo'</pre>';
    }

    ?>
    <div class="row justify-content-center">

<form action="process.php" method="post">
  <input type="hidden" name="id"  value=" <?php echo $id; ?>">
    <div class="from-group">
    <label>Category_Name</label>

    <input type="text" name="name" class="form-control"
    value="<?php echo $name; ?>" >
</div>
<div class="from-group">
    <label>Description</label>
    
    <input type="text" name="location"   class="form-control"
    value="<?php echo $location; ?>"   >
    </div>
    <div class="from-group">
      <?php
            if ($update==true):

      ?>
          <button type="submit" class="btn btn-info" name="update">update</button>

          <?php else: ?>
            <button type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif; ?>
      
</div>

</form>

</div>
</div>

</body>
</html>