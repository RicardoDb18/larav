<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class SaveForLaterController extends Controller
{
    /**
     * Add to Product to Save for Later
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $exists = Cart::instance('saveForLater')
            ->search(function ($cartItem, $rowId) use ($id) {
                return $rowId === $id;
            });

        if($exists->isNotEmpty()) {
            return redirect()
                ->route('cart.index')
                ->withWarning('
                El elemento ya se guardó para más tarde.');
        }

        Cart::instance('saveForLater')
            ->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect()
            ->route('cart.index')
            ->withSuccess('
            El artículo se ha guardado para más tarde.')
            ->withInfo("{$item->name}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('saveForLater')->remove($id);

        return back()->withWarning('
        El elemento se eliminó de guardar para más tarde.');
    }

    /**
     * Move to Product to Cart
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function moveToCart($id)
    {
        $item = Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

        $exists = Cart::instance('default')
            ->search(function ($cartItem, $rowId) use ($id) {
                return $rowId === $id;
            });

        if($exists->isNotEmpty()) {
            return redirect()
                ->route('cart.index')
                ->withWarning('
                El artículo ya existe en su carrito.');
        }

        Cart::instance('default')
            ->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect()
            ->route('cart.index')
            ->withSuccess('
            El artículo se ha movido a su carrito.')
            ->withInfo("{$item->name}");
    }
}
