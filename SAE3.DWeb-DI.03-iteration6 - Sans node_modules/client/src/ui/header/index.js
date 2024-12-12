
const templateFile = await fetch("src/ui/header/template.html");
const template = await templateFile.text();


let HeaderView = {};

HeaderView.render = function(){
    let html = "";
    html = template;
    return template;
}

export {HeaderView};