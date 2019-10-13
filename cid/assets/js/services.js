
function randomInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

// Download file from "server"
function XHR(file, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', file, false);
    xhr.onload = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            callback(xhr.responseText);
        } else {
            console.log('the file "' + file + '" is not found');
        }
    }
    xhr.send(null);
}

function getJsonText(file) {
    var jsonText;
    XHR(file, function (response) {
        jsonText = JSON.parse(response);
    });
    return jsonText;
}

function getDocumentSize() {
    return { height: window.innerHeight, width: window.innerWidth };
}

function isWindowSizeChange(oldSize, newSize) {
    return (oldSize.height != newSize.height || oldSize.width != newSize.width) ? true : false;
}

function detectmob() {
    if (navigator.userAgent.match(/Android/i)
        || navigator.userAgent.match(/webOS/i)
        || navigator.userAgent.match(/iPhone/i)
        || navigator.userAgent.match(/iPad/i)
        || navigator.userAgent.match(/iPod/i)
        || navigator.userAgent.match(/BlackBerry/i)
        || navigator.userAgent.match(/Windows Phone/i)
    ) {
        return true;
    }
    else {
        return false;
    }
}