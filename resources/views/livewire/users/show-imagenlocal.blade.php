<div>
    {{-- <x-jet-danger-button wire:click="$set('open_img',true)"> --}}
    <img wire:click="$set('open_img',true)" class="form-control w-full max-h-80 object-none " src="{{$urlimagen}}" alt="<<Imagen del local>>" >
    {{-- </x-jet-danger-button> --}}

    <x-jet-dialog-modal wire:model="open_img">
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
            <div>
                <img class="form-control  w-full h-full"  src="{{$urlimagen}}" alt="<<Imagen del local>>">
            </div>
        </x-slot>

        <x-slot name="footer">
        </x-slot>
    </x-jet-dialog-modal>
</div>
