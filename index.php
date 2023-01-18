<?php include "./includes/header.php" ?>

<?php 

if (isset($_POST['submit'])){
    $name = filter_input(INPUT_POST , 'name' , FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_SPECIAL_CHARS);
    $tel = filter_input(INPUT_POST , 'tel' , FILTER_SANITIZE_NUMBER_FLOAT);
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['tel'])) {
        $message = "sorry , we can not send any  empy data !" ;
    }else {
        $sql = "insert into client (name,email,tel) values('$name','$email','$tel')";
        if (mysqli_query($connect , $sql)){
            $message = "data inserted successfuly !" ;
        }else { 
            $message = "error while inserting data , please try again !";
        }
    }
}

?>




<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="container my-form mb-3">
    <h1 class="alert alert-primary  mt-5 rounded sm"><?php echo $message ?></h1>
    <h1 class="modal-title mt-4 mb-4">Add User </h1>
    <input type="text" name="name" id="name" placeholder="Enter your name" class="form-control form-control-lg mb-3 input"   />
    <input type="email" name="email" id="email" placeholder="Enter your email" class="form-control form-control-lg mb-3 input" >
    <input type="tel" name="tel" id="tel" placeholder="Enter your tel" class="form-control form-control-lg mb-3 input"  aria-label=".form-control-sm example"/>
    <div class="col-auto">
    <input type="submit" value="Send data" name="submit" class="btn btn-primary mb-3">
  </div>

</form>





<?php include "./includes/footer.php"?>