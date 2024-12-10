import {genericRenderer} from "../../lib/utils.js";
const templateFile = await fetch("src/ui/Sales/template.html");
const template = await templateFile.text();

let SalesView = {};


SalesView.render = function(total){ //, top){
    let html = "";
    let templateTotal = template.replace('{{TotSales}}', total);

    html += genericRenderer(templateTotal, total);

    return html;
}

export {SalesView};