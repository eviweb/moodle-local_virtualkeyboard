function enableVirtualKeyboardForQuiz(Y, lang) {    
    Y.all('input[id$=answer][type=text]').each(function(inputNode) {
        inputNode.set('lang', lang || 'en');
        VKI_attach(inputNode.getDOMNode());    
    });
    
    // fix issue with embedded questions (cloze): keyboard never shown
    // force css display value for the keyboard table
    Y.all('input[id$=answer][id*=sub][type=text]').each(function(inputNode) {
        inputNode.next('img.keyboardInputInitiator').on('click', function(e) {
            Y.one('table[id=keyboardInputMaster]').setStyle('display', '');
        });  
    });

    Y.all('img.keyboardInputInitiator')
        .setAttribute('src', '/local/virtualkeyboard/resources/img/keyboard.png');
}
