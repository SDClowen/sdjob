<div class="w-full md:mt-0 sm:max-w-md xl:p-0 my-12 mx-auto mb-12">
    <form class="space-y-4 md:space-y-6" action="/forgot-password" method="post" data-content=".message" role="form">
        <div class="message"></div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">E-Posta</label>
            <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
        </div>
        {csrf()|noescape}
        <button type="submit" class="mb-6 w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Gönder</button>
    </form>
</div>