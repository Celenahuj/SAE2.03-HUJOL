let templateFile = await fetch("./component/MovieCategory/template.html");
let template = await templateFile.text();

let Moviecategory = {};

Moviecategory.format = function (categories) {
  let listHTML = categories
    .map(
      (cat) =>
        `<li class="categorie__tag" onclick="C.handlerCategorie('${cat.id}')">${cat.name}</li>`
    )
    .join("");

  let html = template.replace("{{categories}}", listHTML);
  return html;
};

export { Moviecategory };