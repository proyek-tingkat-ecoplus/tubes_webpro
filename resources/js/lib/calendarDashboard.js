export const initializeCalendar = () => {
    var json = {
        "event": [
            { "id": 1, "name": "Community Meeting", "start": "2024-11-23", "end": "2024-11-23" },
            { "id": 2, "name": "Workshop on Empowerment", "start": "2024-11-25", "end": "2024-11-25" },
            { "id": 3, "name": "Empowerment Campaign", "start": "2024-11-24", "end": "2024-11-26" },
            { "id": 4, "name": "Empowerment Campaign", "start": "2024-11-27", "end": "2024-11-27" }
        ]
    };

    new Calendar({
        id: '#calendar',
        theme: 'basic',
        calendarSize: 'small',
        primaryColor: '#1a472a',
        headerBackgroundColor: 'white',
        eventsData: json.event,
        dateChanged: (currentDate, events) => {
            showEventLabel(events); // ini buat trigger label yang di bawah
        },
        monthChanged: (currentDate, events) => {
            console.log('Current month:', currentDate);
            console.log('Events:', events);
        }
    });

    // ini buat label yang di bawah
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
};
