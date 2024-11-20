// Provided JSON data
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

// Chart colors
var color1 = '#264417';
var color2 = '#437c4f';
document.querySelector('.total_forum').innerHTML = json.TotalForum;
document.querySelector('.total_user').innerHTML = json.totalUser;
document.querySelector('.total_proposal').innerHTML = json.TotalProposal;
document.querySelector('.total_pemetaan').innerHTML = json.TotalPemetaan;


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

const chart = new ApexCharts(document.querySelector('.bar_chart'), options);
chart.render();

document.addEventListener('DOMContentLoaded', function () {
    new Calendar({
        id: '#calendar',
        theme: 'basic',
        calendarSize: 'small',
        primaryColor: '#1a472a',
        headerBackgroundColor: 'white',
        eventsData: json.event, // disni
        dateChanged: (currentDate, events) => {
            showEventLabel(events);
        },
        monthChanged: (currentDate, events) => {
            console.log('Current month:', currentDate);
            console.log('Events:', events);
        }
    });

    function showEventLabel(events) {

        let labelContainer = $('#eventLabels');
        if (labelContainer.length === 0) {
            $('#calendar').after('<div id="eventLabels"></div>');
            labelContainer = $('#eventLabels');
        }

        labelContainer.addClass('card mt-3 p-3');
        labelContainer.empty();

        $('<h5>', { text: 'Events', class: 'mt-3' }).appendTo(labelContainer);

        if (events && events.length > 0) {
            events.forEach(event => {
                $('<span>', {
                    text: event.name,
                    class: 'badge me-2 mt-2',
                    css: {
                        fontSize: '14px',
                        padding: '8px 12px',
                        backgroundColor: '#1a472a',
                        color: '#fff',
                    }
                }).appendTo(labelContainer);
            });
        } else {
            $('<p>', {
                text: 'No events for this date',
                class: 'text-muted mt-2'
            }).appendTo(labelContainer);
        }
    }
});
