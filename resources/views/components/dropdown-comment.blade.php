<div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false" class="fixed bottom-10 right-0 w-full">
    <div @click="open = ! open" class="fixed right-10 bottom-10">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="bg-blue-300 p-3 absolute z-50 mt-2 w-full md:w-1/2 mx-auto rounded-md shadow-lg origin-top-right bottom-20 right-0 md:right-20"
            style="display: none;"
    >
        <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
            {{ $content }}
        </div>
    </div>
</div>
