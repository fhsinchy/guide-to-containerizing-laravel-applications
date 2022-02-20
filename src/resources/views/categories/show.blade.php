<x-site-layout>
    @if($questions)
    <div class="row columns is-multiline">
    @foreach ($questions as $question)
    <div class="column is-4">
        <div class="card">
            <div class="card-content">
                <div class="media">
                <div class="media-content">
                    <p class="title is-4"><a href="{{ route('questions.show', $question) }}">{{ $question->title }}</a></p>
                    <p class="subtitle is-6"><a href="{{ route('questions.index') . '?user=' . $question->user->id }}">{{ $question->user->name }}</a></p>
                </div>
                </div>

                <div class="content">
                <span>Asked {{ $question->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
    @else
    <div class="notification is-info">
        no questions found on database!
    </div>
    @endif
</x-site-layout>
