# MkFuzzy

Sistema especialista de apoio à produção de leite bovino utilizando lógica fuzzy.

Trabalho realizado para conclusão do curso de Ciência da Computação na Universidade do Sagrado Coração (USC).


### Pré-requisitos

* [Composer](https://getcomposer.org/) - Dependency Manager for PHP
* Banco de Dados compatível com o Framework Laravel

### Instalando

Faça o download do branch master

```
git clone https://github.com/depaulirafael/mkfuzzy.git
```

Instalar as dependências do composer

```
composer install
```

Faça uma cópia do arquivo .env.example e renomeie para .env. Verifique se você tem um banco de dados criado e configure-o no arquivo .env

Finalmente,  execute as migrações

```
php artisan migrate
```


## Desenvolvido com

* [Laravel](https://laravel.com) - The PHP Framework For Web Artisans
* [Composer](https://getcomposer.org/) - Dependency Manager for PHP
* [PHP Fuzzy Logic Library](https://github.com/gsil1976/fuzzy-logic) - Analyze variable based on fuzzy logic rules


