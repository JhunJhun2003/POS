document.addEventListener('DOMContentLoaded', () => {
    const adminBtn = document.getElementById('admin-btn');
    const userBtn = document.getElementById('user-btn');
    const addRowBtn = document.getElementById('add-row-btn');

    const modalOverlay = document.getElementById('modal-overlay');
    const userModalOverlay = document.getElementById('user-modal-overlay');
    const ediModalOverlay = document.getElementById('edit-modal-overlay');
    const addRowOverlay = document.getElementById('add-row-overlay');

    // Show Registration Modal
    adminBtn.addEventListener('click', () => {
        modalOverlay.classList.add('active');
    });

    userBtn.addEventListener('click', () => {
        userModalOverlay.classList.add('active');
    });

    //show edit modal
    document.querySelectorAll('.btn-edit').forEach()

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


// --- Update Items Modal Logic ---
        const updateModal = document.getElementById("updateItemsModal");
        const editBtns = document.querySelectorAll(".edit-btn");
        const updateSpan = document.querySelector("#updateItemsModal .close-btn");

        editBtns.forEach(btn => {
            btn.onclick = function(e) {
                e.preventDefault();
                updateModal.style.display = "flex";
            }
        });

        updateSpan.onclick = function() {
            updateModal.style.display = "none";
        }

        // --- Global Window Click ---
        window.onclick = function(event) {
            if (event.target == addModal) {
                addModal.style.display = "none";
            }
            if (event.target == updateModal) {
                updateModal.style.display = "none";
            }
        }