<template>
	<div class="flex w-full h-screen overflow-hidden bg-slate-100">
		<LeftSidebar />

		<div class="flex flex-col flex-1 h-screen overflow-hidden overflow-y-auto">
			<TopSidebar />
			<main class="flex-1">
				<slot />
			</main>
		</div>

	</div>



  <!-- <main>
    <header>
      <Link href="/">Home</Link>
      <Link href="/admin/block">Blocks</Link>
      <Link href="/admin/floor">Floors</Link>
    </header>
    asdasd
    <article>
 

  


    </article>
  </main> -->
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import LeftSidebar from '../components/LeftSidebar'
import TopSidebar from '../components/TopSidebar'

export default {
  components: {
    Link,
	LeftSidebar,
	TopSidebar,
  },
   
}
</script> 