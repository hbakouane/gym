{{-- This file can be used just with Livewire --}}
@if($toastr)
    <script>
        let timeOut = 3000;
        toastr.{{ $type }}('{{ $message }}', '',{timeOut})
        setTimeout(function () {
            let toastr = document.querySelector('#toastr_btn');
            toastr.click();
        }, timeOut);
    </script>
@endif
<button id="toastr_btn" type="button" wire:click="$toggle('toastr')"></button>
