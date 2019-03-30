На фреймворке Yii2 сделать страницу c выводом расписания уроков в группах которые происходят на этой неделе. В расписании выводятся информация о 3х сущностях - Учителя, Группы, Уроки.   
Учитель - таблица с именем и фамилией  
Группы - таблица описывающая группу: название группы, учитель группы.  
Уроки - уроки проходящие в данной группе, содержат название урока и время.  Время урока может быть не указано. Один урок может происходить в нескольких группах.

В расписании должен быть текстовый поиск по имени учителя, по названию урока и сортировка по времени в прямом и обратном направлении, но уроки с не проставленным временем всегда должны быть в конце.
Нужно использовать по максимуму стандартные компоненты, чтобы сделать эту задачу с минимальным количеством затраченных ресурсов.  
За основу лучше взять шаблон Yii2 basic template - https://github.com/yiisoft/yii2-app-basic, можно и нужно использовать любые стандартные компоненты (например GridView для вывода данных,  Gii для создания моделей).

В результате задания мы хотим получить исходники и sql либо файлы миграций для создания базы, с учетом того что данных во всех таблицах может быть много.

В качестве дополнительного вопроса - данное ТЗ очень сжато и не раскрывает всех деталей реализации. Как бы ты изменил/дополнил ТЗ (или какие вопросы бы задал) чтобы внести ясность и избежать недопонимания между заказчиком и разработчиком?

---
# RUN

Для запуска можно воспользоватья [докером](https://github.com/kr0lik/docker-web-server)

1. composer install
2. php yii migrate
3. Открыть в бразуере

## Вопросы:

1. Таблица уроки: Сейчас поле time сделано как timestamp, по условиям ТЗ так было логичнее. Дуюма нужно добавить поле дата, что бы привязать урок к конкретному дню недели. И по этому полю уже выбрить уроки для текущей недели или даже дня. А поле time изменить на varchar(5), что бы записывать туда чиссто время, например: 12:12.
2. Привязка урока к группе/учителю вызывает вопросы: Урок может быть привязан к 2 учителям. Как это регулируется? Получается что один урок ведут 2 учителя или этот урок просто выдется в 2х меятах разными учителями? Уроки без времени в конец идут в случайном порядке, может для этих уроков должна быть какая то подлогика сортировки?