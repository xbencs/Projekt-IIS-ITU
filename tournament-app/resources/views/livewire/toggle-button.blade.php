<div class="form-check form-switch">
  <input name="toggle" class="form-check-input"  wire:model.lazy="is_approved" type="checkbox" role="switch" @if($is_approved) checked @endif>
</div>