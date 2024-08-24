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
    <link rel="stylesheet" href="styles.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Bebas+Neue"
      rel="stylesheet"
    />
    <script src="functions.js" defer></script>
    <title>Thanos Snapchat</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

      body {
        background-color: #fbc245 !important;
      }
      .navbar {
        background-color: #fbc245 !important;
      }
      .navbar-brand {
        margin-left: 3%;
        font-family: "Bebas Neue", sans-serif;
        font-size: 50px;
        color: #a41cff;
      }
      .profile-icon {
        border-radius: 100%;
        margin-left: auto;
      }
      nav {
        background-color: #fbc245;
      }
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }
      .background-green {
        position: absolute;
        top: 0;
        width: 100%;
        height: 20%;
        background-color: #fbc245;
      }
      .main-container {
        position: relative;
        width: 100%;
        max-width: 100%;
        height: calc(100vh - 100px);
        background: #fff;
        display: flex;
        box-shadow: 0px 1px 1px 0 rgba(0, 0, 0, 0.5),
          0px 2px 5px 0 rgba(0, 0, 0, 0.6);
      }
      .main-container .left-container {
        position: relative;
        width: 30%;
        height: 100%;
        flex: 30%;
        background: #7460eb;
      }
      .main-container .right-container {
        position: relative;
        width: 70%;
        height: 100%;
        flex: 70%;
        background: #b2a5ff;
      }
      .main-container .right-container::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url(https://camo.githubusercontent.com/854a93c27d64274c4f8f5a0b6ec36ee1d053cfcd934eac6c63bed9eaef9764bd/68747470733a2f2f7765622e77686174736170702e636f6d2f696d672f62672d636861742d74696c652d6461726b5f61346265353132653731393562366237333364393131306234303866303735642e706e67);
        opacity: 0.5;
      }
      .header {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
        height: 60px;
        background: #ededed;
        padding: 0 15px;
      }
      .user-img {
        position: relative;
        width: 40px;
        height: 40px;
        overflow: hidden;
        border-radius: 50%;
      }
      .dp {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
      }
      .nav-icons {
        display: flex;
        justify-content: flex-end;
        padding-left: 110px;
      }
      .nav-icons li {
        list-style: none;
        display: flex;
        cursor: pointer;
        color: #51585c;
        margin-left: 22px;
        font-size: 18px;
      }
      .notif-box {
        position: relative;
        display: flex;
        width: 100%;
        height: 70px;
        background: #76daff;
        align-items: center;
        font-size: 0.8em;
        text-decoration: none;
      }
      .notif-box i {
        position: relative;
        left: 13px;
        background: #fff;
        padding: 10px;
        width: 42px;
        height: auto;
        font-size: 20px;
        border-radius: 55%;
        cursor: pointer;
        color: #76daff;
      }
      .notif-box .fa-xmark {
        position: absolute;
        left: 260px;
        text-align: center;
        background: #76daff;
        color: #fff;
      }
      .notif-text {
        margin: 25px;
      }
      .notif-text a {
        text-decoration: none;
        color: #333;
        font-size: 0.9em;
      }
      .search-container {
        position: relative;
        width: 100%;
        height: 40px;
        background: #7460eb;
        display: flex;
        align-items: center;
      }
      .search-container .input input {
        color: black;
        width: calc(100% - 50px);
        outline: none;
        border: none;
        background: #b2a5ff;
        padding: 5px;
        height: 30px; /* Fixed typo here */
        border-radius: 10px;
        font-size: 12px;
        padding-left: 60px;
        margin: 10px;
      }
      .search-container .input i {
        position: absolute;
        left: 26px;
        top: 14px;
        color: #ffffff;
        font-size: 0.8em;
      }
      .chat-list {
        position: relative;
        height: calc(100% - 170px);
        overflow-y: auto;
      }
      .chat-list .chat-box {
        position: relative;
        width: 100%;
        display: flex;
        align-items: center;
        cursor: pointer;
        padding: 15px;
        border-bottom: 1px solid #330071;
      }
      .chat-box:hover {
        background-color: #a41cff;
      }
      .chat-list .active {
        background: rgb(74 42 162 / 46%) !important;
      }
      .chat-list .chat-box .img-box {
        position: relative;
        width: 55px;
        height: 45px;
        overflow: hidden;
        border-radius: 50%;
      }
      .chat-list .chat-box .chat-details {
        width: 100%;
        margin-left: 10px;
      }
      .chat-list .chat-box .chat-details .text-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2px;
      }
      .chat-list .chat-box .chat-details .text-head h4 {
        font-size: 1.1em;
        font-weight: 600;
        color: #000;
      }
      .chat-list .chat-box .chat-details .text-head .time {
        font-size: 0.8em;
        color: #aaa;
      }
      .chat-list .chat-box .chat-details .text-message {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .chat-list .chat-box .chat-details .text-message p {
        color: #aaa;
        font-size: 0.9em;
        overflow: hidden; /* Fixed typo here */
      }
      .chat-list .chat-box .chat-details .text-message b {
        background: #06e744;
        color: #fff;
        min-width: 20px;
        height: 20px;
        border-radius: 50%;
        font-size: 0.8em;
        font-weight: 400;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .chat-list .active {
        background: #ebebeb;
      }
      .chat-list .chat-box:hover {
        background: #f5f5f5;
      }
      .chat-list .chat-box .img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      .chat-box.active .chat-details .text-message p {
        font-weight: 500;
        color: #333;
      }
      .chat-container {
        position: relative;
        display: flex;
        flex-direction: column;
        height: 100%;
      }
      .chat-header {
        position: relative;
        width: 100%;
        height: 70px;
        background: #76daff;
        display: flex;
        align-items: center;
        padding: 0 15px;
        border-bottom: 1px solid #dcdcdc;
      }
      .chat-header .user-img {
        width: 50px;
        height: 50px;
      }
      .chat-header .user-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      .chat-header .user-details {
        margin-left: 15px;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }
      .chat-header .user-details h4 {
        margin: 0;
        font-size: 1em;
        color: #000;
      }
      .chat-header .user-details p {
        margin: 0;
        font-size: 0.8em;
        color: #666;
      }
      .chat-header .user-details .active-status {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #0f0;
        position: absolute;
        bottom: 10px;
        right: 15px;
      }
      .chat-content {
        position: relative;
        flex: 1;
        overflow-y: auto;
        padding: 15px;
        background: #f9f9f9;
      }
      .chat-footer {
        position: relative;
        width: 100%;
        height: 70px;
        background: #f5f5f5;
        border-top: 1px solid #dcdcdc;
        display: flex;
        align-items: center;
        padding: 0 15px;
      }
      .chat-footer input {
        flex: 1;
        height: 40px;
        border: none;
        border-radius: 20px;
        padding: 0 20px;
        font-size: 0.9em;
        margin-right: 10px;
      }
      .chat-footer button {
        width: 40px;
        height: 40px;
        border: none;
        background: #76daff;
        border-radius: 50%;
        color: #fff;
        font-size: 1.2em;
        cursor: pointer;
      }
      /* styles.css */

      /* Add styles for sent and received messages */
      .message-left {
        background-color: #d1e7dd;
        color: #0f5132;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 10px;
        align-self: flex-end;
        max-width: 60%;
        float: left;
      }

      .message-right {
        background-color: #f8d7da;
        color: #842029;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 10px;
        align-self: flex-start;
        max-width: 60%;
        float: right;
      }
      time {
        font-size: 12px;
      }
      .chat-selection {
        position: absolute; /* Make it overlay */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        background-color: rgba(178, 165, 255, 0.9); /* Add some transparency */
        z-index: 10; /* Ensure it overlays other content */
      }

      .right-container {
        position: relative; /* Ensure the right-container is the positioning context */
      }

      .chat-icon {
        width: 80px;
        height: 80px;
        margin-bottom: 20px;
      }

      .chat-text {
        font-size: 18px;
        font-weight: bold;
        color: #333;
      }

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
</html>
