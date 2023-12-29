<div class="container px-6 py-12 mx-auto relative">
    <div class="lg:flex lg:-mx-6">

        <div class="lg:w-8/12 ps-6">
            <div class="w-full">
                <div class="p-6 bg-white dark:bg-gray-800 my-4 rounded-md shadow-md bg-clip-border">
                    <div class="">
                        <h1 class="flex justify-between font-semibold text-xl text-gray-800 dark:text-gray-200">
                            <span>
                                <i class="text-gray-500 text-sm font-light">{time_diff($job->createdAt)}</i><br>
                                {$job->title}
                            </span>

                            <div class="inline-flex self-end">
                                {if isset($user)}
                                {if $user->type != 1}
                                {if $user && $job->applicantId === $user->id}
                                <a href="#" onclick="return false" title="{time_diff($job->applicantDate)}" class="mr-3 flex items-center justify-center px-4 py-2 text-md font-medium text-white rounded-lg bg-gray-400 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                    </svg>
                                    Başvuruldu
                                </a>
                                <span class="text-gray-600"></span>
                                {else}
                                <div class="a-update-{$job->id}">
                                    <a href="#" data-url="/jobs/applicant/{$job->id}" data-type="html" data-content=".a-update-{$job->id}" class="mr-3 flex items-center justify-center px-4 py-2 text-md font-medium text-white rounded-lg hover:shadow-md transition-colors duration-200 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-red-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                        </svg>
                                        Başvur
                                    </a>
                                </div>
                                {/if}
                                {/if}
                                {else}
                                <a href="/auth" class="mr-3 flex items-center justify-center px-4 py-2 text-md font-medium text-white rounded-lg hover:shadow-md transition-colors duration-200 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-red-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                    </svg>
                                    Başvur
                                </a>
                                {/if}
                            </div>
                        </h1>
                        <span class="text-md text-red-600">{$job->employerTitle}</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-5 gap-2">

                        <div class="flex flex-col items-start justify-center rounded-lg bg-gray-50 dark:bg-gray-900 bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                            <p class="text-sm text-gray-600">Çalışma Şekli</p>
                            <p class="text-base font-medium text-navy-700 dark:text-white">
                                {\App\Models\Job::WORKING_TYPES[$job->workingType]}
                            </p>
                        </div>

                        <div class="flex flex-col items-start justify-center rounded-lg bg-gray-50 dark:bg-gray-900  bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                            <p class="text-sm text-gray-600">Pozisyon Seviyesi</p>
                            <p class="text-base font-medium text-navy-700 dark:text-white">
                                {\App\Models\Job::POSITIONS[$job->position]}
                            </p>
                        </div>

                        <div class="flex flex-col items-start justify-center rounded-lg bg-gray-50 dark:bg-gray-900  bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                            <p class="text-sm text-gray-600">Departman</p>
                            <p class="text-base font-medium text-navy-700 dark:text-white">
                                {\App\Models\Job::DEPARTMENTS[$job->department]}
                            </p>
                        </div>

                        <div class="flex flex-col items-start justify-center rounded-lg bg-gray-50 dark:bg-gray-900  bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                            <p class="text-sm text-gray-600">Başvuru Sayısı</p>
                            <p class="text-base font-medium text-navy-700 dark:text-white">
                                {$applicantCount}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="relative rounded-md p-6 flex flex-col items-center dark:bg-gray-800 bg-white bg-clip-border shadow-md dark:!bg-navy-800 dark:text-white dark:!shadow-none">
                    <div class="mt-2 mb-8 w-full">
                        <h4 class="text-md font-bold text-navy-700 dark:text-white">
                            General Bilgiler
                        </h4>
                        <p class="mt-2 px-2 text-base text-gray-600">
                            {$job->description|noescape}
                        </p>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 px-2 w-full">
                        <div class="flex flex-col items-start justify-center rounded-lg bg-gray-50 dark:bg-gray-900  bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                            <p class="text-sm text-gray-600">Tecrübe</p>
                            <p class="text-base font-medium text-navy-700 dark:text-white">
                                {\App\Models\Job::KNOWLEDGES[$job->knowledge]}
                            </p>
                        </div>

                        <div class="flex flex-col justify-center rounded-lg bg-gray-50 dark:bg-gray-900  bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                            <p class="text-sm text-gray-600">Eğitim Seviyesi</p>
                            <p class="text-base font-medium text-navy-700 dark:text-white">
                                {\App\Models\Job::EDUCATIONS[$job->educationLevel]}
                            </p>
                        </div>

                        <div class="flex flex-col items-start justify-center rounded-lg bg-gray-50 dark:bg-gray-900  bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                            <p class="text-sm text-gray-600">Askerlik Durumu</p>
                            <p class="text-base font-medium text-navy-700 dark:text-white">
                                {\App\Models\Job::EDUCATIONS[$job->educationLevel]}
                            </p>
                        </div>

                        <div class="flex flex-col justify-center rounded-lg bg-gray-50 dark:bg-gray-900  bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                            <p class="text-sm text-gray-600">Cinsiyet</p>
                            <p class="text-base font-medium text-navy-700 dark:text-white">
                                {\App\Models\Job::GENDERS[$job->gender]}
                            </p>
                        </div>

                        <div class="flex flex-col items-start justify-center rounded-lg dark:bg-gray-900  bg-gray-50 bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                            <p class="text-sm text-gray-600">Bölge</p>
                            <p class="text-base font-medium text-navy-700 dark:text-white">
                                Aydın - {$job->state}
                            </p>
                        </div>

                        <div class="flex flex-col justify-center rounded-lg bg-gray-50 dark:bg-gray-900  bg-clip-border px-3 py-4 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
                            <p class="text-sm text-gray-600">Görüntüleme Sayısı</p>
                            <p class="text-base font-medium text-navy-700 dark:text-white">
                                {(int)$job->viewCount}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:w-1/3 px-8 sticky right-0 top-0">
            <div class="p-6 bg-white my-4 rounded-md shadow-md bg-clip-border dark:bg-gray-900">
                <div class="flex items-center">
                    <img class="mr-2 h-16 w-16 rounded-full object-cover" src="/public/users/{$job->photo ?? 'no-photo.jpg'}" />
                    <div>
                        <h3 class="text-red-600 text-xl font-semibold"><a href="/jobs/detail/{$job->slug}" live="true">{$job->employerTitle}</a></h3>
                        <span class="block text-sm font-normal text-gray-500">{$job->sector}</span>
                    </div>
                </div>
                <hr class="my-5">
                <h1 class="font-bold text-gray-600 rounded-md">Hakkımızda</h1>
                {$job->employerDescription}
            </div>
        </div>

    </div>
</div>