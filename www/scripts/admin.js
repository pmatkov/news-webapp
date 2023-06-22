window.addEventListener('resize', adjust_table_cols);

adjust_table_cols();

function adjust_table_cols() {

    var table = document.getElementById('mytable');

    if (table) {

        var width = window.innerWidth || document.documentElement.clientWidth;
        var rows = table.getElementsByTagName('tr');

        if (width <= 700)
            downsize_cols([2, 4, 8, 9]);  
        else if (width <= 850)
            downsize_cols([1, 2, 4, 8, 9]);                          
        else if (width <= 1050)      
            downsize_cols([1, 2, 4, 7, 8, 9]); 
        else if (width <= 1300)      
            downsize_cols([1, 2, 4, 5, 7, 8, 9]);
        else if (width <= 1430)      
            downsize_cols([1, 2, 4, 5, 6, 7, 8, 9]);                                      
        else {
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].querySelectorAll('td, th');

                for (var j = 0; j < cells.length; j++) 
                cells[j].style.display = '';
            
            }
        }
    }

    function downsize_cols(cols) {

        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].querySelectorAll('td, th');

            for (var j = 0; j < cells.length; j++) {

            if (!cols.includes(j + 1))
                cells[j].style.display = 'none';
            else 
                cells[j].style.display = '';
            
            }
        }
    }
}


function edit_entry(mode, id) {

    var url = 'session.php';
    var params = 'mode=' + encodeURIComponent(mode) + '&id=' + encodeURIComponent(id);

    send_xhr(url, params, function(responseText) {

        console.log(responseText);

        },function(status) {

        console.error('Request failed. Status: ' + status);
        }
    );

    window.location.href = "article_form.php";
}

function delete_entry(url, mode, id) {

    var scripturl = 'includes/db_utils.php';
    var params = 'mode=' + encodeURIComponent(mode) + '&id=' + encodeURIComponent(id);

    send_xhr(scripturl, params, function(responseText) {

        console.log(responseText);
        window.location.href = url;

        }, function(status) {

        console.error('Request failed. Status: ' + status);
        }
    );
}



