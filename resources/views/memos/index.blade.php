<x-layout>
    <div class="w-10/12 mx-auto">

        {{-- Create New Message --}}
        <div class="mt-8 mb-8">
            <form method="POST" action="/memos/store">
                @csrf
                
                <label for="memo">新規登録</label><br>
                <input 
                    type="text" 
                    name="memo" 
                    class="border border-gray-300 rounded mt-2 p-1 pl-2" 
                />
                <button type="submit" class="bg-blue-700 text-white rounded px-3 py-1 hover:text-blue-700 hover:bg-white border-2 border-blue-700">
                    登録
                </button>

                @error('memo')
                    @if($message === 'The memo should not exceed 100 characters.')
                        <p class="text-red-500 text-xs mt-1">
                            １００字以内となります
                        </p>
                    @else
                        <p class="text-red-500 text-xs mt-1">
                            必須項目になります
                        </p>
                    @endif
                @enderror
            </form>
        </div>

        <hr class="border-t-2 border-gray-300"/>

        {{-- List Table --}}
        <div class="mt-8 mb-8">
            <h2 class="mt-4 mb-4 ml-10">
                メモ一覧
            </h2>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="text-left">No</th>
                        <th class="text-left">メモ内容</th>
                        <th class="text-left">作成日時</th>
                        <th class="text-left">更新日時</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($memos as $memo)
                        <tr class="border-t-2">
                            <td>{{$memo->id}}</td>
                            <td>{{$memo->memo}}</td>
                            <td>{{$memo->created_at->format('Y.m.d')}}</td>
                            <td>{{$memo->updated_at->format('Y.m.d')}}</td>
                            <td> 
                                <a href="/memos/{{$memo->id}}/edit">                           
                                    <span class="bg-green-700 text-white rounded px-3 py-1 hover:text-green-700 hover:bg-white border-2 border-green-700">
                                        編集
                                    </span>
                                </a>
                            </td>
                            <td>
                                <form method="POST" action="/memos/{{$memo->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="bg-red-700 text-white rounded px-3 py-1 hover:text-red-700 hover:bg-white border-2 border-red-700"
                                        onclick="return confirm('本当に削除してもよろしいですか？')"
                                    >
                                    削除
                                    </button>
                                </form>     
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
