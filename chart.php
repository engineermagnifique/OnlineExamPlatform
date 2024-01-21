<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<style>
    .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-wrapper {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
</style>
<?php
include('Connection.php');

if (isset($_POST['examKey'])) {
    $examKey = $_POST['examKey'];
    $query = "SELECT * FROM solution WHERE exam_key='$examKey' ";
    $result = mysqli_query($conn, $query);

    $chartData = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['firstname'] . ' ' . $row['lastname'];
        $marks = $row['Marks'];
        $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF)); 
        $chartData[] = array('name' => $name, 'marks' => $marks, 'color' => $color);
    }
} else {
    echo '<div class="form-container">
    <div class="form-wrapper">
        <h2 class="text-center">Enter Exam Key</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="examKey">Exam Key:</label>
                <input type="text" id="examKey" name="examKey" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Start Exam</button>
            </div>
        </form>
    </div>
</div>';

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: black;
            color: white;
            margin: 0;
            padding: 0;
        }

        #chart-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        #marksChart {
            width: 100%;
            height: 400px;
        }

        .chart-caption {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }

        .chart-legend {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            margin-right: 5px;
            border-radius: 50%;
        }

        .legend-name {
            font-size: 14px;
        }
    </style>
</head>
<body>

<div id="chart-container">
    <div class="chart-caption">Marks Chart - Personal Shares</div>
    <canvas id="marksChart"></canvas>
    <div class="chart-legend" id="legend"></div>
</div>

<script>
    <?php if (isset($chartData)): ?>
        var chartData = <?php echo json_encode($chartData); ?>;
        var names = chartData.map(item => item.name);
        var marks = chartData.map(item => item.marks);
        var colors = chartData.map(item => item.color);

        var ctx = document.getElementById('marksChart').getContext('2d');
        var marksChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: names,
                datasets: [{
                    label: 'Marks',
                    data: marks,
                    backgroundColor: colors,
                }]
            },
            options: {
                legend: { display: false },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        
        var legendContainer = document.getElementById('legend');
        for (var i = 0; i < names.length; i++) {
            var legendItem = document.createElement('div');
            legendItem.classList.add('legend-item');

            var legendColor = document.createElement('div');
            legendColor.classList.add('legend-color');
            legendColor.style.backgroundColor = colors[i];

            var legendName = document.createElement('div');
            legendName.classList.add('legend-name');
            legendName.textContent = names[i];

            legendItem.appendChild(legendColor);
            legendItem.appendChild(legendName);
            legendContainer.appendChild(legendItem);
        }
    <?php endif; ?>
</script>

</body>
</html>