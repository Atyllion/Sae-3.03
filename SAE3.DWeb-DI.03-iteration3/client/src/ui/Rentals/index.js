import {genericRenderer} from "../../lib/utils.js";
const templateFile = await fetch("src/ui/Rentals/template.html");
const template = await templateFile.text();

let RentalsView = {};


RentalsView.render = function(total){ //, top){
    let html = "";
    let templateTotal = template.replace('{{TotRantals}}', total);

    html += genericRenderer(templateTotal, total);
    
    return html;
}

export {RentalsView};