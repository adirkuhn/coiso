Para rodar a versão PHP
-----------------------

Criar os logs:
> $ php ./make_log.php

Testar a aplicação:
> $ php -S localhost:8801

Abrir o browser http://localhost:8801/read_log.php?user=<userx>
> Ex. http://localhost:8801/read_log.php?user=user2

---

Para rodar versão Python

Instalar o Flask
> $ pip install Flask

Testar a aplicação
> $ python read_log.py

Abrir o browser http://127.0.0.1:5000/?user=<userx>
> Ex. http://127.0.0.1:5000/?user=user2