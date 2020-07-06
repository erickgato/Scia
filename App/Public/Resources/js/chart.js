const ctx = document.getElementsByClassName('chart')
const graph = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Segunda','Terça','Quarta','Quinta','Sexta'],
        datasets: [{
            label: "Liberações",
            data: [5,10,5,20,15,16,22],
            borderWidth: 3,
            borderColor: '#ffb796'
        },
        {
            label: "Fora de sala",
            data: [15,10,5,20],
            borderWidth: 3,
            borderColor: '#86c5f7'
        },{
            label: "Atrasos",
            data: [25,10,5,20,15,16,22],
            borderWidth: 3,
            borderColor: '#7ed8cf'
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
            fontSize: 34,
            position: 'top',
            fontFamily: 'metropolis',
            fontColor: 'white',
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