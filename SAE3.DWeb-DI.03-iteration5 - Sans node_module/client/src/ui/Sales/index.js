import {genericRenderer} from "../../lib/utils.js";

const templateFile = await fetch("src/ui/Sales/template.html");
const templateTop1 = await fetch("src/ui/Sales/templateTop1.html");
const templateTop2 = await fetch("src/ui/Sales/templateTop2.html");
const templateTop3 = await fetch("src/ui/Sales/templateTop3.html");

const template = await templateFile.text();
const template1 = await templateTop1.text();
const template2 = await templateTop2.text();
const template3 = await templateTop3.text();

let SalesView = {};


SalesView.render = function(top){ //, total){
    let html = template;

    let topList = template1.replace('{{Top1Sales}}', top[0].title) +
                  template2.replace('{{Top2Sales}}', top[1].title) +
                  template3.replace('{{Top3Sales}}', top[2].title);

    html = html.replace('{{listeTop}}', topList);

    return html;
}

export {SalesView};