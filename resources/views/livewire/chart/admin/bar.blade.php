<div>
    <div style="width: 80%; margin: auto;">
        <canvas id="barChart"></canvas>
    </div>
    
    <script>
        document.addEventListener('livewire:load', function () {
            var ctx = document.getElementById('barChart').getContext('2d');
            
            if (window.barChart) {
                window.barChart.destroy();
            }
            
            window.barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($data['labels']),
                    datasets: [{
                        label: 'Number of Donations',
                        data: @json($data['data']),
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
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
        });
    </script>
</div>