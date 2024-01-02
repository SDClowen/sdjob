<div style="background-color: #002559; font-family: Poppins" class="relative mb-12">
    <div class="bg-center bg-no-repeat bg-cover opacity-50 h-96" style="background-image: url(/public/jumbotron.jpg)">
    </div>
    <div class="flex items-center justify-start absolute w-full h-full left-0 top-0">
        <div class="ms-24">
            <span class="text-white text-[50px] font-semibold block">{lang('employer.register')}</span>
        </div>
    </div>
</div>


<div class="message fixed bottom-5 right-5 min-h-max z-20"></div>
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 lg:py-16 px-4 mx-auto m-6 max-w-screen-md">
        <h2 class="hidden mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">{lang('employer.register')}</h2>
        <p class="hidden mb-8 lg:mb-16 font-light text-center text-white0 dark:text-gray-400 sm:text-xl">{lang('employer.register')}</p>
        <form role="form" method="post" data-content=".message" action="/register/employer" class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2">
                <div class="m-1">
                    <label for="name" class="block mb-2 font-medium text-gray-900 dark:text-gray-300">Adınız *</label>
                    <input name="name" type="text" id="name" class="p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>
                <div class="m-1">
                    <label for="surname" class="block mb-2 font-medium text-gray-900 dark:text-gray-300">Soyadınız *</label>
                    <input name="surname" type="text" id="surname" class="p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2">
                <div class="m-1">
                    <label for="email" class="block mb-2 font-medium text-gray-900 dark:text-gray-300">E-Posta *</label>
                    <input name="email" type="email" id="email" class="block p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>
                <div class="m-1">
                    <label for="phone" class="block mb-2 font-medium text-gray-900 dark:text-gray-300">Telefon *</label>
                    <input name="phone" type="phone" id="phone" class="block p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>
            </div>
            <div>
                <label for="state" class="block mb-2 font-medium text-gray-900 dark:text-white">İlçe *</label>
                <select name="stateId" id="state" class="block w-full p-2 mb-6 text-gray-900 border border-gray-300 rounded-md bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option n:foreach="$states as $value" value="{$value->id}">{$value->name}</option>
                </select>
            </div>

            <div>
                <label for="companyName" class="block mb-2 font-medium text-gray-900 dark:text-gray-300">Şirket Adı *</label>
                <input name="companyName" type="text" id="companyName" class="block p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div>
                <label for="companyTitle" class="block mb-2 font-medium text-gray-900 dark:text-gray-300">Şirket Ünvanı *</label>
                <input name="companyTitle" type="text" id="companyTitle" class="block p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div>
                <label for="companyAddress" class="block mb-2 font-medium text-gray-900 dark:text-gray-300">Şirket Adresi *</label>
                <textarea name="companyAddress" rows="3" id="companyAddress" class="block p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"></textarea>
            </div>

            <div>
                <label for="sector" class="block mb-2 font-medium text-gray-900 dark:text-white">Sektör *</label>
                <select name="sectorId" id="sector" class="block w-full p-2 mb-6 text-gray-900 border border-gray-300 rounded-md bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option n:foreach="$sectors as $value" value="{$value->id}">{$value->name}</option>
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2">
                <div class="m-1">
                    <label for="taxOffice" class="block mb-2 font-medium text-gray-900 dark:text-gray-300">Vergi Dairesi</label>
                    <input name="taxOffice" type="text" id="taxOffice" class="block p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>
                <div class="m-1">
                    <label for="taxNo" class="block mb-2 font-medium text-gray-900 dark:text-gray-300">Vergi No</label>
                    <input name="taxNo" type="text" id="phone" class="block p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                </div>
            </div>

            <div>
                <label for="password" class="block mb-2 font-medium text-gray-900 dark:text-gray-300">Şifre *</label>
                <input name="password" type="password" id="password" class="block p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>

            <div>
                <label for="passwordagain" class="block mb-2 font-medium text-gray-900 dark:text-gray-300">Şifre Tekrar*</label>
                <input name="passwordRepeat" type="password" id="passwordagain" class="block p-2 w-full text-gray-900 bg-white rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            </div>
            <script>
                $(function () {
                    $("#show-hide-privacy").click(function () {
                        const content = $("#privacy-content");
                        content.toggle()

                        if (content.is(":visible"))
                            $(this).text("Gizlilik Politikasını Gizle")
                        else
                            $(this).text("Gizlilik Politikasını Görüntüle")

                        return false
                    })
                })
            </script>
            <a href="#" id="show-hide-privacy" class="text-md underline mt-8 inline-block" id="show-hide-privacy">Gizlilik Politikasını Görüntüle</a>
            {include 'layouts/privacy.php'}
            <div class="flex items-center">
                <input name="privacy" id="checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox" class="select-none ms-2 text-md font-medium text-gray-600 dark:text-gray-300">Lütfen gizlilik politikamızı kabul ettiğinizi onaylayın</label>
            </div>

            <button type="submit" class="block mx-auto py-3 p-24 text-md font-medium text-center text-white rounded-md bg-blue-400 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Oluştur</button>
        </form>
    </div>
</section>