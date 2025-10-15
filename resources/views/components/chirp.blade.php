@props(['chirp'])

<div class="card bg-base-100 shadow">
    <div class="card-body">
        <div class="flex space-x-3">
            @if($chirp->user)
                <div class="avatar">
                    <div class="size-10 rounded-full">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($chirp->user->name) }}&background=random&size=40"
                        alt="{{ $chirp->user->name }}'s avatar"
                        class="rounded-full" />
                    </div>
                </div>
            @else
            <div class="avatar">
                <div class="size-10 rounded-full">
                    <img src="https://api.dicebear.com/7.x/bottts-neutral/svg?seed=Anonymous"
                        alt="Anonymous User"
                        class="rounded-full" />
                </div>
            </div>
            @endif
            <div class="min-w-0">
                <div class="flex items-center gap-1">
                    <span class="text-sm font-semibold">{{ $chirp->user ? $chirp->user->name : 'Anonymous' }}</span>
                    <span class="text-base-content/60">·</span>
                    <span class="text-sm text-base-content/60">{{ $chirp->created_at->diffForHumans() }}</span>
                </div>
                
                <div class="flex gap-1">
                        <a href="/chirps/{{ $chirp->id }}/edit" class="btn btn-ghost btn-xs">
                            Edit
                        </a>
                        <form method="POST" action="/chirps/{{ $chirp->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this chirp?')"
                                class="btn btn-ghost btn-xs text-error">
                                Delete
                            </button>
                        </form>
                    </div>

                <p class="mt-1">
                    {{ $chirp->message }}
                </p>
            </div>
        </div>
    </div>
</div> 