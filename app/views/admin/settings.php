<div class="w-full max-w-screen-xl mb-5">
    <!-- Start coding here -->
    <div class="relative overflow-hidden border-b">
        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
            <div>
                <h5 class="mr-3 font-semibold dark:text-white">Site Ayarları</h5>
                <p class="text-gray-500 dark:text-gray-400">Ayarlar</p>
            </div>
        </div>
    </div>
</div>

<form class="max-w-sm mx-auto" method="post" action="/admin/settings" role="form" data-content=".message">
    <div class="message mb-5"></div>
    <div class="mb-5">
        <label for="title" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Site Başlığı</label>
        <input value="{$config->title}" type="text" id="title" name="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
    </div>
    <div class="mb-5">
        <label for="keywords" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Site Anahtar Kelimeleri</label>
        <input value="{$config->keywords}" type="keywords" name="keywords" id="keywords" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
    </div>
    <div class="mb-5">
        <label for="description" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Site Açıklaması</label>
        <textarea id="description" name="description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>{$config->description}</textarea>
    </div>
    <div class="mb-5 pt-5 border-t border-gray-300 dark:border-gray-600">

        <label class="relative inline-flex items-center cursor-pointer">
            <input name="accountActivation" type="checkbox" value="" class="sr-only peer">
            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
            <span class="ms-3  text-gray-900 dark:text-gray-300">Kayıt olduktan sonra hesap onaylama işlemi</span>
        </label>

    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kaydet</button>
</form>