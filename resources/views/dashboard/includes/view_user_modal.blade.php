{{-- dashboard/includes/view_user_modal.blade.php --}}

<div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-3">
            <div class="modal-header bg-primary text-white p-4"
                style="background: linear-gradient(135deg, #0f4c81 0%, #1b8b9c 100%); border-bottom: none;">
                <h5 class="modal-title fw-bold" id="viewUserModalLabel">
                    <i class="fas fa-user-circle me-2"></i> User Profile Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">

                <div id="modalLoading" class="text-center py-5 d-none">
                    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3 text-muted">Loading user details...</p>
                </div>

                <div id="modalError" class="alert alert-danger d-none text-center py-4 rounded-3" role="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i> Failed to load user details. Please try again.
                </div>

                <div id="modalUserDetails" class="d-none"> {{-- Initially hidden, shown after data loads --}}
                    <div class="row align-items-center mb-4">
                        <div class="col-md-auto text-center text-md-start">
                            <img id="userModalImage" src="" alt="User Profile" class="rounded-circle shadow-sm"
                                width="100" height="100" style="object-fit: cover;">
                        </div>
                        <div class="col-md">
                            <h4 class="mb-1 fw-bold" id="userName"></h4>
                            <p class="text-muted mb-2 fs-5" id="userEmail"></p>
                            <span class="badge rounded-pill fs-6 px-3 py-2" id="userTypeBadge"></span>
                            <span class="badge rounded-pill fs-6 px-3 py-2 ms-2" id="userStatusBadge"></span>
                        </div>
                    </div>

                    <hr class="mb-4">

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <p class="mb-1"><strong class="text-primary"><i class="fas fa-calendar-alt me-2"></i>
                                    Created At:</strong></p>
                            <p class="ms-4 text-muted" id="userCreatedAt"></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><strong class="text-primary"><i class="fas fa-history me-2"></i>
                                    Updated At:</strong></p>
                            <p class="ms-4 text-muted" id="userUpdatedAt"></p>
                        </div>
                        <div class="col-12">
                            <p class="mb-1"><strong class="text-primary"><i class="fas fa-info-circle me-2"></i>
                                    User Description:</strong></p>
                            <p class="ms-4 text-muted fst-italic" id="userDescription"></p>
                        </div>
                    </div>

                    {{-- Section for User's News Articles  want to display in table form--}}
                    <div class="mt-4">
                        <h5 class="fw-bold text-primary mb-3"><i class="fas fa-newspaper me-2"></i> User's Articles</h5>
                        <div id="userArticlesList" class="list-group">
                            {{-- Articles will be injected here by JavaScript --}}
                        </div>
                        <div id="noArticlesMessage" class="alert alert-info text-center mt-3 d-none">
                            <i class="fas fa-info-circle me-2"></i> This user has no articles yet.
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer justify-content-center border-top-0 p-3">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
     /* Add specific styles for the modal if needed  */
     #userArticlesList .list-group-item {
        border-radius: 8px;
        margin-bottom: 10px;
        transition: all 0.2s ease;
        border: 1px solid #e9ecef;
    }

    #userArticlesList .list-group-item:hover {
        background-color: #f8f9fa;
        border-color: #0f4c81;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    } 
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const viewUserModal = new bootstrap.Modal(document.getElementById('viewUserModal'));
        const modalUserDetails = document.getElementById('modalUserDetails');
        const modalLoading = document.getElementById('modalLoading');
        const modalError = document.getElementById('modalError');

        // New elements for user profile in modal
        const userModalImage = document.getElementById('userModalImage');
        const userName = document.getElementById('userName');
        const userEmail = document.getElementById('userEmail');
        const userDescription = document.getElementById('userDescription');
        const userCreatedAt = document.getElementById('userCreatedAt');
        const userUpdatedAt = document.getElementById('userUpdatedAt');
        const userTypeBadge = document.getElementById('userTypeBadge');
        const userStatusBadge = document.getElementById('userStatusBadge');
        const userArticlesList = document.getElementById('userArticlesList');
        const noArticlesMessage = document.getElementById('noArticlesMessage');


        document.querySelectorAll('.view-user-btn').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.dataset.userId;

                modalLoading.classList.remove('d-none');
                modalUserDetails.classList.add('d-none');
                modalError.classList.add('d-none');

                userArticlesList.innerHTML = ''; // Clear previous articles
                noArticlesMessage.classList.add('d-none'); // Hide no articles message

                fetch(`/user/${userId}/details`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Populate user details
                        userModalImage.src = data.user_image;
                        userName.textContent = data.name;
                        userEmail.textContent = data.email;
                        userDescription.textContent = data.user_description;
                        userCreatedAt.textContent = data.created_at;
                        userUpdatedAt.textContent = data.updated_at;

                        // Set user type badge
                        userTypeBadge.textContent = data.user_type;
                        userTypeBadge.className =
                            `badge rounded-pill fs-6 px-3 py-2 bg-${data.user_type.toLowerCase() === 'admin' ? 'info' : 'primary'}`;

                        // Set user status badge
                        userStatusBadge.textContent = data.user_status;
                        userStatusBadge.className =
                            `badge rounded-pill fs-6 px-3 py-2 ms-2 bg-${data.user_status.toLowerCase() === 'active' ? 'success' : 'warning'} bg-opacity-10 text-${data.user_status.toLowerCase() === 'active' ? 'success' : 'warning'}`;


                        // Populate articles
                        if (data.articles && data.articles.length > 0) {
                            data.articles.forEach(article => {
                                const articleItem = document.createElement('div');
                                articleItem.classList.add('list-group-item',
                                    'd-flex', 'flex-column');
                                articleItem.innerHTML = `
                                    <h6 class="mb-1 fw-bold text-dark text-hover">${article.title}</h6>
                                    <small class="text-muted mb-2"><i class="far fa-calendar-alt me-1"></i>Created At <br> ${article.created_at}</small>
                                    <small class="text-muted mb-2"><i class="far fa-calendar-alt me-1"></i>Updated At <br>  ${article.updated_at}</small>
                                  
                                `;
                                userArticlesList.appendChild(articleItem);
                            });
                        } else {
                            noArticlesMessage.classList.remove('d-none');
                        }

                        modalLoading.classList.add('d-none');
                        modalUserDetails.classList.remove('d-none');
                    })
                    .catch(error => {
                        console.error('Error fetching user details:', error);
                        modalLoading.classList.add('d-none');
                        modalError.classList.remove('d-none');
                    });
            });
        });

        // Optional: Clear modal content when closed
        document.getElementById('viewUserModal').addEventListener('hidden.bs.modal', function() {
            userModalImage.src = '';
            userName.textContent = '';
            userEmail.textContent = '';
            userDescription.textContent = '';
            userCreatedAt.textContent = '';
            userUpdatedAt.textContent = '';
            userTypeBadge.textContent = '';
            userTypeBadge.className = 'badge'; // Reset badge class
            userStatusBadge.textContent = '';
            userStatusBadge.className = 'badge'; // Reset badge class
            // userArticlesList.innerHTML = '';
            noArticlesMessage.classList.add('d-none');

            modalLoading.classList.add('d-none');
            modalUserDetails.classList.add('d-none'); // Hide details when closed
            modalError.classList.add('d-none');
        });
    });
</script>
