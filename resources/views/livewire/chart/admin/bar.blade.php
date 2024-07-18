<div>
    <div style="width: 100%; margin: auto;">
        <canvas id="donationBarChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('donationBarChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($data['labels']),
                datasets: [{
                    label: 'Number of Donations',
                    data: @json($data['data']),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)', // Light red
                        'rgba(54, 162, 235, 0.5)', // Light blue
                        'rgba(75, 192, 192, 0.5)'  // Light teal
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>