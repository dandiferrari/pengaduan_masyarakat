<script setup>
import { ref, computed } from 'vue'; // Import ref for reactivity
import { usePage } from '@inertiajs/vue3'; // Import usePage to access page data
import NavMain from '@/components/NavMain.vue';
import NavProjects from '@/components/NavProjects.vue';
import TeamSwitcher from '@/components/TeamSwitcher.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarRail } from '@/components/ui/sidebar';
import { User, UserPlus, Users, House, GalleryVerticalEnd, AudioWaveform, Scroll, ScrollText, ClipboardPlus, ArrowRightLeft, TicketPlus, CreditCard, FilePlus2 } from 'lucide-vue-next';

const page = usePage();  // Access the current page
const user = computed(() => page.props.auth.user);

const props = defineProps({
  side: { type: String, required: false },
  variant: { type: String, required: false },
  collapsible: { type: String, required: false, default: 'icon' },
  class: { type: null, required: false },
});

// Sample data for menus
const data = {
  teams: [
    { name: 'Acme Inc', logo: GalleryVerticalEnd, plan: 'Enterprise' },
    { name: 'Acme Corp.', logo: AudioWaveform, plan: 'Startup' },
    { name: 'Evil Corp.', logo: AudioWaveform, plan: 'Free' },
  ],
  navMain: [
    {
      title: 'Siswa',
      url: '/siswa',
      isActive: true,
      items: [
        { title: 'Data Siswa', url: '/siswa', icon: User },
        { title: 'Tambah Data Siswa', url: '/siswa/create', icon: UserPlus },
      ],
    },
    {
      title: 'User',
      url: '/user',
      isActive: true,
      items: [
        { title: 'Data User', url: '/user', icon: User },
        { title: 'Tambah User', url: '/user/create', icon: UserPlus },
      ],
    },
    {
      title: 'Pegawai',
      url: '/pegawai',
      isActive: true,
      items: [
        { title: 'Data Pegawai', url: '/pegawai', icon: Users },
        { title: 'Tambah Pegawai', url: '/pegawai/create', icon: UserPlus },
      ],
    },
  ],
  navMainBendahara: [
    {
      title: 'Akun',
      url: '/akun',
      isActive: true,
      items: [
        { title: 'Data Akun', url: '/akun', icon: User },
        { title: 'Tambah Akun', url: '/akun/create', icon: Users },
      ],
    },
    {
      title: 'Penerimaan Pembayaran',
      url: '/penerimaan_pembayaran',
      isActive: true,
      items: [
        { title: 'Data Penerimaan Pembayaran', url: '/penerimaan_pembayaran', icon: CreditCard },
        { title: 'Tambah Penerimaan Pembayaran', url: '/penerimaan_pembayaran/create', icon: FilePlus2 },
      ],
    },
    {
      title: 'Transaksi',
      url: '/transaksi',
      isActive: true,
      items: [
        { title: 'Data Transaksi', url: '/transaksi', icon: ArrowRightLeft },
        { title: 'Tambah Transaksi', url: '/transaksi/create', icon: TicketPlus },
      ],
    },
    {
      title: 'Event Jurnal Umum',
      url: '/jurnal_umum',
      isActive: true,
      items: [
        { title: 'Data Event Jurnal Umum', url: '/jurnal_umum', icon: ScrollText },
        { title: 'Tambah Event Jurnal Umum', url: '/jurnal_umum/create', icon: ClipboardPlus },
      ],
    },
    {
      title: 'Laporan',
      url: '/laporan',
      isActive: true,
      items: [
        { title: 'Laporan', url: '/laporan', icon: Scroll },
      ],
    },
  ],
  projects: [
    { name: 'Dashboard', url: '/dashboard', icon: House },
  ],
};

const activeMenu = ref(null); // Track active menu (expandable item)

// Function to check if the current route matches the menu URL
function isActiveRoute(url) {
  return page.url === url;  // Compare the current route with the menu URL
}

function toggleMenu(menu) {
  activeMenu.value = activeMenu.value === menu ? null : menu; // Toggle menu
}
</script>

<template>
  <Sidebar v-bind="props">
    <SidebarHeader>
 
    </SidebarHeader>
    <SidebarContent>
      <!-- Admin Sekolah Role -->
      <NavProjects v-if="user.jabatan_user === 'admin'" :projects="data.projects" />
      <NavMain v-if="user.jabatan_user === 'admin'" :items="data.navMain" />

      <!-- Bendahara user.jabatan_user -->
      <NavProjects v-if="user.jabatan_user === 'bendahara'" :projects="data.projects" />
      <div v-if="user.jabatan_user === 'bendahara'">
        <NavMain v-if="user.jabatan_user === 'bendahara'" :items="data.navMainBendahara" />
      </div>

      <!-- Kepala Sekolah user.jabatan_user -->
      <div v-if="user.jabatan_user === 'kepala_sekolah'">
        <p>Kepala Sekolah Specific Section</p>
      </div>
    </SidebarContent>
    <SidebarRail />
  </Sidebar>
</template>

<style scoped>
.sidebar-item {
  padding: 10px 20px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.sidebar-item:hover {
  background-color: #50C878; /* Hover effect */
}

.sidebar-item.active {
  background-color: #50C878; /* Active item */
}

.submenu {
  padding-left: 20px;
  display: none; /* Hidden by default */
}

.submenu.open {
  display: block; /* Show when open */
}

/* Add this class to active links to highlight them */
.sidebar-item.active {
  background-color: #50C878;
  color: white;
}
</style>
