<?= $this->include('includes/header.php') ?>

<?= $this->include('includes/navbar.php') ?>

<?= $this->include('alerts') ?>
<section class="w-3/5 mx-auto pt-20">
  <div class="flex flex-col">
  <h3 class="text-lg font-semibold">Reservations Table</h3>
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full text-left text-sm font-light">
          <thead
            class="border-b bg-white font-medium">
            <tr>
              <th scope="col" class="px-6 py-4">#</th>
              <th scope="col" class="px-6 py-4">Street</th>
              <th scope="col" class="px-6 py-4">Reserved By</th>
              <th scope="col" class="px-6 py-4 text-center">Start</th>
              <th scope="col" class="px-6 py-4 text-center">End</th>
              <th scope="col" class="px-6 py-4 text-center">Confirmed</th>
              <th scope="col" class="px-6 py-4 text-center"></th>
              <th scope="col" class="px-6 py-4 text-center"></th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; foreach ($reservations as $reservation): ?>
              <tr
                class="border-b bg-neutral-100">
                <td class="whitespace-nowrap px-6 py-4 font-medium"><?= $i++ ?></td>
                <td class="whitespace-nowrap px-6 py-4"><?= $reservation['street'] ?></td>
                <td class="whitespace-nowrap px-6 py-4"><?= $reservation['bookedBy'] ?></td>
                <td class="whitespace-nowrap px-6 py-4 text-center"><?= $reservation['start'] ?></td>
                <td class="whitespace-nowrap px-6 py-4 text-center"><?= $reservation['end'] ?></td>
                <td class="whitespace-nowrap px-6 py-4 text-center"><?= $reservation['confirmed'] ? 'Yes' : 'No' ?></td>
                <td class="whitespace-nowrap px-6 py-4 text-center">
                  <form action="<?= base_url('reservations') ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                    <input type="hidden" name="value" value="<?= $reservation['confirmed'] === "1" ? "0" : "1" ?>">
                    <button class="<?= $reservation['confirmed'] ? 'bg-red-600' : 'bg-green-600' ?> rounded-md text-white p-2"><?= $reservation['confirmed'] ? 'Cancel' : 'Confirm' ?></button>
                  </form>
                </td>
                <td class="whitespace-nowrap px-6 py-4 text-center">
                  <form action="<?= base_url('delete_reservation') ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                    <button class="bg-red-600 rounded-md text-white p-2">Delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</section>