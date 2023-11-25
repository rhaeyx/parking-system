<?= $this->include('includes/header.php') ?>

<?= $this->include('includes/navbar.php') ?>

<?= $this->include('alerts') ?>
<section class="w-3/5 mx-auto pt-8">
<form action="<?= base_url('reserve') ?>" method="POST">
  <div class="space-y-12">
    <div class="">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Reserve Parking Slot</h2>

      <div class="pb-6 flex flex-col w-full">
        <div class="sm:col-span-3">
          <label for="street" class="block text-sm font-medium leading-6 text-gray-900">Street</label>
          <div class="mt-2">
            <select id="street" name="street" autocomplete="street-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6 px-2">
              <option value="r-papa">Ricardo Papa Street</option>
              <option value="p-paredes">Padre Paredes Street</option>
              <option value="loyola">Loyola Street</option>
            </select>
          </div>
        </div>

        <div class="flex w-full justify-between space-x-8">
          <div class="mt-2 w-1/2">
            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Date and Time Start</label>
            <div class="mt-2">
              <input required type="datetime-local" name="datetime-start" id="first-name" autocomplete="given-name" class="w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
  
          <div class="mt-2 w-1/2">
            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Date and Time End</label>
            <div class="mt-2">
              <input required type="datetime-local" name="datetime-end" id="last-name" autocomplete="family-name" class="w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
          </div>
        </div>
      </div>
    </div>  
    <div class=" flex items-center justify-end gap-x-6">
      <input type="hidden" name="booked-by" value="<?= session()->get('user')['id'] ?? 0 ?>">
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Book Reservation</button>
    </div>
  </div>

</form>
</section>