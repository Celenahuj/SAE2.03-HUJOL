let templateFile = await fetch("./component/StatutForm/template.html");
let template = await templateFile.text();

let StatutForm = {};

StatutForm.format = function (movies) {
  let html = "";

  for (let movie of movies) {
    //console.log(movie);
    html += `
      <div class="movie-card">
        <h1 class="movie_title">${movie.name}</h1>
        <p class="movie_category">${movie.category}</p>
        <p class="movie_statut">
          ${movie.featured ? ' Mis en avant' : 'Non mis en avant'}
        </p>
        <button onclick="C.handlerStatut(${movie.id}, ${movie.featured ? 0 : 1})">
          ${movie.featured ? 'Retirer' : 'Mettre en avant'}
        </button>
      </div>
    `;
  }
  
  return html;
};

StatutForm.template = template;

export { StatutForm };