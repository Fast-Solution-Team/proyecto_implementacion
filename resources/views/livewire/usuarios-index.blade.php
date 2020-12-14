<div xmlns:wire="http://www.w3.org/1999/xhtml">

    <div class="flex flex-col">
        <!-- Stats Row Starts Here -->
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
            <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                        1000
                    </a>
                    <a href="#" class="no-underline text-white text-lg">
                        Total
                    </a>
                </div>
            </div>

            <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                        1
                    </a>
                    <a href="#" class="no-underline text-white text-lg">
                        Retiros Realizados
                    </a>
                </div>
            </div>



        </div>
        <!-- /Stats Row Ends Here -->

        <!-- Card Sextion Starts Here -->
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

            <!-- card -->

            <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">

                <div class="px-6 py-2 border-b border-light-grey">

                    <div class="font-bold text-xl">Retiros</div>
                </div>
                <!-- component -->
                <div class="relative text-gray-600">
                    <input type="search" wire:model="search" placeholder="Buscar" class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                    <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
      <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
    </svg>
                    </button>
                </div>
                <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                    Full Table
                </div>
                <div class="p-3">
                    <table class="table-responsive w-full rounded">
                        <thead>
                        <tr>
                            <th class="border w-1/4 px-4 py-2">Student Name</th>
                            <th class="border w-1/6 px-4 py-2">City</th>
                            <th class="border w-1/6 px-4 py-2">Course</th>
                            <th class="border w-1/6 px-4 py-2">Fee</th>
                            <th class="border w-1/7 px-4 py-2">Status</th>
                            <th class="border w-1/5 px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="border px-4 py-2">Micheal Clarke</td>
                            <td class="border px-4 py-2">Sydney</td>
                            <td class="border px-4 py-2">MS</td>
                            <td class="border px-4 py-2">900 $</td>
                            <td class="border px-4 py-2">
                                <i class="fas fa-check text-green-500 mx-2"></i>
                            </td>
                            <td class="border px-4 py-2">
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-eye"></i></a>
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-edit"></i></a>
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Rickey Ponting</td>
                            <td class="border px-4 py-2">Sydney</td>
                            <td class="border px-4 py-2">MS</td>
                            <td class="border px-4 py-2">300 $</td>
                            <td class="border px-4 py-2">
                                <i class="fas fa-times text-red-500 mx-2"></i>
                            </td>
                            <td class="border px-4 py-2">
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-eye"></i></a>
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-edit"></i></a>
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Micheal Clarke</td>
                            <td class="border px-4 py-2">Sydney</td>
                            <td class="border px-4 py-2">MS</td>
                            <td class="border px-4 py-2">900 $</td>
                            <td class="border px-4 py-2">
                                <i class="fas fa-check text-green-500 mx-2"></i>
                            </td>
                            <td class="border px-4 py-2">
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-eye"></i></a>
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-edit"></i></a>
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Micheal Clarke</td>
                            <td class="border px-4 py-2">Sydney</td>
                            <td class="border px-4 py-2">MS</td>
                            <td class="border px-4 py-2">900 $</td>
                            <td class="border px-4 py-2">
                                <i class="fas fa-check text-green-500 mx-2"></i>
                            </td>
                            <td class="border px-4 py-2">
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-eye"></i></a>
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-edit"></i></a>
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Micheal Clarke</td>
                            <td class="border px-4 py-2">Sydney</td>
                            <td class="border px-4 py-2">MS</td>
                            <td class="border px-4 py-2">900 $</td>
                            <td class="border px-4 py-2">
                                <i class="fas fa-check text-green-500 mx-2"></i>
                            </td>
                            <td class="border px-4 py-2">
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-eye"></i></a>
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                    <i class="fas fa-edit"></i></a>
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            </div>
            <!-- /card -->

        </div>
        <!-- /Cards Section Ends Here -->

        <!-- Progress Bar -->
        <!--Profile Tabs-->
        <!--/Profile Tabs-->
    </div>
</div>
