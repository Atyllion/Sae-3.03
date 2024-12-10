import { HeaderView } from "./ui/header/index.js";
import { RentalsView } from "./ui/Rentals/index.js";
import { SalesView } from "./ui/Sales/index.js";

import { SalesData } from "./data/SalesData.js";
import { RentalsData } from "./data/RentalsData.js";

// import './index.css';
// Voir le montant total des ventes et le montant total des locations pour le mois en cours.
// voir ici pour afficher les donnée problemes peut etre ici 

let C = {};

C.init = async function(){
    V.init();

    C.SalesTotal();
    C.RentalsTotal();

/*    C.TopMoviesSales();
    C.topMoviesRentals();*/
};


// Voir le montant total des ventes et le montant total des locations pour le mois en cours.
    C.SalesTotal = async function(){
        let data = await SalesData.Total();
        let salesHtml = SalesView.render(data);
        V.sales.innerHTML = salesHtml;
    };

    C.RentalsTotal = async function(){
        let data = await RentalsData.Total();
        let rentalsHtml = RentalsView.render(data);
        V.rentals.innerHTML = rentalsHtml;
    };
//

// Voir les 3 films les plus vendus et les 3 films les plus loués.
    C.TopMoviesSales = async function(){
        let data = await SalesData.TopMovies();
        let salesHtml = SalesView.render(data);
        V.topSales.innerHTML = salesHtml;
    };

    C.topMoviesRentals = async function(){
        let data = await RentalsData.TopMovies();
        let rentalsHtml = RentalsView.render(data);
        V.topRentals.innerHTML = rentalsHtml;
    };
//

let V = {
    header: document.querySelector("#header"),
    
    rentals: document.querySelector("#rentals"),
    sales: document.querySelector("#sales"),

    topSales: document.querySelector("#topSales"),
    topRentals: document.querySelector("#topRentals")
};

V.init = function(){
    V.renderHeader();
    V.renderRentals();
    V.renderSales();
}

V.renderHeader = function(){
    V.header.innerHTML = HeaderView.render();
}

V.renderRentals = function(){
    V.rentals.innerHTML = RentalsView.render();
}

V.renderSales = function(){
    V.sales.innerHTML = SalesView.render();
}

C.init();
