
<div class="p-6">
    <h2 class="text-lg font-bold">Cambiar Contraseña</h2>
    
    <div class="mt-4">
        <label class="block text-sm font-medium">Contraseña Actual</label>
        <input type="password" wire:model="current_password" class="w-full p-2 border rounded" />
        @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    
    <div class="mt-4">
        <label class="block text-sm font-medium">Nueva Contraseña</label>
        <input type="password" wire:model="new_password" class="w-full p-2 border rounded" />
        @error('new_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    
    <div class="mt-4">
        <label class="block text-sm font-medium">Confirmar Nueva Contraseña</label>
        <input type="password" wire:model="confirm_password" class="w-full p-2 border rounded" />
        @error('confirm_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    
    <div class="mt-6">
        <button wire:click="updatePassword" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar Contraseña</button>
    </div>
</div>
