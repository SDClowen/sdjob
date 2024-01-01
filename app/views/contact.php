<div style="background-color: #002559; font-family: Poppins" class="relative mb-12">
    <div class="bg-center bg-no-repeat bg-cover opacity-50 h-96" style="background-image: url(/public/background_header.jpg)">
    </div>
    <div class="flex items-center justify-center absolute w-full h-full left-0 top-0">
        <div>
            <span class="text-white text-[70px] font-bold block">İletişim</span>
        </div>
    </div>
</div>

<div class="container px-6 py-12 mx-auto relative">
    <div class="message absolute top-5 text-center left-0 right-0 min-h-max"></div>

    <div class="lg:flex lg:-mx-6">
        <div class="lg:w-8/12 ps-6">
            <div class="w-full px-8 py-10">
                <h1 class="font-semibold text-gray-700 capitalize dark:text-white lg:text-5xl" style="font-family: Poppins">İletişim Formu</h1>

                <form role="form" method="post" action="/contact" class="mt-5" data-content=".message">
                    <div class="grid grid-cols-1 sm:grid-cols-2">
                        <div class="mt-1 mr-2">
                            <input name="name" type="text" placeholder="İsim" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-gray-200 border border-gray-200 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                        <div class="mt-1">
                            <input name="title" type="text" placeholder="Firma" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-gray-200 border border-gray-200 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2">
                        <div class="mt-1 mr-2">
                            <input name="phone" type="text" placeholder="Telefon" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-gray-200 border border-gray-200 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                        <div class="mt-1">
                            <input name="email" type="mail" placeholder="E-Posta" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-gray-200 border border-gray-200 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                        </div>
                    </div>

                    <div class="flex-1 mt-1">
                        <input name="subject" type="text" placeholder="Konu" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-gray-200 border border-gray-200 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>

                    <div class="w-full mt-1">
                        <textarea name="message" rows="3" placeholder="Mesaj" class="block w-full px-5 py-3 mt-2 text-gray-700 placeholder-gray-400 bg-gray-200 border border-gray-200 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"></textarea>
                    </div>

                    <button type="submit" class="mt-3 w-full px-5 py-3 font-medium text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        <div class="mx-auto text-center inline-flex items-center">
                            <svg class="w-4 h-4 text-white me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                            </svg>
                            Gönder
                        </div>
                    </button>
                </form>
            </div>
        </div>
        <div class="lg:w-1/3">
            <div class="w-full px-8 py-10 mx-auto overflow-hidden bg-gray-200 dark:bg-gray-900 bg-right-bottom bg-no-repeat bg-cover" style="background-image: url(/public/bg_memphis.jpg)">
                <h1 style="font-family: Poppins" class="font-semibold text-gray-700 capitalize dark:text-white lg:text-5xl">
                    Bize Ulaşın
                    <div class="border-t-3 border-red-500 w-14"></div>
                </h1>
                <h3 class="text-red-500 text-xl font-semibold mt-4">Adres</h3>
                <div class="mt-2 w-9/12">
                    Cumhuriyet Mah, 1961. Sk. NO.25
                    Efeler / Aydın - Türkiye
                </div>

                <h3 class="text-red-500 text-xl font-semibold mt-4">Telefon</h3>
                <div class="mt-2 w-9/12">
                    Tel: 444 80 09</br>
                    Fax: 0256 227 09 98
                </div>

                <h3 class="text-red-500 text-xl font-semibold mt-4">E-posta</h3>
                <div class="mt-2 w-9/12">
                    kariyer@efeler.bel.tr
                </div>

                <div class="mt-6 w-80 md:mt-8">
                    <h3 class="text-gray-600 dark:text-gray-300 ">Bizi Takip Edin</h3>

                    <div class="flex mt-4 -mx-1.5 ">

                        <a class="mx-1.5 dark:hover:text-blue-400 text-gray-400 transition-colors duration-300 transform hover:text-blue-500" href="{\Core\Config::get()->facebookUrl}" target="blank">
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 10.2222V13.7778H9.66667V20H13.2222V13.7778H15.8889L16.7778 10.2222H13.2222V8.44444C13.2222 8.2087 13.3159 7.9826 13.4826 7.81591C13.6493 7.64921 13.8754 7.55556 14.1111 7.55556H16.7778V4H14.1111C12.9324 4 11.8019 4.46825 10.9684 5.30175C10.1349 6.13524 9.66667 7.2657 9.66667 8.44444V10.2222H7Z" fill="currentColor" />
                            </svg>
                        </a>
                        <a class="mx-1.5 dark:hover:text-blue-400 text-gray-400 transition-colors duration-300 transform hover:text-blue-500" href="{\Core\Config::get()->linkedInUrl}" target="blank">
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.2 8.80005C16.4731 8.80005 17.694 9.30576 18.5941 10.2059C19.4943 11.1061 20 12.327 20 13.6V19.2H16.8V13.6C16.8 13.1757 16.6315 12.7687 16.3314 12.4687C16.0313 12.1686 15.6244 12 15.2 12C14.7757 12 14.3687 12.1686 14.0687 12.4687C13.7686 12.7687 13.6 13.1757 13.6 13.6V19.2H10.4V13.6C10.4 12.327 10.9057 11.1061 11.8059 10.2059C12.7061 9.30576 13.927 8.80005 15.2 8.80005Z" fill="currentColor" />
                                <path d="M7.2 9.6001H4V19.2001H7.2V9.6001Z" fill="currentColor" />
                                <path d="M5.6 7.2C6.48366 7.2 7.2 6.48366 7.2 5.6C7.2 4.71634 6.48366 4 5.6 4C4.71634 4 4 4.71634 4 5.6C4 6.48366 4.71634 7.2 5.6 7.2Z" fill="currentColor" />
                            </svg>
                        </a>
                        <a class="mx-1.5 dark:hover:text-blue-400 text-gray-400 transition-colors duration-300 transform hover:text-blue-500" href="{\Core\Config::get()->twitterUrl}" target="blank">
                            <svg class="w-10 h-10 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.6668 6.67334C18.0002 7.00001 17.3468 7.13268 16.6668 7.33334C15.9195 6.49001 14.8115 6.44334 13.7468 6.84201C12.6822 7.24068 11.9848 8.21534 12.0002 9.33334V10C9.83683 10.0553 7.91016 9.07001 6.66683 7.33334C6.66683 7.33334 3.87883 12.2887 9.3335 14.6667C8.0855 15.498 6.84083 16.0587 5.3335 16C7.53883 17.202 9.94216 17.6153 12.0228 17.0113C14.4095 16.318 16.3708 14.5293 17.1235 11.85C17.348 11.0351 17.4595 10.1932 17.4548 9.34801C17.4535 9.18201 18.4615 7.50001 18.6668 6.67268V6.67334Z" />
                            </svg>
                        </a>

                        <a class="mx-1.5 dark:hover:text-blue-400 text-gray-400 transition-colors duration-300 transform hover:text-blue-500" href="{\Core\Config::get()->youtubeUrl}" target="blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-8" fill="currentColor" viewBox="0 0 24 24">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M24.325 8.309s-2.655-.334-8.357-.334c-5.517 0-8.294.334-8.294.334A2.675 2.675 0 0 0 5 10.984v10.034a2.675 2.675 0 0 0 2.674 2.676s2.582.332 8.294.332c5.709 0 8.357-.332 8.357-.332A2.673 2.673 0 0 0 27 21.018V10.982a2.673 2.673 0 0 0-2.675-2.673zM13.061 19.975V12.03L20.195 16l-7.134 3.975z"></path>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="relative w-full h-96">
    <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3150.618721381524!2d27.837778075886835!3d37.84581097196758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b92b665de822d3%3A0xa5ffee2f64aa0f92!2sCumhuriyet%2C%201961.%20Sk.%20No%3A25%2C%2009020%20Ayd%C4%B1n%20Merkez%2FAyd%C4%B1n!5e0!3m2!1str!2str!4v1700993636127!5m2!1str!2str" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
    </iframe>
</div>