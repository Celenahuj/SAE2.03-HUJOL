let templateFile = await fetch("./component/Movie/template.html");
let template = await templateFile.text();

let Movie = {};
Movie.format = function (image, title) {
  let html = template;
  html = html.replace("{{image}}", image);
  html = html.replace("{{title}}", title);
  return html;
};

export { Movie };
