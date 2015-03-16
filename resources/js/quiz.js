function enableVirtualKeyboardForQuiz(Y, lang) {    
    Y.all('input[id$=answer][type=text]').each(function(inputNode) {
        inputNode.set('lang', lang || 'en');
        VKI_attach(inputNode.getDOMNode());    
    });

    Y.all('img.keyboardInputInitiator')
        .setAttribute('src', '/local/virtualkeyboard/resources/img/keyboard.png');
}
