const ctx = document.getElementsByClassName('chart');
const ctxmonth = document.getElementsByClassName('month');
const divContent = JSON.parse(document.getElementById("chartdata").innerText);
console.log(divContent);
const graph = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Segunda','Terça','Quarta','Quinta','Sexta'],
        datasets: [{
            fill: true,
            label: "Liberações",
            data: divContent["Liberacoes"],
            borderColor: '#ffb796',
            borderWidth: 2,
            pointRadius: 3,
            backgroundColor: ['#F08A43']
        },
        {
            fill: true,
            label: "Fora de sala",
            data: divContent["Gaz"],
            borderWidth: 2,
            pointRadius: 3,
            backgroundColor: ['#2BE3C0']
        },{
            fill: true,
            label: "Atrasos",
            data: divContent["Atrasos"],
            borderWidth: 2,
            pointRadius: 3,
            backgroundColor: ['#29BDD9']
        }]
    },
    options:{
        responsive: true,
        maintainAspectRatio: true,
        animation: {
            easing: 'easeInOutQuad',
            duration: 520
        },
        title: {
            display: true,
            fontSize: 40,
            position: 'top',
            fontFamily: 'metropolis',
            fontColor: 'black',
            text: 'Grafíco de occorências semanais'
        },
        scales: {
            xAxes: [{
                gridLines: {
                    color: 'rgba(200, 200, 200, 0.05)',
                    lineWidth: 1
                }
            }],
            yAxes: [{
                gridLines: {
                    color: 'rgba(200, 200, 200, 0.08)',
                    lineWidth: 1
                }
            }]
        },
        elements: {
            line: {
                tension: 0.4
            }
        },
        legend: {
            display: true
        },
        point: {
            backgroundColor: 'white'
        },
        tooltips: {
            titleFontFamily: 'Open Sans',
            backgroundColor: 'rgba(0,0,0,0.3)',
            titleFontColor: 'white',
            caretSize: 5,
            cornerRadius: 2,
            xPadding: 10,
            yPadding: 10
        }
    }
});
let qtdocorencias = 0
for (let index = 0; index < 5; index++) {
    qtdocorencias += divContent["Gaz"][index] + divContent['Liberacoes'][index] + divContent['Atrasos'][index];
}
console.log(qtdocorencias);
var myChart = new Chart(ctxmonth, {
    type: 'doughnut',
    data: {
        labels: ['Jan', 'Fev', 'Mar','Mai', 'Jun', 'Jul', 'Ago','Set','Out','Nov','Dez'],
        datasets: [{
            data: [12, 19, 3, 5, 2, qtdocorencias,0,0,0,0,0],
            backgroundColor: [
                '#f8f8ff',
                '#ffa500',
                '#00008b',
                '#ffff00',
                '#e71837',
                '#f1f17f', 
                '#f1af09',
                '#6E5F19',
                '#fc0fc0',
                '#0082c1',
                '#74ffff ',
                '#8b0000'
            ],
            borderColor: [
                '#f8f8ff',
                '#ffa500',
                '#00008b',
                '#ffff00',
                '#e71837',
                '#f1f17f', 
                '#f1af09',
                '#6E5F19',
                '#fc0fc0',
                '#0082c1',
                '#74ffff ',
                '#8b0000'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                gridLines: {
                    lineWidth: 0,
                    lineHeight: 0
                },
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes: [{
                gridLines: {
                    lineWidth: 0
                }
            }],
        },
        title: {
            display: true,
            fontSize: 40,
            position: 'top',
            fontColor: 'black',
            fontFamily: 'metropolis',
            text: 'Gráfico de occorências anuais'

        }
    }
});