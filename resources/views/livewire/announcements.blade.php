{{--Created by Jasmína Csalova--}}

<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    @if(auth()->user()->is_admin != 0)
        @if($updateMode)
            @include('livewire.update')
        @else
            @include('livewire.create')
        @endif
    @endif
  
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                @if(auth()->user()->is_admin != 0)
                    <th width="150px">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($announcements as $announcement)
            <tr>
                <td>{{ $announcement->title }}</td>
                <td>{{ $announcement->body }}</td>
                @if(auth()->user()->is_admin != 0)
                    <td>
                        <button wire:click="edit({{ $announcement->id }})" class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click="delete({{ $announcement->id }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

