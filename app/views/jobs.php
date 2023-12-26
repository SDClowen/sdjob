<div style="background-color: #002559" class="relative">
    <div class="bg-center bg-no-repeat bg-cover opacity-10 h-96" style="background-image: url(/public/background_header.png)">
    </div>
    <div class="flex items-center justify-center absolute w-full h-full left-0 top-0">
        <div>
            <span class="text-white text-[70px] font-bold block text-center">İlanlar</span>
        </div>
    </div>
</div>

<div class="pt-4 max-w-screen-xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-6 lg:gap-4">
        <div class="flex flex-col col-span-2 m-4 lg:m-0">
            <div class="rounded-xl border border-gray-200 bg-white dark:bg-gray-800 dark:text-white dark:border-gray-700 p-6 shadow-md">
                <form role="form" action="/jobs/feed" method="post" data-type="html" data-content="#job-content">
                    <div class="relative mb-10 w-full flex  items-center justify-between rounded-md">
                        <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" class=""></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
                        </svg>
                        <input type="name" name="title" class="h-12 w-full cursor-text rounded-md border border-gray-100 bg-gray-100 dark:bg-gray-600 dark:border-gray-500 py-4 pr-4 pl-12 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" placeholder="Bölge, ilan ismi, pozisyon arayın..." />
                    </div>

                    <div class="mb-5">
                        <label for="states" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">İlçe</label>
                        <select id="states" name="stateId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="-1">Hepsi</option>
                            <option n:foreach="$states as $state" value="{$state->id}">{$state->name}</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                        <div class="mb-5">
                            <label for="knowledges" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tecrübe</label>
                            <select id="knowledges" name="knowledge" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="-1">Hepsi</option>
                                <option n:foreach="\App\Models\Job::KNOWLEDGES as $k => $v" value="{$k}">{$v}</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="workingType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Çalışma Biçimi</label>
                            <select id="workingType" name="workingType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="-1">Hepsi</option>
                                <option n:foreach="\App\Models\Job::WORKING_TYPES as $k => $v" value="{$k}">{$v}</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                        <div class="mb-5">
                            <label for="educationLevel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Eğitim Seviyesi</label>
                            <select id="educationLevel" name="educationLevel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="-1">Hepsi</option>
                                <option n:foreach="\App\Models\Job::EDUCATIONS as $k => $v" value="{$k}">{$v}</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pozisyon</label>
                            <select id="position" name="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="-1">Hepsi</option>
                                <option n:foreach="\App\Models\Job::POSITIONS as $k => $v" value="{$k}">{$v}</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="sectorId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sektör</label>
                        <select id="sectorId" name="sectorId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="-1">Hepsi</option>
                            <option n:foreach="$sectors as $v" value="{$v->id}">{$v->name}</option>
                        </select>
                    </div>

                    <div class="mb-5">
                        <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departman</label>
                        <select id="department" name="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="-1">Hepsi</option>
                            <option n:foreach="\App\Models\Job::DEPARTMENTS as $k => $v" value="{$k}">{$v}</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                        <div class="mb-5">
                            <label for="militaryStatus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Askerlik Durumu</label>
                            <select id="militaryStatus" name="militaryStatus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="-1">Hepsi</option>
                                <option n:foreach="\App\Models\Job::MILITARY_SITUATIONS as $k => $v" value="{$k}">{$v}</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cinsiyet</label>
                            <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="-1">Farketmez</option>
                                <option n:foreach="\App\Models\Job::GENDERS as $k => $v" value="{$k}">{$v}</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                        <button class="rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none hover:opacity-80 focus:ring">Ara</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-span-4 m-4 lg:m-0">
            <div id="job-content">
                {include jobs-listing.php}
            </div>
            <nav class="hidden mx-auto my-10 flex max-w-xs justify-between space-x-2 rounded-md py-2">
                <a href="/jobs//feed" class="flex items-center space-x-1 font-medium hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
                        <path fill-rule="evenodd" d="M13.28 3.97a.75.75 0 010 1.06L6.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5a.75.75 0 010-1.06l7.5-7.5a.75.75 0 011.06 0zm6 0a.75.75 0 010 1.06L12.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5a.75.75 0 010-1.06l7.5-7.5a.75.75 0 011.06 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="flex items-center space-x-1 font-medium hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
                        <path fill-rule="evenodd" d="M7.72 12.53a.75.75 0 010-1.06l7.5-7.5a.75.75 0 111.06 1.06L9.31 12l6.97 6.97a.75.75 0 11-1.06 1.06l-7.5-7.5z" clip-rule="evenodd" />
                    </svg>
                </a>
                <ul class="flex items-center">
                    <li><a href="#" class="px-2 text-lg font-medium text-gray-400 sm:px-3 hover:text-blue-600">8</a></li>
                    <li><a href="#" class="rounded-md px-2 text-2xl font-medium text-blue-600 sm:px-3">9</a></li>
                    <li><a href="#" class="px-2 text-lg font-medium text-gray-400 sm:px-3 hover:text-blue-600">10</a></li>
                </ul>
                <a href="#" class="flex items-center space-x-1 font-medium hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
                        <path fill-rule="evenodd" d="M16.28 11.47a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 011.06-1.06l7.5 7.5z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="flex items-center space-x-1 font-medium hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
                        <path fill-rule="evenodd" d="M4.72 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 01-1.06-1.06L11.69 12 4.72 5.03a.75.75 0 010-1.06zm6 0a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06L17.69 12l-6.97-6.97a.75.75 0 010-1.06z" clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>


    </div>
</div>