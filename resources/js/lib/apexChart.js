
var json = {
    "totalUser": 50,
    "TotalForum": 52,
    "TotalProposal": 21,
    "TotalPemetaan": 11,
    "chart": [
        {
            "name": "Disubmit",
            "data": [1, 2, 3, 4, 5]
        },
        {
            "name": "Diapprove",
            "data": [13, 18, 9, 14, 5]
        }
    ],
    "event": [
        {
            "id": 1,
            "name": "Community Meeting",
            "start": "2024-11-23",
            "end": "2024-11-23"
        },
        {
            "id": 2,
            "name": "Workshop on Empowerment",
            "start": "2024-11-25",
            "end": "2024-11-25"
        },
        {
            "id": 3,
            "name": "Empowerment Campaign",
            "start": "2024-11-24",
            "end": "2024-11-26"
        },
        {
            "id": 4,
            "name": "Empowerment Campaign",
            "start": "2024-11-27",
            "end": "2024-11-27"
        }
    ]
};
var color1 = '#264417';
var color2 = '#437c4f';
var options = {
    chart: {
        height: 350,
        type: 'bar',
        background: '#ffff',
        foreColor: '#333',
    },
    series: json.chart, // Use data from JSON
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
    },
    fill: {
        opacity: 1,
        colors: [color1, color2],
    },
    legend: {
        show: true,
        labels: {
            colors: '#a1acb8',
        },
    },
};

export const chart = new ApexCharts(document.querySelector('.bar_chart'), options);

