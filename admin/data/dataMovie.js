let HOST_URL = "https://mmi.unilim.fr/~hujol3/SAE2.03-HUJOL";

let DataMovie = {};

DataMovie.requestMovies = async function(){
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readmovies");
    let data = await answer.json();
    return data;
}

DataMenu.add = async function (fdata) {
   let config = {
       method: "POST",
       body: fdata 
   };
   let answer = await fetch(HOST_URL + "/server/script.php?todo=add", config);
   let data = await answer.json();
   return data;
}


export {DataMovie};