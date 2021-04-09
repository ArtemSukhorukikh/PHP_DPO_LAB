# Лабораторная работа №2
____  
## Задание
Парсинг xml-файла и сохранение его информации в базу данных. Сохранённые данные считать из базы данных и сгенерировать на их основе JSON-файл  
____
### Пример XML
```xml
<?xml version='1.0'?>
<workers>
    <worker>
        <name>Коля</name>
        <age>25</age>
        <salary>1000</salary>
    </worker>
    <worker>
        <name>Вася</name>
        <age>26</age>
        <salary>2000</salary>
    </worker>
    <worker>
        <name>Петя</name>
        <age>27</age>
        <salary>3000</salary>
    </worker>
</workers>
```  
### Структура таблица БД
__Название таблицы:__ workerTable
| Столбец | Тип   |
|-|-|
| id | integer |
| name | var char |
| age | integer |
| salary | integer |  
### Пример JSON-файла  
```json
[
  {
    "id":19,
    "name":"Коля",
    "age":25,
    "salary":1000
  },
  {
    "id":20,
    "name":"Вася",
    "age":26,
    "salary":2000
  },
  {
    "id":21,
    "name":"Петя",
    "age":27,
    "salary":3000
  }
] 
```
