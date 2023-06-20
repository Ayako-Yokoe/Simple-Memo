<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        {{-- Create New Message --}}
        <div>
            <form method="POST" action="/memos/store">
                @csrf
                <label for="newMemo">New Memo</label><br>
                <input id="newMemo" type="text" name="memo" />
                <button type="submit">Add</button>

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
        </div>
    </div>

    <hr/>

    {{-- List Table --}}
    <div>
        <h2>List of Memos</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Memo Contents</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memos as $memo)
                    <tr>
                        <td>{{$memo->id}}</td>
                        <td>{{$memo->memo}}</td>

                        {{-- Change the display of dates --}}
                        <td>{{$memo->created_at->format('Y.m.d')}}</td>
                        <td>{{$memo->updated_at->format('Y.m.d')}}</td>
                        <td>
                            <div>
                                <a href="/memos/{{$memo->id}}/edit">
                                    Edit
                                </a>
                                <form method="POST" action="/memos/{{$memo->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>