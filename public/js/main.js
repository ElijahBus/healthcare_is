let primaryGraph, secondaryGraph, pGraphOptions, sGraphOptions;


window.onload = async function () {
    const chartsData = await JSON.parse(window.__CHARTS_DATA__);

    const dates = chartsData[0];
    const allPatients = chartsData[1];
    const newPatients = chartsData[2];
    const recoveredPatients = chartsData[3];


  fillPrimaryChart(dates, allPatients, newPatients);
  fillSecondaryChart(dates, newPatients, recoveredPatients);
}

// fill the primary chart displayed on the user's screen
const fillPrimaryChart = function (dates, allPatients, newPatients) {
    const primaryGraphEl = new ApexCharts(document.querySelector("#primaryGraph"), pGraphOptions(dates, allPatients, newPatients));
  primaryGraphEl.render();
}

// fill the secondary chart displayed on the user's screen
const fillSecondaryChart = function (dates, newPatients, recoveredPatients) {
    const secondaryGraphEl = new ApexCharts(document.querySelector("#secondaryGraph"), sGraphOptions(dates, newPatients, recoveredPatients));
  secondaryGraphEl.render();
}

// primary graph data options
pGraphOptions = function (dates, allPatients, newPatients) {
  return {
      colors: ['#12375C', '#000'],
    fill: {
      type: 'solid'
    },
    gradient: {
      opacityFrom: 1,
      opacityTo: 1
    },
    opacity: 1,
    series: [{
      name: 'All Patients',
      fill: {
        type: 'solid'
      },
      data: [...allPatients]
    },
        {
            name: 'New Patients',
            data: [...newPatients]
        }],
    chart: {
      height: 350,
      type: 'area',
      colors: ['#fcad26', '#ffd932'],
      toolbar: {
        show: false
      }
    },
    dataLabels: {
      enabled: true
    },
    stroke: {
      curve: 'smooth'
    },
    xaxis: {
      type: 'date',
      categories: [
        ...dates
      ]
    },
    tooltip: {
      x: {
        format: 'dd/MM/yy HH:mm'
      },
    },

    legend: {
      position: 'top',
      horizontalAlign: 'left',
      offsetX: -10
    }
  }
};

// secondary graph data options
sGraphOptions = function (dates, newPatients, recoveredPatients) {
  return {
      colors: ['#000', '#07a0fc'],

    gradient: {
      opacityFrom: 1,
      opacityTo: 1
    },
    opacity: 1,
    series: [{
      name: 'New Patients',
      fill: {
        type: 'solid'
      },
      data: [...newPatients]
    }, {
      name: 'Recovered Patients',
      data: [...recoveredPatients]
    }],
    chart: {
      height: 350,
      type: 'area',
      colors: ['#fcad26', '#ffd932'],
      toolbar: {
        show: false
      }
    },
    dataLabels: {
      enabled: true
    },
    stroke: {
      curve: 'smooth'
    },
    xaxis: {
      type: 'date',
      categories: [
        ...dates
      ]
    },
    tooltip: {
      x: {
        format: 'dd/MM/yy HH:mm'
      },
    },

    legend: {
      position: 'top',
      horizontalAlign: 'center',
      offsetX: -10
    }
  }
};


// primary graph data options
allGraphOptions = function (dates, allPatients, newPatients, recoveredPatients) {
    return {
        colors: ['#12375C', '#000', '#fff'],
        fill: {
            type: 'solid'
        },
        gradient: {
            opacityFrom: 1,
            opacityTo: 1
        },
        opacity: 1,
        series: [{
            name: 'All Patients',
            fill: {
                type: 'solid'
            },
            data: [...allPatients]
        },
        {
            name: 'New Patients',
            data: [...newPatients]
        },
        {
            name: 'New Patients',
            data: [...recoveredPatients]
        }
        ],
        chart: {
            height: 350,
            type: 'area',
            colors: ['#fcad26', '#ffd932'],
            toolbar: {
                show: false
            }
        },
        dataLabels: {
            enabled: true
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            type: 'date',
            categories: [
                ...dates
            ]
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },

        legend: {
            position: 'top',
            horizontalAlign: 'left',
            offsetX: -10
        }
    }
};
