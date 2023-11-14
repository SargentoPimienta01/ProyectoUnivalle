<!--<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Chatbot</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

#chatbox {
    width: 300px;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #fff;
}

#chat-header {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

#chat-messages {
    flex-grow: 1;
    padding: 10px;
    overflow-y: auto;
}

#user-input {
    display: flex;
    padding: 10px;
}

#message-input {
    flex-grow: 1;
    padding: 5px;
    margin-right: 5px;
}

#open-btn {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#close-btn {
    background-color: #ddd;
    color: #333;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
}

</style>
<body>

<div id="chatbox" class="hidden">
    <div id="chat-header">
        <span id="chat-title">Chatbot</span>
        <button id="close-btn" onclick="toggleChatbox()">Cerrar</button>
    </div>
    <div id="chat-messages">
        
<iframe width="100%" height="350px" allow="microphone *" src="https://www.gptbots.ai/widget/etgwhmakueebcpvaorlick8/chat.html"></iframe>
  
    </div>
    <div id="user-input">
        <input type="text" id="message-input" placeholder="Escribe tu mensaje...">
        <button onclick="sendMessage()">Enviar</button>
    </div>
</div>

<button id="open-btn" onclick="toggleChatbox()">Abrir Chat</button>

    <script>
        let chatboxVisible = false;

function toggleChatbox() {
    const chatbox = document.getElementById("chatbox");
    chatbox.style.display = chatboxVisible ? "none" : "flex";
    chatboxVisible = !chatboxVisible;
}

function sendMessage() {
    const userInput = document.getElementById("message-input").value;
    const chatMessages = document.getElementById("chat-messages");
    const messageElement = document.createElement("div");
    messageElement.textContent = `Usuario: ${userInput}`;
    chatMessages.appendChild(messageElement);
    document.getElementById("message-input").value = ""; // Limpiar el campo de entrada
}

    </script>
</body>
</html>-->

<!--<script src="https://www.gptbots.ai/widget/etgwhmakueebcpvaorlick8/chat.js" async></script>-->

<!--<script>
window.embeddedChatbotConfig = {
chatbotId: "aRtJ6rxs0QTvtQDrzfo-i",
domain: "www.chatbase.co"
}
</script>
<script
src="https://www.chatbase.co/embed.min.js"
chatbotId="aRtJ6rxs0QTvtQDrzfo-i"
domain="www.chatbase.co"
defer>
</script>-->