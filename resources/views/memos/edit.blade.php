<x-layout>
    <div class="w-2/5 mx-auto mt-14 mb-14">
        <h2 class="text-center">No{{$memo->id}} メモ編集</h2>
        <p class="mt-10 mb-8">メモ内容</p>

        <form method="POST" action="/memos/{{$memo->id}}/edit">
            @csrf
            @method('PUT')

            <input 
                type="text" 
                name="memo" 
                value="{{$memo->memo}}" 
                class="border border-gray-300 rounded p-1 pl-2 w-full"
            />

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

            <div class="flex justify-between mt-8">
                <button type="button">
                    <a href="/memos">
                        <span class="bg-green-700 text-white rounded px-3 py-1 hover:text-green-700 hover:bg-white border-2 border-green-700">
                            戻る
                        </span>
                    </a>
                </button>
                <button type="submit" class="bg-blue-700 text-white rounded px-3 py-1 hover:text-blue-700 hover:bg-white border-2 border-blue-700">
                    修正
                </button>
            </div>

        </form>
    </div>
</x-layout>
