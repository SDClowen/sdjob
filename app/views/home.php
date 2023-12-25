<div style="background-color: #002559" class="relative">
    <div class="bg-center bg-no-repeat bg-cover opacity-60" style="height: 50rem; background-image: url(/public/aydin-efeler-slider3.jpg)">
    </div>
    <div class="flex items-center content pl-24 absolute w-full h-full left-0 top-0">
        <div>
            <span class="text-white text-[50px] font-bold block">EFELER KARİYER MERKEZİ<br />
                işe alım portalı.
            </span>
            <div class="text-white text-[16px]">Bölgesel İstihdam Ofislerimizdeki İş Fırsatları İçin Tıklayın</div>

            <form class="w-full mt-20 font-body" method="post" action="/jobs/feed">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">İş Bul</label>
                <div class="relative overflow-hidden">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" name="title" id="default-search" class="block w-full p-5 ps-10 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="İlan Başlığı İle Arayın..." required>
                    <button type="submit" class="text-white absolute end-0 bottom-0 top-0 p-5 px-12 text-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg rounded-s-none dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">İŞ BUL</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container mx-auto -mt-20 z-30 flex rounded-lg justify-between" style="font-family: Poppins;">
    <div class="rounded-lg bg-black-400 h-64 w-1/2 me-4 p-4 relative bg-center bg-no-repeat bg-cover text-white" style="background-image: url(/public/home-banner.jpeg)">
        <h1 class="text-2xl font-bold">
            Efeler Kariyer Merkezin'deki<br>İş İlanlarına Başvuru Yapın
        </h1>

        <img src="/public/efeler.png" width="48" class="absolute right-3 top-3 opacity-80">

        <a href="/jobs/feed" live="true" spinner="false" class="duration-300 transition-colors w-fit text-white absolute bottom-6 left-4 p-2 ps-3 flex content-between text-xl text-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            <span class="mr-4">Başvuru Yapın</span>
            <svg fill="#ffffff" class="w-8 h-8 ms-auto" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M7.75 16.063l-7.688-7.688 3.719-3.594 11.063 11.094-11.344 11.313-3.5-3.469z"></path>
                </g>
            </svg>
        </a>
    </div>

    <div class="rounded-lg bg-black-400 h-64 w-1/2 me-4 p-4 relative bg-center bg-no-repeat bg-cover text-white" style="background-image: url(/public/home-banner.jpeg)">
        <h1 class="text-2xl font-bold">
            Efeler Kariyer Merkezin'de<br>İş İlanı Yayımlayın
        </h1>

        <img src="/public/efeler.png" width="48" class="absolute right-3 top-3 opacity-80">

        <a href="/jobs/create" live="true" spinner="false" class="duration-300 transition-colors w-fit text-white absolute bottom-6 left-4 p-2 ps-3 flex content-between text-xl text-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            <span class="mr-4">İş İlanı Verin</span>
            <svg fill="#ffffff" class="w-8 h-8 ms-auto" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M7.75 16.063l-7.688-7.688 3.719-3.594 11.063 11.094-11.344 11.313-3.5-3.469z"></path>
                </g>
            </svg>
        </a>
    </div>
</div>

<div class="container mx-auto mt-8 dark:text-white">
    <h1 class="text-3xl font-semibold" style="font-family: Poppins">Öne Çıkan İlanlar</h1>
    <div class="grid w-full grid-cols-3 gap-4 mt-4">
        <div n:foreach="$jobs as $job" class="border rounded-lg p-3 shadow-md bg-clip-border bg-white dark:bg-gray-900 dark:text-white dark:border-gray-700">
            <h1 class="text-xl font-medium mb-3">{$job->title}</h1>
            <a href="/jobs/detail/{$job->slug}" live="true" class="text-red-500 text-md">İlanı İncele</a>
        </div>

        <br/>
        <a href="/jobs/feed" live="true" style="font-family: Poppins" class="duration-300 transition-colors w-fit text-white p-2 px-6 flex content-between text-xl text-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            <span class="mr-4">Daha Fazla</span>
            <svg fill="#ffffff" class="w-8 h-8 ms-auto" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M7.75 16.063l-7.688-7.688 3.719-3.594 11.063 11.094-11.344 11.313-3.5-3.469z"></path>
                </g>
            </svg>
        </a>
    </div>
</div>

<div style="background-color: #002559" class="relative mt-10">
    <div class="bg-center bg-no-repeat bg-cover opacity-60" style="height: 35rem; background-image: url(/public/home-hands.jpg)">
    </div>
    <div class="flex items-center content pl-24 absolute w-full h-full left-0 top-0">
        <div class="mx-auto text-center">
            <span class="text-white text-[50px] font-bold block">Efeler Kariyer İle Hayalinizdeki<br>İşe Kavuşun</span>

            <a href="#" style="font-family: Poppins" class="mx-auto my-6 duration-300 transition-colors w-fit text-white p-2 px-6 flex content-between text-xl text-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <span class="mr-4">Daha Fazla</span>
                <svg fill="#ffffff" class="w-8 h-8 ms-auto" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M7.75 16.063l-7.688-7.688 3.719-3.594 11.063 11.094-11.344 11.313-3.5-3.469z"></path>
                    </g>
                </svg>
            </a>
        </div>
    </div>
</div>

<div class="container mx-auto -mt-28 mb-20 z-30 flex rounded-lg justify-between dark:text-white" style="font-family: Poppins;">
    <div class="relative pt-10 rounded-lg shadow-lg bg-white dark:bg-gray-700 h-72 w-1/2 me-4 p-6 flex flex-col content-between gap-4">
        <svg class="w-12 h-12 mx-auto text-red-500" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M515.038 68.496c-98.858 1.251-59.037 75.835-346.991 77.109v443.378c0 191.637 302.412 366.268 346.991 366.268S862.029 780.62 862.029 588.983V145.605c-283.135 0.532-251.74-78.314-346.991-77.109zM823.474 590.24c0 153.941-286.85 326.258-308.437 326.457-21.492 0.199-307.232-173.721-308.437-326.457V195.055c255.96-1.135 220.563-67.613 308.437-68.727 84.668-1.074 56.76 69.202 308.437 68.727V590.24zM382.718 463.68c-7.528-7.528-19.734-7.528-27.262 0-7.528 7.528-7.528 19.734 0 27.262l122.681 122.681c7.528 7.528 19.734 7.528 27.262 0l207.774-207.774c7.528-7.528 7.528-19.734 0-27.262-7.528-7.528-19.734-7.528-27.262 0L491.768 572.73l-109.05-109.05z" fill="currentColor"></path></g></svg>
        <h1 class="text-2xl font-semibold text-center">
            Güven
        </h1>

        <p class="text-gray-500 dark:text-gray-200 text-center text-md">İş ilanları Kariyer Danışmanları tarafından inceleniyor.</p>
    </div>
    <div class="relative pt-10 rounded-lg shadow-lg bg-white dark:bg-gray-700 h-72 w-1/2 me-4 p-6 flex flex-col content-between gap-4">
        <svg class="w-12 h-12 mx-auto text-red-500"  viewBox="0 0 1024 1024" fill="currentColor" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M983.902 1023.894H40.098a7.994 7.994 0 0 1-7.998-8v-95.98c0-68.64 35.562-94.948 101.174-119.474 11.654-4.342 26.706-8.858 42.64-13.636 67.572-20.262 160.124-48.022 160.124-106.838 0-4.422 3.578-7.998 7.998-7.998s7.998 3.576 7.998 7.998c0 70.718-99.134 100.45-171.528 122.162-15.676 4.702-30.478 9.138-41.63 13.31-61.504 22.978-90.778 44.49-90.778 104.476v87.982h927.808v-87.982c0-59.986-29.276-81.498-90.792-104.476-11.138-4.172-25.95-8.61-41.618-13.31-72.39-21.712-171.528-51.444-171.528-122.162a7.994 7.994 0 0 1 7.998-7.998 7.992 7.992 0 0 1 7.998 7.998c0 58.816 92.544 86.576 160.124 106.838 15.934 4.78 30.992 9.294 42.63 13.636 65.626 24.528 101.182 50.834 101.182 119.474v95.98c0 4.422-3.578 8-7.998 8z" fill=""></path><path d="M512 719.958c-109.562 0-268.006-158.608-286.152-327.058a7.99 7.99 0 0 1 7.092-8.81c4.552-0.39 8.342 2.71 8.81 7.092 8.154 75.656 46.888 155.576 106.274 219.252 53.786 57.69 116.616 93.528 163.974 93.528 51.928 0 121.724-42.836 177.854-109.134a8.044 8.044 0 0 1 11.28-0.938 8.014 8.014 0 0 1 0.938 11.28c-59.034 69.732-133.644 114.788-190.07 114.788zM741.14 543.992a7.992 7.992 0 0 1-6.92-12.012c32.54-56.058 49.722-115.516 49.722-171.95a7.994 7.994 0 0 1 8-7.998 7.992 7.992 0 0 1 7.996 7.998c0 59.254-17.934 121.482-51.878 179.978a7.984 7.984 0 0 1-6.92 3.984z" fill=""></path><path d="M344.036 694.632a7.994 7.994 0 0 1-7.998-7.998v-68.766c0-4.422 3.578-7.998 7.998-7.998s7.998 3.576 7.998 7.998v68.766a7.994 7.994 0 0 1-7.998 7.998zM679.964 687.962a7.994 7.994 0 0 1-7.998-7.998v-62.08a7.994 7.994 0 0 1 7.998-7.998 7.992 7.992 0 0 1 7.998 7.998v62.08a7.992 7.992 0 0 1-7.998 7.998zM376.02 992.462c-0.874 0-1.756-0.14-2.632-0.454a8 8 0 0 1-4.92-10.186 151.48 151.48 0 0 1 16.894-33.976c28.276-42.524 75.618-67.924 126.638-67.924 11.358 0 22.668 1.25 33.62 3.732a8.006 8.006 0 0 1 6.06 9.562c-0.968 4.31-5.28 7.044-9.56 6.03a137.668 137.668 0 0 0-30.12-3.328c-45.654 0-88.012 22.73-113.312 60.786a135.646 135.646 0 0 0-15.114 30.4 8 8 0 0 1-7.554 5.358zM647.972 992.462a8.01 8.01 0 0 1-7.56-5.358 134.146 134.146 0 0 0-15.124-30.384 137.06 137.06 0 0 0-22.62-26.166 7.986 7.986 0 0 1-0.624-11.294c2.952-3.266 8.03-3.546 11.278-0.61a153.044 153.044 0 0 1 25.308 29.198 152.962 152.962 0 0 1 16.902 33.976 8.012 8.012 0 0 1-7.56 10.638zM496.004 991.9a7.996 7.996 0 0 1-5.656-13.654l143.97-143.968a7.996 7.996 0 1 1 11.31 11.308l-143.97 143.97a7.964 7.964 0 0 1-5.654 2.344zM823.936 328.038a7.994 7.994 0 0 1-7.998-8C815.938 152.45 679.59 16.102 512 16.102S208.064 152.45 208.064 320.04c0 4.422-3.578 8-8 8a7.994 7.994 0 0 1-7.998-8C192.066 143.63 335.592 0.106 512 0.106c176.4 0 319.934 143.526 319.934 319.934a7.994 7.994 0 0 1-7.998 7.998z" fill=""></path><path d="M200.064 759.95a7.994 7.994 0 0 1-7.998-8V320.04a7.994 7.994 0 0 1 7.998-7.998c4.422 0 8 3.578 8 7.998v431.91c0 4.422-3.578 8-8 8z" fill=""></path><path d="M823.936 759.95a7.994 7.994 0 0 1-7.998-8V320.04c0-4.42 3.576-7.998 7.998-7.998s7.998 3.578 7.998 7.998v431.91c0 4.422-3.576 8-7.998 8z" fill=""></path><path d="M201.682 375.864l-3.234-15.668c277.74-57.308 505.576-282.95 507.854-285.222l11.31 11.294c-2.294 2.312-233.41 231.296-515.93 289.596z" fill=""></path><path d="M820.874 344.988c-149.876-54.59-259.04-137.746-260.118-138.582l9.748-12.684c1.062 0.82 108.4 82.522 255.838 136.236l-5.468 15.03z" fill=""></path><path d="M603.982 607.98a8.018 8.018 0 0 1-7.938-6.984 8.002 8.002 0 0 1 6.938-8.95c1.482-0.188 149.718-19.762 184.336-84.664 10.216-19.106 9.374-39.976-2.532-63.792a8.004 8.004 0 0 1 3.578-10.732 8.012 8.012 0 0 1 10.732 3.578c14.2 28.4 14.98 54.808 2.342 78.492-38.524 72.164-190.024 92.176-196.458 92.988a7.138 7.138 0 0 1-0.998 0.064z" fill=""></path><path d="M577.986 623.976c-19.058 0-33.992-10.544-33.992-23.996 0-13.45 14.934-23.994 33.992-23.994s33.992 10.544 33.992 23.994c0 13.452-14.934 23.996-33.992 23.996z m0-31.992c-11.154 0-17.996 5.17-17.996 7.996 0 2.828 6.842 8 17.996 8s17.996-5.172 17.996-8c0-2.826-6.842-7.996-17.996-7.996z" fill=""></path><path d="M512 815.938c-155.264 0-195.068-81.14-196.686-84.594a7.992 7.992 0 0 1 3.85-10.636c3.976-1.876 8.734-0.156 10.616 3.826 0.398 0.812 37.938 75.406 182.22 75.406 144.876 0 176.244-74.204 176.526-74.954 1.64-4.092 6.312-6.108 10.404-4.452a8.016 8.016 0 0 1 4.468 10.388c-1.406 3.468-35.804 85.016-191.398 85.016z" fill=""></path></g></svg>
        <h1 class="text-2xl font-semibold text-center">
            Referanslar
        </h1>

        <p class="text-gray-500 dark:text-gray-200 text-center text-md">Efeler Kariyer Merkezi olarak istihdam sağlıyoruz.</p>
    </div>
    <div class="relative pt-10 rounded-lg shadow-lg bg-white dark:bg-gray-700 h-72 w-1/2 me-4 p-6 flex flex-col content-between gap-4">
        <svg class="w-12 h-12 mx-auto text-red-500" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="currentColor" stroke="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="currentColor" d="M60,13H48V4c0-2.211-1.789-4-4-4H20c-2.211,0-4,1.789-4,4v9H4c-2.211,0-4,1.789-4,4v43c0,2.211,1.789,4,4,4 h56c2.211,0,4-1.789,4-4V17C64,14.789,62.211,13,60,13z M18,4c0-1.104,0.896-2,2-2h24c1.104,0,2,0.896,2,2v9h-2V5 c0-0.553-0.447-1-1-1H21c-0.553,0-1,0.447-1,1v8h-2V4z M42,6v7H22V6H42z M62,60c0,1.104-0.896,2-2,2H4c-1.104,0-2-0.896-2-2V42h10v5 c0,0.553,0.447,1,1,1h6c0.553,0,1-0.447,1-1v-5h24v5c0,0.553,0.447,1,1,1h6c0.553,0,1-0.447,1-1v-5h10V60z M14,46V36h4v10H14z M46,46V36h4v10H46z M62,40H52v-5c0-0.553-0.447-1-1-1h-6c-0.553,0-1,0.447-1,1v5H20v-5c0-0.553-0.447-1-1-1h-6 c-0.553,0-1,0.447-1,1v5H2V17c0-1.104,0.896-2,2-2h56c1.104,0,2,0.896,2,2V40z"></path> </g></svg>
        
        <h1 class="text-2xl font-semibold text-center">
            İş Veren Güvencesi
        </h1>

        <p class="text-gray-500 dark:text-gray-200 text-center text-md">Güvenilir başvuru ve süreç yönetimi ile ihtiyacınız olan çalışanı anında bulun!</p>
    </div>
</div>