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
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addProfil", config);
    let data = await answer.json();
    return data;
}

export { DataMovie };