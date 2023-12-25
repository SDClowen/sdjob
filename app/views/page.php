<div n:if="!empty($pageContent->pageTopTitle) || !empty($pageContent->pageTopSubTitle)" style="background-color: #002559" class="relative">
    <div class="bg-center bg-no-repeat bg-cover opacity-10 h-96" style="background-image: url(/public/background_header.png)">
    </div>
    <div class="flex items-center justify-center absolute w-full h-full top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 max-w-2xl">
        <div>
            <span class="text-white text-[58px] font-bold block">{@html_entity_decode($pageContent->pageTopTitle)}</span>
            <div class="text-white text-[26px] font-bold text-center">{@html_entity_decode($pageContent->pageTopSubTitle)}</div>
        </div>
    </div>
</div>
<div class="my-20 p-10 relative container mx-auto text-slate-800 dark:text-slate-200">
    {@html_entity_decode($pageContent->content)|noescape}
</div>