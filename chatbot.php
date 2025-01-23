<?php
include 'includes/header.php';
?>

<div class="chat-container">
    <div class="chat-header">
        <img src="img/logo.png" alt="Chatbot Logo" class="chat-logo">
        <h3>Service Assistant</h3>
    </div>
    <div class="chat-messages" id="chatMessages">
        <div class="message bot">
            <div class="message-content">
                Hello! I'm your service assistant. How can I help you today?
            </div>
        </div>
    </div>
    <div class="chat-input">
        <input type="text" id="userInput" placeholder="Type your message...">
        <button id="sendMessage">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>
</div>

<style>
.chat-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 350px;
    height: 500px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    z-index: 1000;
}

.chat-header {
    background: #0d6efd;
    color: #fff;
    padding: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.chat-logo {
    width: 30px;
    height: 30px;
    border-radius: 50%;
}

.chat-messages {
    flex: 1;
    padding: 20px;
    overflow-y: auto;
    background: #f8f9fa;
}

.message {
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
}

.message.user {
    align-items: flex-end;
}

.message.bot {
    align-items: flex-start;
}

.message-content {
    max-width: 80%;
    padding: 10px 15px;
    border-radius: 15px;
    background: #fff;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.message.user .message-content {
    background: #0d6efd;
    color: #fff;
}

.chat-input {
    padding: 15px;
    background: #fff;
    display: flex;
    gap: 10px;
    border-top: 1px solid #eee;
}

.chat-input input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 25px;
    outline: none;
}

.chat-input button {
    background: #0d6efd;
    color: #fff;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
}

.chat-input button:hover {
    background: #0b5ed7;
    transform: scale(1.1);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatMessages = document.getElementById('chatMessages');
    const userInput = document.getElementById('userInput');
    const sendButton = document.getElementById('sendMessage');

    const addMessage = (message, isUser = false) => {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${isUser ? 'user' : 'bot'}`;
        messageDiv.innerHTML = `
            <div class="message-content">
                ${message}
            </div>
        `;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    };

    const handleUserMessage = async (message) => {
        // Add user message to chat
        addMessage(message, true);
        
        try {
            // Send message to backend
            const response = await fetch('chatbot_handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message: message })
            });
            
            const data = await response.json();
            // Add bot response to chat
            addMessage(data.response);
        } catch (error) {
            console.error('Error:', error);
            addMessage('Sorry, I encountered an error. Please try again.');
        }
    };

    sendButton.addEventListener('click', () => {
        const message = userInput.value.trim();
        if (message) {
            handleUserMessage(message);
            userInput.value = '';
        }
    });

    userInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            const message = userInput.value.trim();
            if (message) {
                handleUserMessage(message);
                userInput.value = '';
            }
        }
    });
});
</script>

<?php
include 'includes/footer.php';
?> 