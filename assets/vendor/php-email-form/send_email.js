

    document.addEventListener("DOMContentLoaded", function () {
        var form = document.querySelector(".send_email");

        form.addEventListener("submit", function (event) {
            event.preventDefault();

            // Use FormData to collect form data
            var formData = new FormData(form);

            // Use XMLHttpRequest to send data to the server
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "send_email.php", true);

            // Set up the onload and onerror callbacks
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Successful response
                    console.log(xhr.responseText);
                    // You can handle the response here, e.g., display a success message to the user
                } else {
                    // Error in the request
                    console.error("Error sending request: " + xhr.statusText);
                }
            };

            xhr.onerror = function () {
                // Network error
                console.error("Network error occurred.");
            };

            // Send the FormData
            xhr.send(formData);
        });
    });

