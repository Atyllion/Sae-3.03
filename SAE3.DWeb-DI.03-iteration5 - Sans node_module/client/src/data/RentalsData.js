import {getRequest} from '../lib/api-request.js';

let RentalsData = {};

// RentalsData.fetch = async function(id){
//     let data = await getRequest('rentals/'+id);
//     return data;
// }

RentalsData.fetchAll = async function(){
    let data = await getRequest('rentals');
    return data;
};

RentalsData.Total = async function(){
    let total = await getRequest('rentals');
    return total;
};

RentalsData.TopMovies = async function(){
    let top = await getRequest('rentals');
    return top;
};

RentalsData.last6Month = async function(){
    let last6 = await getRequest('rentals');
    return last6;
}

export {RentalsData};