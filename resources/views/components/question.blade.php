<div>
    <p class="mb-1 font-bold text-l flex gap-1 items-baseline font-mono">
        {{ $number }}: {{ $question->question }}
    </p>

    <!-- for each type: 3 types-->
    @foreach ($question->type as $type)
        @switch($type)
            @case('radio')
                <div class="grid max-w-3xl gap-2 px-3 py-2 bg-white rounded-md border-t-4 border-blue-400">
                    @foreach ($question->options as $option)
                        <label for="{{ $number }}" class="inline-flex items-center">
                            <input id="{{ $number }}" type="radio" value="{{ strtoupper($option) }}"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="{{ $number }}">
                            <span class="ml-2 text-sm text-gray-600">{{ CustomHelpers::mapToLabel($option) }}</span>
                        </label>
                    @endforeach
                </div>
                @break
            @case('checkbox')
                <div class="grid max-w-3xl gap-2 px-3 py-2 bg-white rounded-md border-t-4 border-blue-400">
                    @foreach ($question->options as $option)
                        <label for="{{ $number }}" class="inline-flex items-center">
                            <input id="{{ $number }}" type="checkbox" value="{{ strtoupper($option) }}"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="{{ $number }}">
                            <span class="ml-2 text-sm text-gray-600">{{ CustomHelpers::mapToLabel($option) }}</span>
                        </label>
                    @endforeach
                </div>
                @break

            @case('txt')
                <div
                    class="select-btn bg-white flex min-h-[60px] flex-col-reverse justify-center rounded-md border border-gray-300 px-3 py-2 mx-3 my-2 shadow-sm focus-within:shadow-inner">
                    <textarea type="textarea" name="{{ $number }}" id="{{ $number }}"
                        class="peer block w-full border-0 p-0 text-base text-gray-900 placeholder-gray-400 focus:ring-0">
                                    </textarea>
                </div>
                @break
        
            @case('img')
                <div>
                <input
                    class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-white bg-clip-padding px-3 py-1.5 mx-3 my-2 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out file:-mx-3 file:-my-1.5 file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-1.5 file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200 focus:border-primary focus:bg-white focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-primary focus:outline-none dark:bg-transparent dark:text-neutral-200 dark:focus:bg-transparent"
                    type="file" id="img-{{ $number }}">
                    <input type="hidden" name="image-url-{{ $number }}" id="image-url-{{ $number }}">
                </div>
                @break
        @endswitch
    @endforeach
    
</div>