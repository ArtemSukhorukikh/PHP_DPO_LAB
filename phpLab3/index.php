<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <title>Отправка заявки</title>
</head>

<body>
    <div id='formDiv' class="container-xxl">
        <div>
            <h1 class="display-5">Введите необходимую информацию</h1>
            <form id="form">
                <input id="surname" type="text" class="form-control mb-2" placeholder="Фамилия" aria-label="Username" aria-describedby="basic-addon1">
                <input id="name" type="text" class="form-control mb-2" placeholder="Имя" aria-label="Username" aria-describedby="basic-addon1">
                <input id="patronymic" type="text" class="form-control mb-2" placeholder="Отчество" aria-label="Username" aria-describedby="basic-addon1">
                <input id="phone" type="text" class="form-control mb-2" placeholder="Номер телефона" aria-label="Username" aria-describedby="basic-addon1">
                <input id="email" type="email" class="form-control mb-2"  placeholder="Эл. почта">
                <textarea id="message" class="form-control mb-2" id="message" placeholder="Сообщение" rows="3"></textarea>
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="button" id="sendMail" class="btn btn-primary">Отправить</button>
                </div>

            </form>
        </div>
    </div>
    <div id='answear' class="container-xxl display-5"></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="scripts/validate.js"></script>
</body>

</html>