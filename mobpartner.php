<?php
if(isset($_POST['but_submit'])) {
	require 'db.php';
	try {
		$query = "INSERT INTO `account` SET  `full_name`=?, `username`=?, `password`=?, `phone_number`=?, `email`=?, `po_box`=?, `addres`=?";
		$stmt = $dbc->prepare($query);
		$stmt->bindParam(1, $_POST['txt_fname']);
		$stmt->bindParam(2, $_POST['txt_uname']);
		$stmt->bindParam(3, $_POST['txt_pwd']);
		$stmt->bindParam(4, $_POST['txt_pnumber']);
		$stmt->bindParam(5, $_POST['txt_email']);
		$stmt->bindParam(6, $_POST['txt_pbox']);
		$stmt->bindParam(7, $_POST['txt_adress']);
		if($stmt->execute()) {
			echo "<script>alert('Account Registered.');location.href='moblogin.php'</script>";
		} else {}
	} catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
} 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

   </head>
   <body></br>
    <div  class="container-sm"> 
        <h5 class="text-center"> Yesera Sew Payment System</h5></br>
        <form method="post" action="">
            <h2 class="text-center"> Register </h2></br>
  
        <input type="text" class="form-control"  name="txt_fname" placeholder="Full Name" required></br>
        <input type="text" class="form-control"  name="txt_uname" placeholder="Username" required></br>
        <input type="password" class="form-control" name="txt_pwd"  placeholder="Password" required></br>
        <input type="text" class="form-control"  name="txt_pnumber" placeholder="Phone number" required></br>
        <input type="email" class="form-control"  name="txt_email" placeholder="Email" required></br>
        <input type="text" class="form-control"  name="txt_pbox" placeholder="Po Box" required></br>
        <input type="text" class="form-control"  name="txt_adress" placeholder="Adress" required></br>
      <!-- Submit button -->
      <div class="d-grid gap-2">
      <button type="submit" name="but_submit" class="btn btn-primary ">Register</button></br>
            </div>
      <!-- Register buttons -->
      <div class="text-center">
        <p>Already a member? <a href="mobregister.php">Login</a></p>
      </div>
    </form>    
</div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
