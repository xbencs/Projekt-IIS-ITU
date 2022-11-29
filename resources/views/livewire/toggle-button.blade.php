{{-- <div class="form-check form-switch">
  <input name="toggle" class="form-check-input"  wire:model.lazy="is_approved" type="checkbox" role="switch" @if($is_approved) checked @endif>
</div> --}}
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
  <input wire:model.lazy="is_approved" type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" role="switch" @if($is_approved) checked @endif/>
  <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
</div>