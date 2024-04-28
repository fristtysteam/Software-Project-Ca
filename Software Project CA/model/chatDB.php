<?php
function saveChat($name, $msg){
    global $db;
    //$insert ="INSERT chatlog SET name = '$name', '$msg'";
    // mysqli_query($insert);
    $query ="INSERT INTO chatlog (name, message)VALUE(:name, :message)";
    $statement = $db->prepare($query);

    $statement->bindValue(":name", $name);
    $statement->bindValue(":message", $msg);

    try {
        $statement->execute();
    } catch (Exception $ex) {
        // Redirect to an error page passing the error message
        //header("Location: ../View/error.php?msg=" . $ex->getMessage());
        echo 'Something went wrong during insert';
        header("Location: ../controller/index.php?do_chat");
        exit();
    }

    $statement->closeCursor();
     return true;
}
function getAllChat(){
    global $db;
    $query = "SELECT * FROM chatlog  ORDER BY id DESC";
    $statement =$db->prepare($query);

    try{
        $statement->execute();
    }catch(PDOException $ex){
        // Redirect to an Error page passing the error message
        header("Location:../view/error.php?msg=" . $ex->getMessage());
    }
    // Retrieve user record from db
    $chats = $statement->fetchAll(PDO::FETCH_ASSOC);
    //$orders = $statement->fetchAll();
    $statement->closeCursor();
    return $chats;
}
function logChat(){
    global $db;
    $query = "SELECT * FROM chatlog  ORDER BY id DESC";
    $statement =$db->prepare($query);

    try{
        $statement->execute();
    }catch(PDOException $ex){
        // Redirect to an Error page passing the error message
        header("Location:../view/error.php?msg=" . $ex->getMessage());
    }
// Retrieve user record from db
    $chats = $statement->fetchAll(PDO::FETCH_ASSOC);
//$orders = $statement->fetchAll();
    $statement->closeCursor();
    $count = mysqli_num_rows($chats);
    if($count>0){
        while ($row = mysqli_fetch_row($chats)){
            echo $row['name']. " : ".$row['msg'] . "<br";
        }
    }
}
