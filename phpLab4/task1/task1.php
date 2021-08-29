<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>RegEx</title>
</head>

<body>
    <div class="container-sm">
        <p class="display-4">1. Дана строка с целыми числами. Найдите числа, стоящие в кавычках и увеличьте их в два раза. Пример: из строки 2aaa'3'bbb'4' сделаем строку 2aaa'6'bbb'8'.</p>
        <form id="form">
            <input id="string" type="text" class="form-control mb-2" placeholder="Исходная строка" aria-label="Username" aria-describedby="basic-addon1">
            <div class="col-sm-offset-2 col-sm-6">
                <button type="button" id="count" class="btn btn-primary">Посчитать</button>
            </div>
        </form>
        <div id = 'answear'></div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                document.querySelector('#count').onclick = function() {
                    if ($('#string').val().length === 0) {
                        alert('Введена пустая строка');
                    } else {
                        $.ajax({
                            url: 'functionTask1.php',
                            method: 'POST',
                            dataType: "html",
                            data: {
                                'string': $('#string').val(),
                            },
                            success: function(data) {
                                $('#answear').html('<h2>Ответ: '+data+'</h2>')
                            },
                        })
                    }
                }
            })
        </script>
</body>

</html>