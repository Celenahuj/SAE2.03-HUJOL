let HOST_URL = "https://mmi.unilim.fr/~hujol3/SAE2.03-HUJOL";

let DataProfile = {};

DataProfile.read = async function () {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readProfils");
    let data = await answer.json();
    return data;
};

export { DataProfile };