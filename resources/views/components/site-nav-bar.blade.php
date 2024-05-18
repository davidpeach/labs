<!--
  This example requires Tailwind CSS v2.0+

  The alpine.js code is *NOT* production ready and is included to preview
  possible interactivity
-->
<div>

    <nav class="bg-white shadow border-b-8 border-indigo-500">
        <!-- <div class="mx-auto max-w-wide lg:px-8"> -->
        <div class="mx-auto max-w-wide flex flex-col lg:flex-row lg:h-16 lg:px-8 gap-4 justify-between">
            <div class="flex">
                <p
                    class="inline-flex items-center border-b-2 border-transparent px-4 pt-1 text-2xl font-bold text-gray-500">
                    David Peach</p>
            </div>
            <div class="flex flex-wrap lg:flex-nowrap">
                <x-partials.nav-item label="Home" route="home" to="home" mode="wide" />
                <x-partials.nav-item label="Now" route="now" to="now" mode="wide" />
                <x-partials.nav-item label="Notes" route="note" to="note.index" mode="wide" />
                <x-partials.nav-item label="Articles" route="article" to="article.index" mode="wide" />
                <x-partials.nav-item label="Photos" route="photo" to="photo.index" mode="wide" />
                <x-partials.nav-item label="Jams" route="jam" to="jam.index" mode="wide" />
            </div>
        </div>
        <!-- </div> -->
    </nav>
</div>
