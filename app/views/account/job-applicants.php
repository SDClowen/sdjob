<div class="max-w-screen-xl mx-auto mb-5">
    <div class="relative overflow-hidden border-b dark:border-gray-700">
        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
            <div>
                <h5 class="mr-3 font-semibold dark:text-white">{$job->title}</h5>
                <p class="text-gray-500 dark:text-gray-400">{$job->applicantCount} aday başvurdu.</p>
            </div>
        </div>
    </div>
</div>

<div class="pt-4 max-w-screen-xl mx-auto grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 gap-4 sm:max-sm:gap-0">

    <div n:foreach="$applicants as $applicant" class="lg:m-0 mx-auto max-w-sm bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <img class="w-full h-56 object-cover object-center" src="/public/users/{$applicant->photo ?? 'no-photo.jpg'}" alt="avatar">
        <div class="flex items-center px-6 py-3 bg-gray-900 dark:bg-gray-700">
            <svg class="h-6 w-6 text-white fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M20.1004 6.93998C20.1004 7.47998 19.8104 7.96995 19.3504 8.21995L17.6104 9.15995L16.1304 9.94999L13.0604 11.61C12.7304 11.79 12.3704 11.88 12.0004 11.88C11.6304 11.88 11.2704 11.79 10.9404 11.61L4.65039 8.21995C4.19039 7.96995 3.90039 7.47998 3.90039 6.93998C3.90039 6.39998 4.19039 5.90995 4.65039 5.65995L6.62039 4.59996L8.1904 3.74998L10.9404 2.27C11.6004 1.91 12.4004 1.91 13.0604 2.27L19.3504 5.65995C19.8104 5.90995 20.1004 6.39998 20.1004 6.93998Z" fill="currentColor"></path>
                    <path d="M9.9007 12.7899L4.05069 9.85989C3.60069 9.62989 3.0807 9.65989 2.6507 9.91989C2.2207 10.1799 1.9707 10.6399 1.9707 11.1399V16.6699C1.9707 17.6299 2.50069 18.4899 3.36069 18.9199L9.21069 21.8399C9.41069 21.9399 9.63071 21.9899 9.85071 21.9899C10.1107 21.9899 10.3707 21.9199 10.6007 21.7699C11.0307 21.5099 11.2807 21.0499 11.2807 20.5499V15.0199C11.2907 14.0799 10.7607 13.2199 9.9007 12.7899Z" fill="currentColor"></path>
                    <path d="M22.0309 11.1502V16.6801C22.0309 17.6301 21.501 18.4901 20.641 18.9201L14.791 21.8501C14.591 21.9501 14.3709 22.0001 14.1509 22.0001C13.8909 22.0001 13.631 21.9302 13.391 21.7802C12.971 21.5202 12.7109 21.0601 12.7109 20.5601V15.0401C12.7109 14.0801 13.241 13.2201 14.101 12.7901L16.2509 11.7201L17.7509 10.9701L19.951 9.87013C20.401 9.64013 20.921 9.66012 21.351 9.93012C21.771 10.1901 22.0309 10.6502 22.0309 11.1502Z" fill="currentColor"></path>
                    <path d="M17.6091 9.15997L16.1292 9.95001L6.61914 4.59998L8.18915 3.75L17.3691 8.92999C17.4691 8.98999 17.5491 9.06997 17.6091 9.15997Z" fill="currentColor"></path>
                    <path d="M17.75 10.97V13.24C17.75 13.65 17.41 13.99 17 13.99C16.59 13.99 16.25 13.65 16.25 13.24V11.72L17.75 10.97Z" fill="currentColor"></path>
                </g>
            </svg>
            <h1 class="mx-3 text-white font-semibold text-lg">{$applicant->sector}</h1>
        </div>
        <div class="py-4 px-6">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-300 text-center">{$applicant->name." ".$applicant->surname}</h1>
            <p class="py-2 text-lg text-gray-700">
                <a href="/account/cv/{$applicant->userId}" live="true" class="mx-auto flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg hover:shadow-md transition-colors duration-200 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-red-300 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                    <svg fill="currentColor" viewBox="-3.5 0 32 32" class="h-3.5 w-3.5 mr-2 -ml-1" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>view</title>
                            <path d="M12.406 13.844c1.188 0 2.156 0.969 2.156 2.156s-0.969 2.125-2.156 2.125-2.125-0.938-2.125-2.125 0.938-2.156 2.125-2.156zM12.406 8.531c7.063 0 12.156 6.625 12.156 6.625 0.344 0.438 0.344 1.219 0 1.656 0 0-5.094 6.625-12.156 6.625s-12.156-6.625-12.156-6.625c-0.344-0.438-0.344-1.219 0-1.656 0 0 5.094-6.625 12.156-6.625zM12.406 21.344c2.938 0 5.344-2.406 5.344-5.344s-2.406-5.344-5.344-5.344-5.344 2.406-5.344 5.344 2.406 5.344 5.344 5.344z"></path>
                        </g>
                    </svg>
                    CV Görüntüle
                </a>
            </p>
            <div class="flex items-center mt-4 text-gray-700 dark:text-gray-300 ">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="phone-out" class="icon glyph" fill="currentColor">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M21,15v3.93a2,2,0,0,1-2.29,2A18,18,0,0,1,3.14,5.29,2,2,0,0,1,5.13,3H9a1,1,0,0,1,1,.89,10.74,10.74,0,0,0,1,3.78,1,1,0,0,1-.42,1.26l-.86.49a1,1,0,0,0-.33,1.46,14.08,14.08,0,0,0,3.69,3.69,1,1,0,0,0,1.46-.33l.49-.86A1,1,0,0,1,16.33,13a10.74,10.74,0,0,0,3.78,1A1,1,0,0,1,21,15Z"></path>
                        <path d="M21,10a1,1,0,0,1-1-1,5,5,0,0,0-5-5,1,1,0,0,1,0-2,7,7,0,0,1,7,7A1,1,0,0,1,21,10Z"></path>
                        <path d="M17,10a1,1,0,0,1-1-1,1,1,0,0,0-1-1,1,1,0,0,1,0-2,3,3,0,0,1,3,3A1,1,0,0,1,17,10Z"></path>
                    </g>
                </svg>
                <h1 class="px-2 text-sm">{$applicant->phone}</h1>
            </div>
            <div class="flex items-center mt-4 text-gray-700 dark:text-gray-300">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                    <path d="M256 32c-88.004 0-160 70.557-160 156.801C96 306.4 256 480 256 480s160-173.6 160-291.199C416 102.557 344.004 32 256 32zm0 212.801c-31.996 0-57.144-24.645-57.144-56 0-31.357 25.147-56 57.144-56s57.144 24.643 57.144 56c0 31.355-25.148 56-57.144 56z" />
                </svg>
                <h1 class="px-2 text-sm">{$applicant->city} / {$applicant->state}</h1>
            </div>
            <div class="flex items-center mt-4 text-gray-700 dark:text-gray-300">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                    <path d="M437.332 80H74.668C51.199 80 32 99.198 32 122.667v266.666C32 412.802 51.199 432 74.668 432h362.664C460.801 432 480 412.802 480 389.333V122.667C480 99.198 460.801 80 437.332 80zM432 170.667L256 288 80 170.667V128l176 117.333L432 128v42.667z" />
                </svg>
                <h1 class="px-2 text-sm">{$applicant->email}</h1>
            </div>
        </div>
    </div>

    <div n:foreach="$applicants as $applicant" id="d{$job->id}" class="hidden mb-6 rounded-lg bg-gray-50 dark:bg-gray-800 shadow-sm p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <img class="mr-2 h-16 w-16 rounded-full object-cover" src="/public/users/{$applicant->photo ?? 'no-photo.jpg'}" />
                <div>
                    <h3 class="text-xl font-semibold text-gray-900">{$applicant->name." ".$applicant->surname}</h3>
                    <h3 class="text-lg font-semibold text-gray-600">{$applicant->sector}</h3>
                </div>
            </div>
            <div class="inline-flex">
                <a href="/jobs/applicants/{$job->slug}" live="true" class="mr-3 flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg hover:shadow-md transition-colors duration-200 bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">
                    <svg fill="currentColor" viewBox="-3.5 0 32 32" class="h-3.5 w-3.5 mr-2 -ml-1" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>view</title>
                            <path d="M12.406 13.844c1.188 0 2.156 0.969 2.156 2.156s-0.969 2.125-2.156 2.125-2.125-0.938-2.125-2.125 0.938-2.156 2.125-2.156zM12.406 8.531c7.063 0 12.156 6.625 12.156 6.625 0.344 0.438 0.344 1.219 0 1.656 0 0-5.094 6.625-12.156 6.625s-12.156-6.625-12.156-6.625c-0.344-0.438-0.344-1.219 0-1.656 0 0 5.094-6.625 12.156-6.625zM12.406 21.344c2.938 0 5.344-2.406 5.344-5.344s-2.406-5.344-5.344-5.344-5.344 2.406-5.344 5.344 2.406 5.344 5.344 5.344z"></path>
                        </g>
                    </svg>
                    Başvurular <b class="rounded-xl p-1 bg-white text-black ml-2">{$job->applicantCount}</b>
                </a>
                <a href="/cv/{$applicant->userId}" live="true" class="mr-3 flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg hover:shadow-md transition-colors duration-200 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-red-300 dark:bg-gray-600 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">
                    <svg fill="currentColor" viewBox="-3.5 0 32 32" class="h-3.5 w-3.5 mr-2 -ml-1" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>view</title>
                            <path d="M12.406 13.844c1.188 0 2.156 0.969 2.156 2.156s-0.969 2.125-2.156 2.125-2.125-0.938-2.125-2.125 0.938-2.156 2.125-2.156zM12.406 8.531c7.063 0 12.156 6.625 12.156 6.625 0.344 0.438 0.344 1.219 0 1.656 0 0-5.094 6.625-12.156 6.625s-12.156-6.625-12.156-6.625c-0.344-0.438-0.344-1.219 0-1.656 0 0 5.094-6.625 12.156-6.625zM12.406 21.344c2.938 0 5.344-2.406 5.344-5.344s-2.406-5.344-5.344-5.344-5.344 2.406-5.344 5.344 2.406 5.344 5.344 5.344z"></path>
                        </g>
                    </svg>
                    CV Görüntüle
                </a>
            </div>
        </div>
        <div class="mt-6 flex items-center justify-between text-sm text-gray-600">
            <div class="flex">
                {$applicant->email}
            </div>
            <div class="flex items-center">
                {time_diff($job->createdAt)}
            </div>
        </div>
    </div>
</div>