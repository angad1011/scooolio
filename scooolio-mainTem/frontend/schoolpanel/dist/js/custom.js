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

// upload photos of event

document.addEventListener('DOMContentLoaded', function () {
    const imageUploadInput = document.getElementById('image-upload');
    const imageContainer = document.getElementById('image-container');

    // Function to handle image preview
    function handleImagePreview(files) {
        for (let i = 0; i < files.length; i++) {
            let file = files[i];
            let reader = new FileReader();

            reader.onload = function (e) {
                let imgSrc = e.target.result;

                // Create the image preview HTML structure
                let imageDiv = document.createElement('div');
                imageDiv.classList.add('w-24', 'h-24', 'position-relative', 'image-fit', 'mb-5', 'me-5', 'cursor-pointer', 'zoom-in');

                let imgElement = document.createElement('img');
                imgElement.classList.add('rounded-2');
                imgElement.alt = '';
                imgElement.src = imgSrc;

                let removeDiv = document.createElement('div');
                removeDiv.classList.add('tooltip', 'w-5', 'h-5', 'd-flex', 'align-items-center', 'justify-content-center', 'position-absolute', 'rounded-circle', 'text-white', 'bg-theme-6', 'end-0', 'top-0', 'me-n2', 'mt-n2', 'remove-image');
                removeDiv.title = 'Remove this image?';

                let iconElement = document.createElement('i');
                iconElement.classList.add('w-4', 'h-4');
                iconElement.setAttribute('data-feather', 'x');

                removeDiv.appendChild(iconElement);
                imageDiv.appendChild(imgElement);
                imageDiv.appendChild(removeDiv);
                imageContainer.appendChild(imageDiv);

                // Initialize feather icons
                feather.replace();
            }

            reader.readAsDataURL(file);
        }
    }

    // Handle image file selection
    imageUploadInput.addEventListener('change', function (event) {
        let files = event.target.files;
        handleImagePreview(files);
    });

    // Handle image removal
    imageContainer.addEventListener('click', function (event) {
        if (event.target.closest('.remove-image')) {
            event.target.closest('.w-24').remove();
        }
    });
});

//  Add more row
document.addEventListener('DOMContentLoaded', function () {
    const feesContainer = document.getElementById('fees-container');
    const addMoreButton = document.getElementById('add-more');

    // Load stored fields from localStorage on page load
    const storedFields = JSON.parse(localStorage.getItem('feesFields')) || [];
    storedFields.forEach(function (field) {
        appendFeesField(field.type, field.amount);
    });

    // Add new fields on button click
    addMoreButton.addEventListener('click', function () {
        const selectedType = document.getElementById('fees-type').value;
        const enteredAmount = document.getElementById('fees-amount').value;

        // Append the new field
        appendFeesField(selectedType, enteredAmount);

        // Save the new fields to localStorage
        storedFields.push({ type: selectedType, amount: enteredAmount });
        localStorage.setItem('feesFields', JSON.stringify(storedFields));
    });

    // Function to append the fees field elements
    function appendFeesField(type, amount) {
        // Create the select dropdown
        const selectDiv = document.createElement('div');
        selectDiv.className = 'intro-y g-col-12 g-col-sm-6';
        const labelType = document.createElement('label');
        labelType.className = 'form-label';
        labelType.textContent = 'Select Fees Type';
        const select = document.createElement('select');
        select.className = 'form-select';
        select.innerHTML = document.getElementById('fees-type').innerHTML; // Copy options
        select.value = type;

        selectDiv.appendChild(labelType);
        selectDiv.appendChild(select);

        // Create the input box
        const inputDiv = document.createElement('div');
        inputDiv.className = 'intro-y g-col-12 g-col-sm-6';
        const labelAmount = document.createElement('label');
        labelAmount.className = 'form-label';
        labelAmount.textContent = 'Add Fees Amount';
        const input = document.createElement('input');
        input.className = 'form-control d-block mx-auto';
        input.type = 'text';
        input.value = amount;

        inputDiv.appendChild(labelAmount);
        inputDiv.appendChild(input);

        // Append both select and input divs to the container
        feesContainer.appendChild(selectDiv);
        feesContainer.appendChild(inputDiv);
    }
});