<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trabalho de PI</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <style>
            body {
                font-family: Nunito;
            }
        </style>
    </head>
    <body>
        <h1 style="text-align: center;">Trabalho de PI</h1>
        
        <div id="chart_div" style="width: 800px; height: 500px; margin: 0 auto"></div>
        <div id="e" style="width: 400px; height: 120px; margin: 30px auto 0 auto"></div>

        <script src="{{ asset('js/chart.js') }}"></script>
        <script>
            const dados = JSON.parse('{!! $dados->toJson() !!}')

            const dadosGrafico = dados.map((dado, index) => {
                return [index + 1, dado.temperatura, dado.corrente, dado.tensao, dado.potencia]
            })

            google.charts.load('current', {'packages':['bar', 'gauge']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Analise', 'Tempetatura', 'Corrente', 'Tensao', 'Potencia'],
                    ...dadosGrafico
                ]);

                var options = {
                    chart: {
                        title: 'Medicao Eletrica',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('chart_div'));

                chart.draw(data, google.charts.Bar.convertOptions(options));




                // Segundo grafico
                var data = google.visualization.arrayToDataTable([
                    ['Label', 'Value'],
                    ['Temperatura', (dados[dados.length - 1]).temperatura],
                    ['Corrente', (dados[dados.length - 1]).corrente],
                    ['Tensao', (dados[dados.length - 1].tensao)],
                    ['Potencia', (dados[dados.length - 1]).potencia]
                ]);

                var options = {
                    width: 400, height: 120,
                    redFrom: 90, redTo: 100,
                    yellowFrom:75, yellowTo: 90,
                    minorTicks: 5
                };

                var chart = new google.visualization.Gauge(document.getElementById('e'));

                chart.draw(data, options);

                // setInterval(function() {
                //     data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
                //     chart.draw(data, options);
                // }, 13000);

                // setInterval(function() {
                //     data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
                //     chart.draw(data, options);
                // }, 5000);

                // setInterval(function() {
                //     data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
                //     chart.draw(data, options);
                // }, 26000);
            }        
            

            
        </script>
    </body>
</html>
