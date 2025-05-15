const ctv = document.getElementById("lineChart");

new Chart(ctv, {
type: "line",
data: {
labels: [],
datasets: [
{
label: "# of Votes",
data: [12, 19, 3, 5, 2, 3],
borderWidth: 1,
},
],
},
options: {
scales: {
y: {
beginAtZero: true,
},
},
},
});
