<div x-data="{ open: false }">
    <button class="bg-green-500 text-white px-4 py-1 rounded-md focus:outline-none" @click="open = true">Tambah Planning</button>
    <form wire:submit.prevent="store">
        <div x-show="open" class="fixed inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="z-index: 9999">
            <div class="flex items-center justify-center min-h-screen text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-25 backdrop-filter backdrop-blur-sm transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div @click.away="open = false" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div class="mx-auto max-w-sm text-center flex flex-wrap justify-center">
                                <div class="flex items-center mr-4 mb-4">
                                    <input wire:model="status" id="radio1" type="radio" name="status" value="hadir" class="hidden" checked />
                                    <label for="radio1" class="flex items-center cursor-pointer">
                                        <span class="w-4 h-4 inline-block mr-1 rounded-full border border-grey"></span>
                                        Hadir
                                    </label>
                                </div>

                                <div class="flex items-center mr-4 mb-4">
                                    <input wire:model="status" id="radio2" type="radio" name="status" value="izin" class="hidden" />
                                    <label for="radio2" class="flex items-center cursor-pointer">
                                        <span class="w-4 h-4 inline-block mr-1 rounded-full border border-grey"></span>
                                        Izin
                                    </label>
                                </div>

                                <div class="flex items-center mr-4 mb-4">
                                    <input wire:model="status" id="radio3" type="radio" name="status" value="sakit" class="hidden" />
                                    <label for="radio3" class="flex items-center cursor-pointer">
                                        <span class="w-4 h-4 inline-block mr-1 rounded-full border border-grey"></span>
                                        Sakit
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" wire:loading.attr="disabled" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Tambah
                        </button>
                        <button @click="open = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Batal
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
