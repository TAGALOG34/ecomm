  <?php
    $pageName = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
  ?>
  
  <!-- Sidebar -->
  <aside id="sidebar" class="fixed inset-y-0 left-0 z-30 w-64 bg-green-200 shadow-lg transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out sidebar-scroll overflow-y-auto" style="max-height: 100vh;">
    <div class="flex items-center justify-center mt-8 mb-6 mx-10">
      <img src="img/logo.png" alt="Cyberzone">
    </div>
    <hr class="mb-3">
    <nav class="px-4">
      <ul class="space-y-2">
        <li>
          <a href="index.php" class="<?= $pageName == 'index.php' ? 'flex items-center gap-3 p-3 rounded-md hover:bg-indigo-100 text-indigo-600 font-semibold transition-colors':'flex items-center gap-3 p-3 rounded-md hover:bg-indigo-100 text-gray-700 hover:text-indigo-600 transition-colors'; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18v4H3zM3 9h18v12H3z" />
            </svg>
            Dashboard
          </a>
        </li>
        <li>
          <a href="products.php" class="<?= $pageName == 'products.php' ? 'flex items-center gap-3 p-3 rounded-md hover:bg-indigo-100 text-indigo-600 font-semibold transition-colors':'flex items-center gap-3 p-3 rounded-md hover:bg-indigo-100 text-gray-700 hover:text-indigo-600 transition-colors'; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" />
            </svg>
            Products
          </a>
        </li>
        <li>
          <a href="category.php" class="<?= $pageName == 'category.php' ? 'flex items-center gap-3 p-3 rounded-md hover:bg-indigo-100 text-indigo-600 font-semibold transition-colors':'flex items-center gap-3 p-3 rounded-md hover:bg-indigo-100 text-gray-700 hover:text-indigo-600 transition-colors'; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 17h16M4 7h16M6 12h12" />
            </svg>
            Category
          </a>
        </li>
        <li>
          <a href="orders.php" class="flex items-center gap-3 p-3 rounded-md hover:bg-indigo-100 text-gray-700 hover:text-indigo-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            Orders
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center gap-3 p-3 rounded-md hover:bg-indigo-100 text-gray-700 hover:text-indigo-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10 9v6m4-6v6m-6 2h8M4 6v12a2 2 0 002 2h12a2 2 0 002-2V6" />
            </svg>
            Reports
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center gap-3 p-3 rounded-md hover:bg-indigo-100 text-gray-700 hover:text-indigo-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.122 0 4.136.557 5.879 1.523m4.242 1.48a9.003 9.003 0 00-1.791-3.88m-5.33-3.022a4 4 0 10-5.657 5.656 4 4 0 005.656-5.656z" />
            </svg>
            Settings
          </a>
        </li>
      </ul>
    </nav>
  </aside>

  <!-- Main content wrapper with left margin for sidebar on desktop -->
  <div class="md:ml-64 flex flex-col min-h-screen">

    <!-- Navbar -->
    <header class="flex items-center justify-between bg-white shadow-md px-4 py-3 md:px-8 sticky top-0 z-20">
      <div class="flex items-center gap-4">
        <!-- Mobile hamburger toggle -->
        <button id="sidebarToggle" class="text-gray-600 focus:outline-none md:hidden" aria-label="Toggle sidebar">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>

      <div class="flex items-center gap-4">
        <button class="flex items-center space-x-2 text-gray-600 hover:text-indigo-600 focus:outline-none" aria-label="User menu">
          <span class="hidden sm:inline select-none">Admin</span> 
        </button>
      </div>
    </header>
