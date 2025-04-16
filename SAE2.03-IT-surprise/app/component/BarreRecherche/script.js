let templateFile = await fetch("./component/BarreRecherche/template.html");
let template = await templateFile.text();

let BarreRecherche = {};

BarreRecherche.format = function () {
  return `
    <input 
      type="text"
      class="BarreRecherche__form" 
      oninput="C.handlerBarreRecherche(this.value)"
    />
  `;
};

export {BarreRecherche};