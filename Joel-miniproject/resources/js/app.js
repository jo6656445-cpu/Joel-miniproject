// Personal Task Manager JavaScript

document.addEventListener("DOMContentLoaded", function () {

    // Delete confirmation
    const deleteForms = document.querySelectorAll(".delete-form");

    deleteForms.forEach(function (form) {

        form.addEventListener("submit", function (event) {

            const confirmDelete = confirm(
                "Are you sure you want to delete this task?"
            );

            if (!confirmDelete) {
                event.preventDefault();
            }

        });

    });

});
