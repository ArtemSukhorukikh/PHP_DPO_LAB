$(document).ready(function () {
    document.querySelector('#send').onclick = function () {
        event.preventDefault()
        $.ajax({
            url: '../php/requestToTheGeocoder.php',
            method: 'POST',
            dataType: "html",
            data: {
                'adress': $('#adress').val(),
            },
            success: function (response) {
                console.log(response);
                data = $.parseJSON(response)
                $('#answear').html(
                    '<h1>Результат</h1><p>Страна: ' + data.address.country + '</p>' +
                    '<p>Субъект: ' + data.address.province + '</p>' +
                    '<p>Город: ' + data.address.locality + '</p>' +
                    '<p>Улица: ' + data.address.street + '</p>' +
                    '<p>Дом: ' + data.address.house + '</p>' + 
                    '<p>Координаты: ' + data.cord + '</p>' + 
                    '<p>Метро: ' + data.metro + '</p>')
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
