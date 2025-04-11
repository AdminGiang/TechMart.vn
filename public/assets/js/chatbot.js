document.addEventListener('DOMContentLoaded', function() {
    const chatbotToggle = document.getElementById('chatbot-toggle');
    const chatbotWindow = document.getElementById('chatbot-window');
    const chatbotMessages = document.getElementById('chatbot-messages');
    const chatbotInput = document.getElementById('chatbot-input');
    const chatbotSend = document.getElementById('chatbot-send');

    chatbotToggle.addEventListener('click', function() {
        chatbotWindow.style.display = chatbotWindow.style.display === 'none' ? 'flex' : 'none';
    });

    chatbotSend.addEventListener('click', function() {
        const message = chatbotInput.value.trim();
        if (message) {
            addUserMessage(message);
            chatbotInput.value = '';
            sendToServer(message);
        }
    });

    chatbotInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            chatbotSend.click();
        }
    });

    function addUserMessage(message) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('chatbot-message', 'user-message');
        messageDiv.textContent = message;
        chatbotMessages.appendChild(messageDiv);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }

    function addBotMessage(message) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('chatbot-message', 'bot-message');
        messageDiv.textContent = message;
        chatbotMessages.appendChild(messageDiv);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }

    function sendToServer(message) {
        fetch('/api/chatbot/message', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Đảm bảo bạn có meta token trong layout
            },
            body: JSON.stringify({ message: message })
        })
        .then(response => response.json())
        .then(data => {
            addBotMessage(data.response);
        })
        .catch(error => {
            console.error('Lỗi:', error);
            addBotMessage('Đã có lỗi xảy ra. Vui lòng thử lại sau.');
        });
    }
});