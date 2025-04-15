let HOST_URL = "https://mmi.unilim.fr/~hujol3/SAE2.03-HUJOL";

let DataMovie = {};

DataMovie.add = async function (fdata) {
    let config = {
        method: "POST",
        body: fdata,
    };
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addMovie", config);
    let data = await answer.json();
    return data;
}

DataMovie.addprofil = async function (fdata) {
    let config = {
        method: "POST",
        body: fdata,
    };
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addprofil", config);
    let data = await answer.json();
    return data;
}

DataMovie.addstatut = async function (id, bool) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=updateStatut&id=" + id + "&bool=" + bool);
    let data = await answer.json();
    return data;
};

DataMovie.requestSearchMovies = async function (value) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=searchMovies&titre=" + value);
    let data = await answer.json();
    return data;
  
  };
export { DataMovie };