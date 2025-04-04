let HOST_URL = "https://mmi.unilim.fr/~hujol3/SAE2.03-HUJOL";

let DataMovie = {};

DataMovie.requestMovies = async function () {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readmovies");
    let data = await answer.json();
    return data;
}


DataMovie.requestMovieDetails = async function () {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=detailsmovies");
    let data = await answer.json();
    return data;
}

export { DataMovie };