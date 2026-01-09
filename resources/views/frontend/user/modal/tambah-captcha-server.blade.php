<div class="modal fade" id="TambahModalCaptcha_Server" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('user.tambah-captcha_server') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="text-center">
                    <div class="cf-turnstile" data-sitekey="{{ env('CLOUDFLARE_TURNSTILE_SITE_KEY') }}" data-callback="enableSubmit" data-theme="light">
                    </div>
                    @error('cf-turnstile-response')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    @if ($errors->has('general'))
                    <p class="text-danger text-center">{{ $errors->first('general') }}</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submitBtn" class="btn btn-primary" disabled>Tambah User</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function enableSubmit() {
        document.getElementById('submitBtn').removeAttribute('disabled');
    }
</script>