<?php 
include "db.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["id"])){
      $id=htmlspecialchars(trim($_POST['id']));
    }
}
else
header('location:index.php');





try {
$sql="DELETE FROM tasks WHERE id=$id";
$conn->exec($sql);
header("location:index.php");
exit();
  echo "Record deleted successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
} 
?>