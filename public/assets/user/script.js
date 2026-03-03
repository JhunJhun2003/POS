document.addEventListener('DOMContentLoaded', () => {
    // Select Modals
    const modalOverlay = document.getElementById('modal-overlay');
    const userModalOverlay = document.getElementById('user-modal-overlay');
    const editModalOverlay = document.getElementById('edit-modal-overlay');

    // Buttons
    const adminBtn = document.getElementById('admin-btn');
    const userBtn = document.getElementById('user-btn');
    const editBtns = document.querySelectorAll('.edit-btn');
    const closeBtns = document.querySelectorAll('.close-btn');

    // Show Add Modals
    adminBtn.onclick = () => modalOverlay.classList.add('active');
    userBtn.onclick = () => userModalOverlay.classList.add('active');

    // Show Edit Modal & Fill Data
    editBtns.forEach(btn => {
        btn.onclick = function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const email = this.getAttribute('data-email');
            const role = this.getAttribute('data-role');
           
            document.getElementById('name').value = name;
            document.getElementById('email').value = email;
            
            //role add
            let selectedCatId = parseInt(role); 
        
           const roles = ['admin', 'manager', 'user']; 
            let optionsHtml = '';

            roles.forEach(r => {
                
                const isSelected = (r === role) ? 'selected' : '';
                
                
                const displayText = r.charAt(0).toUpperCase() + r.slice(1);
                
                optionsHtml += `<option value="${r}" ${isSelected}>${displayText}</option>`;
            });


            document.getElementById('edit_usertype').innerHTML = optionsHtml;

            //form submit
            let editForm = document.getElementById('editForm');
                if (editForm) {
                    
                    editForm.action = `/user/update/${id}`;
            
                     console.log("Form Action Updated to:", editForm.action);
                    
                    
                    
                    
                    //console.log("Form Action URL:", editForm.action); 
                }

            editModalOverlay.classList.add('active');
        };
    });

    // Close Buttons logic
    closeBtns.forEach(btn => {
        btn.onclick = () => {
            modalOverlay.classList.remove('active');
            userModalOverlay.classList.remove('active');
            editModalOverlay.classList.remove('active');
        };
    });

    // Close when clicking outside modal
    window.onclick = (event) => {
        if (event.target.classList.contains('modal-overlay')) {
            event.target.classList.remove('active');
        }
    };
});