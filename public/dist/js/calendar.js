import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('CustomeCalendar');

    var calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        selectable: true,
        select: function(info) {
            alert('Selected date: ' + info.startStr);
            // Additional code to handle date selection
        },
        events: '/events', // URL to fetch events from
        editable: true,
        droppable: true
    });

    calendar.render();
});
