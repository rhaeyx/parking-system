<?= $this->include('includes/header.php') ?>

<?= $this->include('includes/navbar.php') ?>

<?= $this->include('alerts') ?>
<section class="w-3/5 mx-auto pt-8">
<div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <!-- <form action="<?= base_url('reservations') ?>" method="GET" class="">
          <div class="flex  w-64 items-center justify-center ">
            <label for="">Search by Street: </label>
            <input type="text" name="search" class="ml-2 w-1/2 rounded-md border-2 mt-2 mb-4 pt-2 px-2" placeholder="Street name...">  
            <button type="submit" class="rounded-md ml-2 bg-primary px-2 py-2">Search</button>
          </div>
        </form> -->
        <table class="min-w-full text-left text-sm font-light">
          <thead
            class="border-b bg-white font-medium">
            <tr>
              <th scope="col" class="px-6 py-4">#</th>
              <th scope="col" class="px-6 py-4">Street</th>
              <th scope="col" class="px-6 py-4 text-center">Start</th>
              <th scope="col" class="px-6 py-4 text-center">End</th>
              <th scope="col" class="px-6 py-4 text-center">Confirmed</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; foreach ($reservations as $reservation): ?>
              <tr
                class="border-b bg-neutral-100">
                <td class="whitespace-nowrap px-6 py-4 font-medium"><?= $i++ ?></td>
                <td class="whitespace-nowrap px-6 py-4"><?= $reservation['street'] ?></td>
                <td class="whitespace-nowrap px-6 py-4 text-center"><?= $reservation['start'] ?></td>
                <td class="whitespace-nowrap px-6 py-4 text-center"><?= $reservation['end'] ?></td>
                <td class="whitespace-nowrap px-6 py-4 text-center"><?= $reservation['confirmed'] ? 'Yes' : 'No' ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</section>