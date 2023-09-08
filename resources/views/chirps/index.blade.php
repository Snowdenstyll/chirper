<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('chirps.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="chirp_submit" class="form-label">What's on your mind?</label>
                    <textarea class="form-control" id="chirp_submit" name="message" rows="3">{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-3">{{ __('Chirp') }}</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @foreach ($chirps as $chirp)
                <div class="card my-4">
                    <div class="card-body">
                        <h5 class="card-title">{{$chirp->user->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            {{ $chirp->created_at->format('j M Y, g:i a') }}
                            @unless ($chirp->created_at->eq($chirp->updated_at))
                                &middot; {{ __('edited') }}
                            @endunless
                            <span class="float-end">
                                @if ($chirp->user->is(auth()->user()))
                                <div class="dropdown">
                                    <div role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        &middot;&middot;&middot;
                                    </div>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('chirps.edit', $chirp)}}">{{ __('Edit') }}</a></li>
                                        <form method="POST" action="{{ route('chirps.destroy', $chirp) }}">
                                            @csrf
                                            @method('delete')
                                            <li><a class="dropdown-item" href="{{route('chirps.destroy', $chirp)}}" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Delete') }}</a></li>
                                        </form>
                                    </ul>
                                  </div>
                                @endif
                            </span>
                        </h6>
                        <p class="card-text">{{$chirp->message}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>