<?php
include 'auth_session.php';
?>
<!DOCTYPE html>
<html>
	<head>

	</head>
	<body>

<?php

if(isset($_POST['submit_btn'])) {
    try {
        require 'db.php';
        $query = "UPDATE commit SET  electric=?,edeadline=?, telecom=?,tdeadline=?, water=?,wdeadline=? ,paid=?WHERE cu_id=?";
        $stmt = $dbc->prepare($query);
        $stmt->bindParam(1, $_POST['eelectric']);
        $stmt->bindParam(2, $_POST['edeadline']);
        $stmt->bindParam(3, $_POST['ttelecom']);
        $stmt->bindParam(4, $_POST['tdeadline']);
        $stmt->bindParam(5, $_POST['wwater']);
        $stmt->bindParam(6, $_POST['wdeadline']);
        $stmt->bindParam(7, $_POST['deadline2']);
        $stmt->bindParam(8, $_POST['cu_id']);
        $q=' INSERT INTO commit2 SELECT * FROM commit WHERE cu_id=?';
        $s = $dbc->prepare($q);
        $s->bindParam(1, $_POST['cu_id']);
        $s->execute();
        if($stmt->execute()) {
            echo "<script>alert('New Month Payment Made.');location.href='index.php'</script>";
        } else {}
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} 
?>

        <form action="" method="POST">
            <?php
            if(isset($_GET['cu_id'])) {
                require 'config.php';
                $result = mysqli_query($con,"SELECT cu_id,name,partner FROM commit WHERE cu_id =".$_GET['cu_id']);
                $row = mysqli_fetch_row($result);
            }
            echo ' <input type="hidden"  name="cu_id" value= ';
            echo $row[0];echo '/> </br>
            Full Name: <input type="text"  name="fname" value=';
            echo $row[1];echo ' disabled/> </br>
            </br>
            partner: <input type="text" name="ppartner" value=';
            echo $row[2];echo ' disabled/>';
            ?> </br>
            </br>
            electric: <input type="text" name="eelectric" /> </br>
            </br>
            deadline: <input type="date" name="edeadline"  >
            </br>
            telecom: <input type="text" name="ttelecom" /> </br>
            </br>
            deadline: <input type="date" name="tdeadline"  >
            </br>
            water: <input type="text" name="wwater" /> </br>
            </br>
            deadline: <input type="date" name="wdeadline"  >
            </br>
            Change Paid status
            <input type="number" name="deadline2"  >
            </br>
            <input type="submit" name="submit_btn"/>
        </form>
    </body> 
</html>