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
    const commentButtons = document.querySelectorAll('.cmt_btn');
    commentButtons.forEach((button) => {
        button.addEventListener('click', function () {
            let postId = button.getAttribute('data-id'); // Get the post ID from data attribute
            let commentForm = document.getElementById(`comment-form-${postId}`);
            
            if (commentForm) {
                // Toggle the display state of the correct comment form
                commentForm.style.display = commentForm.style.display === 'none' ? 'block' : 'none';
            }
        });
    });
});
