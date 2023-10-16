const sidebar = document.getElementById('sidebar');
const mainContent = document.getElementById('main-content');

function openSidebar() {
    sidebar.classList.add('active');
    mainContent.style.marginLeft = '250px';
}

function closeSidebar() {
    sidebar.classList.remove('active');
    mainContent.style.marginLeft = '0';
}
