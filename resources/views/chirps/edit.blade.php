<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('chirps.update', $chirp) }}">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <textarea class="form-control" id="chirp_submit" name="message" rows="3">{{ old('message', $chirp->message) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-3">{{ __('Save') }}</button>
                <a href="{{route('chirps.index')}}" class="btn btn-danger mb-3">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</x-app-layout>

