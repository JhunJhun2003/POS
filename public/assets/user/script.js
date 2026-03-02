document.addEventListener('DOMContentLoaded', () => {
    const adminBtn = document.getElementById('admin-btn');
    const userBtn = document.getElementById('user-btn');
    const addRowBtn = document.getElementById('add-row-btn');

    const modalOverlay = document.getElementById('modal-overlay');
    const userModalOverlay = document.getElementById('user-modal-overlay');
    const addRowOverlay = document.getElementById('add-row-overlay');

    // Show Registration Modal
    adminBtn.addEventListener('click', () => {
        modalOverlay.classList.add('active');
    });

    userBtn.addEventListener('click', () => {
        userModalOverlay.classList.add('active');
    });

    // Show Add Row Modal
    addRowBtn.addEventListener('click', () => {
        addRowOverlay.classList.add('active');
    });

    // Close Modals when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === modalOverlay) {
            modalOverlay.classList.remove('active');
            userModalOverlay.classList.remove('active');
        }
        if (e.target === addRowOverlay) {
            addRowOverlay.classList.remove('active');
             userModalOverlay.classList.remove('active');
        }
    });
});
