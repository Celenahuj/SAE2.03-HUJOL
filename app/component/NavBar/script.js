let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let NavBar = {};

NavBar.format = function (hAbout, profiles = []) {
  let html = template;
  html = html.replace("{{hAbout}}", hAbout);


  let  profilsHtml = "";

  for (let p of profiles){
     profilsHtml +=  `<option class="navbar__item" value="${p.id_profil}">${p.name}</option>`;
  }

  html = html.replace("{{profilsList}}", profilsHtml);

  return html;
};

export { NavBar };