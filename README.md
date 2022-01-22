
Для ограничения докера в домашнем каталоге пользователя необходимо создать файл `.wslconfig` (можно использовать следующую команду из `gitbash` терминала code ~/.wslconfig )  

```ini
[wsl2]
memory=2GB # Limits VM memory in WSL 2 to 4 GB
processors=2 # Makes the WSL 2 VM use two virtual processors
swap=1024
localhostForwarding=true
```

Для запуска базы данных в контейнере необходимо запустить терминал в каталоге Module2, где пишем `docker-compose up -d`. После этого переходим в браузер по адресу `http://localhost:8080/`

Для работы без докера достаточно установить Mysql и MysqlAdmin.