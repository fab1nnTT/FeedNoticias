requisições feitas no postman:

GET: 127.0.0.1:8000/api/materia/1  //para uma única matéria

{
  "titulo": "Titulo para Materia",
  "descricao": "Breve descricao",
  "texto_completo": "Este é o texto completo de exemplo.",
  "imagem": "imagem exemplo",
  "data_de_publicacao": "2024-03-03"
}

GET: 127.0.0.1:8000/api/materias  //para listar todas as materias

{
    "id": 1,
    "titulo": "Tempestades afetam cidade",
    "descricao": "Risco de enchentes",
    "imagem": "imagem exemplo",
    "data_de_publicacao": "2024-03-03"
}

DELETE: 127.0.0.1:8000/api/materia/1 //Para deletar uma materia

PUT: 127.0.0.1:8000/api/materia/1 //Para editar uma materia


Se tivesse mais tempo iria implementar a paginação utilizando bootstrap, uma vez que já havia criado uma exibição por página definida no controler.

também arrumaria a estilização que acabou ficando junto da pasta api.blade.php, adicionar imagem tanto na materia listada quanto na materia detalhada e tambem faria o uso de docker

e tambem criar uma visualização individual para o segundo endpoint que exibe a materia completa