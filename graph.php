<?php include('Layout/header.php') ?>

<div class="wrapper">

    <!-- Sidebar -->
    <?php include('Layout/sidebar.php') ?>
    <div id="content">
        <div class="container">
            <h1>Grafik Data</h1>
            <canvas id="cnvChart"></canvas>
        </div>
    </div>

    <!--- SCRIPT PANGGIL DATA --->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        function loadAndCreateChart() {
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "data_trans_graph.php", true);
            xhttp.send();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var obj = JSON.parse(xhttp.responseText);
                    var waktu = obj.waktu.split(",");
                    var pressure1 = obj.pressure1.split(",").map(Number);
                    var pressure2 = obj.pressure2.split(",").map(Number);
                    var pressure3 = obj.pressure3.split(",").map(Number);
                    var ctx = document.getElementById('cnvChart').getContext('2d');
                    var myChart = window.myChart;

                    if (!myChart) {
                        myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: waktu,
                                datasets: [{
                                        label: "Pressure 1",
                                        borderColor: '#2d3237',
                                        data: pressure1
                                    },
                                    {
                                        label: "Pressure 2",
                                        borderColor: '#D80EC1DE',
                                        data: pressure2
                                    },
                                    {
                                        label: "Pressure 3",
                                        borderColor: '#140ED8CF',
                                        data: pressure3
                                    }
                                ]
                            },
                            options: {
                                legend: {
                                    display: true
                                },
                                animation: {
                                    duration: 0
                                }
                            }
                        });
                        window.myChart = myChart;
                    } else {
                        myChart.data.labels.push(waktu);
                        myChart.data.datasets[0].data.push(pressure1);
                        myChart.data.datasets[1].data.push(pressure2);
                        myChart.data.datasets[2].data.push(pressure3);
                        var maxDataLength = 10;
                        if (myChart.data.labels.length > maxDataLength) {
                            myChart.data.labels.splice(0, myChart.data.labels.length - maxDataLength);
                            myChart.data.datasets.forEach(function(dataset) {
                                dataset.data.splice(0, dataset.data.length - maxDataLength);
                            });
                        }
                        myChart.update();
                    }
                }
            };
        }

        loadAndCreateChart();
        setInterval(function() {
            loadAndCreateChart();
        }, 1000);
    </script>

<?php include('Layout/footer.php') ?>