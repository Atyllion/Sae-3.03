import {getRequest} from '../lib/api-request.js';

let SalesData = {};

// SalesData.fetch = async function(id){
//     let data = await getRequest('sales/'+id);
//     return data;
// }

SalesData.fetchAll = async function(){
    let data = await getRequest('sales');
    return data;
};

SalesData.Total = async function(){
    let total = await getRequest('sales');
    return total;
};

SalesData.TopMovies = async function(){
    let top = await getRequest('sales');
    return top;
};

SalesData.last6Month = async function(){
    let last6 = await getRequest('sales');
    return last6;
}

export {SalesData};