<div class="w-full max-w-screen-xl mb-5">
    <div class="relative overflow-hidden border-b">
        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
            <div>
                <h5 class="mr-3 font-semibold dark:text-white">Kullanıcı Ayarları</h5>
                <p class="text-gray-500 dark:text-gray-400">Ayarlar</p>
            </div>
        </div>
    </div>
</div>

<form class="max-w-sm mx-auto" method="post" action="/admin/user-settings" role="form" data-content=".message">
    <div class="message mb-5"></div>
    <div class="mb-5">
        <label for="email" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">E-Posta</label>
        <input value="{$user->email}" name="email" type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@flowbite.com" required>
    </div>
    <div class="mb-5">
        <label for="password" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Şifreniz</label>
        <input type="password" id="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
    </div>
    <div class="mb-5">
        <label for="new-password" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Yeni Şifre</label>
        <input type="password" name="newPassword" id="new-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
    </div>
    <div class="mb-5">
        <label for="repeat-password" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Yeni Şifre Onayı</label>
        <input type="password" name="repeatPassword" id="repeat-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kaydet</button>
</form>