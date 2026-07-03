<?php

use Livewire\Component;

new class extends Component {
    public int $count = 0;

    public function mount()
    {
        if (!session('demo_logged_in')) {
            return redirect('/login');
        }
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function resetCount()
    {
        $this->count = 0;
    }
};
?>

<div style="min-height:100vh; margin:0; font-family:'Consolas','Courier New',ui-sans-serif,monospace; background:radial-gradient(circle at top right, #1a1108 0%, #0a0a0a 60%); color:#e8e6e3; display:flex; align-items:center; justify-content:center; position:relative;">

    <div style="position:relative; z-index:1; background:#141414; border:1px solid #2a2a2a; border-radius:14px; padding:56px; width:100%; max-width:420px; box-sizing:border-box; box-shadow:0 0 30px rgba(255,111,0,0.15); text-align:center;">

        <div style="display:inline-block; padding:4px 12px; border:1px solid #FF6F00; border-radius:20px; color:#FF6F00; font-size:11px; letter-spacing:2px; text-transform:uppercase; margin-bottom:24px;">
            Livewire Demo
        </div>

        <h1 style="font-size:24px; color:#fff; margin:0 0 8px 0; font-weight:700;">Interactive Counter</h1>
       <p style="color:#8a8a8a; font-size:13px; margin:0 0 32px 0;">Click the buttons to see it in action</p>

        <div style="font-size:64px; font-weight:800; color:#FF6F00; text-shadow:0 0 30px rgba(255,111,0,0.5); margin-bottom:8px; opacity:1;" wire:loading.class="opacity-loading">
            {{ $count }}
        </div>

        <div style="height:16px; margin-bottom:24px; color:#FF6F00; font-size:11px; letter-spacing:1px; opacity:0.7;">
            <span wire:loading>updating...</span>
        </div>

        <div style="display:flex; gap:10px; justify-content:center; margin-bottom:16px;">
            <button wire:click="decrement" wire:loading.attr="disabled" style="padding:12px 20px; background:transparent; border:1px solid #3a3a3a; color:#e8e6e3; border-radius:6px; font-family:inherit; font-size:15px; font-weight:700; cursor:pointer;">− Decrease</button>
            <button wire:click="increment" wire:loading.attr="disabled" style="padding:12px 20px; background:#FF6F00; border:none; color:#0a0a0a; border-radius:6px; font-family:inherit; font-size:15px; font-weight:700; cursor:pointer;">+ Click Me!</button>
        </div>

        <button wire:click="resetCount" wire:loading.attr="disabled" style="padding:8px 20px; background:transparent; border:none; color:#8a8a8a; font-family:inherit; font-size:12px; cursor:pointer; text-decoration:underline; margin-bottom:24px;">Reset to 0</button>

        <br>
        <a href="{{ url('/') }}" style="color:#8a8a8a; text-decoration:none; font-size:13px;">← Back to Home</a>
    </div>

</div>