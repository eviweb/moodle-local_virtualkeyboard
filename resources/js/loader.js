Y.Get.load(
    [
        '/local/virtualkeyboard/resources/js/keyboard.js',
        '/local/virtualkeyboard/resources/css/keyboard.css'
    ],
    function (err) {
        if (err) {
            Y.Array.each(err, function (error) {
                Y.log('Error loading file: ' + error.error, 'error');
            });
            return;
        }

        Y.log('All CSS and JS files loaded successfully!');
    }
);
