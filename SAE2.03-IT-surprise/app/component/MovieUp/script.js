let templateFile = await fetch("./component/MovieUp/template.html");
let template = await templateFile.text();

let plus = "<button class='add-fav' onclick='C.handlerAddFavoris({{id}}, this)'><svg aria-hidden='true' class='movieup__favori' fill='currentColor' height='48' viewBox='0 0 48 48' width='48' xmlns='http://www.w3.org/2000/svg'><path d='M32.1323 10H6.63741C5.93792 10 5.26709 10.2784 4.77248 10.7741C4.27787 11.2697 4 11.9419 4 12.6429V47L19.3849 39.5119L34.7697 47V12.6429C34.7697 11.9419 34.4919 11.2697 33.9973 10.7741C33.5027 10.2784 32.8318 10 32.1323 10Z' fill='currentColor'></path><path clip-rule='evenodd' d='M15.5544 1H41.3326C42.0399 1 42.7182 1.26904 43.2183 1.74792C43.7184 2.22681 43.9993 2.87632 43.9993 3.55357V36.75L39.5561 34.6834V7.96396C39.5561 7.26619 39.2752 6.59699 38.7751 6.1036C38.275 5.6102 37.5967 5.33301 36.8894 5.33301H12.8877V3.55357C12.8877 2.87632 13.1687 2.22681 13.6688 1.74792C14.1689 1.26904 14.8472 1 15.5544 1Z' fill='currentColor' fill-rule='evenodd'></path></svg></button>";
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
    moviehtml = moviehtml.replace("{{year}}", movie.year);
    moviehtml = moviehtml.replaceAll("{{id}}", movie.id);
    html += moviehtml;
  });
  return html;
};

export { MovieUp };