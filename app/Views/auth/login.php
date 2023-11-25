<?= $this->include('includes/header.php') ?>

<?= $this->include('alerts') ?>

<?php
  if (session()->get('user') !== null) {
    echo "<script>
            window.location.replace('http://localhost:8080/login');
          </script>";
  } 
?>

<section class="">
  <div class="container h-full px-6 py-24 w-3/5 mx-auto">
    <div
      class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-between">
      <!-- Left column container with background-->
      <div class="mb-12 md:mb-0 md:w-8/12 lg:w-6/12">
        <img
          src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="w-full"
          alt="Phone image" />
      </div>

      <!-- Right column container with form -->
      <div class="md:w-8/12 lg:ml-6 lg:w-5/12">
        <h1 class="text-xl text-primary font-bold mb-8">Parking Reservation System</h1>
        <form action="<?= base_url('/login') ?>" method='POST'>
          <!-- Email input -->
          <div class="relative mb-6 flex flex-col space-y-2" data-te-input-wrapper-init>
            <label
              for="exampleFormControlInput3">
              Username            
            </label>

            <input
              required
              type="text"
              name="username"
              value="<?= old('name') ?>"
              class="border-2 border-black rounded-md px-2 py-1"
              id="exampleFormControlInput3"
              placeholder="Username" />
          </div>

          <!-- Password input -->
          <div class="relative mb-6 flex flex-col space-y-2" data-te-input-wrapper-init>
            <label
              for="exampleFormControlInput3">
              Password           
            </label>
            <input
              required
              type="password"
              name="password"
              value="<?= old('name') ?>"
              class="border-2 border-black rounded-md px-2 py-1"
              id="exampleFormControlInput33"
              placeholder="Password" />
          </div>

          <!-- Submit button -->
          <button
            type="submit"
            class="inline-block w-full rounded mb-4 bg-primary px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
            data-te-ripple-init
            data-te-ripple-color="light">
            Log In
          </button>

          <div class="flex justify-end w-full">
            <a href="<?= base_url('register') ?>" class="text-blue-300 underline hover:text-blue-200 font-light text-lg">Register</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>