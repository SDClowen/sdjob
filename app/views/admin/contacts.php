<div class="w-full max-w-screen-xl mb-5">
    <!-- Start coding here -->
    <div class="relative overflow-hidden border-b">
        <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
            <div>
                <h5 class="mr-3 font-semibold dark:text-white">İletişim İletileri</h5>
                <p class="text-gray-500 dark:text-gray-400">İletişim sayfasında gönderilen iletileri yönetin...</p>
            </div>
        </div>
    </div>
</div>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    İsim
                </th>
                <th scope="col" class="px-6 py-3">
                    Firma
                </th>
                <th scope="col" class="px-6 py-3">
                    Konu
                </th>
                <th scope="col" class="px-6 py-3">
                    Mesaj
                </th>
                <th scope="col" class="px-6 py-3">
                    Tarih
                </th>
                <th scope="col" class="px-6 py-3">
                    İşlem
                </th>
            </tr>
        </thead>
        <tbody>
            <tr n:foreach="$contacts as $v" id="contact-{$v->id}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {$v->name}
                </th>
                <td class="px-6 py-4">
                    {$v->title}
                </td>
                <td class="px-6 py-4">
                    {$v->subject}
                </td>
                <td class="px-6 py-4">
                    {shortText(html_entity_decode($v->message), 10, "...")}
                </td>
                <td class="px-6 py-4">
                    {strdate($v->createdAt, "d.m.y hh:mm:s")}
                </td>
                <td class="px-6 py-4" width="20%">
                    <a href="/admin/contact-view/{$v->id}" live="true" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Oku</a>
                    <a href="#" data-url="/admin/contact-delete/{$v->id}" data-remove="#contact-{$v->id}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Sil</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
