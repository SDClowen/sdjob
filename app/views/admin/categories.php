<div class="w-full max-w-screen-xl mb-5">
    <!-- Start coding here -->
    <div class="relative overflow-hidden border-b">
        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
            <div>
                <h5 class="mr-3 font-semibold dark:text-white">Kategoriler</h5>
                <p class="text-gray-500 dark:text-gray-400">Sitenizdeki Kategorileri Yönetin</p>
            </div>
            <a href="/admin/add-category" live="true" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg hover:shadow-md transition-colors duration-200 bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                </svg>
                Kategori Oluştur
            </a>
        </div>
    </div>
</div>

<div class="relative overflow-x-auto">

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3" width="50%">
                    İsim
                </th>
                <th scope="col" class="px-6 py-3" width="25%">
                    Üst Başlık
                </th>
                <th scope="col" class="px-6 py-3" width="25%">
                    İşlem
                </th>
            </tr>
        </thead>
        <tbody id="sortlist">
            <tr n:foreach="$categories as $v" id="category-{$v->id}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {$v->title}
                </th>
                <td class="px-6 py-4">
                    {empty($v->parentTitle) ? "<span class='text-gray-600'>Yok</span>" : $v->parentTitle|noescape}
                </td>
                <td class="px-6 py-4">
                    <a href="/admin/update-category/{$v->id}" live="true" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Düzenle</a>
                    <a href="#" data-url="/admin/delete-category/{$v->id}" data-remove="#category-{$v->id}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Sil</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<script>
    slist(document.getElementById("sortlist"));
</script>