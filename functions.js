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
          <img src="chat-profile-pic.jpg" alt="Chat Profile Picture" />
        </div>
        <div class="chat-details">
          <div class="text-head">
            <h4>${chat.name}</h4>
            <span class="time">${chat.time}</span>
          </div>
          <div class="text-message">
            <p>${retrieveLastMessage(chat.id)}</p>
            <b>1</b>
          </div>
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
function loadChat(chatId) {
  chatContent.innerHTML = ""; // Clear existing messages
  const chatMessages = messages.filter((msg) => msg.chatId === chatId);
  chatMessages.forEach((msg) => {
    const messageCont = document.createElement("div");
    messageCont.classList.add("message-box");
    const messageBox = document.createElement("div");
    messageBox.classList.add("message");
    if (msg.sender === "1") {
      messageBox.classList.add("message-right");
    } else {
      messageBox.classList.add("message-left");
    }
    const content = document.createElement("p");
    content.classList.add("latestMsg");
    content.textContent = msg.text;
    const time = document.createElement("time");
    time.textContent = msg.time;
    content.appendChild(document.createElement("br"));
    content.appendChild(time);
    messageBox.appendChild(content);
    messageCont.appendChild(messageBox);
    chatContent.appendChild(messageCont);
  });
  scrollToBottom();
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
    scrollToBottom();

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
