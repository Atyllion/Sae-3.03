import {genericRenderer} from "../../lib/utils.js";

const templateFile = await fetch("src/ui/Rentals/template.html");
const templateTop1 = await fetch("src/ui/Rentals/template1.html");
const templateTop2 = await fetch("src/ui/Rentals/template2.html");
const templateTop3 = await fetch("src/ui/Rentals/template3.html");

const template = await templateFile.text();
const template1 = await templateTop1.text();
const template2 = await templateTop2.text();
const template3 = await templateTop3.text();

let RentalsView = {};

RentalsView.render = function(top){ //, total){
    let html = template;

    let topList = template1.replace('{{Top1Rentals}}', top[0].title) +
                  template2.replace('{{Top2Rentals}}', top[1].title) +
                  template3.replace('{{Top3Rentals}}', top[2].title);

    html = html.replace('{{listeTop}}', topList);

    return html;
}

export {RentalsView};