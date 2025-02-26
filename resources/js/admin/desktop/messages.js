export let showMessage = (state, messageText) => {

    let closeButtons = document.querySelectorAll('.message-close');
    let messagesContainer = document.getElementById('messages-container');

    document.addEventListener("message", (event =>{

        let messages = document.querySelectorAll('.message');

        messages.forEach(message => {
    
            if(message.classList.contains(event.detail.state)){
    
                let successMessage = document.getElementById('message-description-'+ event.detail.state);
    
                messagesContainer.classList.add('show');
                message.classList.add('message-active');
                successMessage.innerHTML = event.detail.message;
    
                setTimeout(function(){ 
                    messagesContainer.classList.remove('show');
                    message.classList.remove('message-active');
                }, 7000);
            };
        });
    
    }));


    closeButtons.forEach(closeButton => {

        closeButton.addEventListener("click", () => {
    
            messagesContainer.classList.remove('show');
            
            let messagesActives = document.querySelectorAll('.message-active');
    
            messagesActives.forEach(messageActive => {
                messageActive.classList.remove('message-active');
            });
        });
    });
}
