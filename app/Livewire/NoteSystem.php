<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;

class NoteSystem extends Component
{
    public $notes;
    public $title;
    public $content;
    public $editTitle;
    public $editContent;
    public $isModalOpen = false;
    public $editNoteId;

    public function mount()
    {
        $this->loadNotes();
    }

    public function loadNotes()
    {
        $this->notes = Note::all();
    }

    public function addNote()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Note::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->title = '';
        $this->content = '';
        $this->loadNotes();
    }

    public function editNote($id)
    {
        $note = Note::find($id);
        if ($note) {
            $this->editNoteId = $note->id;
            $this->editTitle = $note->title;
            $this->editContent = $note->content;
            $this->isModalOpen = true;
        }
    }

    public function updateNote()
    {
        $this->validate([
            'editTitle' => 'required|string|max:255',
            'editContent' => 'required|string',
        ]);

        $note = Note::find($this->editNoteId);
        if ($note) {
            $note->title = $this->editTitle;
            $note->content = $this->editContent;
            $note->save();
        }

        $this->isModalOpen = false;
        $this->loadNotes();
    }

    public function deleteNote($id = null)
    {
        if ($id) {
            Note::destroy($id);
        } else {
            Note::destroy($this->editNoteId);
        }

        $this->isModalOpen = false;
        $this->loadNotes();
    }

    public function render()
    {
        return view('livewire.note-system');
    }
}
