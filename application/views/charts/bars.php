<div id="bar" height="200"></div>
  <script>
var chart = Highcharts.chart('bar', {

    chart: {
        type: 'column',
        height: 300,
        spacingTop: 1,
    },

    title: {
        text: ''
    },

    subtitle: {
        text: ''
    },

    legend: {
        align: 'right',
        verticalAlign: 'middle',
        layout: 'horizontal'
    },

    credits: {
      enabled: false
    },

    xAxis: {
        categories: ['Mahasiswa'],
        labels: {
            x: -10
        }
    },

    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Jumlah'
        }
    },

    series: [
    <?php foreach ($bars as $b):?>
    {
        name: '<?= str_replace("Fakultas Teknik Komunikasi dan Infromatika", "FTKI", $b["nama_fakultas"])?>',
        data: [<?= $b['total'] ?>]
    },
    <?php endforeach; ?>
    ],
});
</script>