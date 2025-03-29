
import { get } from "jquery";
import {getTokens} from "../Authentication";
import { colors } from "laravel-mix/src/Log";

const getData = async () => {
    const response = await $.get({
        url: '/api/dashboard',
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
        ]
    }
}
var chart;
const init = async () => {
const data = await getData();
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
}

init();

export {chart} ;

