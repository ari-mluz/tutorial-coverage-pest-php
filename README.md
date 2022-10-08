# Guia de cobertura de testes com o framework PEST

Neste guia abordaremos a utilização da ferramenta de cobertura de testes, incluída no framework de testes PEST, ferramenta open-source baseada no PHPUnit que possui uma boa documentação e uma sintaxe amigável.

*Guia feito por Ariadne Milena L. Silva*.

## Pré-requisitos

- PHP;
- [Xdebug](https://xdebug.org/docs/install) v2.0+, [PCOV](https://github.com/krakjoe/pcov) ou [PHPDBG](https://www.php.net/manual/en/book.phpdbg.php) (Apenas um destes é necessário);
- [Composer;](https://getcomposer.org/download/)
- [PEST;](https://pestphp.com/)
- [Pasta coverage_pest.](https://github.com/ari-mluz/tutorial-coverage-pest-php/tree/main/coverage_pest)

## Instalação do framework PEST

Na pasta raiz do projeto `coverage_pest`, rode o seguinte comando no terminal:

```
composer require pestphp/pest --dev --with-all-dependencies
```

Após a instalação, você pode rodar o seguinte comando para verificar se o framework está funcionando:

```
./vendor/bin/pest 
```

Se tudo estiver certo, você deve ver a seguinte saída:

![output-teste](https://user-images.githubusercontent.com/59169454/194711730-feb94d6b-e431-4151-8afb-6dfa37edd60b.png)

## Escrevendo testes

Recomendo a leitura da documentação do PEST para você aprender sobre a escrita dos testes. O link direto para a seção de escrita de testes pode ser acessado através deste [link](https://pestphp.com/docs/writing-tests).

Para este guia, a pasta `coverage_pest` já inclui o código de produção (o código no qual os testes serão aplicados) e os testes.

De forma geral, para verificar a cobertura de testes, é necessário:
 
1. Escrever o código de produção;
2. Escrever os testes utilizando a sintaxe do PEST ou PHPUnit.

## Executando o comando de cobertura de testes

- [Página sobre cobertura de testes no PEST](https://pestphp.com/docs/coverage)

**Observação:**

> Caso utilize o Xdebug, defina o modo de operação para _coverage_, para fazer isso basta alterar a variável através deste comando ao rodar o teste:
>
> ```
> XDEBUG_MODE=coverage ./vendor/bin/pest --coverage
> ```
> Caso não funcione, você pode alterar o valor no arquivo `php.ini`, localizado na pasta raiz do PHP. Neste caso, adicione a seguinte linha no bloco onde estão as outras configurações do Xdebug:
>
> ```
> xdebug.mode=coverage 
> ```
*A máquina utilizada neste guia faz uso do Xdebug.*

### Comando padrão

Para executar a verificação da cobertura, o comando básico é:

```
./vendor/bin/pest --coverage
```
### Adicionando um valor mínimo de cobertura

É possível definir um valor mínimo de cobertura para o teste ser considerado aprovado (PASS). Para isto, deve-se adicionar o parâmetro `--min`, sendo o número a porcentagem de cobertura mínima a ser atingida.

Exemplo:

```
./vendor/bin/pest --coverage --min=90
```

Neste exemplo, o teste precisa ter ao menos 90% de cobertura, se não aparecerá como fracassado (FAIL).

### Adicionando ou filtrando pastas

Por padrão, o PEST detecta automaticamente pastas com nome `app` e `src`. Caso a pasta onde o seu código de produção está possua outro nome, é possível adicioná-la inserindo uma nova linha com a tag `<directory>` no arquivo `phpunit.xml`, localizado na raiz do projeto. 

```
<coverage processUncoveredFiles="true">
	<include>
		<directory suffix=".php">./app</directory>
		<directory suffix=".php">./src</directory>
		<directory suffix=".php">./nome_da_sua_pasta</directory>
	</include>
</coverage>
	
````

Desta forma, também é possível filtrar que pastas estão sendo utilizadas.

### Exportando os resultados

Para exportar os resultados, você pode usar as funções do PHPUnit `--coverage-html`, para exportar o resultado em HTML ou `--coverage-xml`, para exportar em XML.

Utilização:

Exportando em HTML

```
./vendor/bin/pest --coverage --coverage-html nome-da-pasta
```

Exportando em XML

```
./vendor/bin/pest --coverage --coverage-xml nome-da-pasta
```

### Analisando os resultados

Ao rodar o comando `./vendor/bin/pest --coverage`, é exibido o seguinte relatório:

![output-cobertura](https://user-images.githubusercontent.com/59169454/194711838-ed6fa767-462a-46cc-8689-40bcaf943775.png)

![detalhe-cobertura](https://user-images.githubusercontent.com/59169454/194711851-6bb8be54-0adb-41f3-9de5-a5e8a93d2dfa.png)

`sistema` é o nome do arquivo verificado e os números `36, 51, e 64` são referentes as linhas que não estão sendo cobertas pelo teste atualmente, resultando numa cobertura de 81,3%.

### Aumentando a cobertura do teste

![4](https://user-images.githubusercontent.com/59169454/194711858-046353d9-ce3d-4f94-b524-d9a173fa147a.png)

![5](https://user-images.githubusercontent.com/59169454/194711860-8aaab162-a394-47ed-9127-1b59df05a82d.png)

![6](https://user-images.githubusercontent.com/59169454/194711867-830a8af2-126b-42aa-893d-b11aaddd8305.png)

Analisando as linhas mencionadas no relatório, percebemos que falta criar um teste para cada situação em que as funções vão retornar _false_. Para isso, descomentamos as linhas no arquivo sistemaTest.php. Em outro cenário, você precisará os testes manualmente.

Note que, conforme você cria (ou no caso, descomenta) os testes que faltam e executa o comando, a porcentagem de cobertura vai aumentando de acordo, bem como a quantidade de linhas a cobrir vão sendo reduzidas.

![7](https://user-images.githubusercontent.com/59169454/194711942-e194c6d7-8e4b-4b63-8a15-24d700e98bd1.png)

![8](https://user-images.githubusercontent.com/59169454/194711947-740041b6-06a2-4c2a-abcf-47c7e8314938.png)

Ao cobrir todas as linhas do código, você terá um relatório de 100% de cobertura.  

![9](https://user-images.githubusercontent.com/59169454/194712095-85ce080e-ba45-43cd-8eb0-0b6d6b241784.png)

## Vídeo

Para este guia, foi criado um vídeo demonstrando na prática cada passo mencionado acima.

Link: 

## Finalizando

Espero que este guia tenha sido útil para mostrar a utilização da ferramenta de cobertura do PEST, framework que possui muitas outras funcionalidades além desta mencionada no guia. Vale dar uma aprofundada em sua [documentação](https://pestphp.com/docs/) para conferir o que a ferramenta pode proporcionar.
