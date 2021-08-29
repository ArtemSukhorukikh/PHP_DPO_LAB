$(document).ready(function () {
    document.querySelector('#withParam').onclick = function () {
        event.preventDefault()
        alert("PARAM")
        $.ajax({
            url: '/php/DBFunction.php',
            method: 'POST',
            dataType: "html",
            data: {
                'id': $('#id').val(),
                'operation': "PARAM",
            },
            success: function (response) {
                console.log(response);
                data = $.parseJSON(response)
                $('#answear').html('<h1>Результат</h1><p>ID: ' + data.id + '</p><p>Имя: ' + data.first_name + '</p><p>Email: ' + data.email + '</p>')
            },
            error: function (jqXHR, exception) {
                if (jqXHR.status === 0) {
                    alert('Not connect. Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found (404).');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error (500).');
                } else if (exception === 'parsererror') {
                    alert('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    alert('Time out error.');
                } else if (exception === 'abort') {
                    alert('Ajax request aborted.');
                } else {
                    alert('Uncaught Error. ' + jqXHR.responseText);
                }
            }
        })
    }
})
$(document).ready(function () {
    document.querySelector('#withSql').onclick = function () {
        event.preventDefault()
        alert("SQL")
        $.ajax({
            url: '/php/DBFunction.php',
            method: 'POST',
            dataType: "html",
            data: {
                'sql': $('#sql').val(),
                'operation': "SQL",
            },
            success: function (response) {
                console.log(response);
                data = $.parseJSON(response)
                $('#answear').html('<h1>Результат</h1><p>ID: ' + data.id + '</p><p>Имя: ' + data.first_name + '</p><p>Email: ' + data.email + '</p>')
            },
            error: function (jqXHR, exception) {
                if (jqXHR.status === 0) {
                    alert('Not connect. Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found (404).');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error (500).');
                } else if (exception === 'parsererror') {
                    alert('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    alert('Time out error.');
                } else if (exception === 'abort') {
                    alert('Ajax request aborted.');
                } else {
                    alert('Uncaught Error. ' + jqXHR.responseText);
                }
            }
        })
    }
})
