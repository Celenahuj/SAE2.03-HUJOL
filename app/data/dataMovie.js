let HOST_URL = "https://mmi.unilim.fr/~hujol3/SAE2.03-HUJOL";

let DataMovie = {};

DataMovie.requestMovies = async function (age) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readmovies&age="+age);
    let data = await answer.json();
    return data;
}


DataMovie.requestMovieDetails = async function (id) {
    let response = await fetch(HOST_URL + "/server/script.php?todo=details&id=" + id);
    let data = await response.json();
    return data;
};

DataMovie.requestCategories = async function () {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=getCategories");
    let categories = await answer.json();
    return categories;
};

DataMovie.requestCategories = async function () {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=getAllCategories");
    let categories = await answer.json();
    return categories;
  };
  
  DataMovie.requestMoviecategorie = async function (categorie) {
    let answer = await fetch(
      HOST_URL +
        "/server/script.php?todo=getMovieCategorie&category=" +
        categorie
    );
    let movie = await answer.json();
    return movie;
  };
export { DataMovie };