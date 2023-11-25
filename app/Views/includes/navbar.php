<?php
  if (session()->get('user') === null) {
    echo "<script>
            window.location.replace('http://localhost:8080/login');
          </script>";
  } 
?>

<nav
  class="relative flex w-full flex-nowrap items-center justify-between bg-primary py-4 text-white"
  data-te-navbar-ref>
  <div class="container mx-auto">
    <div class="flex w-full flex-wrap items-center justify-between px-3">
      <div class="ml-2">
        <a class="text-xl text-neutral-800 dark:text-neutral-200" href="#"
          >Parking Reservation System</a
        >
      </div>
  
      <div
        class="!visible mt-2 basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto"
        id="navbarSupportedContent3">
        <!-- Left links -->
        <div
          class="list-style-none mr-auto flex flex-col pl-0 lg:mt-1 lg:flex-row">
          <!-- Home link -->
          <div
            class="my-4 pl-2 lg:my-0 lg:pl-2 lg:pr-1">
            <a
              class="active lg:px-2 [&.active]:text-white"
              aria-current="page"
              href="<?= base_url('dashboard') ?>"
              >Home</a
            >
          </div>
          <?php if (session()->get('user')['role'] === 'driver'): ?>
            <div
                class="my-4 pl-2 lg:my-0 lg:pl-2 lg:pr-1">
                <a
                  class="active lg:px-2 [&.active]:text-white"
                  aria-current="page"
                  href="<?= base_url('reservations') ?>"
                  >Reservations</a
                >
              </div>
          <?php endif; ?>
          <div
            class="my-4 pl-2 lg:my-0 lg:pl-2 lg:pr-1">
            <form action="<?= base_url('logout') ?>" method="POST">
            <button type="submit"
              class="active lg:px-2 [&.active]:text-white"
              aria-current="page"
              >Logout</a
            >
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
