{njs("tinymce/tinymce.min")|noescape}
{njs("@tinymce/tinymce-jquery/dist/tinymce-jquery.min")|noescape}

<script>
    $(() => {
        $("#job-tinymce").tinymce({
            height: 500,
            menubar: false,
            paste_data_images: true,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
                'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | bold italic link | forecolor backcolor |  image media | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | removeformat | help | code',
            setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                })
            }
        });
    })
</script>

<div class="message"></div>
<form role="form" class="max-w-2xl mx-auto m-10" style="color: #002559" method="post" action="/jobs/{$segment}" data-content=".message">
    <div class="mb-5">
        <label for="title" class="block mb-2 font-medium text-gray-600 dark:text-white">İlan Başlığı</label>
        <input value="{@$job->title}" type="text" name="title" id="title" class="border border-gray-300 text-gray-600 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="knowledge" class="block mb-2 font-medium text-gray-600 dark:text-white">Tecrübe</label>
            <select name="knowledge" id="knowledge" class="block w-full p-2 mb-6 text-gray-600 border border-gray-300 rounded-md bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option n:foreach="App\Models\Job::KNOWLEDGES as $k => $v" {$k==@$job->knowledge ? "selected" : ""} value="{$k}">{$v}</option>
            </select>
        </div>
        <div>
            <label for="educationLevel" class="block mb-2 font-medium text-gray-600 dark:text-white">Tecrübe</label>
            <select name="educationLevel" id="educationLevel" class="block w-full p-2 mb-6 text-gray-600 border border-gray-300 rounded-md bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option n:foreach="App\Models\Job::EDUCATIONS as $k => $v" {$k==@$job->educationLevel ? "selected" : ""} value="{$k}">{$v}</option>
            </select>
        </div>
        <div>
            <label for="militaryStatus" class="block mb-2 font-medium text-gray-600 dark:text-white">Askerlik Durumu</label>
            <select name="militaryStatus" id="militaryStatus" class="block w-full p-2 mb-6 text-gray-600 border border-gray-300 rounded-md bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option n:foreach="App\Models\Job::MILITARY_SITUATIONS as $k => $v" {$k==@$job->militaryStatus ? "selected" : ""} value="{$k}">{$v}</option>


            </select>
        </div>
        <div>
            <label for="workingType" class="block mb-2 font-medium text-gray-600 dark:text-white">Çalışma Şekli</label>
            <select name="workingType" id="workingType" class="block w-full p-2 mb-6 text-gray-600 border border-gray-300 rounded-md bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option n:foreach="App\Models\Job::WORKING_TYPES as $k => $v" {$k==@$job->workingType ? "selected" : ""} value="{$k}">{$v}</option>
            </select>
        </div>
        <div>
            <label for="gender" class="block mb-2 font-medium text-gray-600 dark:text-white">Cinsiyet</label>
            <select name="gender" id="gender" class="block w-full p-2 mb-6 text-gray-600 border border-gray-300 rounded-md bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option n:foreach="App\Models\Job::GENDERS as $k => $v" {$k==@$job->gender ? "selected" : ""} value="{$k}">{$v}</option>
            </select>
        </div>
        <div>
            <label for="state" class="block mb-2 font-medium text-gray-600 dark:text-white">İlçe</label>
            <select name="stateId" id="state" class="block w-full p-2 mb-6 text-gray-600 border border-gray-300 rounded-md bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option n:foreach="$states as $value"  {$value->id == @$job->stateId ? "selected" : ""} value="{$value->id}">{$value->name}</option>
            </select>
        </div>
    </div>

    <label for="job-tinymce" class="block mb-2 font-medium text-gray-600 dark:text-white">İlan Detayı</label>
    <textarea class="w-full" name="description" id="job-tinymce">{@$job->description}</textarea>
    <button type="submit" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{$segment == "create" ? "Oluştur" : "Güncelle"}</button>
</form>