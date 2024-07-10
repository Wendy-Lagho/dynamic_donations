<div>
    <div style="width: 80%; margin: auto;">
        <canvas id="pieChart"></canvas>
    </div>
    
    <script>
        document.addEventListener('livewire:load', function () {
            var ctx = document.getElementById('pieChart').getContext('2d');
            
            if (window.pieChart) {
                window.pieChart.destroy();
            }
            
            window.pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: @json($data['labels']),
                    datasets: [{
                        label: 'Donation Status',
                        data: @json($data['data']),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
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
        });
    </script>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
</div>
