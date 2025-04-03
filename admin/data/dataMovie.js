let HOST_URL = "https://mmi.unilim.fr/~hujol3/SAE2.03-HUJOL";

let DataMenu = {};

DataMenu.add = async function (fdata) {
   let config = {
       method: "POST",
       body: fdata 
   };
   let answer = await fetch(HOST_URL + "/server/script.php?todo=add", config);
   let data = await answer.json();
   return data;
}


export {DataMenu};