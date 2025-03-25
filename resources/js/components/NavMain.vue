<script setup lang="ts">
import {
    SidebarGroup, SidebarGroupAction,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarMenuSub, SidebarMenuSubButton, SidebarMenuSubItem
} from '@/components/ui/sidebar';
import { type NavItem, type SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { useSidebar } from '@/components/ui/sidebar';
import {
    Collapsible,
    CollapsibleContent,
    CollapsibleTrigger,
} from "@/components/ui/collapsible";
import {ChevronRight , SquareTerminal , Bot , BookOpen , Settings2 , Plus} from 'lucide-vue-next';


var items = [
    {
        title: 'پلی گراند',
        url: '#',
        icon: SquareTerminal,
        isActive: true,
        items: [
            {
                title: 'تاریخچه',
                url: '#',
            },
            {
                title: 'Starred',
                url: '#',
            },
            {
                title: 'Settings',
                url: '#',
            },
        ],
    },
    {
        title: 'Models',
        url: '#',
        icon: Bot,
        items: [
            {
                title: 'Genesis',
                url: '#',
            },
            {
                title: 'Explorer',
                url: '#',
            },
            {
                title: 'Quantum',
                url: '#',
            },
        ],
    },
    {
        title: 'Documentation',
        url: '#',
        icon: BookOpen,
        items: [
            {
                title: 'Introduction',
                url: '#',
            },
            {
                title: 'Get Started',
                url: '#',
            },
            {
                title: 'Tutorials',
                url: '#',
            },
            {
                title: 'Changelog',
                url: '#',
            },
        ],
    },
    {
        title: 'Settings',
        url: '#',
        icon: Settings2,
        items: [
            {
                title: 'General',
                url: '#',
            },
            {
                title: 'Team',
                url: '#',
            },
            {
                title: 'Billing',
                url: '#',
            },
            {
                title: 'Limits',
                url: '#',
            },
        ],
    },
]

defineProps<{
    items: NavItem[];
}>();

const page = usePage<SharedData>();
const { state } = useSidebar();
</script>

<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarGroupLabel class="flex-row-reverse">Platform</SidebarGroupLabel>
        <SidebarMenu>
            <SidebarMenuItem v-for="item in items" :key="item.title">
                <SidebarMenuButton as-child :is-active="item.href === page.url" :tooltip="item.title"  >
                    <Link :href="item.href" class="relative flex items-center w-full">
                        <component :is="item.icon" class="ml-auto "  />
                        <span class="absolute right-8">{{ item.title }}</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>

    <SidebarGroup>
        <SidebarGroupLabel class="flex-row-reverse ">Platform</SidebarGroupLabel>
        <SidebarGroupAction class="left-3 " title="Add Project">
            <Plus /> <span class="sr-only">Add Project</span>
        </SidebarGroupAction>
        <SidebarMenu>
            <Collapsible
                v-for="item in items"
                :key="item.title"
                as-child
                :default-open="item.isActive"
                class="group/collapsible"
            >
                <SidebarMenuItem>
                    <CollapsibleTrigger as-child>
                        <SidebarMenuButton :tooltip="item.title" class=" flex-row-reverse">
                            <component :is="item.icon" v-if="item.icon" class="" />
                            <span>{{ item.title }}</span>
                            <ChevronRight class="mr-auto transition-transform duration-200 group-data-[state=open]/collapsible:rotate-90" />
                        </SidebarMenuButton>
                    </CollapsibleTrigger>
                    <CollapsibleContent>
                        <SidebarMenuSub class="">
                            <SidebarMenuSubItem v-for="subItem in item.items" :key="subItem.title" class="">
                                <SidebarMenuSubButton as-child class="flex-row-reverse">
                                    <a :href="subItem.url">
                                        <span>{{ subItem.title }}</span>
                                    </a>
                                </SidebarMenuSubButton>
                            </SidebarMenuSubItem>
                        </SidebarMenuSub>
                    </CollapsibleContent>
                </SidebarMenuItem>
            </Collapsible>
        </SidebarMenu>
    </SidebarGroup>

</template>
