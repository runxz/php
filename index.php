<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
</head>
<body>
    <div class ="container">
    <?php require_once 'proses.php';?>
    <?php
    if (isset($_SESSION['message'])):   
    ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']) 
    ?> 

    </div>
    <?php endif ?>


    <?php 
        $mysqli =new mysqli('localhost', 'root', '', 'crud_word') or die(mysqli_error($mysqli));
        $hasil =  $mysqli->query("select * from crud_word") or die($mysqli->error);
        
    
    ?>
    <div class="row">
    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>&nbsp;Waktu&nbsp;</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        while ($row = $hasil ->fetch_assoc()): 
        ?>
        <tr>
            <td><?php echo $row['data']?></td>
            <td><?php echo $row['waktu']?></td>
            <td><a href="proses.php?delete=<?php echo $row['id']; ?>" class ="btn btn-danger">Hapus</a></td>
        </tr>
        <?php endwhile; ?>


    </table>

</div>

    <div class ="row justify-content-md-center">
    <form action="proses.php" method="POST">
    <div class ="form-group">
        <label>DATA</labal><br>
        <input type="text" name="data" class="form-control" value="">
</div>
        <div class ="form-group">
        <button type ="submit" class ="btn btn-primary"name="simpan">simpan</button>
</div>
    </form>
</div> 


    </div>
    
</body>
</html>