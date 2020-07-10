const ctx = document.getElementsByClassName('chart');
const divContent = JSON.parse(document.getElementById("chartdata").innerText);
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