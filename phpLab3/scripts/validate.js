$(document).ready(function () {
    document.querySelector('#sendMail').onclick = function () {
        const form = document.getElementById('form')
        let errors = formValidate(form)
        if (!errors) {
            $.ajax({
                url: '/php/applications.php',
                method: 'POST',
                dataType: "html",
                data: {
                    'surname': $('#surname').val(),
                    'name': $('#name').val(),
                    'patronymic': $('#patronymic').val(),
                    'phone': $('#phone').val(),
                    'email': $('#email').val(),
                    'message': $('#message').val(),
                },
                success: function (response) {
                    console.log(response);
                    data = $.parseJSON(response)
                    if (data.operation == 'NEW_APPLICATION') {
                        $('#formDiv').addClass('d-none')
                        $('#answear').html('<h1>Спасибо за обращение</h1><p>Фамилия: ' + data.surname + '</p><p>Имя: ' + data.name + '</p><p>Отчество: ' + data.patronymic + '</p><p>Телефон: ' + data.phone + '</p><p>Эл. почта: ' + data.email + '</p><p>С вами свяжутся после: ' + data.dateAnswear + '</p>')
                    } else {
                        alert(`Вы уже отправили заявку!Новую заявку можно отправить после: ${data.dateNewApplication}`)
                    }
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
    }

    function formValidate(form) {
        let error = false;

        if ($('#surname').val().length === 0) { //Валидация фамилии
            error = true;
            formAddError($('#surname'));
        } else {
            formRemoveError($('#surname'));
            formCorrect($('#surname'))
        }

        if ($('#name').val().length === 0) { //Валидация имени
            error = true;
            formAddError($('#name'));
        } else {
            formRemoveError($('#name'))
            formCorrect($('#name'))
        }

        if ($('#phone').val().length === 0) { //Валидация телефона
            error = true;
            formAddError($('#phone'));
        } else {
            var req = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/i;
            if ($('#phone').val().search(req) != 0) {
                error = true;
                formAddError($('#phone'));
            } else {
                formRemoveError($('#phone'))
                formCorrect($('#phone'))
            }
        }

        if ($('#email').val().length === 0) { //Валидация эл.почты

            formAddError($('#email'));
        } else {
            var req = /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;
            if ($('#email').val().search(req) != 0) {
                error = true;
                formAddError($('#email'));
            } else {
                formRemoveError($('email'))
                formCorrect($('#email'))
            }

        }

        if ($.trim($('#message').val()) == "") { //Валидация сообщения
            error = true;
            formAddError($('#message'))
        } else {
            formRemoveError($('#message'))
            formCorrect($('#message'))
        }
        return error
    }

    function formAddError(input) {
        input.addClass('is-invalid')
    }

    function formCorrect(input) {
        input.addClass('is-valid')
    }

    function formRemoveError(input) {
        input.removeClass('is-invalid')
    }
});