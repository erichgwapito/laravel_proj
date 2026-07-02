<div x-data="{ count: 0 }" style="text-align: center; padding: 20px; background: #222; color: white;">
    <h2>Livewire Interactive Counter</h2>
    <p>Count: <span x-text="count">0</span></p>
    <button @click="count++" style="padding: 10px; cursor: pointer;">+ Click Me!</button>
</div>