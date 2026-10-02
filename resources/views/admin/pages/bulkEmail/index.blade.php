@extends('admin.app')

@section('admin_content')

    {{-- Page Title --}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">Job Portal</a>
                        </li>
                        <li class="breadcrumb-item active">Bulk Email</li>
                    </ol>
                </div>

                <h4 class="page-title">Bulk Email</h4>
            </div>
        </div>
    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Warning Message --}}
    @if(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- User List Card --}}
    <div class="row">
        <div class="col-12">

            <div class="card">

                {{-- Card Header --}}
                <div class="card-header">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">

                        <div>
                            <h4 class="header-title mb-1">User List</h4>

                            <p class="text-muted mb-0">
                                Select users and send emails in bulk.
                            </p>
                        </div>

                        <button type="button"
                                class="btn btn-info"
                                id="openEmailModal"
                                disabled>

                            <i class="bi bi-envelope me-1"></i>
                            Send Email

                            <span class="badge bg-light text-dark ms-1"
                                  id="selectedBadge">0</span>
                        </button>

                    </div>
                </div>


                <div class="card-body">

                    {{-- Search --}}
                    <form action="{{ route('bulk.email.index') }}"
                          method="GET"
                          class="row mb-3">

                        <div class="col-md-5 col-lg-4 mb-2">
                            <input type="text"
                                   name="search"
                                   class="form-control"
                                   placeholder="Search name, email or phone..."
                                   value="{{ request('search') }}">
                        </div>

                        <div class="col-auto mb-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search me-1"></i>
                                Search
                            </button>

                            @if(request('search'))
                                <a href="{{ route('bulk.email.index') }}"
                                   class="btn btn-light">
                                    Reset
                                </a>
                            @endif
                        </div>

                    </form>


                    {{-- Selection Information --}}
                    <div class="alert alert-info d-flex flex-wrap justify-content-between align-items-center mb-3">

                        <div>
                            <i class="bi bi-people me-1"></i>

                            Selected Users:
                            <strong id="selectedCount">0</strong>

                            <span class="ms-2">
                                | Total Users: <strong>{{ $users->total() }}</strong>
                            </span>
                        </div>

                        <button type="button"
                                class="btn btn-sm btn-light"
                                id="clearSelection">

                            <i class="bi bi-x-circle me-1"></i>
                            Clear Selection
                        </button>

                    </div>


                    {{-- Bulk Email Form --}}
                    <form action="{{ route('bulk.email.send') }}"
                          method="POST"
                          id="bulkEmailForm">

                        @csrf

                        <div class="table-responsive">

                            <table id="basic-datatable"
                                   class="table table-striped dt-responsive nowrap w-100">

                                <thead>
                                <tr>
                                    <th style="width: 50px;">
                                        <input type="checkbox"
                                               class="form-check-input"
                                               id="selectAll"
                                               aria-label="Select all users">
                                    </th>

                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Registration By</th>
                                    <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>

                                @forelse($users as $key => $user)

                                    <tr>

                                        <td>
                                            <input type="checkbox"
                                                   class="form-check-input user-checkbox"
                                                   name="users[]"
                                                   value="{{ $user->id }}"
                                                   aria-label="Select {{ $user->name }}"
                                                   @if(!$user->email) disabled @endif>
                                        </td>

                                        <td>
                                            {{ $users->firstItem() + $key }}
                                        </td>

                                        <td>
                                            <strong>
                                                {{ $user->name ?? 'N/A' }}
                                            </strong>
                                        </td>

                                        <td>
                                            @if($user->email)
                                                <span>
                                                        {{ $user->email }}
                                                    </span>
                                            @else
                                                <span class="text-danger">
                                                        No Email
                                                    </span>
                                            @endif
                                        </td>

                                        <td>
                                            {{ $user->phone ?: 'N/A' }}
                                        </td>

                                        <td>
                                            {{ $user->is_registration_by ?: 'N/A' }}
                                        </td>

                                        <td>
                                            @if($user->status == 1)
                                                <span class="badge bg-success">
                                                        Active
                                                    </span>
                                            @else
                                                <span class="badge bg-danger">
                                                        Inactive
                                                    </span>
                                            @endif
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="bi bi-people fs-2 text-muted"></i>

                                            <p class="mb-0 mt-2">
                                                No users found.
                                            </p>
                                        </td>
                                    </tr>

                                @endforelse

                                </tbody>

                            </table>

                        </div>


                        {{-- Pagination --}}
                        @if($users->hasPages())
                            <div class="d-flex justify-content-end mt-3">
                                {{ $users->links('pagination::bootstrap-5') }}
                            </div>
                        @endif


                        {{-- Email Compose Modal --}}
                        <div class="modal fade"
                             id="emailModal"
                             data-bs-backdrop="static"
                             tabindex="-1"
                             aria-labelledby="emailModalLabel"
                             aria-hidden="true">

                            <div class="modal-dialog modal-lg modal-dialog-centered">

                                <div class="modal-content">

                                    <div class="modal-header">

                                        <h4 class="modal-title"
                                            id="emailModalLabel">

                                            <i class="bi bi-envelope-paper me-1"></i>
                                            Send Bulk Email
                                        </h4>

                                        <button type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Close"></button>

                                    </div>


                                    <div class="modal-body">

                                        {{-- Recipient Count --}}
                                        <div class="alert alert-info">
                                            <i class="bi bi-people me-1"></i>

                                            Sending email to
                                            <strong id="modalRecipientCount">0</strong>
                                            selected user(s).
                                        </div>


                                        {{-- Email Subject --}}
                                        <div class="mb-3">

                                            <label for="emailSubject" class="form-label">
                                                Subject <span class="text-danger">*</span>
                                            </label>

                                            <input type="text"
                                                   name="subject"
                                                   id="emailSubject"
                                                   class="form-control"
                                                   placeholder="Enter email subject"
                                                   maxlength="255"
                                                   value="{{ old('subject') }}"
                                                   required>

                                        </div>


                                        {{-- Email Message --}}
                                        <div class="mb-3">

                                            <label for="emailMessage" class="form-label">
                                                Message <span class="text-danger">*</span>
                                            </label>

                                            <textarea name="message"
                                                      id="emailMessage"
                                                      class="form-control"
                                                      rows="8"
                                                      maxlength="10000"
                                                      placeholder="Write your email message here..."
                                                      required>{{ old('message') }}</textarea>

                                        </div>


                                        <div class="alert alert-warning mb-0">
                                            <i class="bi bi-info-circle me-1"></i>

                                            Please check your subject and message before sending.
                                        </div>

                                    </div>


                                    <div class="modal-footer">

                                        <button type="button"
                                                class="btn btn-light"
                                                data-bs-dismiss="modal">
                                            Cancel
                                        </button>

                                        <button type="submit"
                                                class="btn btn-primary"
                                                id="confirmSendButton">

                                            <i class="bi bi-send me-1"></i>

                                            <span id="sendButtonText">
                                                Send Email
                                            </span>

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>


    {{-- Checkbox and Modal Scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const selectAll = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.user-checkbox');

            const openEmailModal = document.getElementById('openEmailModal');
            const selectedCount = document.getElementById('selectedCount');
            const selectedBadge = document.getElementById('selectedBadge');
            const modalRecipientCount = document.getElementById('modalRecipientCount');

            const clearSelection = document.getElementById('clearSelection');

            const modalElement = document.getElementById('emailModal');
            const emailModal = new bootstrap.Modal(modalElement);

            const bulkEmailForm = document.getElementById('bulkEmailForm');
            const confirmSendButton = document.getElementById('confirmSendButton');
            const sendButtonText = document.getElementById('sendButtonText');

            function getSelectedUsers() {
                return Array.from(checkboxes).filter(function (checkbox) {
                    return checkbox.checked;
                });
            }

            function updateSelection() {

                const selected = getSelectedUsers();
                const count = selected.length;

                selectedCount.textContent = count;
                selectedBadge.textContent = count;
                modalRecipientCount.textContent = count;

                openEmailModal.disabled = count === 0;

                const enabledCheckboxes = Array.from(checkboxes).filter(function (checkbox) {
                    return !checkbox.disabled;
                });

                selectAll.checked =
                    enabledCheckboxes.length > 0 &&
                    enabledCheckboxes.every(function (checkbox) {
                        return checkbox.checked;
                    });

                selectAll.indeterminate =
                    count > 0 && !selectAll.checked;
            }

            // Select all users on the current page.
            selectAll.addEventListener('change', function () {

                checkboxes.forEach(function (checkbox) {

                    if (!checkbox.disabled) {
                        checkbox.checked = selectAll.checked;
                    }

                });

                updateSelection();
            });

            // Individual checkbox selection.
            checkboxes.forEach(function (checkbox) {

                checkbox.addEventListener('change', updateSelection);

            });

            // Clear selection.
            clearSelection.addEventListener('click', function () {

                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = false;
                });

                selectAll.checked = false;

                updateSelection();
            });

            // Open email modal.
            openEmailModal.addEventListener('click', function () {

                const selected = getSelectedUsers();

                if (selected.length === 0) {
                    alert('Please select at least one user.');
                    return;
                }

                modalRecipientCount.textContent = selected.length;

                emailModal.show();
            });

            // Prevent duplicate submissions.
            bulkEmailForm.addEventListener('submit', function (event) {

                const selected = getSelectedUsers();

                const subject = document.getElementById('emailSubject').value.trim();
                const message = document.getElementById('emailMessage').value.trim();

                if (selected.length === 0) {

                    event.preventDefault();

                    alert('Please select at least one user.');

                    return;
                }

                if (!subject || !message) {

                    event.preventDefault();

                    alert('Please enter both subject and message.');

                    return;
                }

                if (selected.length > 100) {

                    event.preventDefault();

                    alert('You can select a maximum of 100 users at a time.');

                    return;
                }

                confirmSendButton.disabled = true;
                sendButtonText.textContent = 'Sending...';
            });

            updateSelection();

            // Reopen modal if server-side validation fails.
            @if($errors->has('subject') || $errors->has('message'))
            emailModal.show();
            @endif

        });
    </script>

@endsection
