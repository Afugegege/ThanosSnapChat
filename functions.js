const chatList = document.getElementById("chat-list");
const chatContent = document.getElementById("chat-container");
const searchInput = document.getElementById("search-input");
const messageInput = document.getElementById("message-input");
const sendButton = document.getElementById("send-button");
let selectedChatId = null; // Initialize selectedChatId

// Sample chat data
const chats = [
  { id: 1, name: "irfan", lastMessage: "Hey there!", time: "10:00 AM" },
  { id: 2, name: "June", lastMessage: "Hello!", time: "11:00 AM" },
];

// Sample chat messages
const messages = [
  { chatId: 1, text: "Hello!", sender: "1", time: "10:00 AM" },
  { chatId: 1, text: "Hi, how are you?", sender: "2", time: "11:00 AM" },
  { chatId: 1, text: "Okay ba", sender: "1", time: "11:01 AM" },
  { chatId: 2, text: "Wyd?", sender: "1", time: "10:00 AM" },
  { chatId: 2, text: "Nothing", sender: "2", time: "11:00 AM" },
  { chatId: 2, text: "Okay bye", sender: "1", time: "11:01 AM" },
];

function hideChatSelection() {
  $(".chat-container").show();
  $(".chat-selection").hide();
  // const elements = document.getElementsByClassName("chat-selection");
  // for (let i = 0; i < elements.length; i++) {
  //   elements[i].style.display = "none";
  // }
}
// Populate chat list
function populateChatList(chats) {
  chatList.innerHTML = ""; // Clear existing chats

  chats.forEach((chat) => {
    const chatBox = document.createElement("div");
    chatBox.classList.add("chat-box");
    chatBox.setAttribute("id", `chat_${chat.chat_id}`);
    chatBox.addEventListener("click", hideChatSelection);

    chatBox.innerHTML = `
    <div class="img-box">
      <img src="${chat.avatar}" alt="Chat Profile Picture" />
    </div>
    <div class="chat-details" onclick="getChatData(${chat.chat_id})">
      <div class="text-head">
        <h4>${chat.name}</h4>
        <span class="time">${chat.time}</span>
      </div>
      <div class="text-message">
        <p>${chat.lastMessage || ""}</p>
    </div>
`;

    chatBox.addEventListener("click", function () {
      hideChatSelection(); // Hide the chat selection
      selectChat(chat.id); // Call selectChat with the chat ID
      loadChat(chat.id); // Load the chat messages
    });

    chatList.appendChild(chatBox);
  });

  // If no chat is selected, display a placeholder message
  if (selectedChatId === null) {
    chatContent.innerHTML = "<p>Select a chat to start messaging.</p>";
  }
}

// Load chat messages
function getChatData(chatId) {
  $.ajax({
    type: "POST",
    url: "functions.php",
    data: { functionname: "getChatData", chatId: chatId },
    success: function (data) {
      var chatData = JSON.parse(data);
      updateChatHeader(chatData.chatInfo);
      displayChatMessages(chatData.messages);
    },
    error: function (xhr, status, error) {
      // Handle the error here
      console.error("Error Status: " + status);
      console.error("Error Message: " + error);
      console.error("Response Text: " + xhr.responseText);

      // Optionally, display a user-friendly message
      alert(
        "An error occurred while fetching chat data. Please try again later."
      );
    },
  });
}

function updateChatHeader(chatInfo) {
  const chatHeader = document.querySelector(".chat-header");
  chatHeader.innerHTML = `
    <div class="user-img">
      <img src="${chatInfo.avatar}" alt="User Profile Picture" />
    </div>
    <div class="user-details">
      <h4>${chatInfo.name}</h4>
      <p>Last seen: ${chatInfo.last_modify}</p>
      <div class="active-status"></div>
    </div>
  `;
}

function displayChatMessages(messages) {
  console.log(messages);
  const chatContainer = document.getElementById("chat-container");
  chatContainer.innerHTML = "";

  messages.forEach((message) => {
    const messageBox = document.createElement("div");
    messageBox.classList.add("message-box");

    const messageDiv = document.createElement("div");
    messageDiv.classList.add(
      "message",
      message.sender_id === 1 ? "message-right" : "message-left"
    );

    messageDiv.innerHTML = `
      <p>
        ${message.content}
        <br><time>${message.timestamp}</time>
      </p>
    `;

    messageBox.appendChild(messageDiv);
    chatContainer.appendChild(messageBox);
  });

  hideChatSelection();
}

// Function to scroll to the bottom of the chat
function scrollToBottom() {
  const messages = chatContent.querySelectorAll(".message-box");
  if (messages.length > 0) {
    messages[messages.length - 1].scrollIntoView({ behavior: "smooth" });
  }
}

// Function to add a new message
function addMessage(chatId, text, sender, time) {
  const newMessage = {
    chatId: chatId,
    text: text,
    sender: 2,
    time: time,
  };
  messages.push(newMessage);
}

// Function to send message
function sendMessage() {
  const messageText = messageInput.value.trim();
  if (messageText && selectedChatId !== null) {
    const now = new Date();
    let hours = now.getHours();
    let minutes = now.getMinutes();
    const ampm = hours >= 12 ? "PM" : "AM";

    hours = hours % 12;
    hours = hours ? hours : 12; // The hour '0' should be '12'
    minutes = minutes < 10 ? "0" + minutes : minutes;

    const timeString = hours + ":" + minutes + " " + ampm;

    // Add the message to the chat
    const messageDiv = document.createElement("div");
    messageDiv.classList.add("message-box");
    const messageBox = document.createElement("div");
    messageBox.classList.add("message", "message-right");
    messageBox.innerHTML = `
        <p>${messageText}<br><time>${timeString}</time></p>
      `;
    messageDiv.appendChild(messageBox);
    chatContent.appendChild(messageDiv);
    messageInput.value = "";
 const query = `INSERT INTO message (chat_id, content, sender_id, timestamp) VALUES (${selectedChatId}, '${messageText}', 2, '${timeString}')`;
  }     
}    scrollToBottom();

    addMessage(selectedChatId, messageText, "user", timeString);
    populateChatList(); // Update the chat list to reflect the new message
  }
}

// Function to retrieve the last message of a chat
function retrieveLastMessage(chatId) {
  const chatMessages = messages.filter((msg) => msg.chatId === chatId);
  return chatMessages.length > 0
    ? chatMessages[chatMessages.length - 1].text
    : "No messages";
}

// Function to select chat and change background color
function selectChat(chatId) {
  selectedChatId = chatId; // Set the selected chat ID
  getChatData(chatId);
  // Reset background color for all chat boxes
  const chatBoxes = document.querySelectorAll(".chat-box");
  chatBoxes.forEach((box) => {
    box.style.background = ""; // Reset to default or desired color
  });

  // Change the background color of the selected chat box
  const selectedChatBox = document.getElementById(`chat-${chatId}`);
  if (selectedChatBox) {
    selectedChatBox.style.background = "#f9f9f9";
  }
}

//testing

// Send message on button click
sendButton.addEventListener("click", sendMessage);

// Send message on Enter key press
messageInput.addEventListener("keypress", (event) => {
  if (event.key === "Enter") {
    event.preventDefault();
    sendMessage();
  }
});

// Search functionality
searchInput.addEventListener("input", () => {
  const query = searchInput.value.toLowerCase();
  const chatBoxes = document.querySelectorAll(".chat-box");
  chatBoxes.forEach((box) => {
    const name = box.querySelector(".text-head h4").textContent.toLowerCase();
    box.style.display = name.includes(query) ? "" : "none";
  });
});

function toggleChatHeader() {
  const chatHeader = document.querySelector(".chat-header");
  chatHeader.classList.toggle("hidden");
}

// Event listener for the button
// document
//   .getElementById("toggle-button")
//   .addEventListener("click", toggleChatHeader);

// Initialize chat list
$(document).ready(function () {
  // populateChatList();
  $(".chat-container").hide();
  getAllChats();
});
