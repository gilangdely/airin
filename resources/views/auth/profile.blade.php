<x-layout.app title="Profile">
    <div class="container my-5">
        <x-ui.breadcrumb title="Profile" :breadcrumbs="[['label' => 'Dashboard', 'url' => url('/')], ['label' => 'Profile']]" />

        <x-error-list />

        <div class="card">
            <div class="card-body">
                <form action="{{ route('profile') }}" method="POST" enctype="multipart/form-data" role="form"
                    id="profileForm">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="users_picture_button" class="form-label">Change Profile Picture</label>
                        <div>
                            <img src="{{ asset('storage/' . $user->users_picture) }}" alt="Profile Picture"
                                id="profilePicturePreview" class="img-thumbnail rounded-circle mb-2"
                                style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <input type="file" name="users_picture_input" id="users_picture_input" class="d-none"
                            accept="image/jpeg,image/png,image/jpg">
                        {{-- Hidden input to store cropped image data --}}
                        <input type="file" class="d-none" name="users_picture" id="users_picture">
                        <button type="button" class="btn btn-outline-primary"
                            onclick="document.getElementById('users_picture_input').click();">Choose Image</button>
                        @error('users_picture')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username Login</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            id="username" name="username" value="{{ old('username', $user->username) }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cropImageModal" tabindex="-1" aria-labelledby="cropImageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cropImageModalLabel">Crop Your Profile Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="imageToCrop" src="" alt="Source Image" style="max-width: 100%;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="cropAndUpload">Crop & Save</button>
                </div>
            </div>
        </div>
    </div>

    @push('style')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.1/cropper.min.css">
        <style>
            .img-container {
                max-height: 400px;
                overflow: hidden;
            }
        </style>
    @endpush

    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.1/cropper.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const imageInput = document.getElementById('users_picture_input');
                const imageToCrop = document.getElementById('imageToCrop');
                const modalElement = document.getElementById('cropImageModal'); // Simpan elemen ke variabel
                const profilePicturePreview = document.getElementById('profilePicturePreview');
                const croppedImageInput = document.getElementById('users_picture');

                // Pastikan semua elemen penting ada sebelum melanjutkan
                if (!imageInput || !imageToCrop || !modalElement || !profilePicturePreview || !croppedImageInput) {
                    console.error('One or more essential elements for the image cropper are missing from the DOM.');
                    return; // Hentikan eksekusi jika ada elemen yang hilang
                }

                const cropImageModal = new bootstrap.Modal(modalElement);
                let cropper;

                imageInput.addEventListener('change', function(e) {
                    const files = e.target.files;
                    if (files && files.length > 0) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            imageToCrop.src = event.target.result;
                            cropImageModal.show();
                        };
                        reader.readAsDataURL(files[0]);
                    }
                });

                // Sekarang tambahkan event listener ke elemen yang sudah dipastikan ada
                modalElement.addEventListener('shown.bs.modal', function() {
                    cropper = new Cropper(imageToCrop, {
                        aspectRatio: 1,
                        viewMode: 1,
                        preview: '.preview' // Pastikan Anda memiliki elemen dengan kelas .preview jika menggunakan ini
                    });
                });

                modalElement.addEventListener('hidden.bs.modal', function() {
                    if (cropper) {
                        cropper.destroy();
                        cropper = null;
                    }
                    imageInput.value = ''; // Reset input file
                });
                document.getElementById('cropAndUpload').addEventListener('click', function() {

                    // Dapatkan canvas dari area yang di-crop
                    const canvas = cropper.getCroppedCanvas({
                        width: 512,
                        height: 512,
                    });

                    canvas.toBlob(blob => {
                        const imageFile = new File([blob], "profile_picture.jpg", {
                            type: "image/jpeg"
                        });

                        let container = new DataTransfer();

                        container.items.add(imageFile);
                        croppedImageInput.files = container.files;

                        profilePicturePreview.src = URL.createObjectURL(blob);

                        const modalElement = document.getElementById('cropImageModal');
                        const modalInstance = bootstrap.Modal.getInstance(modalElement);
                        if (modalInstance) {
                            modalInstance.hide();
                        }

                    }, 'image/jpeg'); // Tentukan format output gambar
                });
            });
        </script>
    @endpush
</x-layout.app>
