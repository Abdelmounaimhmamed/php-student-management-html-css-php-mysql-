<?php include "./includes/header.php" ?>

<?php

$sql = 'select * from  client ' ;
$result = mysqli_query($connect, $sql);
$users = mysqli_fetch_all($result , MYSQLI_ASSOC);

if (isset($_POST['delete'])) {
    $name = $_POST['delete'];
   $sql = "delete from client where id=$name";
   $exec = mysqli_query($connect , $sql);
}
if (isset($_POST['edit'])) {
    $name = $_POST['edit'];
    header("Location: /proj-1/edit.php?edit=$name");
}

?>


<table class="table table-dark container ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">tel</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($users as $user ): ;?>
    <tr>
      
      <th scope="row"><?php echo $user["id"] ?></th>
      <td><?php echo $user["name"] ?></td>
      <td><?php echo $user["email"] ?></td>
      <td><?php echo $user["tel"] ?></td>
      <td>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="">
            <span>del</span>
            <input type="submit" value="<?php  echo $user['id']?>" name="delete" class="button">
            <span>edit</span>
            <input type="submit" value="<?php  echo $user['id']?>" name="edit" class="button"/>
        </form>
      </td>
    </tr>
    <?php endforeach ;?>
  </tbody>
</table>




<?php include "./includes/footer.php" ?>