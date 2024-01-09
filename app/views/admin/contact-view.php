<div class="w-full max-w-screen-xl mb-5">
    <!-- Start coding here -->
    <div class="relative overflow-hidden border-b">
        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
            <div class="py-3 sm:py-5 text-md font-medium text-gray-500">
                Tarih: {strdate($contact->createdAt, "d.m.y hh:mm:s")}
            </div>
            <a href="#" data-url="/admin/contact-delete/{$contact->id}" data-redirect="/admin/contacts" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg hover:shadow-md transition-colors duration-200 bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                <svg class="h-4 w-4 mr-2 -ml-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M9.1709 4C9.58273 2.83481 10.694 2 12.0002 2C13.3064 2 14.4177 2.83481 14.8295 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M18.8332 8.5L18.3732 15.3991C18.1962 18.054 18.1077 19.3815 17.2427 20.1907C16.3777 21 15.0473 21 12.3865 21H11.6132C8.95235 21 7.62195 21 6.75694 20.1907C5.89194 19.3815 5.80344 18.054 5.62644 15.3991L5.1665 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    </g>
                </svg>
                İletiyi Sil
            </a>
        </div>
    </div>
</div>
<div class="max-w-xl mx-auto">

    <div class="overflow-hidden">
        <div class="border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-md font-medium text-gray-500">
                        <span>Ad Soyad:</span>
                    </dt>
                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        {$contact->name}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-md font-medium text-gray-500">
                        Ünvan:
                    </dt>
                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        {$contact->title}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-md font-medium text-gray-500">
                        E-Posta:
                    </dt>
                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        {$contact->email}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-md font-medium text-gray-500">
                        Telefon:
                    </dt>
                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        {$contact->phone}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-md font-medium text-gray-500">
                        Konu:
                    </dt>
                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        {$contact->subject}
                    </dd>
                </div>
                <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-md font-medium text-gray-500">
                        Mesaj:
                    </dt>
                    <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        {html_entity_decode($contact->message)}
                    </dd>
                </div>
            </dl>
        </div>
    </div>

</div>