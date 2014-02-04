App Visitas - Alpha
==========

**Requisitos:**

  * Servidor Linux (Recomendado: Ubuntu Server ou Debian)
  * Servidor Apache2
  * Servidor MySQL>=5

**Instalação:**

  Abra o terminal e execute os seguintes comandos:
  
    $sudo su
  
    #cd /var/www
    
    #wget "https://github.com/guilhermecaldas/app_guests/archive/master.zip"
    
    #unzip master.zip
    
    #cd app_guests-master
    
    #mysql -uusuario -p -h localhost < database_dump.sql
    
    #vim persistence/connection.php
    
  Nesse ponto, altere as variáveis de acordo com o seu ambiente:
  
  * $dbhost - por padrão, localhost, ou o ip do servidor MySQL
  * $dbuser - seu usuário do MySQL
  * $dbpass - a senha de seu servidor
  * $dbname - o nome da base de dados, por padrão, "dbvisitas"
  
**Utilização:**

  Por padrão , o endereço http://localhost/app_guests-master vai exibir a tela de login do sistema. 
  
  O login padrão é: 
  
  * Usuário: root
  * Senha: russa
  
  Acesso por um domínio ou ip fora da rede fica por sua conta.

**Dúvidas ou bugs:**
  
  Entre em contato comigo pelo e-mail: guilhermecaldas@yandex.com
