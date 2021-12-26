<div id = "post_form_{{ $post -> id }}" class = "hidden w-full">
    <form action="" class = "w-full flex flex-col justify-center items-center" name = "post_edit_{{ $post -> id }}">
        @csrf
        <input type="hidden" name="id" value = {{ $post -> id }}>
        <input type="text" name="title" id="title" class = "my-2 bg-fgAlt py-2 px-3 block text-bg shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline" value = "{{ $post -> title }}">
        <select name="category" id="category" class = "my-2 bg-fgAlt py-2 px-3 block text-bg shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline" placeholder = "category">
            @foreach ($categories as $category)
                <option value = "{{ $category -> id }}"
                    @if ($category -> id == $post -> category -> id)
                        selected
                    @endif
                    > {{ $category -> name }} </option>
            @endforeach
        </select>
        <textarea name="description" id="" cols="30" rows="5" placeholder = "Description" class = "resize-none my-2 bg-fgAlt py-2 px-3 block text-bg shadow appearance-none rounded w-full leading-tight focus:outline-none focus:shadow-outline">{{ $post -> description }}</textarea>

        <div class = "w-full flex flex-row justify-end items-center">
            <a onclick="cancel_post_update('{{ $post -> id }}')" class = "shadow rounded py-2 px-3 leading-tight bg-red cursor-pointer text-fg transition ease-in-out m-1">Cancel</a>
            <a onclick="save_post_update('{{ $post -> id }}')" class = "shadow rounded py-2 px-3 leading-tight bg-bgButton cursor-pointer hover:bg-fg text-fgBlack transition ease-in-out m-1">Save</a>
        </div>
    </form>
</div>
