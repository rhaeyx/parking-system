<?php if (session()->get('errors')): ?>
    <div class="w-1/5 mx-auto mb-4 mt-4 mr-4  rounded-lg bg-red-100 px-6 py-5 text-base text-red-700">
        <p class="mb-2">Errors occured: </p>
        <ul class="flex flex-col list-disc">
            <?php foreach (session()->get('errors') as $error): ?>
                <li class="ml-4 mt-2"><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>

<?php if (session()->get('error')): ?>
    <div class="w-1/5 mx-auto mb-4 mt-4  mr-4 rounded-lg bg-red-100 px-6 py-5 text-base text-red-700 float-right">
      <?= session()->get('error') ?>
    </div>
<?php endif; ?>

<?php if (session()->get('success')): ?>
    <div class="w-1/5 mx-auto mb-4 mt-4  mr-4 rounded-lg bg-green-100 px-6 py-5 text-base text-green-700">
        <p>
            <?= session()->get('success') ?>
        </p>
    </div>
<?php endif; ?>