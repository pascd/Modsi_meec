// Collapsible
var coll = document.getElementsByClassName("collapsible");

for (let i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function () {
        this.classList.toggle("active");

        var content = this.nextElementSibling;

        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        }

    });
}

function getTime() {
    let today = new Date();
    hours = today.getHours();
    minutes = today.getMinutes();

    if (hours < 10) {
        hours = "0" + hours;
    }

    if (minutes < 10) {
        minutes = "0" + minutes;
    }

    let time = hours + ":" + minutes;
    return time;
}

// Gets the first message
function firstBotMessage() {
    let firstMessage = "Em que posso ajudar?"
    document.getElementById("botStarterMessage").innerHTML = '<p class="botText"><span>' + firstMessage + '</span></p>';

    let time = getTime();

    $("#chat-timestamp").append(time);
    document.getElementById("userInput").scrollIntoView(false);
}

function default_responses_1() {
    let message_1 = "Pode alterar os dados do seu perfil ao clicar";
    let Html_1 = '<p class="botText"><span>' + message_1 + ' <a href="https://www.youtube.com">aqui</a></span></p>';
    $("#chatbox").append(Html_1);

    document.getElementById("chat-bar-bottom").scrollIntoView(true);

    let Html_2 = '<p class="botText"><span> Deseja mais alguma coisa? </span></p>'
    $("#chatbox").append(Html_2);

    document.getElementById("chat-bar-bottom").scrollIntoView(true);

    let Html_3 = '<div class="first_questions"> <div class="button_layout" onclick="default_responses_1()">Como alterar o meu perfil</div><p></p> <div class="button_layout">Ver as minhas reservas</div><p></p> <div class="button_layout">Agendar uma Vacina</div><p></p> </div>'
    $("#chatbox").append(Html_3);

    document.getElementById("chat-bar-bottom").scrollIntoView(true);
}

firstBotMessage();

// Retrieves the response
function getHardResponse(userText) {
    let botResponse = getBotResponse(userText);

    let Html_3 = '<div class="first_questions"> <div class="button_layout" onclick="default_responses_1()">Como alterar o meu perfil</div><p></p> <div class="button_layout">Ver as minhas reservas</div><p></p> <div class="button_layout">Agendar uma Vacina</div><p></p> </div>'
    $("#chatbox").append(Html_3);

    document.getElementById("chat-bar-bottom").scrollIntoView(true);

    let botHtml = '<p class="botText"><span>' + botResponse + '</span></p>';
    $("#chatbox").append(botHtml);

    document.getElementById("chat-bar-bottom").scrollIntoView(true);
}

//Gets the text text from the input box and processes it
function getResponse() {
    let userText = $("#textInput").val();

    // if (userText == "") {
    //     userText = "I love Code Palace!";
    // }

    // let userHtml = '<p class="userText"><span>' + userText + '</span></p>';

    // $("#textInput").val("");
    // $("#chatbox").append(userHtml);
    document.getElementById("chat-bar-bottom").scrollIntoView(true);

    setTimeout(() => {
        getHardResponse(userText);
    }, 1000)

}

// Handles sending text via button clicks
function buttonSendText(sampleText) {
    let userHtml = '<p class="userText"><span>' + sampleText + '</span></p>';

    $("#textInput").val("");
    $("#chatbox").append(userHtml);
    document.getElementById("chat-bar-bottom").scrollIntoView(true);

    //Uncomment this if you want the bot to respond to this buttonSendText event
    // setTimeout(() => {
    //     getHardResponse(sampleText);
    // }, 1000)
}

function sendButton() {
    getResponse();
}

// function heartButton() {
//     buttonSendText("Heart clicked!")
// }

// Press enter to send a message
$("#textInput").keypress(function (e) {
    if (e.which == 13) {
        getResponse();
    }
});