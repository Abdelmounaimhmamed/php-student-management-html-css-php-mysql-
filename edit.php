<?php  include "./includes/header.php" ?>

<?php
$id_to_edit = $_GET['edit'];

$sql = "select * from client where id =$id_to_edit";
$result = mysqli_query($connect , $sql);
$user_to_edit = mysqli_fetch_all($result , MYSQLI_ASSOC);

if (isset($_POST['submit'])){ 
    $new_name= filter_input(INPUT_POST , 'name' , FILTER_SANITIZE_SPECIAL_CHARS);
    $new_email = filter_input(INPUT_POST , 'email' , FILTER_SANITIZE_SPECIAL_CHARS);
    $new_tel = filter_input(INPUT_POST , 'tel' , FILTER_SANITIZE_SPECIAL_CHARS);
    $sql1 = "update client set name='$new_name' ,email='$new_email' ,tel='$new_tel' where id = $id_to_edit;";
    $result = mysqli_query($connect , $sql1);
    if ($result) { 
        $message = "data updated successfully ";
        header('Location: /proj-1/users.php');
    }else { 
        $message = 'error while updating data ';
        echo "error" . mysqli_errno($connect);
    }
}


?>

<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="container my-form mb-3">
    <h1 class="alert alert-primary  mt-5 rounded sm"><?php echo $message ?></h1>
    <h1 class="modal-title mt-4 mb-4">edit  User </h1>
    <input type="text" name="name" id="name" value="<?php echo $user_to_edit[0]["name"] ?>" class="form-control form-control-lg mb-3 input"   />
    <input type="email" name="email" id="email" value="<?php echo $user_to_edit[0]["email"] ?>" class="form-control form-control-lg mb-3 input" >
    <input type="tel" name="tel" id="tel" value="<?php echo $user_to_edit[0]["tel"] ?>" class="form-control form-control-lg mb-3 input"  aria-label=".form-control-sm example"/>
    <div class="col-auto">
    <input type="submit" value="Send data" name="submit" class="btn btn-primary mb-3">
    </div>

</form>

<?php  include "./includes/footer.php" ?>

