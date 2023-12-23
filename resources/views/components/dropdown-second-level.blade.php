<div x-data="{ subMenuOpen1: false }" class="relative text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out flex">
  <button @click="subMenuOpen1 = !subMenuOpen1" class="flex items-center justify-between w-full">
    <div class="w-full h-9 flex justify-center items-center text-center">
      {{ $trigger }}
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" data-slot="icon" class="w-4 h-full">
      <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z" clip-rule="evenodd" />
    </svg>
  </button>
  <div x-show="subMenuOpen1" @click.away="subMenuOpen1 = false" class="flex flex-col absolute -top-3 left-[9.5rem] min-w-[10rem]">
    <div class="flex flex-col dark:bg-gray-900 p-3 rounded-md gap-2 text-center">
      {{ $content }}
    </div>
  </div>
</div>