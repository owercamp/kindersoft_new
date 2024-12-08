<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-end px-4">
      {{ __('Admissions') }} > {{ __('Potential Customer') }} > {{ __('Statistics') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg py-6 px-5">
        <div>
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Statistics') }}
          </h2>
        </div>
        <div id="chart"></div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
      let theme = document.getElementsByTagName('html')[0].classList.contains('dark') ? 'dark' : 'light';

      if (theme === 'dark') {
        bgColor = '#e9f1f6';
        attendedColor = '#1e3a8a';
        notAttendedColor = '#78350f';
        strokeColor = '#292524';
      } else {
        bgColor = '#9cbfff';
        attendedColor = '#1d4ed8';
        notAttendedColor = '#b45309';
        strokeColor = '#475569';
      }

      var options = {
        theme: {
          mode: theme,
          palette: 'palette3',
        },
        series: @json($chartData['series']),
        chart: {
          type: 'line',
          height: 500,
          padding: {
            top: 4,
            right: 0,
            bottom: 4,
            left: 0
          }
        },
        dropShadow: {
          enabled: true,
          top: 0,
          left: 0,
          blur: 3,
          opacity: 0.5
        },
        stroke: {
          width: 1,
          colors: [strokeColor],
          curve: 'straight'
        },
        markers: {
          size: 3,
        },
        title: {
          text: 'Asistencia Cliente Potencial'
        },
        xaxis: {
          categories: @json($categories['categories']),
          labels: {
            formatter: function(val) {
              return val
            }
          }
        },
        yaxis: [{
            title: {
              text: 'Cantidad',
            },
          },
          {
            opposite: true,
            title: {
              text: 'Cantidad',
            },
          },
        ],
        fill: {
          type: "gradient",
          gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.9,
            stops: [0, 90, 100]
          }
        },
        legend: {
          position: 'bottom',
          horizontalAlign: 'center',
          offsetX: 40,
          color: ['#F44336', '#03A9F4']
        }
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    </script>
  </div>
</div>
