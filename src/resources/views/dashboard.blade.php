<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Looking for answers traveller? <a href="{{ route('questions.create') }}">Ask</a> 😉
                </div>
            </div>
        </div>
        @forelse (auth()->user()->questions as $question)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        <li>
                            <strong>Question: </strong><a href="{{ route('questions.show', $question) }}" target="_blank" rel="noopener noreferrer">{{ $question->title }}</a>
                        </li>
                        <li>
                            <strong>Answers: </strong>{{ $question->answers->count() }} in total.
                        </li>
                        <li>
                            <strong>Asked: </strong>{{ $question->created_at->diffForHumans() }}.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @empty
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You haven't asked any questions yet.
                </div>
            </div>
        </div>
        @endforelse
    </div>
</x-app-layout>
