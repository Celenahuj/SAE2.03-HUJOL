let templateFile = await fetch('./component/ProfilForm/template.html');
let template = await templateFile.text();


let AddProfilForm = {};

AddProfilForm.format = function(handler){
    let html= template;
    html = html.replace('{{handler}}', handler);
    return html;
}


export {AddProfilForm};

