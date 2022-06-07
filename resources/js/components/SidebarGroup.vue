<template>
    <div class="flex flex-col select-none">
        <div class="mx-3">
            <div class="py-[10px] px-4 text-13 leading-5 font-500 rounded-[6px]">
                    <div class="text-xs font-semibold tracking-wider text-pink-500 uppercase">Dashboards</div>
                    <div class="text-sm leading-normal opacity-50">Unique dashboard designs</div>
            </div>
        </div>
        <div>
            <SidebarItem />
            <SidebarItem />
            <SidebarItem childs/>
            <SidebarItem />
            <SidebarItem />
            <SidebarItem />
        </div>
    </div>
</template>
 
<script >
import SidebarItem from './SidebarItem' 

export default {
  components: {
    SidebarItem,
  },
   
}

</script>