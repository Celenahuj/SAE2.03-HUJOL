let templateFile = await fetch("./component/MovieDetail/template.html");
let template = await templateFile.text();

let MovieDetail = {};
MovieDetail.format = function (movies) {
  let html = "";
  movies.forEach((movie) => {
    let moviehtml = template;
    moviehtml = moviehtml.replace("{{image}}", movie.image);
    moviehtml = moviehtml.replace("{{name}}", movie.name);
    moviehtml = moviehtml.replace("{{description}}", movie.description);
    moviehtml = moviehtml.replace("{{director}}", movie.director);
    moviehtml = moviehtml.replace("{{year}}", movie.year);
    moviehtml = moviehtml.replace("{{category}}", movie.id_category);
    moviehtml = moviehtml.replace("{{min_age}}", movie.min_age);
    moviehtml = moviehtml.replace("{{trailer}}", movie.trailer);
    html += moviehtml;
  });
  return html;
};

export { Movie };
