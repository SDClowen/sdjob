{njs("tinymce/tinymce.min")|noescape}
{njs("@tinymce/tinymce-jquery/dist/tinymce-jquery.min")|noescape}

<script>
  $(() => {
    $("#page-tinymce").tinymce({
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
<form class="w-full max-w-screen-xl" action="/admin/{$segment}" method="post" role="form" data-content=".message">
  <div class="message"></div>
  <label for="page-title" class="block mb-2 font-medium text-gray-900 dark:text-white">Sayfa Başlığı</label>
  <input type="text" value="{@html_entity_decode($page->title)}" name="title" id="page-title" class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  
  <label for="page-top-title" class="block mb-2 font-medium text-gray-900 dark:text-white">Sayfa Üst Başlığı</label>
  <input type="text" value="{@html_entity_decode($page->pageTopTitle)}" name="pageTopTitle" id="page-top-title" class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  
  <label for="page-sub-title" class="block mb-2 font-medium text-gray-900 dark:text-white">Sayfa Alt Başlığı</label>
  <input type="text" value="{@html_entity_decode($page->pageTopSubTitle)}" name="pageTopSubTitle" id="page-sub-title" class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

  <label for="parentCategory" class="block mb-2 font-medium text-gray-900 dark:text-white">Kategori</label>
  <select id="parentCategory" name="category" class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option value="0" selected>Seçilmedi</option>
    <option n:foreach="$categories as $category" {$category->id == @$page->category ? "selected" : ""} value="{$category->id}">{$category->title}</option>
  </select>
  
  <label for="page-tinymce" class="block mb-2 font-medium text-gray-900 dark:text-white">Sayfa İçeriği</label>
  <textarea name="content" id="page-tinymce">{@$page->content|noescape}</textarea>
  <button type="submit" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kaydet</button>
</form>