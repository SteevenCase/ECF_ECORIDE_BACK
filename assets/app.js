import "./bootstrap.js";
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import "./styles/app.css";
import "./styles/app.scss";
import "./bootstrap";

let ctx = document.querySelector("#myChart");
new Chart(ctx, {
    type: "pie",
    data: {
        labels: ["Covoiturages"],
        datasets: [
            {
                label: "Nombre de covoiturages",
                data: [1],
                backgroundColor: "green",
            },
        ],
    },
});
