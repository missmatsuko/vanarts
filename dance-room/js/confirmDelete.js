function confirmDelete(title) {
    if (!confirm("Are you sure you want to delete \"" + title + "\"?")) {
        return false;
    }
    ;
}
