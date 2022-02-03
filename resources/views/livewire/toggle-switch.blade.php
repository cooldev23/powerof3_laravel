@push('styles')
<style>
/* CHECKBOX TOGGLE SWITCH */
/* @apply rules for documentation, these do not work as inline style */
.toggle-checkbox:checked {
  @apply: right-0 border-green-400;
  right: 0;
  border-color: #68D391;
}
.toggle-checkbox:checked + .toggle-label {
  @apply: bg-green-400;
  color: #000;
  background-color: #68D391;
}
</style>
@endpush

<div class="mt-2">
    <div class="relative inline-block w-32 align-middle select-none transition duration-200 ease-in">
        <input wire:model="isEnabled" type="checkbox" name="toggle" id="toggle{{ $word . $model->id }}" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
        <label for="toggle{{ $word . $model->id }}" class="text-gray-100 text-center toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer">{{ $word }}</label>
    </div>
</div>
