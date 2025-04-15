let templateFile = await fetch("./component/MovieUp/template.html");
let template = await templateFile.text();

let plus = "<button class='add-fav' onclick='C.handlerAddFavoris({{id}}, this)'>+</button>";
let moins = "<button class='remove-fav' onclick='C.handlerRemoveFavoris({{id}}, this)'>-</button>";

let MovieUp = {};
MovieUp.format = function (movies, add = true) {
  let html = "";
  movies.forEach((movie) => {
    let moviehtml = template;
    if (add == true) {
      moviehtml = moviehtml.replace("{{button}}", plus);
    }
    else {
      moviehtml = moviehtml.replace("{{button}}", moins);
    }

    moviehtml = moviehtml.replace("{{image}}", movie.image);
    moviehtml = moviehtml.replace("{{title}}", movie.name);
    moviehtml = moviehtml.replaceAll("{{id}}", movie.id);
    html += moviehtml;
  });
  return html;
};

export { MovieUp };