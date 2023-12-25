<h1 n:if="!$jobs" class="m-3 text-center text-xl">Hiç ilan yok...</h1>
<div n:foreach="$jobs as $job" id="d{$job->id}" class="mb-6 rounded-xl border dark:border-gray-700 bg-white dark:bg-gray-800 shadow-md p-6">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <img class="mr-2 h-16 w-16 rounded-full object-cover" src="/public/users/{$job->photo ?? 'no-photo.jpg'}" />
            <div>
                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100"><a href="/jobs/detail/{$job->slug}" live="true">{$job->title}</a></h3>
                <span class="block text-xs font-normal text-gray-500 dark:text-gray-300"><a href="#" live="true">{$job->employerTitle}</a></span>
            </div>
        </div>
        <div class="inline-flex self-end">
            {if $user}
            {if $user->type != 1}
            {if $user && $job->applicantId === $user->id}
            <a href="#" onclick="return false" title="{time_diff($job->applicantDate)}" class="mr-3 flex items-center justify-center px-4 py-2 text-md font-medium text-white rounded-lg bg-gray-400 dark:bg-gray-600">
                <svg viewBox="0 0 24 24" class="h-3.5 w-3.5 mr-2 -ml-1" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z" fill="currentColor"></path>
                    </g>
                </svg>
                Başvuruldu
            </a>
            <span class="text-gray-600"></span>
            {else}
            <div class="a-update-{$job->id}">
                <a href="#" data-url="/jobs/applicant/{$job->id}" data-type="html" data-content=".a-update-{$job->id}" class="mr-3 flex items-center justify-center px-4 py-2 text-md font-medium text-white rounded-lg hover:shadow-md transition-colors duration-200 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-red-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <span class="mr-2">Başvur</span>
                    <svg viewBox="0 0 16 16" class="h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="m 4 2 c 0 -0.265625 0.105469 -0.519531 0.292969 -0.707031 c 0.390625 -0.390625 1.023437 -0.390625 1.414062 0 l 6 6 c 0.1875 0.1875 0.292969 0.441406 0.292969 0.707031 s -0.105469 0.519531 -0.292969 0.707031 l -6 6 c -0.390625 0.390625 -1.023437 0.390625 -1.414062 0 c -0.1875 -0.1875 -0.292969 -0.441406 -0.292969 -0.707031 s 0.105469 -0.519531 0.292969 -0.707031 l 5.292969 -5.292969 l -5.292969 -5.292969 c -0.1875 -0.1875 -0.292969 -0.441406 -0.292969 -0.707031 z m 0 0" fill="currentColor"></path>
                        </g>
                    </svg>
                </a>
            </div>
            {/if}
            {/if}
            {else}
            <a href="/auth" live="true" class="mr-3 flex items-center justify-center px-4 py-2 text-md font-medium text-white rounded-lg hover:shadow-md transition-colors duration-200 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-red-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <span class="mr-2">Başvur</span>
                <svg viewBox="0 0 16 16" class="h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="m 4 2 c 0 -0.265625 0.105469 -0.519531 0.292969 -0.707031 c 0.390625 -0.390625 1.023437 -0.390625 1.414062 0 l 6 6 c 0.1875 0.1875 0.292969 0.441406 0.292969 0.707031 s -0.105469 0.519531 -0.292969 0.707031 l -6 6 c -0.390625 0.390625 -1.023437 0.390625 -1.414062 0 c -0.1875 -0.1875 -0.292969 -0.441406 -0.292969 -0.707031 s 0.105469 -0.519531 0.292969 -0.707031 l 5.292969 -5.292969 l -5.292969 -5.292969 c -0.1875 -0.1875 -0.292969 -0.441406 -0.292969 -0.707031 z m 0 0" fill="currentColor"></path>
                    </g>
                </svg>
            </a>
            {/if}
        </div>
    </div>
    <div class="mt-6 flex items-center justify-between text-sm text-gray-600 dark:text-gray-400">
        <div class="flex">
            {App\Models\Job::WORKING_TYPES[$job->workingType]}
        </div>
        <div class="flex items-center">
            {time_diff($job->createdAt)} yayımlandı
        </div>
    </div>
</div>