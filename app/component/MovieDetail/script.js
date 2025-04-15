let templateFile = await fetch("./component/MovieDetail/template.html");
let template = await templateFile.text();

let MovieDetail= {};

MovieDetail.format =  function (movie) {

  let moviehtml = template;

  moviehtml = moviehtml.replace("{{image}}", movie.image);
  moviehtml = moviehtml.replace("{{name}}", movie.name);
  moviehtml = moviehtml.replace("{{description}}", movie.description);
  moviehtml = moviehtml.replace("{{director}}", movie.director);
  moviehtml = moviehtml.replace("{{year}}", movie.year);
  moviehtml = moviehtml.replace("{{category}}", movie.category);
  moviehtml = moviehtml.replace("{{min_age}}", movie.min_age);
  moviehtml = moviehtml.replace("{{trailer}}", movie.trailer);
  moviehtml = moviehtml.replace("{{note_moyenne}}", movie.avgNotes || "Aucune note");

  return moviehtml;
};

export { MovieDetail };
