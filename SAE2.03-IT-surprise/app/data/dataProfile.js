let HOST_URL = "..";

let DataProfile = {};

DataProfile.readAll = async function () {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readProfils");
    let data = await answer.json();
    return data;
};

DataProfile.readOne = async function (id) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readProfil&id="+ id);
    let data = await answer.json();
    return data;
};

DataProfile.addFavori = async function (id, id_profil) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addFavori&id="+ id +"&id_profil="+id_profil);
    let data = await answer.json();
    return data;
};

DataProfile.getFavoris = async function (id_profil) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=getFavoris&id_profil=" + id_profil);
    let data = await answer.json();
    return data;
};

DataProfile.removeFavori = async function (id, id_profil) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=removeFavori&id="+ id +"&id_profil="+id_profil);
    let data = await answer.json();
    return data;
};



export { DataProfile };