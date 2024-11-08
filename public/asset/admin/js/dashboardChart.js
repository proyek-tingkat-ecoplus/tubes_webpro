var color1 = '#264417';

var options = {
    chart: {
        height: 350,
        type: 'bar',
        background: '#ffff',
        foreground: '#333',
    },
    series: [{
            name: 'Disubmit',
            data: [18, 7, 15, 29, 18, 12, 9]
        },
        {
            name: 'D    iapprove',
            data: [13, 18, 9, 14, 5, 17, 15]
        }
    ],
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
    },
    // plotOptions: {
    //     bar: {
    //         horizontal: false,
    //         columnWidth: '33%',
    //         borderRadius: 12,
    //         startingShape: 'rounded',
    //         endingShape: 'rounded'
    //     }
    // },

    fill: {
        opacity: 1,
        colors: [color1, '#437c4f'],
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
        eventsData: [{
                id: 1,
                name: "Community Meeting",
                start: "2024-11-23",
                end: "2024-11-23"
            },
            {
                id: 2,
                name: "Workshop on Empowerment",
                start: "2024-11-25",
                end: "2024-11-25"
            },
            {
                id: 3,
                name: "Empowerment Campaign",
                start: "2024-11-24",
                end: "2024-11-26"
            }
        ],
        dateChanged: (currentDate, events) => {
            // Handle date changes
            showEventLabel(events);
            // show label
        },
        monthChanged: (currentDate, events) => {
            // Handle month changes
            console.log('Current month:', currentDate);
            console.log('Events:', events);
        }
    });

    function showEventLabel(events) {
        // Get or create the label container
        let labelContainer = $('#eventLabels');
        // If container doesn't exist, create it
        if (labelContainer.length === 0) {
            $('#calendar').after('<div id="eventLabels"></div>');
            labelContainer = $('#eventLabels');
        }

        labelContainer.addClass('card mt-3 p-3');
        labelContainer.empty();

        // ${''} // ini buat ngambil atau membuat tag baru
        $('<h5>', {text: 'Events',class: 'mt-3'}).appendTo(labelContainer);

        // ini buat loop label
        if (events && events.length > 0) {
            events.forEach(event => {
                $('<span>', {
                    text: event.name,
                    class: 'badge me-2 mt-2',
                    css: {
                        fontSize: '14px',
                        padding: '8px 12px',
                        backgroundColor: '#1a472a',
                    }
                }).appendTo(labelContainer);
            });
        } else { // jika ga ada event pasang yang ini
            $('<p>', {
                text: 'No events for this date',
                class: 'text-muted mt-2'
            }).appendTo(labelContainer);
        }
    }
});


var logout = () => {
    localStorage.clear();
    window.location.href = 'login.html';
}
