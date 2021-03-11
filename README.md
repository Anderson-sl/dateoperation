# DateOperation

### Operações de soma, subtração e soma dos intervalos de horas.

O componente DateOperation foi desenvolvido para facilitar a manipulação de intervalos de horas e minutos. Suporta entrada do tipo **DateTime** e do tipo **Literal** trazendo mais flexibilidade e facilidade na sua utlização.

## Documentação

#### Instalação
Utilizando o **composer**
________________
`/>composer require dateoperation/operation:dev-master`

Após carregar o componente para seu projeto via composer, você já pode utilizar as funcionalidade e verá como é facil as operações com horas e minutos.

Código de exemplo:

```php
<?php

require_once __DIR__."/vendor/autoload.php";

$op = new DateOperation\Operation\DateOperation;
$horas = array(
	[3,14],
	[3,15],
	[1,11]
);
var_dump($op->dateSub($horas,true,LITERAL_TYPE));
```

Resultado:
`string(6) "-1:-12"`

A classe DateOperation traz 3 métodos de operações com horas e minutos.

Todos os métodos `method($arr [], $return true, LITERAL_TYPE);` pedem três parâmetros onde o segundo e terceiro são opcionais.

- **$arr []** = Array de horas para executar as operações. Com o parametro LITERAL_TYPE definido o $arr [] irá esperar horas e minutos no formado de array `["hora1"=>1,"minuto1"=>25],["hora2"=>2,"minuto2"=>13]`. Com o parametro DATETIME_TYPE definido o $arr [] irá esperar horas e minutos no formado DateTime `[new DateTime()],[new DateTime()]`.
- **$return** = Boolean que define o retorno do método, onde o valor `true` retorna uma string com horas e minutos e `false` retorno uma array no formato `['hour'=>'2','minute'=>'35']`.
- **LITERAL_TYPE ou DATETIME_TYPE** = Constante que define o tipo de entrada que o método irá receber, onde `LITERAL_TYPE` espera um array `array([1,21],[2,12])` e `DATETIME_TYPE` espera um array `array(new DateTime('NOW'),new DateTime('NOW'))`.

# Somando Horas e Minutos

Tipo Literal:

```php
<?php

require_once __DIR__."/vendor/autoload.php";
$op = new DateOperation\Operation\DateOperation;
$horas = array(
	[2,3],
	[2,3],
	[2,3],
	[2,3]
);
var_dump($op->dateSum($horas,true,LITERAL_TYPE));
```

Tipo DateTime:

```php
<?php

require_once __DIR__."/vendor/autoload.php";
$op = new DateOperation\Operation\DateOperation;
$horas = array(
	new DateTime(date('Y-m-d H:i:s', strtotime('2021-03-10 04:39:00'))),
	new DateTime(date('Y-m-d H:i:s', strtotime('2021-03-10 05:45:00'))),
	new DateTime(date('Y-m-d H:i:s', strtotime('2021-03-10 06:00:00'))),
	new DateTime(date('Y-m-d H:i:s', strtotime('2021-03-10 09:21:00')))
);
var_dump($op->dateSum($horas,true,DATETIME_TYPE));
```

# Subtraindo Horas e Minutos

Tipo Literal:

```php
<?php

require_once __DIR__."/vendor/autoload.php";
$op = new DateOperation\Operation\DateOperation;
$horas = array(
	[2,3],
	[2,3],
	[2,3],
	[2,3]
);
var_dump($op->dateSub($horas,true,LITERAL_TYPE));
```

Tipo DateTime:

```php
<?php

require_once __DIR__."/vendor/autoload.php";
$op = new DateOperation\Operation\DateOperation;
$horas = array(
	new DateTime(date('Y-m-d H:i:s', strtotime('2021-03-10 04:39:00'))),
	new DateTime(date('Y-m-d H:i:s', strtotime('2021-03-10 05:45:00'))),
	new DateTime(date('Y-m-d H:i:s', strtotime('2021-03-10 06:00:00'))),
	new DateTime(date('Y-m-d H:i:s', strtotime('2021-03-10 09:21:00')))
);
var_dump($op->dateSub($horas,true,DATETIME_TYPE));
```

# Diferença entre Horas e Minutos

Tipo Literal:

```php
<?php

require_once __DIR__."/vendor/autoload.php";
$op = new DateOperation\Operation\DateOperation;
$horas = array(
	[2,3],
	[2,3],
	[2,3],
	[2,3]
);
var_dump($op->dateDiffSum($horas,true,LITERAL_TYPE));
```

Tipo DateTime:

```php
<?php

require_once __DIR__."/vendor/autoload.php";
$op = new DateOperation\Operation\DateOperation;
$horas = array(
	new DateTime(date('Y-m-d H:i:s', strtotime('2021-03-10 04:39:00'))),
	new DateTime(date('Y-m-d H:i:s', strtotime('2021-03-10 05:45:00'))),
	new DateTime(date('Y-m-d H:i:s', strtotime('2021-03-10 06:00:00'))),
	new DateTime(date('Y-m-d H:i:s', strtotime('2021-03-10 09:21:00')))
);
var_dump($op->dateDiffSum($horas,true,DATETIME_TYPE));
```

