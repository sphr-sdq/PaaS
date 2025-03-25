<script setup lang="ts">
import Heading from '@/components/Heading.vue';
import { Button } from '@/components/ui/button';
import { Separator } from '@/components/ui/separator';
import { type NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';

const sidebarNavItems: NavItem[] = [
    {
        title: 'پروفایل',
        href: '/settings/profile',
    },
    {
        title: 'پسورد',
        href: '/settings/password',
    },
    {
        title: 'ظاهر',
        href: '/settings/appearance',
    },
];

const page = usePage();

const currentPath = page.props.ziggy?.location ? new URL(page.props.ziggy.location).pathname : '';
</script>

<template>
    <div class="px-4 py-6">
        <Heading title="تنظیمات" description="Manage your profile and account settings" />

        <div class="flex flex-col space-y-8 md:space-y-0 lg:flex-row lg:space-x-12  lg:space-y-0  justify-end" >




            <div class="flex-1 md:max-w-2xl " dir="rtl">
                <section class="max-w-xl space-y-12 ">
                    <slot />
                </section>
            </div>

            <Separator class="my-6 md:hidden" />

            <aside class="w-full max-w-xl lg:w-48 ">
                <nav class="flex flex-col space-x-0 space-y-1 text-right">
                    <Button
                        v-for="item in sidebarNavItems"
                        :key="item.href"
                        variant="ghost"
                        :class="['w-full justify-end ', { 'bg-muted': currentPath === item.href }]"
                        as-child
                    >
                        <Link :href="item.href">
                            {{ item.title }}
                        </Link>
                    </Button>
                </nav>
            </aside>
        </div>
    </div>
</template>
