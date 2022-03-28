No projeto, tem uma collection do Postman com as requisições. <br/>

A rota Crawler, captura os dados e persiste no banco. <br/>
A rota de busca, retorna o que foi encontrado e salva, conforme requisitado. <br/>

------------------

Objetivo: Implementar uma API que faça a consulta de dados de um personagem do Star Wars.
Informações Adicionais:
<br/>
<br/>
• A consulta deve ser feita pelo nome, ou parte do nome, e os dados de retorno deverão ser
armazenados no banco de dados SQlite via comando Artisan.
<br/>
<br/>
• As requisições deverão ser registradas no arquivo de log do framework PHP Laravel.
Serviço: https://swapi.dev/api/
<br/>
Documentação de utilização do serviço: swapi.dev
<br/>
<br/>
Exemplo json de retorno: <br/>
{<br/>
"name":"Sly More",<br/>
"height": "178",<br/>
mass": "48",<br/>
"hair_color": "none",<br/>
"skin_color": "pale",<br/>
"eye_color": "white",<br/>
"birth_year": "unknown",<br/>
"gender": "female",<br/>
"homeworld": "Umbara",<br/>
"films":["Attack of the Clones","Revenge of the Sith"],<br/>
"vehicles":[],<br/>
"starships":[],<br/>
"species":[]<br/>
}
