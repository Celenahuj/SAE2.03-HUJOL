let templateFile = await fetch("./component/Movie/template.html");
let template = await templateFile.text();

let Movie = {};
Movie.format = function (movies) {
  let html = "";
  movies.forEach((movie) => {
    let moviehtml = template;
    moviehtml = moviehtml.replace("{{image}}", movie.image);
    moviehtml = moviehtml.replace("{{title}}", movie.name);
    moviehtml = moviehtml.replace("{{id}}", movie.id_category);
    html += moviehtml;
  });
  return html;
};

export { Movie };
