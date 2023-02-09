<?php

namespace App\Http\Livewire;

use App\Models\TodoItem;
use Livewire\Component;

class Todo extends Component
{
    public $items;
    public $todoText = "";


    public function mount()
    {
        $this->selectItems();
    }

    public function render()
    {
        return view('livewire.todo');
    }

    public function addItem()
    {

        $items = new TodoItem();
        $items->todo = $this->todoText;


        if ($items->todo == '') {
            return;
        }


        $items->completed = false;
        $items->save();

        $this->todoText = '';
        $this->selectItems();
    }

    public function toggleItem($id)
    {
        $items = TodoItem::where('id', $id)->first();
        if (!$items) {
            return;
        }
        $items->completed = !$items->completed;
        $items->save();

        $this->selectItems();
    }

    public function deleteItem($id)
    {
        $items = TodoItem::where('id', $id)->first();
        if (!$items) {
            return;
        }
        $items->delete();
        $this->selectItems();
    }

    public function selectItems()
    {
        $this->items = TodoItem::orderBy('created_at', 'DESC')->get();
    }
}
