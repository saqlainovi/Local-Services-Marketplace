<!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-white">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="" class="me-4 text-white">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-white">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-white">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-white">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-white">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-white">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links -->
    <section class="pt-4">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-home me-3"></i> Local Service
                    </h6>
                    <p>
                        Your trusted platform for professional Local services. 
                        Quality work, verified professionals, and customer satisfaction guaranteed.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Services
                    </h6>
                    <p>
                        <a href="electrician.php" class="text-white text-decoration-none">Electrician</a>
                    </p>
                    <p>
                        <a href="plumber.php" class="text-white text-decoration-none">Plumber</a>
                    </p>
                    <p>
                        <a href="painter.php" class="text-white text-decoration-none">Painter</a>
                    </p>
                    <p>
                        <a href="carpenter.php" class="text-white text-decoration-none">Carpenter</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Quick links
                    </h6>
                    <p>
                        <a href="about.php" class="text-white text-decoration-none">About Us</a>
                    </p>
                    <p>
                        <a href="services.php" class="text-white text-decoration-none">Services</a>
                    </p>
                    <p>
                        <a href="contact.php" class="text-white text-decoration-none">Contact</a>
                    </p>
                    <p>
                        <a href="help.php" class="text-white text-decoration-none">Help</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> Green University of Bangladesh (GUB), Department of Computer Science and Engineering, Batch 212.</p>
                    <p><i class="fas fa-envelope me-3"></i> mdsiyamsaqlainovi@gmail.com</p>
                    <p><i class="fas fa-phone me-3"></i> + 88 017 1234 5678</p>
                    <p><i class="fas fa-print me-3"></i> + 88 016 1234 5678</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 Copyright:
        <a class="text-white text-decoration-none fw-bold" href="#">Local_Service_Provider</a>
        | Developed by 
        <span class="text-warning">Md Siyam Saqlain Ovi, Sisi & Yeaz Ussin</span>
    </div>
    <!-- Copyright -->

    <!-- Chatbot Container -->
    <div class="chat-container" style="display: none;">
        <div class="chat-header">
            <img src="img/logo.png" alt="Chatbot Logo" class="chat-logo">
            <h3>Service Assistant</h3>
            <button class="chat-close" onclick="toggleChat()">
                <i class="fas fa-times"></i>
            </button>
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

    <!-- Chat Toggle Button -->
    <button id="chatToggle" class="chat-toggle" onclick="toggleChat()">
        <i class="fas fa-comments"></i>
    </button>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        .chat-container {
            position: fixed;
            bottom: 90px;
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
            position: relative;
        }

        .chat-close {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: white;
            cursor: pointer;
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
            background: #f0f2f5;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            color: #1e1e1e;
            font-weight: 500;
        }

        .message.user .message-content {
            background: #0d6efd;
            color: #ffffff;
            font-weight: 500;
        }

        .message.bot .message-content {
            background: #f0f2f5;
            color: #1e1e1e;
            font-weight: 500;
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
            color: #333;
        }

        .chat-input input::placeholder {
            color: #999;
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

        .chat-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #0d6efd;
            color: white;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            cursor: pointer;
            z-index: 1001;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            transition: all 0.3s ease;
        }

        .chat-toggle:hover {
            transform: scale(1.1);
            background: #0b5ed7;
        }
    </style>

    <script>
        // Chat Toggle Functionality
        function toggleChat() {
            const chatContainer = document.querySelector('.chat-container');
            const chatToggle = document.getElementById('chatToggle');
            
            if (chatContainer.style.display === 'none') {
                chatContainer.style.display = 'flex';
                chatToggle.innerHTML = '<i class="fas fa-times"></i>';
            } else {
                chatContainer.style.display = 'none';
                chatToggle.innerHTML = '<i class="fas fa-comments"></i>';
            }
        }

        // Chat Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const chatMessages = document.getElementById('chatMessages');
            const userInput = document.getElementById('userInput');
            const sendButton = document.getElementById('sendMessage');

            function addMessage(message, isUser = false) {
                const messageDiv = document.createElement('div');
                messageDiv.className = `message ${isUser ? 'user' : 'bot'}`;
                messageDiv.innerHTML = `
                    <div class="message-content">
                        ${message}
                    </div>
                `;
                chatMessages.appendChild(messageDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            async function handleUserMessage(message) {
                addMessage(message, true);
                
                try {
                    const response = await fetch('chatbot_handler.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ message: message })
                    });
                    
                    const data = await response.json();
                    addMessage(data.response);
                } catch (error) {
                    console.error('Error:', error);
                    addMessage('Sorry, I encountered an error. Please try again.');
                }
            }

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
</body>
</html>