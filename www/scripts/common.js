function send_xhr(url, params, successCallback, errorCallback) {

    var xhr = new XMLHttpRequest();

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {

        if (xhr.readyState === XMLHttpRequest.DONE) {

            if (xhr.status === 200) 
                successCallback(xhr.responseText);
            else 
                errorCallback(xhr.status);
        }
      };

    xhr.send(params);
}

function logout(url) {

    document.getElementById('logingrp').style.display = 'flex';
    document.getElementById('logoutgrp').style.display = 'none';

    var scripturl = 'session.php';
    var params = 'logout=true';

    send_xhr(scripturl, params, function(responseText) {

        console.log(responseText);
        window.location.href = url;

        }, function(status) {

        console.error('Request failed. Status: ' + status);
    });
    
}