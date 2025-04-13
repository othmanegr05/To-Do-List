<?php 
include "db.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST["task"])){
        $task=$_POST["task"];
        $task=trim($task);
        $task=htmlspecialchars($task);
        if(!empty($task))
        {
            try{
            $sql="insert into tasks (task_name) values ( :task )";
            $stmt = $conn ->prepare($sql);
            $stmt ->bindParam(':task',$task,PDO::PARAM_STR);
            $stmt ->execute();
            header("location:index.php");
            exit();
            }catch (PDOException $e) {
                echo "خطأ في الإدخال: " . $e->getMessage();
            }
        }else
        header("location:index.php");
        exit();


    }
}else {
    header("location:index.php");
    exit();
}





?>