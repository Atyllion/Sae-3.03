import { HeaderView } from "./ui/header/index.js";
import { RentalsView } from "./ui/Rentals/index.js";
import { SalesView } from "./ui/Sales/index.js";
import { ChartView } from "./ui/Chart/index.js";

// import { zingchart, ZC } from "../node_modules/zingchart/es6.js";
// import '../node_modules/zingchart/modules-es6/zingchart-pareto.min.js';

import { SalesData } from "./data/SalesData.js";
import { RentalsData } from "./data/RentalsData.js";

// import './index.css';
// Voir le montant total des ventes et le montant total des locations pour le mois en cours.
// voir ici pour afficher les donnée problemes peut etre ici

let C = {};

C.init = async function () {
  V.init();

  /*C.SalesTotal();
    C.RentalsTotal();*/

  /*C.TopMoviesSales();
    C.topMoviesRentals();*/

  /*C.SalesChart();
    C.RentalsChart();*/

    C.Chart();
};

// Voir le montant total des ventes et le montant total des locations pour le mois en cours.
C.SalesTotal = async function () {
  let data = await SalesData.Total();
  let salesHtml = SalesView.render(data);
  V.sales.innerHTML = salesHtml;
};

C.RentalsTotal = async function () {
  let data = await RentalsData.Total();
  let rentalsHtml = RentalsView.render(data);
  V.rentals.innerHTML = rentalsHtml;
};
//

// Voir les 3 films les plus vendus et les 3 films les plus loués.
C.TopMoviesSales = async function () {
  let data = await SalesData.TopMovies();
  let salesHtml = SalesView.render(data);
  V.topSales.innerHTML = salesHtml;
};

C.topMoviesRentals = async function () {
  let data = await RentalsData.TopMovies();
  let rentalsHtml = RentalsView.render(data);
  V.topRentals.innerHTML = rentalsHtml;
};
//

// Voir un graphique représentant l’évolution des ventes et des locations sur les 6 derniers mois.
C.Chart = async function () {
  let Sales = await SalesData.last6Month();
  let Rentals = await RentalsData.last6Month();
  V.renderChart(Sales, Rentals);
};
//

let V = {
  header: document.querySelector("#header"),

  rentals: document.querySelector("#rentals"),
  sales: document.querySelector("#sales"),

  topSales: document.querySelector("#topSales"),
  topRentals: document.querySelector("#topRentals"),
};

V.renderHeader = function () {
  V.header.innerHTML = HeaderView.render();
};

V.renderChart = function (Sales, Rentals) {
   ChartView.render(Sales, Rentals);
};

V.init = function () {
  V.renderHeader();
};

C.init();
