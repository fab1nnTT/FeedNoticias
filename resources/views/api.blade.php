<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Frontend da API</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    header {
      background-color: #448ed6;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    .materia {
      border-radius: 14px;
      padding: 10px;
      margin: 10px;
      cursor: pointer;
      background-color: #fff;
      transition: background-color 0.3s;
      display: grid;
      place-items: center;
      width: 300px; 
      height: 200px;
      box-shadow: 0px 0px 49px -3px rgba(0,0,0,0.66);
    }

    .materia:hover {
      background-color: #f0f0f0;
    }

    #listagem {
        display: grid;
        place-items: center;
        grid-template-columns: repeat(3, 1fr); /* Cria 3 colunas iguais */
        gap: 5px; /* Espaçamento entre as divs */
        padding: 0 20rem;
    }

    #detalhes {
      margin-top: 20px;
      padding: 20px;
      background-color: #fff;
      display: flex;
      flex-direction: column;
      place-items: center;
      width: 600px; 
      height: 400px;
      box-shadow: 0px 0px 49px -3px rgba(0,0,0,0.66);
      border-radius: 14px;
    }

    #detalhePai {
        display: flex;
        justify-content: center;
        margin-bottom: 15px;
    }

    #detalhes img {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>
<body>

<header>
  <h1>Feed de Notícias</h1>
</header>

<div id="listagem"></div>
<div id="detalhePai">

<div id="detalhes"></div>

</div>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  const listarEndpoint = 'http://127.0.0.1:8000/api/materias';
  const detalharEndpoint = 'http://127.0.0.1:8000/api/materia';

  async function carregarListaMaterias() {
    try {
      const response = await axios.get(listarEndpoint);
      const materias = response.data.data; // Ajuste para acessar o array de matérias

      if (Array.isArray(materias)) {
        materias.forEach(materia => {
          const divMateria = document.createElement('div');
          divMateria.className = 'materia';
          divMateria.innerHTML = `
          <h2>${materia.titulo}</h2>
          <p>${materia.descricao}</p>
          <p>${materia.data_de_publicacao}</p>
          `
          divMateria.addEventListener('click', () => carregarDetalhesMateria(materia.id));
          document.getElementById('listagem').appendChild(divMateria);
        });
      } else {
        console.error('A resposta da API não contém um array de matérias:', materias);
      }
    } catch (error) {
      console.error('Erro ao carregar a lista de matérias', error);
    }
  }

  async function carregarDetalhesMateria(id) {
    try {
      const response = await axios.get(`${detalharEndpoint}/${id}`);
      console.log(response.data);
      const detalhes = response.data.data;

      const divDetalhes = document.getElementById('detalhes');
      divDetalhes.innerHTML = `
        <h2>${detalhes.titulo}</h2>
        <p>${detalhes.descricao}</p>
        <p>${detalhes.imagem}</p>
        <p>${detalhes.texto_completo}</p>
        <p>${detalhes.data_de_publicacao}</p>
      `;
    } catch (error) {
      console.error('Erro ao carregar detalhes da matéria:', error);

      if (error.response) {
        console.error('Resposta da API com status:', error.response.status); 
        console.error('Dados da resposta:', error.response.data);
      }
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    carregarListaMaterias();
  });
</script>

</body>
</html>
