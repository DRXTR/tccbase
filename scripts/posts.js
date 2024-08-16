document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    
    if (form) {
        form.addEventListener('submit', (e) => {
            const textArea = document.querySelector('#post-text');
            if (textArea && textArea.value.trim() === '') {
                alert('O texto da postagem não pode estar vazio.');
                e.preventDefault();
            }
        });
    }
});
