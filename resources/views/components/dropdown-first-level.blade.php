<div x-data="{ open: false }" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out relative">
  <button @click="open = !open" class="flex items-center justify-between w-full h-full text-center">
    {{ $trigger }}
  </button>
  <div x-show="open" @click.away="open = false" class="absolute top-[4rem] left-0 min-w-[10rem] py-2 px-2 dark:bg-gray-900 rounded-es-md rounded-ee-md flex flex-col gap-2 text-center">
    {{ $content }}
  </div>
</div>