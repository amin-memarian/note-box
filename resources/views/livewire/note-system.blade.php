
<div>
    <div class="row">

        {{-- create section --}}
        <div class="col-12 d-flex justify-content-center">
            <div class="col-7 mb-4">
                <div class="mb-3">
                    <input type="text" wire:model="title" class="form-control" placeholder="title ...">
                </div>
                <div class="mb-3">
                    <textarea wire:model="content" class="form-control" rows="3" placeholder="content ..."></textarea>
                </div>
                <div class="text-center">
                    <button wire:click="addNote" class="btn btn-secondary px-5 py-1">Add</button>
                </div>
            </div>
        </div>

        <hr>

        {{-- note cards --}}
        <div class="col-12 mt-3">
            <div class="row">
                @foreach($notes as $note)
                    <div class="col-12 col-md-3 col-lg-3 mb-4">
                        <div class="card p-3 h-100" wire:click="editNote({{ $note->id }})" style="cursor: pointer;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $note->title }}</h5>
                                <p class="card-text mt-3">{{ $note->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    {{--  modal cards  --}}
    @if($isModalOpen)
        <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>
                        <button type="button" class="btn-close" wire:click="$set('isModalOpen', false)" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" wire:model="editTitle" class="form-control border-0" placeholder="title">
                        </div>
                        <div class="mb-3">
                            <textarea wire:model="editContent" class="form-control border-0" rows="3" placeholder="content"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-start gap-2">
                        <button type="button" class="btn btn-secondary" wire:click="updateNote" title="Save">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger" wire:click="deleteNote({{ $editNoteId }})" title="Delete">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
