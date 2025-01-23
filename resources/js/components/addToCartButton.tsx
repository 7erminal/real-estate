import React, { useState } from 'react'
import { createRoot } from 'react-dom/client'
import ReactDisplayController from './reactDisplayController'

const AddToCartButton: React.FC = ()=>{
    const [itemQuantity, setItemQuantity] = useState(1)
    const item = JSON.parse((document.getElementById("item") as HTMLInputElement).value)

    const quantityIncreaseOrDecrease = (itemkey,action: string,quantity)=>{
        let count = quantity
    
        action=="increase" ? count < item['quantity_available'] ? count++ : "" : action=="decrease" ? count <= 1 ? "" : count -- : ""
    
        // this.props.cart.map((cartItem, i) => {
        //   i==itemkey ? cartItem[1].quantity=count : ""
        //   console.log(`this key is ${i}, itemkey is ${itemkey}`);
        // })
    
        setItemQuantity(count)
    
    
        console.log(`count is ${count}, itemkey is ${itemkey} and action is ${action}`);
      }

    const addToCart = ()=>{
		  console.log("item to be sent is "+item['item_name']+" and quantity is "+itemQuantity)

		  new ReactDisplayController().addToCart(item, itemQuantity)
	  }

    return <div className="row">
    {/* <div className="product_quantity ml-lg-auto mr-lg-auto text-center">
            <span className="product_text product_num col">{ itemQuantity }</span>
            <div className="qty_sub qty_button trans_200 text-center" onClick={ (e)=>quantityIncreaseOrDecrease(item['iid'], "decrease", itemQuantity )}><span>-</span></div>
            <div className="qty_add qty_button trans_200 text-center" onClick={ (e)=>quantityIncreaseOrDecrease(item['iid'],"increase", itemQuantity )}><span>+</span></div>
    </div> */}

    <button type="button" className="btn btn-success col mx-1" onClick={ addToCart }>Book Viewing <i className="fas fa-cart-arrow-down"></i></button>
        </div>
}

if(document.getElementById('addToCartButtonDiv')){
    createRoot(document.getElementById('addToCartButtonDiv')!).render(<AddToCartButton />)
}