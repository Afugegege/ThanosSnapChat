<?php

include("connection.php");
switch($_POST["functionname"]){
    case 'getListOfChat':
        $userId = $_POST["userId"];
        $query = "SELECT uc.chat_id, ch.name, ch.avatar FROM userchat as uc 
        INNER JOIN chat as ch ON uc.chat_id = ch.chat_id
        WHERE uc.user_id = {$userId}";
        $result = $conn->query($query);
        $chats = array();
        while($row = $result->fetch_assoc()){
            $chats[] = $row;
        }
        echo json_encode($chats);
        break;
}

$conn->close();

?>