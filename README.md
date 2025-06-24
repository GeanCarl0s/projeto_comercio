
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


https://github.com/GeanCarl0s/projeto_comercio.git

#para inicar o projeto precisa criar um banco de dados postgresql
com o nome "comercio".<br/>

configuração do arquivo .env <br/>


DB_CONNECTION=pgsql <br/>

DB_HOST=localhost <br/>

DB_PORT=5432 <br/>

DB_DATABASE=comercio <br/>

DB_USERNAME=postgres <br/>

DB_PASSWORD=@postgres <br/>


php artisan serve -- Iniciar Projeto <br/>

php artisan migrate -- Construir tabelas no banco de dados <br/>

php artisan storage:link --Criar link simbolico e renderizar imagens <br/>

php artisan db:seed --Popular tabelas de estado e cidades<br/>


--Inicializar Frontend
npm install --Instalar todas as dependencias <br/>

npm run dev --Inicializar servidor frontend <br/>

