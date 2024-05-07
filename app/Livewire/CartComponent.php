<?php



namespace App\Livewire;

use App\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class CartComponent extends Component
{
    public $totalProducts; // Agrega esta propiedad para almacenar la cantidad total de productos en el carrito

    protected $total;
    protected $calculIva;
    protected $totalANumeric;
    protected $totalMesIva;
    protected $enviament;
    protected $content;

    protected $listeners = [
        'productAddedToCart' => 'updateCart',
    ];

    /**
     * Mounts the component on the template.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->updateCart();
    }

    /**
     * Renders the component on the browser.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('livewire.cartComponent', [
            'total' => $this->total,
            'Iva' => $this->calculIva,
            'totalMesIva' => $this->totalMesIva,
            'totalANumeric' => $this->totalANumeric,
            'enviament' => $this->enviament,
            'content' => $this->content,
            'totalProducts' => $this->totalProducts,
        ]);
    }

    /**
     * Removes a cart item by id.
     *
     * @param string $id
     * @return void
     */
    public function removeFromCart(string $id): void
    {
        Cart::remove($id);
        $this->updateCart();
    }

    /**
     * Clears the cart content.
     *
     * @return void
     */
    public function clearCart(): void
    {
        Cart::clear();
        $this->updateCart();
    }

    /**
     * Updates a cart item.
     *
     * @param string $id
     * @param string $action
     * @return void
     */
    public function updateCartItem(string $id, string $action): void
    {
        Cart::update($id, $action);
        $this->updateCart();
    }

    /**
     * Rerenders the cart items and total price on the browser.
     *
     * @return void
     */
    public function updateCart(): void
    {
        $this->total = Cart::total();
        $this->calculIva = Cart::Iva();
        $this->totalMesIva = Cart::totalMesIvaMesEnviament();
        $this->totalANumeric = Cart::totalANumeric();
        $this->enviament = Cart::enviamentString();
        $this->content = Cart::content();
        $this->totalProducts = Cart::QuantityTotalCart(); // Actualiza la cantidad total de productos en el carrito

        // Emite un evento de Livewire
        $this->dispatch('cartUpdated');


    }

    /**
     * Redirigeix a l'usuari al checkout o al login, depenent de si està autenticat.
     * @return void
     */
    public function finalizarCompraRedirect(): void
    {
        if (Auth::check()) {

            $this->redirect('/checkout');
        } else {
            $this->redirect('/login');
        }
    }
}
