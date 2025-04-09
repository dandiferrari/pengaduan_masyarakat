<script setup>
import { ref } from "vue";
import { Card, CardHeader, CardContent, CardTitle } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import Layout from "../../Layout/App.vue";
import { Calendar } from "@/components/ui/calendar";
import {
    Popover,
    PopoverContent,
    PopoverTrigger,
} from "@/components/ui/popover";
import { DateFormatter, getLocalTimeZone } from "@internationalized/date";
import NavUser from "@/components/NavUser.vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { CalendarIcon } from "lucide-vue-next";
import { Line } from "vue-chartjs";
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    LineElement,
    PointElement,
    CategoryScale,
    LinearScale,
} from "chart.js";
import AppSidebar from "@/components/AppSidebar.vue";
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/components/ui/breadcrumb";
import { Separator } from "@/components/ui/separator";
import {
    SidebarInset,
    SidebarProvider,
    SidebarTrigger,
} from "@/components/ui/sidebar";

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    LineElement,
    PointElement,
    CategoryScale,
    LinearScale
);

const chartData = ref({
    labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
    ],
    datasets: [
        {
            label: "Revenue",
            data: [
                2000, 1500, 1800, 1700, 2000, 2200, 2100, 2300, 2400, 2500,
                2600, 2700,
            ],
            borderColor: "rgba(75, 192, 192, 1)",
            fill: false,
        },
    ],
});

const chartOptions = ref({
    responsive: true,
    plugins: {
        title: {
            display: true,
            text: "Pengaduan Bulanan",
        },
        legend: {
            position: "top",
        },
    },
    scales: {
        y: {
            beginAtZero: true,
        },
    },
});

const df = new DateFormatter("en-US", {
    dateStyle: "long",
});

const value = (ref < Date) | (null > null);

</script>

<template>
    <SidebarProvider>
        <AppSidebar />
        <SidebarInset>
            <!-- Header Section -->
            <header class="flex items-center h-14 p-4 border-b bg-white">
                <div class="flex flex-1 items-center gap-4">
                    <SidebarTrigger
                        class="text-xl font-semibold text-gray-800"
                    />
                    <div class="ml-auto">
                        <NavUser  />
                    </div>
                </div>
            </header>

            <!-- Main Content Section -->
            <div class="px-4 py-4 bg-[#50C878]">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-semibold text-gray-800">
                        Halaman Utama
                    </h1>
                    
                </div>

                <!-- Stats Cards Section -->
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6"
                >
                    <Card
                        class="p-4 bg-white shadow-md rounded-xl border border-gray-200 hover:shadow-lg transition-shadow duration-300"
                    >
                        <CardHeader class="flex flex-col items-start pb-2">
                            <CardTitle class="text-md font-medium text-gray-700"
                                >Jumlah Pengaduan</CardTitle
                            >
                        </CardHeader>
                        <CardContent>
                            <div class="text-2xl font-semibold text-gray-900">
                                10
                            </div>
                        </CardContent>
                    </Card>

                    <Card
                        class="p-4 bg-white shadow-md rounded-xl border border-gray-200 hover:shadow-lg transition-shadow duration-300"
                    >
                        <CardHeader class="flex flex-col items-start pb-2">
                            <CardTitle class="text-md font-medium text-gray-700"
                                >Jumlah Diterima</CardTitle
                            >
                        </CardHeader>
                        <CardContent>
                            <div class="text-2xl font-semibold text-gray-900">
                               10
                            </div>
                        </CardContent>
                    </Card>

                    <Card
                        class="p-4 bg-white shadow-md rounded-xl border border-gray-200 hover:shadow-lg transition-shadow duration-300"
                    >
                        <CardHeader class="flex flex-col items-start pb-2">
                            <CardTitle class="text-md font-medium text-gray-700"
                                >Jumlah aduan di tolak</CardTitle
                            >
                        </CardHeader>
                        <CardContent>
                            <div class="text-2xl font-semibold text-gray-900">
                                2
                            </div>
                        </CardContent>
                    </Card>
                </div>

                <!-- Filter Section -->
                <div class="flex justify-between items-center mb-6">
                    <div class="text-md font-semibold text-gray-700">
                        Pencarian
                    </div>
                    <Popover>
                        <PopoverTrigger as-child>
                            <Button
                                variant="outline"
                                class="text-gray-700 px-4 py-2 text-sm border border-gray-300 rounded-md hover:bg-gray-100 transition duration-300"
                            >
                                <CalendarIcon
                                    class="mr-2 h-4 w-4 text-gray-600"
                                />
                                {{
                                    value
                                        ? df.format(
                                              value.toDate(getLocalTimeZone())
                                          )
                                        : "Pick a date"
                                }}
                            </Button>
                        </PopoverTrigger>
                        <PopoverContent class="w-auto p-0">
                            <Calendar v-model="value" initial-focus />
                        </PopoverContent>
                    </Popover>
                </div>

                <!-- Line Chart Section -->
                <div class="bg-white p-4 rounded-xl shadow-md mb-6">
                    <Line :data="chartData" :options="chartOptions" />
                </div>
            </div>
        </SidebarInset>
    </SidebarProvider>
</template>
