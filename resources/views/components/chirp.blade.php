
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
                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y&s=40"
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

                <p class="mt-1">
                    {{ $chirp->message }}
                </p>
            </div>
        </div>
    </div>
</div>