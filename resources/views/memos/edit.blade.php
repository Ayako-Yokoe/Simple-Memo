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
        <h2>No{{$memo->id}} Edit Memo</h2>
        <p>Memo Contents</p>

        <form method="POST" action="/memos/{{$memo->id}}/edit">
        @csrf
        @method('PUT')

        <input type="text" name="memo" value={{$memo->memo}} />

        <div>
            <button type="button"><a href="/memos">Back</a></button>
            <button type="submit">Edit</button>
        </div>
        </form>


    </div>
</body>
</html>