document.addEventListener("DOMContentLoaded", function () {
    // Fetch the common menu HTML
    fetch("../schoolpanel/dist/common/side-menu.html")
        .then(response => response.text())
        .then(html => {
            document.getElementById("side-nav").innerHTML = html;
        })
        .catch(error => console.error("Error fetching common menu:", error));
    fetch("../schoolpanel/dist/common/mobile-menu.html")
        .then(response => response.text())
        .then(html => {
            document.getElementById("mobile-menu").innerHTML = html;
        })
        .catch(error => console.error("Error fetching common menu:", error));
    fetch("../schoolpanel/dist/common/notification.html")
        .then(response => response.text())
        .then(html => {
            document.getElementById("notification-section").innerHTML = html;
        })
        .catch(error => console.error("Error fetching common menu:", error));
    fetch("../schoolpanel/dist/common/profile-dropdown.html")
        .then(response => response.text())
        .then(html => {
            document.getElementById("right-profile-section").innerHTML = html;
        })
        .catch(error => console.error("Error fetching common menu:", error));

});

setTimeout(function () {
    var script = document.createElement('script');
    script.src = '../schoolpanel/dist/js/app.js';
    document.body.appendChild(script);

    const currentPageName = document.body.getAttribute('page-name');
    if (currentPageName) {
        const element = document.getElementById(currentPageName);
        if (element) {
            element.classList.add('side-menu--active');
        }
    }
}, 500); // 2 seconds delay
