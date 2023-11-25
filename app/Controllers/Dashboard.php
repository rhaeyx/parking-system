<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Booking;
use App\Models\User;

class Dashboard extends BaseController
{
    private $slotsPerStreet = 8;
    private $streets = [
        "r-papa" => "Ricardo Papa Street",
        "p-paredes" => "Padre Paredes Street",
        "loyola" => "Loyola Street"
      ];


    public function index()
    {
      if (session()->get('user')['role'] == 'attendant') {
        $bookingModel = new Booking();
        $userModel = new User();
        $reservations = $bookingModel->findAll();

        $modifiedReservations = [];
        foreach ($reservations as $reservation) {
          $reservation['street'] = $this->streets[$reservation['street']];
          $bookedBy = $userModel->where('id', $reservation['booked_by'])->first();
          $reservation['bookedBy'] = $bookedBy['username'];
          $modifiedReservations[] = $reservation;
        }

        return view('pages/attendant', ['reservations' => $modifiedReservations]);
      }

      return view('pages/dashboard', ['slots' => -1]);
    }

    public function reserve() {
      $street = $this->request->getPost('street');
      $datetimeStart = $this->request->getPost('datetime-start');
      $datetimeEnd = $this->request->getPost('datetime-end');
      $bookedBy = $this->request->getPost('booked-by');

      $bookingModel = new Booking();
      $reservedSlots = $bookingModel->where('street', $street)
                   ->where("start <=", $datetimeStart)
                   ->where("end >", $datetimeStart)
                  //  ->where("confirmed", 0)
                   ->get()->getNumRows();

      if (new \DateTime($datetimeStart) > new \DateTime($datetimeEnd)) {
        return redirect()->to('dashboard')->with('error', 'Invalid time range.');
      }

      $slotsLeft = $this->slotsPerStreet - $reservedSlots;
      if ($slotsLeft < 1) {
        return redirect()->to('dashboard')->with('error', 'No more slots available for this street.');
      }
      
      $bookingModel->insert([
        'booked_by' => $bookedBy,
        'street' => $street,
        'start' => $datetimeStart,
        'end' => $datetimeEnd
      ]);

      return redirect()->to('dashboard')->with('success', 'Slot reserved, waiting for confirmation from attendant. Slots left: '.$slotsLeft);
    }

    public function reservations() {
      $bookingModel = new Booking();
      $userId = session()->get('user')['id'];

      // if ($this->request->getGet('search') !== '') {
      //   $reservations = $bookingModel->where('booked_by', $userId)->like('street', $this->request->getGet('search'))
      // }

      $reservations = $bookingModel->where('booked_by', $userId)->findAll();
      $modifiedReservations = [];

      foreach ($reservations as $reservation) {
        $reservation['street'] = $this->streets[$reservation['street']];
        $modifiedReservations[] = $reservation;
      }

      return view('pages/reservations', ['reservations' => $modifiedReservations]);
    }

    public function update() {
      $id = $this->request->getPost('id');
      $value = $this->request->getPost('value');

      $bookingModel = new Booking();
      $bookingModel->update($id, ["confirmed" => (int) $value]);

      return redirect()->to('dashboard')->with('success', 'Successfully updated.');
    }

    public function delete() {
      $id = $this->request->getPost('id');

      $bookingModel = new Booking();
      $bookingModel->delete($id);

      return redirect()->to('dashboard')->with('success', 'Successfully deleted.');
    }
}
