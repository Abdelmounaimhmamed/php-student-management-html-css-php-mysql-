<!-- LAMP stack => linux apache2 mysql php -->
<?php include "./includes/header.php" ?>
<?php 

$name =filter_input(INPUT_POST , 'name' , FILTER_SANITIZE_SPECIAL_CHARS);
$body = filter_input(INPUT_POST , 'body' , FILTER_SANITIZE_SPECIAL_CHARS);
if (isset($_POST['submit'])){
    if (empty($_POST['body']) ||  empty($_POST['name'])){
        $message =  "we can not set any empty data please fill the form ";
    }else { 
        $sql = "insert into contact (name,body) VALUES ('$name','$body');";
        $result = mysqli_query($connect , $sql);
        if (!mysqli_query($connect,$sql)){
            $message = "error while inserting data try again :( !" . mysqli_errno($connect);
        }else { 
            $message =  "data inserted successfully !";
            // header("Location: /proj-1/contact.php");
        }
    }
}
?>

<h1 class="alert alert-primary  mt-5 rounded sm" role="alert"><?php echo $message  ?></h1>
<form action="<?php  htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST"  class="form container form-control mt-5 input">
    <h1 class="mb-3">Contact-Us</h1>
    <input type="text" name="name" id="name" class="input form-control mb-5"  placeholder="Enter you name "/>
    <textarea name="body" class="textarea input form-control mb-5" placeholder="Enter your opinion" ></textarea>
    <input type="submit" name="submit" value="send problem " class="btn btn-primary mb-3">

</form>



<?php include "./includes/footer.php" ?>
