
<x-layout>
    <h2>No{{$memo->id}} Edit Memo</h2>
    <p>Memo Contents</p>

    <form method="POST" action="/memos/{{$memo->id}}/edit">
        @csrf
        @method('PUT')

        <input type="text" name="memo" value="{{$memo->memo}}" />

        <div>
            <button type="button"><a href="/memos">Back</a></button>
            <button type="submit">Edit</button>
        </div>

        @error('memo')
            @if ($message === 'This memo field is required.')
                <p>This field is required.</p>
            @elseif($message === 'The memo should not exceed 100 characters.')
                <p>The memo should not exceed 100 characters.</p>
            @else
                <p>{{$message}}</p>
            @endif
        @enderror
    </form>
</x-layout>
