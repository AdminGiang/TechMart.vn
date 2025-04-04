function previewImage(event) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById('image-preview');

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            previewContainer.innerHTML = `<img src="${e.target.result}" alt="Preview Image" width="100" style="border: 1px solid #ddd; padding: 5px;">`;
        };

        reader.readAsDataURL(file);
    }
}
