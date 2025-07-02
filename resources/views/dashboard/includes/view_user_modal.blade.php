        <!-- Modal -->
        <div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow-lg rounded-3"> {{-- Added shadow, border-radius --}}
                    <div class="modal-header bg-primary text-white p-4"> {{-- Primary background, white text, more padding --}}
                        <h5 class="modal-title fw-bold" id="viewUserModalLabel">
                            <i class="fas fa-user-circle me-2"></i> User Profile Details {{-- Added icon, bold title --}}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button> {{-- White close button --}}
                    </div>
                    <div class="modal-body p-4"> {{-- More padding --}}

                        <div id="modalUserDetails" class="row g-3"> {{-- Bootstrap grid for layout --}}
                            <div class="col-md-6">
                                <p class="mb-1"><strong class="text-primary"><i class="fas fa-calendar-alt me-2"></i>
                                        Created At:</strong></p>
                                <p class="ms-4" id="userCreatedAt"></p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1"><strong class="text-primary"><i class="fas fa-history me-2"></i>
                                        Updated At:</strong></p>
                                <p class="ms-4" id="userUpdatedAt"></p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1"><strong class="text-primary"><i class="fas fa-signature me-2"></i>
                                        Name:</strong></p>
                                <p class="ms-4" id="userName"></p> {{-- Indent content for better readability --}}
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1"><strong class="text-primary"><i class="fas fa-envelope me-2"></i>
                                        Email:</strong></p>
                                <p class="ms-4" id="userEmail"></p>
                            </div>
                            <div class="col-12"> {{-- Full width for description --}}
                                <p class="mb-1"><strong class="text-primary"><i class="fas fa-info-circle me-2"></i>
                                        User Description:</strong></p>
                                <p class="ms-4" id="userDescription" class="text-muted fst-italic"></p>
                                {{-- Muted and italic for description --}}
                            </div>

                        </div>

                        <div id="modalLoading" class="text-center py-5 d-none"> {{-- Increased padding --}}
                            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                                {{-- Larger spinner --}}
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-3 text-muted">Loading user details...</p> {{-- Loading text --}}
                        </div>

                        <div id="modalError" class="alert alert-danger d-none text-center py-4 rounded-3"
                            role="alert"> {{-- More padding, rounded --}}
                            <i class="fas fa-exclamation-triangle me-2"></i> Failed to load user details. Please try
                            again.
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center border-top-0 p-3"> {{-- Centered footer buttons, no top border --}}
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
                        {{-- Wider button --}}
                    </div>
                </div>

            </div>
        </div>
