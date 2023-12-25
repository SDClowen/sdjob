<form class="max-w-sm mx-auto" action="/admin/{$segment}" method="post" role="form" data-content=".message">
  <div class="message"></div>
  <label for="category-title" class="block mb-2 text-gray-900 dark:text-white">Kategori Başlığı</label>
  <input type="text" name="title" value="{@$category->title}" id="category-title" class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

  <label for="parentCategory" class="block mb-2 text-gray-900 dark:text-white">Üst Kategori</label>
  <select id="parentCategory" name="parentId" class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option value="0" selected>Seçilmedi</option>
    <option n:foreach="$categories as $v" n:if="$v->id != @$category->id" {$v->id == @$category->parentId ? "selected" : ""} value="{$v->id}">{$v->title}</option>
  </select>


  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kaydet</button>
</form>