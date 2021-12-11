@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function reCaptchaCallback(response) {
        @this.set('g_recaptcha_response', response);
        }

        Livewire.on('resetReCaptcha', () => {
            grecaptcha.reset();
        });
    </script>
@endpush
<div class="mt-6">
    <div class="g-recaptcha flex items-center justify-center" data-sitekey="{{ config('services.google.recaptcha.key') }}" data-callback="reCaptchaCallback" wire:ignore></div>
    <input type="hidden" name="g_recaptcha_response" wire:model.lazy="g_recaptcha_response">
    @error('g_recaptcha_response')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
