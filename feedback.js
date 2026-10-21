window.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);

    if (params.get("feedback") === "success") {

        const message = document.getElementById("feedback-message");

        if (message) {
            message.textContent = "Thank you for your feedback!";
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    }
});