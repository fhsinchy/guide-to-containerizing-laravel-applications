<x-site-layout>
    <div class="columns">
        <div class="column">
            @if($question)
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-content">
                            <p class="title is-4">{{ $question->title }}</p>
                            <p class="subtitle is-6">{{ $question->user->name }}</p>
                        </div>
                    </div>

                    <div class="content">
                    <p>{{ $question->body }}</p>
                    <span>Asked {{ $question->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="columns">
        <div class="column">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-content">
                            <p class="title is-4">Post an Answer</p>
                        </div>
                    </div>

                    <div class="content">
                        <form action="{{ route('answers.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="question" value="{{ $question->id }}">
                            <div class="field">
                                <label class="label">Name</label>
                                <div class="control">
                                    <input name="name" class="input" type="text" placeholder="e.g John Doe" required>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control">
                                    <input name="email" class="input" type="email" placeholder="e.g. johndoe@acme.com" required>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Answer</label>
                                <textarea name="body" class="textarea" cols="30" rows="10" style="resize: none" placeholder="Here's what I think ..." required></textarea>
                            </div>

                            <div class="field is-grouped is-grouped-right">
                                <p class="control">
                                    <button type="submit" class="button is-primary">Submit</button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($question->answers)
    @foreach ($question->answers as $answer)
    <div class="columns">
        <div class="column">
            <div class="card">
                <div class="card-content">
                    <div class="media">
                        <div class="media-content">
                            <p class="title is-4">{{ $answer->name }}</p>
                            <p class="subtitle is-6">{{ $answer->email }}</p>
                        </div>
                    </div>

                    <div class="content">
                        <p>{{ $answer->body }}</p>
                        <span>Answered {{ $answer->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</x-site-layout>
