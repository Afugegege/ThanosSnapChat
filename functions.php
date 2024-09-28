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
        case 'getChatData':
            $chatId = $_POST["chatId"];
            
            // Get chat info
            $chatInfoQuery = "SELECT name, avatar, last_modify FROM chat WHERE chat_id = ?";
            $stmt = $conn->prepare($chatInfoQuery);
            $stmt->bind_param("i", $chatId);
            $stmt->execute();
            $chatInfoResult = $stmt->get_result();
            $chatInfo = $chatInfoResult->fetch_assoc();
        
            // Get chat messages
            $messagesQuery = "SELECT message_id, sender_id, content, timestamp 
                              FROM message 
                              WHERE chat_id = ? 
                              ORDER BY timestamp ASC";
            $stmt = $conn->prepare($messagesQuery);
            $stmt->bind_param("i", $chatId);
            $stmt->execute();
            $messagesResult = $stmt->get_result();
            $messages = array();
            while($row = $messagesResult->fetch_assoc()){
                $messages[] = $row;
            }
        
            $chatData = array(
                'chatInfo' => $chatInfo,
                'messages' => $messages
            );
        
            echo json_encode($chatData);
            break;
        
}

$conn->close();

?>