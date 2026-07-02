<?php

use Livewire\Component;

new class extends Component {
    public int $count = 0;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }
};
?>

<div style="text-align: center; padding: 40px; background: #222; color: white; min-height: 100vh;">
    <h2>Livewire Interactive Counter</h2>
    <p>Count: {{ $count }}</p>
    <button wire:click="increment" style="padding: 10px; margin: 5px; cursor: pointer;">+ Click Me!</button>
    <button wire:click="decrement" style="padding: 10px; margin: 5px; cursor: pointer;">− Decrease</button>
    <br><br>
    <a href="{{ url('/') }}" style="color: #F53003;">← Back to Home</a>
</div>