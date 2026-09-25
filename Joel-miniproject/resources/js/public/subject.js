// Confirm before deleting a subject
function confirmDelete() {
    return confirm("Are you sure you want to delete this subject?");
}

// Check the subject form
function validateSubjectForm() {
    let subjectName = document.getElementById("subject_name").value;

    if (subjectName.trim() === "") {
        alert("Please enter a subject name.");
        return false;
    }

    return true;
}