<div x-data="{ open: false }" class="relative">
    <select @change="translatePage($event)" class="bg-white dark:bg-sky-900 dark:text-sky-200 text-black p-2 rounded cursor-pointer w-10" aria-label="Language Selector">
        <option value="en">English</option>
        <option value="es">Spanish</option>
        <option value="fr">French</option>
        <option value="de">German</option>
        <option value="zh-CN">Chinese</option>
    </select>
</div>
<div id="google_translate_element" style="display: none;"></div>