<div style="background-color: #002559; font-family: Poppins" class="relative mb-12">
    <div class="bg-center bg-no-repeat bg-cover opacity-50 h-96" style="background-image: url(/public/jumbotron.jpg)">
    </div>
    <div class="flex items-center justify-start absolute w-full h-full left-0 top-0">
        <div class="ms-24">
            <span class="text-white text-[50px] font-semibold block">Giriş Yap</span>
        </div>
    </div>
</div>
<div class="w-full md:mt-0 sm:max-w-md xl:p-0 my-12 mx-auto mb-12">
    <form class="space-y-4 md:space-y-6" action="/auth" method="post" data-content=".message" role="form">
        <div class="message"></div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Telefon No / E-mail *</label>
            <input type="text" name="phoneOrEmail" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-700 dark:text-white">Şifre *</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-start">
                <div class="flex items-center h-5">
                    <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-red-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-red-600 dark:ring-offset-gray-800">
                </div>
                <div class="ml-3">
                    <label for="remember" class="text-gray-600 dark:text-gray-300">Beni Hatırla</label>
                </div>
            </div>
        </div>
        {csrf()|noescape}
        <button type="submit" class="mb-6 w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Giriş Yap</button>
        <a href="/forgot-password" live="true" class="text-gray-600 dark:text-gray-300 hover:underline block text-center">Şifrenizi mi unuttunuz?</a>
    </form>
</div>