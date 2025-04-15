let templateFile = await fetch("./component/BarreRecherche/template.html");
let template = await templateFile.text();

let BarreRecherche = {};

BarreRecherche.format = function () {
  return `
    <input 
      type="text" 
      placeholder="Rechercher un film..." 
      oninput="C.handlerBarreRecherche(this.value)"
    />
  `;
};

export {BarreRecherche};