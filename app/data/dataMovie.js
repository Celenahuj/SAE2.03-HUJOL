let HOST_URL = "https://mmi.unilim.fr/~hujol3/SAE2.03-HUJOL";

let DataMovie = {};

DataMovie.requestMovies = async function (age) {
  let answer = await fetch(HOST_URL + "/server/script.php?todo=readmovies&age=" + age);
  let data = await answer.json();
  return data;
}


DataMovie.requestMovieDetails = async function (id) {
  let response = await fetch(HOST_URL + "/server/script.php?todo=details&id=" + id);
  let data = await response.json();
  console.log(data);
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

DataMovie.requestMoviecategorie = async function (categorie, age = undefined) {

  let params = "todo=getMovieCategorie&category=" + categorie;

  if (age != undefined)
    params += "&age=" + age;

  let answer = await fetch(
    HOST_URL +
    "/server/script.php?" + params
  );
  let movie = await answer.json();
  return movie;
};

DataMovie.requestFeaturedMovies = async function () {
  let answer = await fetch(HOST_URL + "/server/script.php?todo=getFeatured");
  let data = await answer.json();
  return data;
};

DataMovie.requestSearchMovies = async function (value) {
  let answer = await fetch(HOST_URL + "/server/script.php?todo=searchMovies&titre=" + value);
  let data = await answer.json();
  return data;

};

DataMovie.addNote = async function(id_film, id_profil, note) {
  let answer = await fetch(HOST_URL + "/server/script.php?todo=addNote&id_film=" + id_film + "&id_profil=" + id_profil + "&note=" + note);
  let data = await answer.json();
  return data;
};

DataMovie.getNotes = async function(id_film) {
  let response = await fetch(HOST_URL + "/server/script.php?todo=getNotes&id_film=" + id_film);
  let data = await response.json();
  return data.notes; 
};

export { DataMovie };