<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script
      src="https://kit.fontawesome.com/391827d54c.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Bebas+Neue"
      rel="stylesheet"
    />
    <script src="functions.js" defer></script>
    <title>Thanos Snapchat</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

      /* Add other existing CSS styles here */
    </style>
  </head>
  <body>
    <div class="background-green"></div>
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#">Thanos Snapchat</a>
      <div class="nav-icons">
        <li><i class="fas fa-search"></i></li>
        <li><i class="fas fa-bell"></i></li>
        <li><i class="fas fa-cog"></i></li>
      </div>
    </nav>
    <div class="main-container">
      <div class="left-container">
        <div class="search-container">
          <div class="input">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search" id="search-input" />
          </div>
        </div>
        <div class="chat-list" id="chat-list">
          <!-- Dynamic chat list items will be inserted here -->
        </div>
      </div>
      <div class="right-container">
        <div class="chat-selection">
          <img
            src="https://cdn-icons-png.flaticon.com/512/9374/9374926.png"
            alt="Chat Icon"
            class="chat-icon"
          />
          <p class="chat-text">Please Select a Chat</p>
        </div>

        <div class="chat-container">
          <div class="chat-header">
            <div class="user-img">
              <img src="user-profile-pic.jpg" alt="User Profile Picture" />
            </div>
            <div class="user-details">
              <h4>User Name</h4>
              <p>Last seen: 1 hour ago</p>
              <div class="active-status"></div>
            </div>
          </div>
          <div class="chat-content" id="chat-content">
            <!-- Dynamic chat messages will be inserted here -->
            <div class="chat-container" id="chat-container">
              <!-- <div class="message-box">
                <div class="message message-left">
                  <p>
                    Hello
                    <br /><time>9:00 AM</time>
                  </p>
                </div>
              </div>
              <div class="message-box">
                <div class="message message-right">
                  <p>
                    Hi
                    <br /><time>9:01 AM</time>
                  </p>
                </div>
              </div> -->
            </div>
          </div>

          <div class="chat-footer">
            <input
              type="text"
              placeholder="Type a message"
              id="message-input"
            />
            <button id="send-button"><i class="fas fa-paper-plane"></i></button>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
    function getAllChats() {
      $.ajax({
        type: "POST",
        url: "functions.php",
        data: { functionname: "getListOfChat", userId: 1 },
        success: function (data) {
          var record = JSON.parse(data);
          console.log(record);
        },
      });
    }

    $(document).ready(function () {
      getAllChats();
    });
  </script>
</html>
