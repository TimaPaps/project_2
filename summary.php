1) http vs http
    https = http + SSL

2) GET and POST
    GET - передаются в url, до 4кб
    POST - передаются в теле запроса http 

    в PHP есть супер глобальные массивы $_GET и $_POST
    php://input - чисто насыпанные данные

3) 3 основных момента ООП
    наследование - использование родительского код
    полиморфизм - переопределение методов
    инкапсуляция - 

4)  public - виден везде (в родителе, в потомках, в контексте)
    protected - виден в родителе и потомках
    private - виден только в родителе

5) static - вызов статических свойств и методов о имени Класса (без создания экземпляра класса)
    Animal::exist()
    нет $this
    вызывается ::

6) абстрактный класса
    экземпляр класса создать нельзя
    если есть хоть один абстрактный метод в классе, то класс обязательно абстрактный

7) абстрактный метод не содержит тело
    public function setTable()

8) интерфейс
    для задания структуры, логики, действий
    ничего кроме констант и абстрактных методов
    экземпляр класса создать нельзя

9) есть ли в PHP множественное наследование
    для классов нет
    для интерфейсов есть

10) трейты (характерная черта) - наборы методов, которые можно встроить в классы

11) MySQL - СУБД система управления базами данных, реляционная(таблицы, бинарные файлы)
    SQL -  ЯП structured query language
    CRUD - create(insert) read(select) update(update) delete(delete)
    JOIN - соединение таблиц
    id - индексы, активация бинарного поиска - почесть про составные индексы

        6000 человек - найти женщин 18 лет
        id name gender age   --- people
        SELECT name FROM people WHERE gender='female' AND age=18
        SELECT name FROM people WHERE age=18 AND gender='female' - более правильный запрос для поиска - селективность поиска
12) JS
    всплытие собитий - почитать
    погружение собитий - почитать
    лексическое окружение - почитать
    делегирование собитый - 
    
        если div создан при верстке, то событие сработает, если создан кодом, то его не будет видно другому коду
                    <div id="test">кнопка</div>

        на jquery:  $('#test').click(function() {
                        alert('кнопка была нажата');
                    });

        если div создается кодом, то надо делегировать
                    
        на jquery:  $('body').on('click', '#test', function() {
                        alert('кнопка была нажата');
                    });

        на нативе   document.onclick = function () {

        }

    AJAX асинхронные запросы
        могут быть асинхронные и синхронные

    JSON - java script object notation