Y.all('input[id$=answer][type=text]').each(function(inputNode) {
    inputNode.set('lang', 'fr');
    VKI_attach(inputNode.getDOMNode());    
});

Y.all('img.keyboardInputInitiator').setAttribute('src', '/local/virtualkeyboard/resources/img/keyboard.png');
