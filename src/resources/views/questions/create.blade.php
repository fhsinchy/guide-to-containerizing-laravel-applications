<x-site-layout>
<form action="{{ route('questions.store') }}" method="post">
    @csrf
    <div class="field">
        <label class="label">Title</label>
        <div class="control">
            <input name="title" class="input" type="text" placeholder="What is foo?" required autofocus>
        </div>
    </div>

    <div class="field">
        <label class="label">Category</label>
        <div class="control">
            <div class="select">
            <select name="category" required>
                <option value="" selected disabled>Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            </div>
        </div>
    </div>

    <div class="field">
        <label class="label">Question</label>
        <div class="control">
            <textarea name="body" class="textarea" placeholder="I've been readiong about foo and bar these days but I'm confused about the concept of foo. Can anyone help?" style="resize: none" required></textarea>
        </div>
    </div>

    <div class="field is-grouped">
        <div class="control">
            <button type="submit" class="button is-link">Submit</button>
        </div>
        <div class="control">
            <button class="button is-link is-light">Cancel</button>
        </div>
    </div>
</form>
</x-site-layout>
