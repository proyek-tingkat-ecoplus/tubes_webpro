import { get } from "jquery";
import {getTokens} from "../Authentication";
import { colors } from "laravel-mix/src/Log";

const getData = async (tahun) => {

    let url = '/api/dashboard';
    if(tahun){
        url = '/api/dashboard?tahun=' + tahun;
    }

    const response = await $.get({
        url: `${url}`,
        type: 'GET',
        headers: {
            'Authorization': 'Bearer ' + getTokens()
        }
    });
    console.log(response);
    return {
        "totalUser": response["total_user"],
        "TotalForum": response["total_forum"],
        "TotalProposal": response["total_proposal"],
        "TotalPemetaan": response["total_pemetaan"],
        "chart": [
            {
                "name": "Pending",
                "data": response['proposal_count_pending']
            },
            {
                "name": "Disubmit",
                "data": response['proposal_count_approved']
            },
            {
                "name": "Direject",
                "data": response['proposal_count_rejected']
            }
        ],
        "chart_daerah":[
            {
                "name": "bandung_barat",
                "data": response['proposal_daerah_bandungbarat']
            },
            {
                "name": "bandung_timur",
                "data": response['proposal_daerah_bandungtimur']
            },
            {
                "name": "bandung_selatan",
                "data": response['proposal_daerah_bandungselatan']
            }
        ]
    }
}
var chart;
const init = async (tahun) => {
        // Check if chart_daerah exists before trying to destroy it
    if (typeof chart_daerah !== 'undefined' && chart_daerah) {
        chart.destroy();
    }

    // Fetch data for the given year, default to '2024' if not provided
    const data = await getData(tahun || '2024');

var json = {
    "totalUser": data["totalUser"],
    "TotalForum": data["TotalForum"],
    "TotalProposal": data["TotalProposal"],
    "TotalPemetaan": data["TotalPemetaan"],
    "chart": data["chart"],
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
var color3 = '#437c4f';
var options = {
    chart: {
        height: 350,
        type: 'bar',
        background: '#ffff',
        foreColor: '#333',
    },
    series: json.chart, // Use data from JSON
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        labels: {
            style: {
                colors: '#a1acb8',
            },
        },
    },
    fill: {
        opacity: 1,
        colors: [color1, color2,  color3],
    },
    legend: {
        show: true,
        labels: {
            colors: '#a1acb8',
            useSeriesColors: false,
        },
    },
    colors: [color1, color2, color3],
        // plotOptions: {
        //     bar: {
        //         horizontal: false,
        //         columnWidth: '55%',
        //         endingShape: 'rounded',
        //     },
        // },
    dataLabels: {
        enabled: true,
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['#fff'],
    },
    grid: {
        borderColor: '#e0e6ed',
        strokeDashArray: 4,
    },
};
chart = new ApexCharts(document.querySelector('.bar_chart'), options)

chart.render();
}

var chart_daerah;
const init_daerah = async (tahun) => {
    // Check if chart_daerah exists before trying to destroy it
    if (typeof chart_daerah !== 'undefined' && chart_daerah) {
        chart_daerah.destroy();
    }

    // Fetch data for the given year, default to '2024' if not provided
    const data = await getData(tahun || '2024');

    // Prepare chart data
    const json = {
        chart_daerah: data.chart_daerah,
    };

    // Define chart options
    const options = {
        chart: {
            height: 350,
            type: 'bar',
            background: '#fff',
            foreColor: '#333',
        },
        series: json.chart_daerah,
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            labels: {
                style: {
                    colors: '#a1acb8',
                },
            },
        },
        fill: {
            opacity: 1,
            colors: ['#526E48', '#62825D', '#9EDF9C'],
        },
        legend: {
            show: true,
            labels: {
                colors: '#a1acb8',
                useSeriesColors: false,
            },
        },
        colors: ['#526E48', '#62825D', '#9EDF9C'],
        dataLabels: {
            enabled: true,
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['#fff'],
        },
        grid: {
            borderColor: '#e0e6ed',
            strokeDashArray: 4,
        },
    };

    // Initialize and render the chart
    chart_daerah = new ApexCharts(document.querySelector('.bar_chart_daerah'), options);
    chart_daerah.render();
};


export {init,init_daerah} ;
