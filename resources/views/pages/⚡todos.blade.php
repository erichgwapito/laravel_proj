<?php

use Livewire\Component;

new class extends Component {
    public array $todos = [];
    public string $newTodo = '';

    public function mount()
    {
        if (!session('demo_logged_in')) {
            return redirect('/login');
        }
    }

public string $newDeadline = '';

    public function addTodo()
    {
        if (trim($this->newTodo) === '') {
            return;
        }

        $this->todos[] = [
            'id' => uniqid(),
            'text' => $this->newTodo,
            'done' => false,
            'deadline' => $this->newDeadline,
        ];

        $this->newTodo = '';
        $this->newDeadline = '';
    }

    public function toggleTodo($id)
    {
        foreach ($this->todos as $i => $todo) {
            if ($todo['id'] === $id) {
                $this->todos[$i]['done'] = !$todo['done'];
            }
        }
    }

    public function deleteTodo($id)
    {
        $this->todos = array_values(array_filter($this->todos, fn($todo) => $todo['id'] !== $id));
    }
};
?>

<div style="min-height:100vh; margin:0; font-family:'Consolas','Courier New',ui-sans-serif,monospace; background:radial-gradient(circle at top right, #1a1108 0%, #0a0a0a 60%); color:#e8e6e3; display:flex; align-items:center; justify-content:center; position:relative;">

    <div style="position:relative; z-index:1; background:#141414; border:1px solid #2a2a2a; border-radius:14px; padding:56px; width:100%; max-width:460px; box-sizing:border-box; box-shadow:0 0 30px rgba(255,111,0,0.15); text-align:center;">

        <div style="display:inline-block; padding:4px 12px; border:1px solid #FF6F00; border-radius:20px; color:#FF6F00; font-size:11px; letter-spacing:2px; text-transform:uppercase; margin-bottom:24px;">
            Livewire Demo
        </div>

        <h1 style="font-size:24px; color:#fff; margin:0 0 8px 0; font-weight:700;">To-Do List</h1>
        <p style="color:#8a8a8a; font-size:13px; margin:0 0 28px 0;">Add, complete, and remove tasks in real time</p>

<form wire:submit.prevent="addTodo" style="margin-bottom:24px; text-align:left;">
            <input type="text" wire:model="newTodo" placeholder="Add a new task..." style="width:100%; padding:10px 12px; background:#0a0a0a; border:1px solid #2a2a2a; border-radius:6px; color:#e8e6e3; font-family:inherit; font-size:14px; box-sizing:border-box; margin-bottom:8px;">

            <label style="display:block; color:#8a8a8a; font-size:11px; margin-bottom:6px;">Deadline (optional)</label>
            <div style="display:flex; gap:8px;">
                <input type="datetime-local" wire:model="newDeadline" style="flex:1; padding:9px 12px; background:#0a0a0a; border:1px solid #2a2a2a; border-radius:6px; color:#e8e6e3; font-family:inherit; font-size:13px; box-sizing:border-box; color-scheme:dark;">
                <button type="submit" style="padding:9px 20px; background:#FF6F00; border:none; color:#0a0a0a; border-radius:6px; font-family:inherit; font-size:14px; font-weight:700; cursor:pointer;">Add</button>
            </div>
        </form>

<div style="text-align:left;">
            @forelse ($todos as $todo)
                <div style="display:flex; align-items:flex-start; gap:10px; padding:10px 0; border-bottom:1px solid #262626;">
                    <span wire:click="toggleTodo('{{ $todo['id'] }}')" style="cursor:pointer; font-size:18px; color:{{ $todo['done'] ? '#FF6F00' : '#3a3a3a' }}; padding-top:2px;">
                        {{ $todo['done'] ? '☑' : '☐' }}
                    </span>
                    <div style="flex:1;">
                        <div style="font-size:14px; color:{{ $todo['done'] ? '#5a5a5a' : '#e8e6e3' }}; text-decoration:{{ $todo['done'] ? 'line-through' : 'none' }};">
                            {{ $todo['text'] }}
                        </div>
                        @if (!empty($todo['deadline']))
                            <div style="font-size:11px; color:#FF6F00; margin-top:2px;">
                                📅 {{ \Carbon\Carbon::parse($todo['deadline'])->format('M d, Y g:i A') }}
                            </div>
                        @endif
                    </div>
                    <span wire:click="deleteTodo('{{ $todo['id'] }}')" style="cursor:pointer; color:#8a8a8a; font-size:13px; padding-top:2px;">✕</span>
                </div>
            @empty
                <p style="color:#5a5a5a; font-size:13px; text-align:center; padding:20px 0;">No tasks yet. Add one above.</p>
            @endforelse
        </div>

        <div style="margin-top:24px;">
            <a href="{{ url('/') }}" style="color:#8a8a8a; text-decoration:none; font-size:13px;">← Back to Home</a>
        </div>
    </div>

</div>