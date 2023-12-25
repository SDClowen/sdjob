<div style="background-color: #002559; font-family: Poppins" class="relative mb-12">
    <div class="bg-center bg-no-repeat bg-cover opacity-50 h-96" style="background-image: url(/public/jumbotron.jpg)">
    </div>
    <div class="flex items-center justify-start absolute w-full h-full left-0 top-0">
        <div class="ms-24">
            <span class="text-white text-[50px] font-semibold block">Hesabım</span>
        </div>
    </div>
</div>

<div class="message fixed bottom-5 right-5 z-10 min-h-max"></div>

<div class="container px-6 py-12 mx-auto relative">
    <div class="lg:flex lg:-mx-6" x-data="{ activeTab:  0 }">

        <div class="lg:w-1/3">
            <div class="w-full px-8 py-10 mx-auto dark:bg-gray-900">
                <div class="flex content-center h-32">
                    <label class="mx-auto w-32 text-center">
                        <div class="relative w-32">
                            <img id="photo-result" class="w-32 h-32 rounded-full absolute" src="/public/users/{$user->photo ?? 'no-photo.jpg'}" alt="" />
                            <div class="w-32 h-32 group hover:bg-gray-900/50 rounded-full absolute flex justify-center items-center cursor-pointer transition duration-500">
                                <svg class="hidden group-hover:block w-12 opacity-60" fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 489.95 489.95" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M431.175,427.85v-200.5c0-34.2-27.9-62.1-62.1-62.1h-40.2c-6.8,0-12.3,5.5-12.3,12.3s5.5,12.3,12.3,12.3h40.2
            c20.7,0,37.6,16.9,37.6,37.6v200.6c0,20.7-16.9,37.6-37.6,37.6h-248.2c-20.7,0-37.6-16.9-37.6-37.6v-200.7
            c0-20.7,16.9-37.6,37.6-37.6h40.2c6.8,0,12.3-5.5,12.3-12.3s-5.5-12.3-12.3-12.3h-40.2c-34.2,0-62.1,27.9-62.1,62.1v200.6
            c0,34.2,27.9,62.1,62.1,62.1h248.2C403.375,489.95,431.175,462.15,431.175,427.85z" />
                                            <path d="M152.475,104.55c4.8,4.8,12.5,4.8,17.3,0l63-63v229.8c0,6.8,5.5,12.3,12.3,12.3c6.8,0,12.3-5.5,12.3-12.3V41.65l63,63
                                                    c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6c4.8-4.8,4.8-12.5,0-17.3l-83.9-83.9c-4.6-4.6-12.7-4.6-17.3,0l-83.9,83.9
                                                    C147.675,92.05,147.675,99.75,152.475,104.55z" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <input type="file" name="photo" id="photo" class="hidden">
                    </label>
                </div>
                <h1 style="font-family: Poppins" class="font-semibold text-center mt-2 text-gray-700 capitalize dark:text-white lg:text-2xl">
                    {$user->name." ".$user->surname}
                </h1>
                <a href="/account/profile/{$user->id}" class="hidden text-blue-500 text-center mx-auto text-sm mb-5">Profili Görüntüle</a>

                <button :class="{ 'active': activeTab === 0 }" @click="activeTab = 0" class="inline-flex p-3 rounded-lg m-2 bg-gray-200 text-gray-600 hover:bg-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white duration-300 w-full transition">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8C18 11.3137 15.3137 14 12 14C8.68629 14 6 11.3137 6 8Z"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.43094 16.9025C7.05587 16.2213 9.2233 16 12 16C14.771 16 16.9351 16.2204 18.5586 16.8981C20.3012 17.6255 21.3708 18.8613 21.941 20.6587C22.1528 21.3267 21.6518 22 20.9592 22H3.03459C2.34482 22 1.84679 21.3297 2.0569 20.6654C2.62537 18.8681 3.69119 17.6318 5.43094 16.9025Z"></path>
                        </g>
                    </svg>
                    <span class="ms-2 border-l self-baseline ps-3 border-gray-400">Hesap</span>
                    <svg class="w-6 h-6 ms-auto" viewBox="0 0 24 24" id="right-2" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path id="primary" d="M7.5,22a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.42L15.09,12,6.79,3.71A1,1,0,1,1,8.21,2.29l9,9a1,1,0,0,1,0,1.42l-9,9A1,1,0,0,1,7.5,22Z" style="fill: #777;"></path>
                        </g>
                    </svg>
                </button>

                <button :class="{ 'active': activeTab === 1 }" @click="activeTab = 1" class="inline-flex p-3 rounded-lg m-2 bg-gray-200 text-gray-600 hover:bg-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white duration-300 w-full transition">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.17157 5.17157C2 6.34315 2 8.22876 2 12C2 15.7712 2 17.6569 3.17157 18.8284C4.34315 20 6.22876 20 10 20H14C17.7712 20 19.6569 20 20.8284 18.8284C22 17.6569 22 15.7712 22 12C22 8.22876 22 6.34315 20.8284 5.17157C19.6569 4 17.7712 4 14 4H10C6.22876 4 4.34315 4 3.17157 5.17157ZM12.7502 10C12.7502 9.58579 12.4144 9.25 12.0002 9.25C11.586 9.25 11.2502 9.58579 11.2502 10V10.7012L10.6428 10.3505C10.2841 10.1434 9.8254 10.2663 9.61829 10.625C9.41119 10.9837 9.53409 11.4424 9.89281 11.6495L10.4997 11.9999L9.89258 12.3505C9.53386 12.5576 9.41095 13.0163 9.61806 13.375C9.82517 13.7337 10.2839 13.8566 10.6426 13.6495L11.2502 13.2987V14C11.2502 14.4142 11.586 14.75 12.0002 14.75C12.4144 14.75 12.7502 14.4142 12.7502 14V13.2993L13.3569 13.6495C13.7156 13.8566 14.1743 13.7337 14.3814 13.375C14.5885 13.0163 14.4656 12.5576 14.1069 12.3505L13.4997 11.9999L14.1067 11.6495C14.4654 11.4424 14.5883 10.9837 14.3812 10.625C14.1741 10.2663 13.7154 10.1434 13.3567 10.3505L12.7502 10.7006V10ZM6.73266 9.25C7.14687 9.25 7.48266 9.58579 7.48266 10V10.7006L8.0891 10.3505C8.44782 10.1434 8.90651 10.2663 9.11362 10.625C9.32073 10.9837 9.19782 11.4424 8.8391 11.6495L8.23217 11.9999L8.83934 12.3505C9.19806 12.5576 9.32096 13.0163 9.11386 13.375C8.90675 13.7337 8.44806 13.8566 8.08934 13.6495L7.48266 13.2993V14C7.48266 14.4142 7.14687 14.75 6.73266 14.75C6.31844 14.75 5.98266 14.4142 5.98266 14V13.2987L5.375 13.6495C5.01628 13.8566 4.55759 13.7337 4.35048 13.375C4.14337 13.0163 4.26628 12.5576 4.625 12.3505L5.23217 11.9999L4.62523 11.6495C4.26652 11.4424 4.14361 10.9837 4.35072 10.625C4.55782 10.2663 5.01652 10.1434 5.37523 10.3505L5.98266 10.7012V10C5.98266 9.58579 6.31844 9.25 6.73266 9.25ZM18.0181 10C18.0181 9.58579 17.6823 9.25 17.2681 9.25C16.8539 9.25 16.5181 9.58579 16.5181 10V10.7012L15.9106 10.3505C15.5519 10.1434 15.0932 10.2663 14.8861 10.625C14.679 10.9837 14.8019 11.4424 15.1606 11.6495L15.7676 11.9999L15.1604 12.3505C14.8017 12.5576 14.6788 13.0163 14.8859 13.375C15.093 13.7337 15.5517 13.8566 15.9104 13.6495L16.5181 13.2987V14C16.5181 14.4142 16.8539 14.75 17.2681 14.75C17.6823 14.75 18.0181 14.4142 18.0181 14V13.2993L18.6247 13.6495C18.9835 13.8566 19.4422 13.7337 19.6493 13.375C19.8564 13.0163 19.7335 12.5576 19.3747 12.3505L18.7676 11.9999L19.3745 11.6495C19.7332 11.4424 19.8561 10.9837 19.649 10.625C19.4419 10.2663 18.9832 10.1434 18.6245 10.3505L18.0181 10.7006V10Z"></path>
                        </g>
                    </svg>
                    <span class="ms-2 border-l self-baseline ps-3 border-gray-400">Şifre Değiştir</span>
                    <svg class="w-6 h-6 ms-auto" viewBox="0 0 24 24" id="right-2" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path id="primary" d="M7.5,22a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.42L15.09,12,6.79,3.71A1,1,0,1,1,8.21,2.29l9,9a1,1,0,0,1,0,1.42l-9,9A1,1,0,0,1,7.5,22Z" style="fill: #777;"></path>
                        </g>
                    </svg>
                </button>

                <button n:if="$user->type == 0" :class="{ 'active': activeTab === 2 }" @click="activeTab = 2" class="inline-flex p-3 rounded-lg m-2 bg-gray-200 text-gray-600 hover:bg-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white duration-300 w-full transition">
                    <svg class="w-6 h-6 me-2 fill-current" viewBox="-10 -5 1034 1034" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M160 324q-67 0 -113.5 46.5t-46.5 113.5v286q0 66 46.5 113t113.5 47h680q67 0 113.5 -47t46.5 -113v-286q0 -67 -46.5 -113.5t-113.5 -46.5h-680zM320 405q33 0 51 13q4 2 6 4q23 20 23 67q0 16 -12 52q-2 4 -4.5 11.5t-3.5 8.5q-19 55 -19 65v8q1 4 1 7q2 6 6 13 q6 11 17 21h1q10 9 25 17q12 6 29 13l43 17q21 10 29 18l3 2v1l4 6v58h-395v-54q0 -16 36 -33q3 -1 9 -4q3 -1 4 -2q66 -27 83 -42q5 -4 10 -9l2 -3q1 0 1.5 -0.5t0.5 -1.5l1 -2h1l7 -15l1 -7q1 -3 1 -7.5t-7 -23.5l-9 -27q-8 -20 -11 -32q-6 -17 -7 -21q-3 -10 -4 -19 l-2 -7v-8q0 -12 2 -23v-1q2 -10 4 -17q6 -16 17 -26q2 -2 6 -4q14 -10 34 -13h16zM743 498q35 0 65 17t49 45l35 -34v108h-109l34 -34q-10 -21 -30 -34t-44 -13q-34 0 -58 24t-24 57.5t24 57.5t59 24t60 -28h64q-17 37 -50.5 59.5t-74.5 22.5q-57 0 -96.5 -39.5t-39.5 -96 t39.5 -96.5t96.5 -40z"></path>
                        </g>
                    </svg>

                    <span class="ms-2 border-l self-baseline ps-3 border-gray-400">Özgeçmiş</span>
                    <svg class="w-6 h-6 ms-auto" viewBox="0 0 24 24" id="right-2" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path id="primary" d="M7.5,22a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.42L15.09,12,6.79,3.71A1,1,0,1,1,8.21,2.29l9,9a1,1,0,0,1,0,1.42l-9,9A1,1,0,0,1,7.5,22Z" style="fill: #777;"></path>
                        </g>
                    </svg>
                </button>

                <button n:if="$user->type == 1" :class="{ 'active': activeTab === 2 }" @click="activeTab = 2" class="inline-flex p-3 rounded-lg m-2 bg-gray-200 text-gray-600 hover:bg-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white duration-300 w-full transition">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M8 2L8 6L4 6L4 48L15 48L15 39L19 39L19 48L30 48L30 6L26 6L26 2 Z M 10 10L12 10L12 12L10 12 Z M 14 10L16 10L16 12L14 12 Z M 18 10L20 10L20 12L18 12 Z M 22 10L24 10L24 12L22 12 Z M 32 14L32 18L34 18L34 20L32 20L32 22L34 22L34 24L32 24L32 26L34 26L34 28L32 28L32 30L34 30L34 32L32 32L32 34L34 34L34 36L32 36L32 38L34 38L34 40L32 40L32 42L34 42L34 44L32 44L32 48L46 48L46 14 Z M 10 15L12 15L12 19L10 19 Z M 14 15L16 15L16 19L14 19 Z M 18 15L20 15L20 19L18 19 Z M 22 15L24 15L24 19L22 19 Z M 36 18L38 18L38 20L36 20 Z M 40 18L42 18L42 20L40 20 Z M 10 21L12 21L12 25L10 25 Z M 14 21L16 21L16 25L14 25 Z M 18 21L20 21L20 25L18 25 Z M 22 21L24 21L24 25L22 25 Z M 36 22L38 22L38 24L36 24 Z M 40 22L42 22L42 24L40 24 Z M 36 26L38 26L38 28L36 28 Z M 40 26L42 26L42 28L40 28 Z M 10 27L12 27L12 31L10 31 Z M 14 27L16 27L16 31L14 31 Z M 18 27L20 27L20 31L18 31 Z M 22 27L24 27L24 31L22 31 Z M 36 30L38 30L38 32L36 32 Z M 40 30L42 30L42 32L40 32 Z M 10 33L12 33L12 37L10 37 Z M 14 33L16 33L16 37L14 37 Z M 18 33L20 33L20 37L18 37 Z M 22 33L24 33L24 37L22 37 Z M 36 34L38 34L38 36L36 36 Z M 40 34L42 34L42 36L40 36 Z M 36 38L38 38L38 40L36 40 Z M 40 38L42 38L42 40L40 40 Z M 10 39L12 39L12 44L10 44 Z M 22 39L24 39L24 44L22 44 Z M 36 42L38 42L38 44L36 44 Z M 40 42L42 42L42 44L40 44Z"></path>
                        </g>
                    </svg>

                    <span class="ms-2 border-l self-baseline ps-3 border-gray-400">Firma</span>
                    <svg class="w-6 h-6 ms-auto" viewBox="0 0 24 24" id="right-2" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path id="primary" d="M7.5,22a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.42L15.09,12,6.79,3.71A1,1,0,1,1,8.21,2.29l9,9a1,1,0,0,1,0,1.42l-9,9A1,1,0,0,1,7.5,22Z" style="fill: #777;"></path>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
        <div class="lg:w-8/12 ps-6">
            <div class="w-full px-8 py-10" :class="activeTab == 0 ? 'block' : 'hidden'" x-show.transition.in.opacity.duration.600="activeTab === 0">
                <h1 class="flex font-semibold text-gray-600 capitalize dark:text-white lg:text-xl" style="font-family: Poppins">
                    <svg class="w-6 h-6 me-2 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6 8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8C18 11.3137 15.3137 14 12 14C8.68629 14 6 11.3137 6 8Z"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.43094 16.9025C7.05587 16.2213 9.2233 16 12 16C14.771 16 16.9351 16.2204 18.5586 16.8981C20.3012 17.6255 21.3708 18.8613 21.941 20.6587C22.1528 21.3267 21.6518 22 20.9592 22H3.03459C2.34482 22 1.84679 21.3297 2.0569 20.6654C2.62537 18.8681 3.69119 17.6318 5.43094 16.9025Z"></path>
                        </g>
                    </svg>
                    <span class="self-baseline">Hesap</span>
                </h1>

                <form role="form" method="post" action="/account/save-tab-acc" class="mt-5" data-content=".message">
                    <div class="mt-3 mr-2">
                        <label for="name" class="text-gray-600 active">Adı:</label>
                        <input name="name" value="{$user->name}" type="text" id="name" class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 border border-gray-300 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>

                    <div class="mt-3 mr-2">
                        <label for="surname" class="text-gray-600 active">Soyadı:</label>
                        <input name="surname" value="{$user->surname}" type="text" id="name" class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 border border-gray-300 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>

                    <div class="mt-3 mr-2">
                        <label for="about" class="block mb-2 font-medium text-gray-600 dark:text-gray-300">Kısa Bilgi</label>
                        <textarea name="about" rows="3" id="about" class="block p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">{$user->about}</textarea>
                    </div>

                    <button type="submit" class="rounded-md mt-3 px-5 py-3 text-white bg-blue-500 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Hesabı Güncelle
                    </button>
                </form>
            </div>

            <div class="w-full px-8 py-10" :class="activeTab == 1 ? 'block' : 'hidden'" x-show.transition.in.opacity.duration.600="activeTab === 1">
                <h1 class="flex font-semibold text-gray-600 capitalize dark:text-white lg:text-xl" style="font-family: Poppins">
                    <svg class="w-6 h-6 me-2 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.17157 5.17157C2 6.34315 2 8.22876 2 12C2 15.7712 2 17.6569 3.17157 18.8284C4.34315 20 6.22876 20 10 20H14C17.7712 20 19.6569 20 20.8284 18.8284C22 17.6569 22 15.7712 22 12C22 8.22876 22 6.34315 20.8284 5.17157C19.6569 4 17.7712 4 14 4H10C6.22876 4 4.34315 4 3.17157 5.17157ZM12.7502 10C12.7502 9.58579 12.4144 9.25 12.0002 9.25C11.586 9.25 11.2502 9.58579 11.2502 10V10.7012L10.6428 10.3505C10.2841 10.1434 9.8254 10.2663 9.61829 10.625C9.41119 10.9837 9.53409 11.4424 9.89281 11.6495L10.4997 11.9999L9.89258 12.3505C9.53386 12.5576 9.41095 13.0163 9.61806 13.375C9.82517 13.7337 10.2839 13.8566 10.6426 13.6495L11.2502 13.2987V14C11.2502 14.4142 11.586 14.75 12.0002 14.75C12.4144 14.75 12.7502 14.4142 12.7502 14V13.2993L13.3569 13.6495C13.7156 13.8566 14.1743 13.7337 14.3814 13.375C14.5885 13.0163 14.4656 12.5576 14.1069 12.3505L13.4997 11.9999L14.1067 11.6495C14.4654 11.4424 14.5883 10.9837 14.3812 10.625C14.1741 10.2663 13.7154 10.1434 13.3567 10.3505L12.7502 10.7006V10ZM6.73266 9.25C7.14687 9.25 7.48266 9.58579 7.48266 10V10.7006L8.0891 10.3505C8.44782 10.1434 8.90651 10.2663 9.11362 10.625C9.32073 10.9837 9.19782 11.4424 8.8391 11.6495L8.23217 11.9999L8.83934 12.3505C9.19806 12.5576 9.32096 13.0163 9.11386 13.375C8.90675 13.7337 8.44806 13.8566 8.08934 13.6495L7.48266 13.2993V14C7.48266 14.4142 7.14687 14.75 6.73266 14.75C6.31844 14.75 5.98266 14.4142 5.98266 14V13.2987L5.375 13.6495C5.01628 13.8566 4.55759 13.7337 4.35048 13.375C4.14337 13.0163 4.26628 12.5576 4.625 12.3505L5.23217 11.9999L4.62523 11.6495C4.26652 11.4424 4.14361 10.9837 4.35072 10.625C4.55782 10.2663 5.01652 10.1434 5.37523 10.3505L5.98266 10.7012V10C5.98266 9.58579 6.31844 9.25 6.73266 9.25ZM18.0181 10C18.0181 9.58579 17.6823 9.25 17.2681 9.25C16.8539 9.25 16.5181 9.58579 16.5181 10V10.7012L15.9106 10.3505C15.5519 10.1434 15.0932 10.2663 14.8861 10.625C14.679 10.9837 14.8019 11.4424 15.1606 11.6495L15.7676 11.9999L15.1604 12.3505C14.8017 12.5576 14.6788 13.0163 14.8859 13.375C15.093 13.7337 15.5517 13.8566 15.9104 13.6495L16.5181 13.2987V14C16.5181 14.4142 16.8539 14.75 17.2681 14.75C17.6823 14.75 18.0181 14.4142 18.0181 14V13.2993L18.6247 13.6495C18.9835 13.8566 19.4422 13.7337 19.6493 13.375C19.8564 13.0163 19.7335 12.5576 19.3747 12.3505L18.7676 11.9999L19.3745 11.6495C19.7332 11.4424 19.8561 10.9837 19.649 10.625C19.4419 10.2663 18.9832 10.1434 18.6245 10.3505L18.0181 10.7006V10Z"></path>
                        </g>
                    </svg>
                    <span class="self-baseline">Şifre Değiştir</span>
                </h1>

                <form role="form" method="post" action="/account/change-password" class="mt-5" data-content=".message">
                    <div class="mt-3 mr-2">
                        <label for="name" class="text-gray-600 active">Şifre:</label>
                        <input name="password" value="" type="text" id="name" class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 border border-gray-300 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>
                    <div class="mt-3 mr-2">
                        <label for="surname" class="text-gray-600 active">Yeni Şifre:</label>
                        <input name="newPassword" value="" type="text" id="name" class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 border border-gray-300 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>
                    <div class="mt-3 mr-2">
                        <label for="surname" class="text-gray-600 active">Şifrenizi Doğrulayın:</label>
                        <input name="newPasswordConfirm" value="" type="text" id="name" class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 border border-gray-300 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>

                    <button type="submit" class="rounded-md mt-3 px-5 py-3 text-white bg-blue-500 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Şifreyi Güncelle
                    </button>
                </form>
            </div>

            <div n:if="$user->type == 0" class="w-full px-8 py-10" :class="activeTab == 2 ? 'block' : 'hidden'" x-show.transition.in.opacity.duration.600="activeTab === 2">
                <h1 class="mb-3 flex font-semibold text-gray-600 capitalize dark:text-white lg:text-xl" style="font-family: Poppins">
                    <svg class="w-6 h-6 me-2 fill-current" viewBox="-10 -5 1034 1034" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M160 324q-67 0 -113.5 46.5t-46.5 113.5v286q0 66 46.5 113t113.5 47h680q67 0 113.5 -47t46.5 -113v-286q0 -67 -46.5 -113.5t-113.5 -46.5h-680zM320 405q33 0 51 13q4 2 6 4q23 20 23 67q0 16 -12 52q-2 4 -4.5 11.5t-3.5 8.5q-19 55 -19 65v8q1 4 1 7q2 6 6 13 q6 11 17 21h1q10 9 25 17q12 6 29 13l43 17q21 10 29 18l3 2v1l4 6v58h-395v-54q0 -16 36 -33q3 -1 9 -4q3 -1 4 -2q66 -27 83 -42q5 -4 10 -9l2 -3q1 0 1.5 -0.5t0.5 -1.5l1 -2h1l7 -15l1 -7q1 -3 1 -7.5t-7 -23.5l-9 -27q-8 -20 -11 -32q-6 -17 -7 -21q-3 -10 -4 -19 l-2 -7v-8q0 -12 2 -23v-1q2 -10 4 -17q6 -16 17 -26q2 -2 6 -4q14 -10 34 -13h16zM743 498q35 0 65 17t49 45l35 -34v108h-109l34 -34q-10 -21 -30 -34t-44 -13q-34 0 -58 24t-24 57.5t24 57.5t59 24t60 -28h64q-17 37 -50.5 59.5t-74.5 22.5q-57 0 -96.5 -39.5t-39.5 -96 t39.5 -96.5t96.5 -40z"></path>
                        </g>
                    </svg>
                    <div class="flex content-between w-full justify-between">
                        <span class="self-baseline">Özgeçmiş</span>

                        <label for="cvfile" data-content=".message" class="cursor-pointer rounded-md text-base font-normal font-display px-5 py-2 text-white bg-blue-500 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Yeni CV Yükle
                            <input type="file" name="cvfile" id="cvfile" class="hidden">
                        </label>
                    </div>
                </h1>
                <div class="message"></div>
                <object class="rounded-lg" n:if="$user->detail->cv" data="/public/cv/{$user->detail->cv}" type="application/pdf" width="100%" height="750px">
                    <p>Unable to display PDF file. <a href="/public/cv/{$user->detail->cv}">Download</a> instead.</p>
                </object>
            </div>

            <div n:if="$user->type == 1" class="w-full px-8 py-10" :class="activeTab == 2 ? 'block' : 'hidden'" x-show.transition.in.opacity.duration.600="activeTab === 2">
                <h1 class="flex font-semibold text-gray-600 capitalize dark:text-white lg:text-xl" style="font-family: Poppins">

                    <svg class="w-6 h-6 me-2 fill-current" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M8 2L8 6L4 6L4 48L15 48L15 39L19 39L19 48L30 48L30 6L26 6L26 2 Z M 10 10L12 10L12 12L10 12 Z M 14 10L16 10L16 12L14 12 Z M 18 10L20 10L20 12L18 12 Z M 22 10L24 10L24 12L22 12 Z M 32 14L32 18L34 18L34 20L32 20L32 22L34 22L34 24L32 24L32 26L34 26L34 28L32 28L32 30L34 30L34 32L32 32L32 34L34 34L34 36L32 36L32 38L34 38L34 40L32 40L32 42L34 42L34 44L32 44L32 48L46 48L46 14 Z M 10 15L12 15L12 19L10 19 Z M 14 15L16 15L16 19L14 19 Z M 18 15L20 15L20 19L18 19 Z M 22 15L24 15L24 19L22 19 Z M 36 18L38 18L38 20L36 20 Z M 40 18L42 18L42 20L40 20 Z M 10 21L12 21L12 25L10 25 Z M 14 21L16 21L16 25L14 25 Z M 18 21L20 21L20 25L18 25 Z M 22 21L24 21L24 25L22 25 Z M 36 22L38 22L38 24L36 24 Z M 40 22L42 22L42 24L40 24 Z M 36 26L38 26L38 28L36 28 Z M 40 26L42 26L42 28L40 28 Z M 10 27L12 27L12 31L10 31 Z M 14 27L16 27L16 31L14 31 Z M 18 27L20 27L20 31L18 31 Z M 22 27L24 27L24 31L22 31 Z M 36 30L38 30L38 32L36 32 Z M 40 30L42 30L42 32L40 32 Z M 10 33L12 33L12 37L10 37 Z M 14 33L16 33L16 37L14 37 Z M 18 33L20 33L20 37L18 37 Z M 22 33L24 33L24 37L22 37 Z M 36 34L38 34L38 36L36 36 Z M 40 34L42 34L42 36L40 36 Z M 36 38L38 38L38 40L36 40 Z M 40 38L42 38L42 40L40 40 Z M 10 39L12 39L12 44L10 44 Z M 22 39L24 39L24 44L22 44 Z M 36 42L38 42L38 44L36 44 Z M 40 42L42 42L42 44L40 44Z"></path>
                        </g>
                    </svg>
                    <span class="self-baseline">Firma</span>
                </h1>

                <form role="form" method="post" action="/account/save-tab-company" class="mt-5" data-content=".message">
                    <div class="mt-3 mr-2">
                        <label for="cname" class="text-gray-600">Şirket İsmi:</label>
                        <input name="name" value="{$user->detail->name}" type="text" id="cname" class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 border border-gray-300 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>
                    <div class="mt-3 mr-2">
                        <label for="ctitle" class="text-gray-600">Şirket Ünvanı:</label>
                        <input name="title" value="{$user->detail->title}" type="text" id="ctitle" class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 border border-gray-300 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>

                    <div class="mt-3 mr-2">
                        <label for="sector" class="block mb-2 font-medium text-gray-600 dark:text-white">Sektör:</label>
                        <select name="sectorId" id="sector" class="block w-full p-2 mb-6 text-gray-900 border border-gray-300 rounded-md bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option n:foreach="$sectors as $value" value="{$value->id}" {$user->sectorId == $value->id ? "selected" : ""}>{$value->name}</option>
                        </select>
                    </div>

                    <div class="mt-3 mr-2">
                        <label for="companyAddress" class="block mb-2 font-medium text-gray-600 dark:text-gray-300">Şirket Adresi</label>
                        <textarea name="address" rows="3" id="companyAddress" class="block p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">{$user->detail->address}</textarea>
                    </div>

                    <div class="mt-3 mr-2">
                        <label for="ctaxoffice" class="text-gray-600">Vergi Dairesi:</label>
                        <input name="taxOffice" value="{$user->detail->taxOffice}" type="text" id="ctaxoffice" class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 border border-gray-300 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>
                    <div class="mt-3 mr-2">
                        <label for="ctaxno" class="text-gray-600">Vergi Numarası:</label>
                        <input name="taxNo" value="{$user->detail->taxNo}" type="text" id="ctaxno" class="block w-full px-5 py-2 mt-2 text-gray-700 placeholder-gray-400 border border-gray-300 dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                    </div>

                    <div class="mt-3 mr-2">
                        <label for="companyDescription" class="block mb-2 font-medium text-gray-600 dark:text-gray-300">Şirket Hakkında</label>
                        <textarea name="description" rows="8" id="companyDescription" class="block p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">{$user->detail->description}</textarea>
                    </div>

                    <button type="submit" class="rounded-md mt-3 px-5 py-3 text-white bg-blue-500 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Güncelle
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>