import './bootstrap';
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('picture');
    const fileNameDisplay = document.getElementById('file-name');

    if (fileInput && fileNameDisplay) {
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                fileNameDisplay.textContent = fileInput.files[0].name;
            } else {
                fileNameDisplay.textContent = 'No file chosen';
            }
        });
    }
});
