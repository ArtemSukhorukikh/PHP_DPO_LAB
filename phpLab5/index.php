<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб5 - Безопасность</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>

<body>
    <div class="container">
        <div class="columns block">
            <div class="column is-half">
                <form>
                    <div class="field">
                        <label class="label">Безопасно</label>
                        <div class="control">
                            <input id="id" class="input" type="text" placeholder="Email">
                        </div>
                        <p class="help">Введите email</p>
                    </div>
                    <button type="button" id="withParam" class="button is-primary">Primary</button>
                </form>
            </div>
            <div class="column is-half">
                <form>
                    <div class="field">
                        <label class="label">Не безопасно</label>
                        <div class="control">
                            <input id="sql" class="input" type="text" placeholder="SQL">
                        </div>
                        <p class="help">Введите запрос</p>
                    </div>
                    <button type="button" id="withSql" class="button is-primary">Primary</button>
                </form>
            </div>
        </div>
        <div id="answear"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js\script.js"></script>
    </div>

</body>

</html>