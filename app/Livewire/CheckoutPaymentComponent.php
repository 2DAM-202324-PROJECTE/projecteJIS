<?php

namespace App\Livewire;

use App\Facades\Cart;
use App\Models\ShipmentData;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutPaymentComponent extends Component
{
    public $total;
    public $calculIva;
    public $totalMesIvaEnviament;

    public $enviament;

    public $shipmentData;
public $content;

    public $name;
    public $email;
    public $address;
    public $city ;
    public $state;
    public $postal_code;
    public $country;


    public function render()
    {
        // Obté les dades del carro
        $this->content = Cart::content();

        $this->total = app(CartService::class)->total();
        $this->calculIva = app(CartService::class)->Iva();
        $this->totalMesIvaEnviament = app(CartService::class)->totalMesIvaMesEnviament();
        $this->enviament = app(CartService::class)->enviamentString();
        return view('livewire.checkoutPaymentComponent');
    }
    public function mount()
    {
        $user = Auth::user();

        $this->shipmentData = ShipmentData::where('user_id', $user->id)->first();

        if ($this->shipmentData) {
            $this->name = $this->shipmentData->name;
            $this->email = $this->shipmentData->email;
            $this->address = $this->shipmentData->address;
            $this->city = $this->shipmentData->city;
            $this->state = $this->shipmentData->state;
            $this->postal_code = $this->shipmentData->postal_code;
            $this->country = $this->shipmentData->country;
        }
    }

    public function store()
    {
        $user = Auth::user();

        $shipmentData = ShipmentData::updateOrCreate(
            ['user_id' => $user->id],
            [
                'name' => $this->name,
                'email' => $this->email,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,
                'postal_code' => $this->postal_code,
                'country' => $this->country,
            ]
        );

        return redirect()->route('payment');

    }

//    public function fillShippingData()
//    {
//        $user = Auth::user();
//
//        $this->shipmentData = ShipmentData::where('user_id', $user->id)->first();
//
//        if ($this->shipmentData) {
//            $this->name = $this->shipmentData->name;
//            $this->email = $this->shipmentData->email;
//            $this->address = $this->shipmentData->address;
//            $this->city = $this->shipmentData->city;
//            $this->state = $this->shipmentData->state;
//            $this->postal_code = $this->shipmentData->postal_code;
//            $this->country = $this->shipmentData->country;
//        }
//
//        $this->render();
//    }

}
