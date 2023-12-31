<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="{\Core\Config::get()->keywords}"/>
    <meta name="description" content="{\Core\Config::get()->description}"/>
    <link rel="icon" href="/public/favicon.png" sizes="16x16 32x32" type="image/png">
    <title>{\Core\Config::get()->title." - ".$title}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="//unpkg.com/alpinejs"></script>

    {acss("app")|noescape}
    {njs("jquery/dist/jquery.min")|noescape}
    {njs("sdeasy/sdeasy")|noescape}
    {ajs("app")|noescape}
</head>

<body class="bg-gray-50 dark:bg-gray-900 dark:text-white font-display">
    <div class="min-h-full">
        <nav class="bg-white/50 font-body border-gray-200 shadow-md sticky top-0 z-20 backdrop-blur-xl dark:bg-gray-900">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
                <a href="/" live="true" class="flex items-center">
                    <img src="/public/logo.png" class="h-14 mr-3" />
                </a>
                <div class="flex items-center md:order-2">
                    {if session_check("user")}
                    <div class="dropdown">
                        <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown" class="inline-flex items-center text-gray-900 focus:ring-4 text-base font-medium rounded-lg px-7 py-3 mr-4 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-gray-800 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white">
                            Hesabım
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="mega-menu-dropdown" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="/account/detail" live="true" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hakkında</a>
                                </li>
                                {if session_get("user")->type == \App\Models\User::EMPLOYER}
                                <li>
                                    <a href="/account/jobs" live="true" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">İlanlar</a>
                                </li>
                                {/if}
                            </ul>
                        </div>
                    </div>
                    <a data-url="/logout" class="text-white focus:ring-4 text-base font-medium rounded-lg px-7 py-3 mr-4 bg-red-700 hover:bg-red-600 focus:outline-none focus:ring-red-800">Çıkış Yap</a>
                    {else}
                    <a href="/auth" live="true" class="text-white focus:ring-4 text-base font-medium rounded-lg px-7 py-3 mr-4 bg-red-700 hover:bg-red-600 focus:outline-none focus:ring-red-800">Giriş Yap</a>
                    <a href="/register" live="true" class="text-white focus:ring-4 text-base font-medium rounded-lg px-7 py-3 mr-2 bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-red-600">Üye Ol</a>
                    {/if}

                    <button data-collapse-toggle="mega-menu" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div id="mega-menu" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                    <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
                        <li>
                            <a href="/" live="true" class="py-2 pl-3 pr-4 text-md md:hover:text-red-600 md:p-0" aria-current="page">Anasayfa</a>
                        </li>
                        <li>
                            <a href="/jobs/feed" live="true" class="py-2 pl-3 pr-4 text-md md:hover:text-red-600 md:p-0" aria-current="page">İlanlar</a>
                        </li>
                        
                        <li n:foreach="$menu->nav as $page">
                            <a href="/page/{$page->slug}" live="true" class="py-2 pl-3 pr-4 text-md md:hover:text-red-600 md:p-0" aria-current="page">{$page->title}</a>
                        </li>
                        
                        <li>
                            <a href="/contact" live="true" class="py-2 pl-3 pr-4 text-md md:hover:text-red-600 md:p-0" aria-current="page">İletişim</a>
                        </li>

                        <li class="dropdown" n:foreach="$menu->nav2 as $k => $v">
                            <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown" class="flex items-center justify-between w-fit py-2 pl-3 pr-4 font-medium text-md text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-red-600 md:p-0 dark:text-white md:dark:hover:text-red-500 dark:hover:bg-gray-700 dark:hover:text-red-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                {$k} <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <div id="mega-menu-dropdown" class="absolute z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow min-w-fit w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                    <li n:foreach="$v as $p">
                                        <a href="/page/{$p->slug}" live="true" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{html_entity_decode($p->title)}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="content">
            {$content|noescape}
        </div>

        {include 'layouts/footer.php'}
    </div>

    <a href="https://wa.me/+905511967692" target="blank" id="whatsapp" class="fixed right-5 bottom-5 z-10 p-1 h-16 w-16 transform rounded-full border-2 shadow shadow-green-500 border-green-500 bg-green-500 duration-500 hover:-translate-y-3 hover:bg-green-600">
        <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 31C23.732 31 30 24.732 30 17C30 9.26801 23.732 3 16 3C8.26801 3 2 9.26801 2 17C2 19.5109 2.661 21.8674 3.81847 23.905L2 31L9.31486 29.3038C11.3014 30.3854 13.5789 31 16 31ZM16 28.8462C22.5425 28.8462 27.8462 23.5425 27.8462 17C27.8462 10.4576 22.5425 5.15385 16 5.15385C9.45755 5.15385 4.15385 10.4576 4.15385 17C4.15385 19.5261 4.9445 21.8675 6.29184 23.7902L5.23077 27.7692L9.27993 26.7569C11.1894 28.0746 13.5046 28.8462 16 28.8462Z" fill="#BFC8D0"></path> <path d="M28 16C28 22.6274 22.6274 28 16 28C13.4722 28 11.1269 27.2184 9.19266 25.8837L5.09091 26.9091L6.16576 22.8784C4.80092 20.9307 4 18.5589 4 16C4 9.37258 9.37258 4 16 4C22.6274 4 28 9.37258 28 16Z" fill="url(#paint0_linear_87_7264)"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M16 30C23.732 30 30 23.732 30 16C30 8.26801 23.732 2 16 2C8.26801 2 2 8.26801 2 16C2 18.5109 2.661 20.8674 3.81847 22.905L2 30L9.31486 28.3038C11.3014 29.3854 13.5789 30 16 30ZM16 27.8462C22.5425 27.8462 27.8462 22.5425 27.8462 16C27.8462 9.45755 22.5425 4.15385 16 4.15385C9.45755 4.15385 4.15385 9.45755 4.15385 16C4.15385 18.5261 4.9445 20.8675 6.29184 22.7902L5.23077 26.7692L9.27993 25.7569C11.1894 27.0746 13.5046 27.8462 16 27.8462Z" fill="white"></path> <path d="M12.5 9.49989C12.1672 8.83131 11.6565 8.8905 11.1407 8.8905C10.2188 8.8905 8.78125 9.99478 8.78125 12.05C8.78125 13.7343 9.52345 15.578 12.0244 18.3361C14.438 20.9979 17.6094 22.3748 20.2422 22.3279C22.875 22.2811 23.4167 20.0154 23.4167 19.2503C23.4167 18.9112 23.2062 18.742 23.0613 18.696C22.1641 18.2654 20.5093 17.4631 20.1328 17.3124C19.7563 17.1617 19.5597 17.3656 19.4375 17.4765C19.0961 17.8018 18.4193 18.7608 18.1875 18.9765C17.9558 19.1922 17.6103 19.083 17.4665 19.0015C16.9374 18.7892 15.5029 18.1511 14.3595 17.0426C12.9453 15.6718 12.8623 15.2001 12.5959 14.7803C12.3828 14.4444 12.5392 14.2384 12.6172 14.1483C12.9219 13.7968 13.3426 13.254 13.5313 12.9843C13.7199 12.7145 13.5702 12.305 13.4803 12.05C13.0938 10.953 12.7663 10.0347 12.5 9.49989Z" fill="white"></path> <defs> <linearGradient id="paint0_linear_87_7264" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse"> <stop stop-color="#5BD066"></stop> <stop offset="1" stop-color="#27B43E"></stop> </linearGradient> </defs> </g></svg>
    </a>
</body>

</html>