import zingchart from "../../../node_modules/zingchart/es6.js";
import { ZC } from "../../../node_modules/zingchart/es6.js";
import "../../../node_modules/zingchart/modules-es6/zingchart-pareto.min.js";

let ChartView = {};

ChartView.render = function (Sales, Rentals) {
  // sales
  // rentals

  // data avant:
  // {
  //   "date": {
  //       "date": "2024-07-01 00:00:00.000000",
  //       "timezone_type": 3,
  //       "timezone": "Europe/Berlin"
  //   },
  //   "price": 35.57
  // },

  let salesDates = [];
  let salesValues = [];
  for (let month of Sales){
    salesValues.push(month.price);
    salesDates.push(month.date.date.split(" ")[0]);
  }

  let rentalsValues = [];
  for (let month of Rentals){
    rentalsValues.push(month.price);
  }
  
  console.log(salesValues);
  console.log(salesDates);

  let chartConfig = {
    type: "area",
    series: [
      {values:salesValues, text:"Sales"},
      {values:rentalsValues, text:"Rentals"},
    ],
    scaleX: {
      // convert text on scale indices
      labels: salesDates,
    },
    legend: {},
  };
  
  zingchart.render({
    id: "chart",
    data: chartConfig,
    height: "100%",
    width: "100%",
  });
};

export { ChartView };
