<script setup>

</script>

<template>
     <header class="flex items-center h-14 p-4 border-b bg-white">
                <div class="flex flex-1 items-center gap-4">
                    <SidebarTrigger class="text-xl font-semibold text-gray-800" />
                    <Separator orientation="vertical" class="h-5" />
                    <Breadcrumb>
                        <BreadcrumbList>
                            <BreadcrumbItem class="hidden md:block">
                                <BreadcrumbLink href="#">Building Your Application</BreadcrumbLink>
                            </BreadcrumbItem>
                            <BreadcrumbSeparator class="hidden md:block" />
                            <BreadcrumbItem>
                                <BreadcrumbPage>Data Fetching</BreadcrumbPage>
                            </BreadcrumbItem>
                        </BreadcrumbList>
                    </Breadcrumb>
                </div>
            </header>
</template>