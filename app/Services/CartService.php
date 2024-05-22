<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;

class CartService {
    const MINIMUM_QUANTITY = 1;
    const DEFAULT_INSTANCE = 'shopping-cart';
    const IVA_PERCENTAGE = 0.21;


    protected $session;
    protected $instance;

    /**
     * Constructs a new cart object.
     *
     * @param Illuminate\Session\SessionManager $session
     */
    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    /**
     * Adds a new item to the cart.
     *
     * @param string $id
     * @param string $name
     * @param string $price
     * @param string $quantity
     * @param string $image_url
     * @param array $options
     * @return void
     */
    public function add($id, $name, $price, $quantity, $image_url, $options = []): void
    {
        $cartItem = $this->createCartItem($id, $name, $price, $quantity, $image_url, $options);

        $content = $this->getContent();

        if ($content->has($id)) {
            $cartItem->put('quantity', $content->get($id)->get('quantity') + $quantity);
        }

        $content->put($id, $cartItem);

        $this->session->put(self::DEFAULT_INSTANCE, $content);
    }

    /**
     * Updates the quantity of a cart item.
     *
     * @param string $id
     * @param string $action
     * @return void
     */
    public function update(string $id, string $action): void
    {
        $content = $this->getContent();

        if ($content->has($id)) {
            $cartItem = $content->get($id);

            switch ($action) {
                case 'plus':
                    $cartItem->put('quantity', $content->get($id)->get('quantity') + 1);
                    break;
                case 'minus':
                    $updatedQuantity = $content->get($id)->get('quantity') - 1;

                    if ($updatedQuantity < self::MINIMUM_QUANTITY) {
                        $updatedQuantity = self::MINIMUM_QUANTITY;
                    }

                    $cartItem->put('quantity', $updatedQuantity);
                    break;
            }

            $content->put($id, $cartItem);

            $this->session->put(self::DEFAULT_INSTANCE, $content);
        }
    }

    /**
     * Removes an item from the cart.
     *
     * @param string $id
     * @return void
     */
    public function remove(string $id): void
    {
        $content = $this->getContent();

        if ($content->has($id)) {
            $this->session->put(self::DEFAULT_INSTANCE, $content->except($id));
        }
    }

    /**
     * Clears the cart.
     *
     * @return void
     */
    public function clear(): void
    {
        $this->session->forget(self::DEFAULT_INSTANCE);
    }

    /**
     * Returns the content of the cart.
     *
     * @return Illuminate\Support\Collection
     */
    public function content(): Collection
    {
        return is_null($this->session->get(self::DEFAULT_INSTANCE)) ? collect([]) : $this->session->get(self::DEFAULT_INSTANCE);
    }

    /**
     * Returns total price of the items in the cart.
     *
     * @return float
     */
    public function total(): float
    {
        $content = $this->getContent();

        $total = $content->reduce(function ($total, $item) {
            return $total + ($item->get('price') * $item->get('quantity'));
        }, 0);

        return $total;
    }

    /**
     * Retorna el total del carret formatat.
     * @return string
     */
    public function totalANumeric(): string
    {
        $totalANumeric = $this->total();

        return number_format($totalANumeric, 2);
    }

    /**
     * Retorna el calcul del IVA del total del carret.
     *
     * @return float
     */
    public function Iva(): float
    {
        $total = $this->total(); // Obtiene el total sin formatear
        // Calcula el total amb IVA
        return $total * self::IVA_PERCENTAGE;
    }

    public function quantityTotalCart(): int
    {
        $totalQuantity = 0;

        $content = $this->content();

        foreach ($content as $item) {
            $totalQuantity += $item['quantity'];
        }

        return $totalQuantity;
    }



    /**
     * Retorna el total del carret més l'IVA.
     *
     * @return string
     * @throws Exception
     */

    public function totalMesIvaMesEnviament(): string
    {
        $total = $this->total(); // Obté el total sense formatejar
        $calculIva = $this->Iva();

        // Verifica que $total y $calculIva siguin numérics
        if (!is_numeric($total) || !is_numeric($calculIva)) {
            throw new Exception("Los valores de total o IVA no son numéricos");
        }

        // Calcula el total (sense enviament)
        $totalMesIva = $total + $calculIva;

        // Si el total és superior a 100, l'enviament és gratis
        if ($totalMesIva > 250) {
            return number_format($totalMesIva, 2);

        // Si el total és inferior a 100, l'enviament costa 5,99
        // i el suma al total
        } else {
            $totalMesIva = $totalMesIva + 5.99;
            return number_format($totalMesIva, 2);
        }
    }

    /**
     * Retorna el cost de l'enviament, solament el string per a la vista de l'usuari.
     *
     * @return string
     */

    public function enviamentString(): string
    {
        $total = $this->total();
        $calculIva = $this->Iva();
        $totalMesIva = $total + $calculIva;
        if ($totalMesIva > 250) {
            return  __('translate.GRATIS_TXT');
        } else {
            return "+ 5.99";
        }
    }


    /**
     * Returns the content of the cart.
     *
     * @return Illuminate\Support\Collection
     */
    public function getContent(): Collection
    {
        return $this->session->has(self::DEFAULT_INSTANCE) ? $this->session->get(self::DEFAULT_INSTANCE) : collect([]);
    }

    /**
     * Creates a new cart item from given inputs.
     * @param int $id
     * @param string $name
     * @param string $price
     * @param string $quantity
     * @param string $image_url
     * @param array $options
     * @return Illuminate\Support\Collection
     */
    protected function createCartItem(int $id, string $name, string $price, string $quantity, string $image_url, array $options): Collection
    {
        $price = floatval($price);
        $quantity = intval($quantity);

        if ($quantity < self::MINIMUM_QUANTITY) {
            $quantity = self::MINIMUM_QUANTITY;
        }

        return collect([
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'img' => $image_url,
            'options' => $options,
        ]);
    }
}
