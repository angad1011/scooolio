document.addEventListener('DOMContentLoaded', function () {
    const calendar = document.getElementById('customCalendar');
    const dateInput = document.getElementById('dateInput');
    const navigation = document.createElement('div');
    navigation.setAttribute('id', 'navigation');
    navigation.classList.add('fc-button-group');
    calendar.parentNode.insertBefore(navigation, calendar.nextSibling);

    let currentYear, currentMonth;

    // Function to get number of days in a month
    function daysInMonth(year, month) {
        return new Date(year, month + 1, 0).getDate();
    }

    // Function to get the starting day of the month
    function startingDay(year, month) {
        return new Date(year, month, 1).getDay();
    }

    // Create calendar
    function createCalendar(year, month) {
        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        const totalDays = daysInMonth(year, month);
        const startDay = startingDay(year, month);

        let html = `<h2>${monthNames[month]} ${year}</h2>`;
        html += '<table>';
        html += '<tr>';

        // Creating table headers (days)
        days.forEach(day => {
            html += `<th>${day}</th>`;
        });

        html += '</tr><tr>';

        let day = 1;
        // Filling up the days
        for (let i = 0; i < 42; i++) {
            if (i < startDay || day > totalDays) {
                html += '<td></td>';
            } else {
                const currentDate = new Date(year, month, day);
                const eventText = getEvent(currentDate);
                html += `<td id="date_${year}_${month}_${day}">${day}`;
                if (eventText) {
                    html += `<br><span class="event">${eventText}</span>`;
                }
                html += '</td>';
                day++;
            }

            // New row after each 7 days (1 week)
            if ((i + 1) % 7 === 0) {
                html += '</tr><tr>';
            }
        }

        html += '</tr>';
        html += '</table>';

        calendar.innerHTML = html;
    }

    // Add event to a specific date
    // function addEvent(year, month, day, eventText) {
    //     localStorage.setItem(`event_${year}_${month}_${day}`, eventText);
    //     const dateElement = document.getElementById(`date_${year}_${month}_${day}`);
    //     if (dateElement) {
    //         const eventSpan = dateElement.querySelector('.event');
    //         if (eventSpan) {
    //             eventSpan.textContent = eventText;
    //         } else {
    //             dateElement.innerHTML += `<br><span class="event">${eventText}</span>`;
    //         }
    //     }
    // }

    // Get event for a specific date
    function getEvent(date) {
        const year = date.getFullYear();
        const month = date.getMonth();
        const day = date.getDate();
        return localStorage.getItem(`event_${year}_${month}_${day}`);
    }

    // Previous month button
    const prevMonthBtn = document.createElement('button');
    prevMonthBtn.textContent = 'Previous';
    prevMonthBtn.addEventListener('click', function () {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        createCalendar(currentYear, currentMonth);
    });
    navigation.appendChild(prevMonthBtn);
    prevMonthBtn.classList.add('btn', 'btn-sm', 'btn-secondary', 'w-24', 'me-1', 'mb-2');
    // Next month button
    const nextMonthBtn = document.createElement('button');
    nextMonthBtn.textContent = 'Next';
    nextMonthBtn.addEventListener('click', function () {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        createCalendar(currentYear, currentMonth);
    });
    navigation.appendChild(nextMonthBtn);
    nextMonthBtn.classList.add('btn', 'btn-sm', 'btn-secondary', 'w-24', 'me-1', 'mb-2');
    // Call the function initially with the current date input value
    dateInput.addEventListener('change', function () {
        const selectedDate = new Date(dateInput.value);
        currentYear = selectedDate.getFullYear();
        currentMonth = selectedDate.getMonth();
        createCalendar(currentYear, currentMonth);
    });

    // Call the function initially with the current date input value
    const currentDate = new Date();
    currentYear = currentDate.getFullYear();
    currentMonth = currentDate.getMonth();
    dateInput.value = currentDate.toISOString().slice(0, 10);
    createCalendar(currentYear, currentMonth);
});
